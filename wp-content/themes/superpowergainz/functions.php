<?php
/**
 * Super Power Gainz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Super_Power_Gainz
 */

if ( ! function_exists( 'superpowergainz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function superpowergainz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Super Power Gainz, use a find and replace
		 * to change 'superpowergainz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'superpowergainz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'superpowergainz' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'superpowergainz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'superpowergainz_setup' );


define( 'SPG_XTRA', get_stylesheet_directory() . '/inc/');
define( 'SPG_BLOCKS', get_stylesheet_directory() . '/blocks/');

require_once( SPG_XTRA . 'custom_post_types.php' );
require_once( SPG_BLOCKS . 'register_blocks.php' );


add_action('init', 'spg_blocks');

// require_once( SPG_BLOCKS . 'register_blocks.php' );

function my_custom_link_query( $query ){

    // custom post type slug to be removed
    $cpt_to_remove = '';      // Edit this to your needs

    // find the corresponding array key
    $key = array_search( $cpt_to_remove, $query['post_type'] ); 

    // remove the array item
    if( $key )
        unset( $query['post_type'][$key] );

    return $query; 
}

add_filter( 'wp_link_query_args', 'my_custom_link_query' );