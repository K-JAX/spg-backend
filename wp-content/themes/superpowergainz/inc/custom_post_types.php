<?php


// exercise cusom post type
if (!function_exists('cpt_tax_init')){
    add_action('init', 'cpt_tax_init');

    function cpt_tax_init() {
        require_once( 'custom-icons.php' );

        create_exersise_post_type($barbellIcon);
        create_exercise_taxonomies();
        create_food_post_type($foodIcon);
        create_food_taxonomies();        

    }
}


function create_exersise_post_type($icon){
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
        'menu_position'     =>  4,
        'menu_icon'         =>  $icon,
        'supports'          =>  array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'exercise', $args );
}

// add_action( 'init', 'create_exercise_taxonomies');
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
        'rewrite'       =>  array( 'slug'   =>  'training_style' ),
        'hierarchical'  =>  true,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rest_base' => 'training_style',
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
    );
    register_taxonomy( 'training_style', array( 'exercise' ), $args );

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
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rest_base' => 'bodypart',
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
    );

    register_taxonomy( 'bodypart', array( 'exercise' ), $args );

    $labels = array(
		'name'                       => _x( 'Workout Tags', 'taxonomy general name', 'spg' ),
		'singular_name'              => _x( 'Workout Tag', 'taxonomy singular name', 'spg' ),
		'search_items'               => __( 'Search Workout Tags', 'spg' ),
		'popular_items'              => __( 'Popular Workout Tags', 'spg' ),
		'all_items'                  => __( 'All Workout Tags', 'spg' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Workout Tag', 'spg' ),
		'update_item'                => __( 'Update Workout Tag', 'spg' ),
		'add_new_item'               => __( 'Add New Workout Tag', 'spg' ),
		'new_item_name'              => __( 'New Writer Workout Tag', 'spg' ),
		'separate_items_with_commas' => __( 'Separate body parts with commas', 'spg' ),
		'add_or_remove_items'        => __( 'Add or remove body parts', 'spg' ),
		'choose_from_most_used'      => __( 'Choose from the most used body parts', 'spg' ),
		'not_found'                  => __( 'No body parts found.', 'spg' ),
		'menu_name'                  => __( 'Workout Tags', 'spg' ),
	);
    $args = array(
        'labels'        =>  $labels,
        'rewrite'       =>  array( 'slug'   =>  'workout_tag' ),
        'hierarchical'  =>  false,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rest_base' => 'workout_tag',
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
    );

    register_taxonomy( 'workout_tag', array( 'exercise' ), $args );
    
}

function create_food_post_type($icon){
    $labels =   array(
        'name'              =>  _x( 'Food', 'post type general name', 'SPG' ),
        'singular_name'     =>  _x( 'Food', 'post type singular name', 'SPG' ),
        'menu_name'         =>  _x( 'Foods', 'admin menu', 'SPG' ),
        'name_admin_bar'    =>  _x( 'Food', 'add new on admin bar', 'SPG' ),
        'add_new'           =>  _x( 'Add New', 'food', 'SPG' ),
        'add_new_item'      =>  _x( 'Add New Book', 'SPG' ),
        'new_item'          =>  _x( 'New Food', 'SPG' ),
        'edit_item'         =>  _x( 'Edit Food', 'SPG' ),
        'view_item'         =>  _x( 'View Food', 'SPG' ),
        'all_items'         =>  _x( 'All Foods', 'SPG' ),
        'search_items'      =>  _x( 'Search Foods', 'SPG' ),
        'parent_item_colon' =>  _x( 'Parent Foods', 'SPG' ),
        'not_found'         =>  _x( 'No foods found', 'SPG' ),
        'not_found_in_trash'=>  _x( 'No foods found in Trash', 'SPG' ),
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
        'rewrite'           =>  array( 'slug' => 'food' ),
        'capability_type'   =>  'post',
        'has_archive'       =>  true,
        'hierarchical'      =>  false,
        'menu_position'     =>  4,
        'menu_icon'         =>  $icon,
        'supports'          =>  array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'food', $args );
}

