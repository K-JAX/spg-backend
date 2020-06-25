<?php

// exercise cusom post type
add_action('init', 'exercise_init');

function exercise_init() {
    $labels =   array(
        'name'              =>  _x( 'Exercise', 'post type general name', 'SPG' ),
        'singular_name'     =>  _x( 'Exercise', 'post type singular name', 'SPG' ),
        'menu_name'         =>  _x( 'Exercises', 'admin menu', 'SPG' ),
        'name_admin_bar'    =>  _x( 'Exercise', 'add new on admin bar', 'SPG' ),
        'add_new'           =>  _x( 'Add New', 'exercise', 'SPG' ),
        'add_new_item'      =>  _x( 'Add New Book', 'SPG' ),
        'new_item'          =>  _x( 'New Exercise', 'SPG' ),
        'edit_item'         =>  _x( 'Edit Exercise', 'SPG' ),
        'view_item'         =>  _x( 'View Exercise', 'SPG' ),
        'all_items'         =>  _x( 'All Exercises', 'SPG' ),
        'search_items'      =>  _x( 'Search Exercises', 'SPG' ),
        'parent_item_colon' =>  _x( 'Parent Exercises', 'SPG' ),
        'not_found'         =>  _x( 'No exercises found', 'SPG' ),
        'not_found_in_trash'=>  _x( 'No exercises found in Trash', 'SPG' ),
    );

    $args   =   array(
        'labels'            =>  $labels,
        'description'       =>  __( 'Description.', 'SPG' ),
        'public'            =>  true,
        'public_queryable'  =>  true,
        'show_ui'           =>  true,
        'show_in_menu'      =>  true,
        'show_in_rest'      =>  true,
        'query_var'         =>  true,
        'rewrite'           =>  array( 'slug' => 'exercise' ),
        'capability_type'   =>  'post',
        'has_archive'       =>  true,
        'hierarchical'      =>  false,
        'menu_position'     =>  null,
        'menu_icon'         =>  'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" viewBox="0 0 221 184" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M71.0173 94.5234L132.427 59.0688L149.983 89.4766L88.5733 124.931L71.0173 94.5234Z" fill="black"/><path d="M173.332 24.4256L169.071 26.8853L194.96 71.7266L199.221 69.2669C204.141 66.4181 205.818 60.1058 202.966 55.1549L187.424 28.2354C184.561 23.2922 178.256 21.5883 173.332 24.4256Z" fill="black"/><path d="M141.415 17.5711L124.495 27.3396L173.495 112.21L190.415 102.442C195.335 99.5928 197.012 93.2805 194.16 88.3312L155.507 21.3825C152.647 16.4385 146.342 14.7346 141.415 17.5711Z" fill="black"/><path d="M26.8399 95.6687L65.4927 162.617C68.3532 167.561 74.6592 169.267 79.5855 166.429L96.505 156.66L47.505 71.7897L30.5855 81.5582C25.6653 84.407 23.9884 90.7194 26.8399 95.6687Z" fill="black"/><path d="M16.8174 126.737L32.3585 153.655C35.2199 158.601 41.525 160.305 46.4522 157.468L50.7125 155.008L24.8234 110.167L20.5631 112.627C15.642 115.474 13.9675 121.787 16.8174 126.737Z" fill="black"/></svg>'),
        'supports'          =>  array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'exercise', $args );
}

