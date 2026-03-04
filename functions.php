<?php defined('ABSPATH') || exit;
/**
 * 
 **/
define('MTHAN_THEME_DIR', get_template_directory());
define('MTHAN_THEME_VERSION', '1.0.0');
// Theme setup
if (!function_exists('mthan_setup')) {
    function mthan_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        load_theme_textdomain('mthan-wp', get_template_directory() . '/languages');
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'mthan-wp'),
        ));
    }
}
add_action('after_setup_theme', 'mthan_setup');

// Enqueue styles and scripts
function mthan_enqueue_assets()
{
    // Vendor CSS
    wp_enqueue_style('mthan-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '1.0');
    wp_enqueue_style('mthan-style-main', get_template_directory_uri() . '/assets/css/style.css', array('mthan-bootstrap'), '1.0');
    wp_enqueue_style('mthan-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('mthan-style-main'), '1.0');

    // Theme CSS
    wp_enqueue_style('mthan-style', get_stylesheet_uri(), array('mthan-style-main'), wp_get_theme()->get('Version'));

    // Vendor Scripts
    wp_enqueue_script('mthan-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery', 'mthan-popper'), '1.0', true);
    wp_enqueue_script('mthan-jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-jquery-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-owl', get_template_directory_uri() . '/assets/js/owl.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-appear', get_template_directory_uri() . '/assets/js/appear.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-custom-script', get_template_directory_uri() . '/assets/js/custom-script.js', array('jquery', 'mthan-bootstrap'), '1.0', true);

    // Theme Script
    wp_enqueue_script('mthan-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'mthan-custom-script'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mthan_enqueue_assets');

// Include Codestar Framework
if (file_exists(get_template_directory() . '/incs/codestar/codestar-framework.php')) {
    require_once get_template_directory() . '/incs/codestar/codestar-framework.php';
}

// Include Theme Options
if (file_exists(get_template_directory() . '/incs/theme-options.php')) {
    require_once get_template_directory() . '/incs/theme-options.php';
}