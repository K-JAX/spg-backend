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

$svgDataPrefix = 'data:image/svg+xml;base64,';

$barbellIcon = $svgDataPrefix . base64_encode('<svg width="20" height="20" viewBox="0 0 221 184" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M71.0173 94.5234L132.427 59.0688L149.983 89.4766L88.5733 124.931L71.0173 94.5234Z" />
<path d="M173.332 24.4256L169.071 26.8853L194.96 71.7266L199.221 69.2669C204.141 66.4181 205.818 60.1058 202.966 55.1549L187.424 28.2354C184.561 23.2922 178.256 21.5883 173.332 24.4256Z" fill="black"/>
<path d="M141.415 17.5711L124.495 27.3396L173.495 112.21L190.415 102.442C195.335 99.5928 197.012 93.2805 194.16 88.3312L155.507 21.3825C152.647 16.4385 146.342 14.7346 141.415 17.5711Z" fill="black"/>
<path d="M26.8399 95.6687L65.4927 162.617C68.3532 167.561 74.6592 169.267 79.5855 166.429L96.505 156.66L47.505 71.7897L30.5855 81.5582C25.6653 84.407 23.9884 90.7194 26.8399 95.6687Z" fill="black"/>
<path d="M16.8174 126.737L32.3585 153.655C35.2199 158.601 41.525 160.305 46.4522 157.468L50.7125 155.008L24.8234 110.167L20.5631 112.627C15.642 115.474 13.9675 121.787 16.8174 126.737Z" fill="black"/>
</svg>');

$foodIcon = $svgDataPrefix . base64_encode('<svg width="142" height="139" viewBox="0 0 142 139" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.8208 52.6012H32.9931L21.9091 27.0498L29.7463 23.6502L42.3047 52.6012H47.1886C47.1203 51.8385 47.0997 51.0672 47.1312 50.2893C47.2796 46.4455 48.6371 42.84 51.0551 39.864L51.2122 39.6766C51.5513 39.2692 51.9099 38.8792 52.2859 38.5054C47.5873 34.9411 44.5484 29.2968 44.5484 22.9579C44.5484 20.3438 45.0673 17.8466 46.0034 15.5682C43.1303 12.7125 39.619 10.1124 35.4871 7.78853C26.7421 2.86784 18.3047 0.965439 17.9483 0.885269L14.9268 0.218994L13.3494 2.88193C13.0103 3.45178 5.06592 17.0427 4.89258 31.7029C4.82974 36.7428 5.70077 41.3818 7.48292 45.4856C8.5663 47.9828 10.0148 50.3575 11.8208 52.6012Z" fill="black"/>
<path d="M61.5378 33.6333C61.8758 33.5672 62.2181 33.513 62.5594 33.4707C64.4564 29.4503 67.8214 26.3151 71.8656 24.6488C71.6121 23.3813 71.4788 22.0715 71.4788 20.7303C71.4788 18.9449 71.715 17.2104 72.1592 15.5647C70.1484 13.3666 67.2612 11.9885 64.0599 11.9885C58.0125 11.9885 53.0918 16.9092 53.0918 22.9577C53.0918 28.1373 56.7016 32.4914 61.5378 33.6333Z" fill="black"/>
<path d="M83.5409 24.0562C86.531 24.9511 89.2102 26.6249 91.3206 28.8523C92.1461 28.6183 92.9922 28.4482 93.8492 28.3367C95.6855 24.4441 98.8977 21.3771 102.774 19.674C102.241 13.879 97.355 9.32886 91.4235 9.32886C87.3424 9.32886 83.7576 11.4815 81.7414 14.7132C80.6504 16.4618 80.021 18.5235 80.021 20.7303C80.021 21.6566 80.1315 22.5558 80.3395 23.416C81.4359 23.5297 82.5073 23.7464 83.5409 24.0562Z" fill="black"/>
<path d="M101.475 32.2033C101.284 32.6399 101.127 33.0895 101.008 33.5586L100.208 36.6798C100.772 36.9994 101.316 37.3515 101.837 37.7307C106.419 41.0621 109.321 46.5353 109.115 52.6011H129.846C131.079 51.0801 131.791 49.2036 131.866 47.2308C131.959 44.7987 131.105 42.4802 129.453 40.6948C127.802 38.9094 125.555 37.8759 123.126 37.7816H123.097C123.034 37.7816 122.972 37.7816 122.906 37.7795L119.39 37.7134L118.781 34.2455C118.063 30.1471 114.577 27.0357 110.437 26.7507C110.349 26.7442 110.26 26.7388 110.172 26.7366C107.812 26.6424 105.573 27.4853 103.87 28.9597C102.854 29.8373 102.025 30.939 101.475 32.2012V32.2033Z" fill="black"/>
<path d="M69.7182 38.6938L68.9068 41.8594L68.8299 42.1585C68.8299 42.1585 67.9047 42.0902 67.9014 42.0902L65.0944 41.88C63.9753 41.8367 62.8789 41.9992 61.8508 42.3437C60.2474 42.8821 58.8065 43.8702 57.6928 45.2428L57.6104 45.3457C56.4144 46.8581 55.7427 48.6804 55.6658 50.6229C55.6398 51.2946 55.6853 51.9554 55.8023 52.6011H100.561C100.569 52.522 100.573 52.4451 100.575 52.3649C100.772 47.3511 96.8503 43.1129 91.8364 42.9168H91.8071C91.7443 42.9168 91.6815 42.9168 91.6165 42.9136L88.0998 42.8486C88.0998 42.8486 87.9146 41.7977 87.9092 41.7641C87.5625 39.7956 87.3285 37.9604 86.2494 36.2107C85.2744 34.6301 83.8368 33.3246 82.1326 32.5879C77.1155 30.4147 71.0529 33.4091 69.7182 38.6938Z" fill="black"/>
<path d="M10.6843 94.5861C17.0914 104.812 25.9761 113.235 36.487 119.076V138.041H105.513V119.076C116.024 113.235 124.909 104.812 131.316 94.5861C134.019 90.2721 136.234 85.7013 137.94 80.9551H4.06055C5.76686 85.7024 7.98236 90.2721 10.6843 94.5861Z" fill="black"/>
<path d="M0 61.1445C0.225341 64.9515 0.757277 68.7195 1.58389 72.4127H140.417C141.242 68.7195 141.775 64.9515 142 61.1445H0Z" fill="black"/>
</svg>');