add_action( 'init', 'create_exercise_taxonomies');
function create_exercise_taxonomies() {
    $labels = array(
		'name'                       => _x( 'Training Styles', 'taxonomy general name', 'spg' ),
		'singular_name'              => _x( 'Training Style', 'taxonomy singular name', 'spg' ),
		'search_items'               => __( 'Search Training Styles', 'spg' ),
		'popular_items'              => __( 'Popular Training Styles', 'spg' ),
		'all_items'                  => __( 'All Training Styles', 'spg' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Training Style', 'spg' ),
		'update_item'                => __( 'Update Training Style', 'spg' ),
		'add_new_item'               => __( 'Add New Training Style', 'spg' ),
		'new_item_name'              => __( 'New Writer Training Style', 'spg' ),
		'separate_items_with_commas' => __( 'Separate training styles with commas', 'spg' ),
		'add_or_remove_items'        => __( 'Add or remove training styles', 'spg' ),
		'choose_from_most_used'      => __( 'Choose from the most used training styles', 'spg' ),
		'not_found'                  => __( 'No training styles found.', 'spg' ),
		'menu_name'                  => __( 'Training Styles', 'spg' ),
	);
    $args = array(
        'labels'        =>  $labels,
        'rewrite'       =>  array( 'slug'   =>  'trainingstyle' ),
        'hierarchical'  =>  true,
    );
    register_taxonomy( 'trainingstyle', array( 'exercise' ), $args );

    $labels = array(
		'name'                       => _x( 'Body Parts', 'taxonomy general name', 'spg' ),
		'singular_name'              => _x( 'Body Part', 'taxonomy singular name', 'spg' ),
		'search_items'               => __( 'Search Body Parts', 'spg' ),
		'popular_items'              => __( 'Popular Body Parts', 'spg' ),
		'all_items'                  => __( 'All Body Parts', 'spg' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Body Part', 'spg' ),
		'update_item'                => __( 'Update Body Part', 'spg' ),
		'add_new_item'               => __( 'Add New Body Part', 'spg' ),
		'new_item_name'              => __( 'New Writer Body Part', 'spg' ),
		'separate_items_with_commas' => __( 'Separate body parts with commas', 'spg' ),
		'add_or_remove_items'        => __( 'Add or remove body parts', 'spg' ),
		'choose_from_most_used'      => __( 'Choose from the most used body parts', 'spg' ),
		'not_found'                  => __( 'No body parts found.', 'spg' ),
		'menu_name'                  => __( 'Body Parts', 'spg' ),
	);
    $args = array(
        'labels'        =>  $labels,
        'rewrite'       =>  array( 'slug'   =>  'bodypart' ),
        'hierarchical'  =>  true,
    );

    register_taxonomy( 'bodypart', array( 'exercise' ), $args );
}





function register_custom_post_type(){

    // Call in our custom menu icons for our menu labels
    require_once( 'custom-icons.php' );


    register_post_type('workout',
    array(
        'labels'    =>  array(
            'name'          => __('Workouts'),
            'singular_name' => __('Workout'),
        ),
        'menu_icon' => $barbellIcon,
        'public'        =>  true,
        'has_archive'   =>  true,
        'taxonomies'          => array('bodypart' ),
    ));

    register_post_type('food',
    array(
        'labels'    =>  array(
            'name'          => __('Food'),
            'singular_name' => __('Food'),
        ),
        'menu_icon' => 'data:image/svg+xml;base64,' .$foodIcon,
        'public'        =>  true,
        'has_archive'   =>  true,
        'taxonomies'          => array('foodgroup' ),
    ));
};

add_action( 'init', 'register_custom_post_type' );



/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
    // Add new "Locations" taxonomy to Posts 
    register_taxonomy('bodypart', 'workout', array(
      // Hierarchical taxonomy (like categories)
      'hierarchical' => true,
      // This array of options controls the labels displayed in the WordPress Admin UI
      'labels' => array(
        'name' => _x( 'Body Parts', 'taxonomy general name' ),
        'singular_name' => _x( 'Body Part', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Locations' ),
        'all_items' => __( 'All Locations' ),
        'parent_item' => __( 'Parent Body Part' ),
        'parent_item_colon' => __( 'Parent Body Part:' ),
        'edit_item' => __( 'Edit Body Part' ),
        'update_item' => __( 'Update Body Part' ),
        'add_new_item' => __( 'Add New Body Part' ),
        'new_item_name' => __( 'New Body Part Name' ),
        'menu_name' => __( 'Body Parts' ),
      ),
      // Control the slugs used for this taxonomy
      'rewrite' => array(
        'slug' => 'body-parts', // This controls the base slug that will display before each term
        'with_front' => false, // Don't display the category base before "/locations/"
        'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
      ),
    ));
    register_taxonomy('trainingstyle', 'workout', array(
      // Hierarchical taxonomy (like categories)
      'hierarchical' => true,
      // This array of options controls the labels displayed in the WordPress Admin UI
      'labels' => array(
        'name' => _x( 'Training Styles', 'taxonomy general name' ),
        'singular_name' => _x( 'Training Style', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Locations' ),
        'all_items' => __( 'All Locations' ),
        'parent_item' => __( 'Parent Training Style' ),
        'parent_item_colon' => __( 'Parent Training Style:' ),
        'edit_item' => __( 'Edit Training Style' ),
        'update_item' => __( 'Update Training Style' ),
        'add_new_item' => __( 'Add New Training Style' ),
        'new_item_name' => __( 'New Training Style Name' ),
        'menu_name' => __( 'Training Styles' ),
      ),
      // Control the slugs used for this taxonomy
      'rewrite' => array(
        'slug' => 'training-style', // This controls the base slug that will display before each term
        'with_front' => false, // Don't display the category base before "/locations/"
        'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
      ),
    ));



    $exerciseLabels = array(
      'name' => _x( 'Workout Tags', 'taxonomy general name' ),
      'singular_name' => _x( 'Workout Tag', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Workout Tags' ),
      'popular_items' => __( 'Popular Workout Tags' ),
      'all_items' => __( 'All Workout Tags' ),
      'parent_item' => null,
      'parent_item_colon' => null,
      'edit_item' => __( 'Edit Workout Tag' ), 
      'update_item' => __( 'Update Workout Tag' ),
      'add_new_item' => __( 'Add New Workout Tag' ),
      'new_item_name' => __( 'New Workout Tag Name' ),
      'separate_items_with_commas' => __( 'Separate workout tags with commas' ),
      'add_or_remove_items' => __( 'Add or remove workout tags' ),
      'choose_from_most_used' => __( 'Choose from the most used workout tags' ),
      'menu_name' => __( 'Workout Tags' ),
    ); 
    register_taxonomy('workout-tag','workout',array(
      'hierarchical' => false,
      'labels' => $exerciseLabels,
      'show_ui' => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var' => true,
      'rewrite' => array( 'slug' => 'tag' ),
    ));


    register_taxonomy('foodgroup', 'food', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
          'name' => _x( 'Food Groups', 'taxonomy general name' ),
          'singular_name' => _x( 'Food Group', 'taxonomy singular name' ),
          'search_items' =>  __( 'Search Locations' ),
          'all_items' => __( 'All Locations' ),
          'parent_item' => __( 'Parent Food Group' ),
          'parent_item_colon' => __( 'Parent Food Group:' ),
          'edit_item' => __( 'Edit Food Group' ),
          'update_item' => __( 'Update Food Group' ),
          'add_new_item' => __( 'Add New Food Group' ),
          'new_item_name' => __( 'New Food Group Name' ),
          'menu_name' => __( 'Food Groups' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
          'slug' => 'food-groups', // This controls the base slug that will display before each term
          'with_front' => false, // Don't display the category base before "/locations/"
          'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
      ));
    register_taxonomy('diet', 'food', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
          'name' => _x( 'Diets', 'taxonomy general name' ),
          'singular_name' => _x( 'Diet', 'taxonomy singular name' ),
          'search_items' =>  __( 'Search Locations' ),
          'all_items' => __( 'All Locations' ),
          'parent_item' => __( 'Parent Diet' ),
          'parent_item_colon' => __( 'Parent Diet:' ),
          'edit_item' => __( 'Edit Diet' ),
          'update_item' => __( 'Update Diet' ),
          'add_new_item' => __( 'Add New Diet' ),
          'new_item_name' => __( 'New Diet Name' ),
          'menu_name' => __( 'Diets' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
          'slug' => 'diets', // This controls the base slug that will display before each term
          'with_front' => false, // Don't display the category base before "/locations/"
          'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
      ));



      $foodLabels = array(
        'name' => _x( 'Food Tags', 'taxonomy general name' ),
        'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Food Tags' ),
        'popular_items' => __( 'Popular Food Tags' ),
        'all_items' => __( 'All Food Tags' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Tag' ), 
        'update_item' => __( 'Update Tag' ),
        'add_new_item' => __( 'Add New Tag' ),
        'new_item_name' => __( 'New Tag Name' ),
        'separate_items_with_commas' => __( 'Separate tags with commas' ),
        'add_or_remove_items' => __( 'Add or remove tags' ),
        'choose_from_most_used' => __( 'Choose from the most used tags' ),
        'menu_name' => __( 'Food Tags' ),
      ); 
      register_taxonomy('food-tag','food',array(
        'hierarchical' => false,
        'labels' => $foodLabels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tag' ),
      ));


  }
  add_action( 'init', 'add_custom_taxonomies', 0 );

  