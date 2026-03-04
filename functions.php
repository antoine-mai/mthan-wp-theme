<?php defined ('ABSPATH') || exit;
/**
 * 
**/
define ('MTHAN_THEME_DIR', get_template_directory());
define ('MTHAN_THEME_VERSION', '1.0.0');
// Theme setup
if ( ! function_exists( 'mthan_setup' ) ) {
    function mthan_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
        load_theme_textdomain( 'mthan-wp', get_template_directory() . '/languages' );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'mthan-wp' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'mthan_setup' );

// Enqueue styles and scripts
function mthan_enqueue_assets() {
    wp_enqueue_style( 'mthan-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'mthan-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0' );
    wp_enqueue_script( 'mthan-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'mthan_enqueue_assets' );
// Add a "Theme Options" submenu under Appearance linking to Codestar Framework
add_action( 'admin_menu', 'mthan_add_theme_options_submenu', 999 );
function mthan_add_theme_options_submenu() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Only add the submenu if Codestar classes exist (framework is available)
    if ( ! class_exists( 'CSF' ) && ! class_exists( 'CSF_Welcome' ) ) {
        return;
    }

    add_theme_page( __( 'Theme Options', 'mthan-wp' ), __( 'Theme Options', 'mthan-wp' ), 'manage_options', 'mthan-theme-options-redirect', 'mthan_theme_options_redirect' );
}

function mthan_theme_options_redirect() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Prefer the Codestar welcome/tools page
    $target = admin_url( 'tools.php?page=csf-welcome' );
    wp_safe_redirect( $target );
    exit;
}