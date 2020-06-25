<?php
/**
 * Multiuse backend functions.
 *
 * @package Display_Post_Types
 * @since 1.0.0
 */

/**
 * Fecilitate display post types markup rendering.
 *
 * @since  1.0.0
 *
 * @param array $args Display post types markup args.
 * @return void
 */
function dpt_display_posts( $args ) {

	// Set widget instance settings default values.
	$defaults = dpt_get_defaults();
	
	// Merge with defaults.
	$args = wp_parse_args( (array) $args, $defaults );
	$args['post_type'] = 'exercise';

	$wrapper_class = apply_filters( 'dpt_wrapper_classes', [ $args['styles'] ], $args );
	$wrapper_class = array_map( 'esc_attr', $wrapper_class );

	// Prepare the query.
	$query_args = [];
	if ( ! $args['post_type'] ) {
		return;
	} elseif ( 'page' === $args['post_type'] ) {
		$query_args = [
			'post_type'           => 'page',
			'post__in'            => $args['pages'],
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		];
	} else {
		$query_args = [
			'post_type'           => $args['post_type'],
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'posts_per_page'      => $args['number'],
			'orderby'             => $args['orderby'],
			'order'               => $args['order'],
		];

		if ( $args['taxonomy'] && ! empty( $args['terms'] ) ) {
			$query_args['tax_query'] = [
				[
					'taxonomy' => $args['taxonomy'],
					'field'    => 'slug',
					'terms'    => $args['terms'],
				],
			];
		}

		if ( $args['post_ids'] ) {
			$query_args['post__in'] = explode( ',', $args['post_ids'] );
		}
	}

	$query_args = apply_filters( 'dpt_display_posts_args', $query_args, $args );
	$post_query = new \WP_Query( $query_args );

	if ( $post_query->have_posts() ) :
		$action_args = [
			'args'  => $args,
			'query' => $post_query,
		];

		$inst_class = Display_Post_Types\Instance_Counter::get_instance();
		$instance   = $inst_class->get();

		/**
		 * Fires before display posts wrapper.
		 *
		 * @since 1.0.0
		 *
		 * @param array $action_args Settings & args for the current widget instance..
		 */
		do_action( 'dpt_before_wrapper', $action_args, $instance );
		?>
		<div id="dpt-wrapper-<?php echo absint( $instance ); ?>" class="dpt-wrapper <?php echo join( ' ', $wrapper_class ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">

		<?php
		/**
		 * Fires before custom loop starts.
		 *
		 * @since 1.0.0
		 *
		 * @param array $action_args Settings & args for the current widget instance..
		 */
		do_action( 'dpt_before_loop', $action_args );

		while ( $post_query->have_posts() ) :
			$post_query->the_post();
			$entry_class = apply_filters( 'dpt_entry_classes', [], $args );
			$entry_class = array_map( 'esc_attr', $entry_class );
			?>
			<div class="dpt-entry <?php echo join( ' ', $entry_class ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
				<div class="dpt-entry-wrapper"><?php do_action( 'dpt_entry', $args ); ?></div>
			</div><!-- .dpt-entry -->
			<?php
		endwhile;

		/**
		 * Fires after custom loop starts.
		 *
		 * @since 1.0.0
		 *
		 * @param array $action_args Settings & args for the current widget instance..
		 */
		do_action( 'dpt_after_loop', $action_args );
		?>

		</div>
		<?php

		// Reset the global $the_post as this query will have stomped on it.
		wp_reset_postdata();

		/**
		 * Fires after display posts wrapper.
		 *
		 * @since 1.0.0
		 *
		 * @param array $action_args Settings & args for the current widget instance..
		 */
		do_action( 'dpt_after_wrapper', $action_args );
	endif;
}
