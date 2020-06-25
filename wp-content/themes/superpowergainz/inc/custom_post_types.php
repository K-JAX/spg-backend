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