function create_food_taxonomies() {
    $labels = array(
		'name'                       => _x( 'Food Groups', 'taxonomy general name', 'spg' ),
		'singular_name'              => _x( 'Food Group', 'taxonomy singular name', 'spg' ),
		'search_items'               => __( 'Search Food Groups', 'spg' ),
		'popular_items'              => __( 'Popular Food Groups', 'spg' ),
		'all_items'                  => __( 'All Food Groups', 'spg' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Food Group', 'spg' ),
		'update_item'                => __( 'Update Food Group', 'spg' ),
		'add_new_item'               => __( 'Add New Food Group', 'spg' ),
		'new_item_name'              => __( 'New Writer Food Group', 'spg' ),
		'separate_items_with_commas' => __( 'Separate food groups with commas', 'spg' ),
		'add_or_remove_items'        => __( 'Add or remove food groups', 'spg' ),
		'choose_from_most_used'      => __( 'Choose from the most used food groups', 'spg' ),
		'not_found'                  => __( 'No food groups found.', 'spg' ),
		'menu_name'                  => __( 'Food Groups', 'spg' ),
	);
    $args = array(
        'labels'        =>  $labels,
        'rewrite'       =>  array( 'slug'   =>  'food_group' ),
        'hierarchical'  =>  true,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rest_base' => 'food_group',
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
    );
    register_taxonomy( 'food_group', array( 'food' ), $args );

    $labels = array(
		'name'                       => _x( 'Diets', 'taxonomy general name', 'spg' ),
		'singular_name'              => _x( 'Diet', 'taxonomy singular name', 'spg' ),
		'search_items'               => __( 'Search Diets', 'spg' ),
		'popular_items'              => __( 'Popular Diets', 'spg' ),
		'all_items'                  => __( 'All Diets', 'spg' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Diet', 'spg' ),
		'update_item'                => __( 'Update Diet', 'spg' ),
		'add_new_item'               => __( 'Add New Diet', 'spg' ),
		'new_item_name'              => __( 'New Writer Diet', 'spg' ),
		'separate_items_with_commas' => __( 'Separate diets with commas', 'spg' ),
		'add_or_remove_items'        => __( 'Add or remove diets', 'spg' ),
		'choose_from_most_used'      => __( 'Choose from the most used diets', 'spg' ),
		'not_found'                  => __( 'No diets found.', 'spg' ),
		'menu_name'                  => __( 'Diets', 'spg' ),
	);
    $args = array(
        'labels'        =>  $labels,
        'rewrite'       =>  array( 'slug'   =>  'diet' ),
        'hierarchical'  =>  true,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rest_base' => 'diet',
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
    );
    register_taxonomy( 'diet', array( 'food' ), $args );


    $labels = array(
		'name'                       => _x( 'Food Tags', 'taxonomy general name', 'spg' ),
		'singular_name'              => _x( 'Food Tag', 'taxonomy singular name', 'spg' ),
		'search_items'               => __( 'Search Food Tags', 'spg' ),
		'popular_items'              => __( 'Popular Food Tags', 'spg' ),
		'all_items'                  => __( 'All Food Tags', 'spg' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Food Tag', 'spg' ),
		'update_item'                => __( 'Update Food Tag', 'spg' ),
		'add_new_item'               => __( 'Add New Food Tag', 'spg' ),
		'new_item_name'              => __( 'New Writer Food Tag', 'spg' ),
		'separate_items_with_commas' => __( 'Separate food tags with commas', 'spg' ),
		'add_or_remove_items'        => __( 'Add or remove food tags', 'spg' ),
		'choose_from_most_used'      => __( 'Choose from the most used food tags', 'spg' ),
		'not_found'                  => __( 'No food Tags found.', 'spg' ),
		'menu_name'                  => __( 'Food Tags', 'spg' ),
	);
    $args = array(
        'labels'        =>  $labels,
        'rewrite'       =>  array( 'slug'   =>  'food_tag' ),
        'hierarchical'  =>  true,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rest_base' => 'food_tag',
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
    );
    register_taxonomy( 'food_tag', array( 'food' ), $args );

}
