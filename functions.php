<?php
// Theme setup
if ( ! function_exists( 'mytheme_setup' ) ) {
    function mytheme_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
        load_theme_textdomain( 'my-theme', get_template_directory() . '/languages' );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'my-theme' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'mytheme_setup' );

// Enqueue styles and scripts
function mytheme_enqueue_assets() {
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'mytheme-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0' );
    wp_enqueue_script( 'mytheme-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_assets' );
