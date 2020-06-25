<?php


function spg_blocks(){
    wp_register_script( 
        'spg-block-scripts',
        get_template_directory_uri() . '/blocks/blocks.min.js',
        array( 'wp-blocks', 'wp-element' ) );
    // echo get_stylesheet_directory() . '/blocks/blocks.min.js';

    register_block_type( 'spg-blocks/exercise-block', array('editor_script' => 'spg-block-scripts' ) );
    
}

add_action('init', 'spg_blocks');