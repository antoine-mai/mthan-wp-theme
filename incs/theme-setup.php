<?php defined('ABSPATH') || exit;

// ──────────────────────────────────────────────────────────────────
// Theme Setup
// ──────────────────────────────────────────────────────────────────
if (!function_exists('mthan_setup')) {
    function mthan_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        load_theme_textdomain('mthan-wp', get_template_directory() . '/languages');
    }
}

// ──────────────────────────────────────────────────────────────────
// Enqueue Styles & Scripts
// ──────────────────────────────────────────────────────────────────
function mthan_enqueue_assets()
{
    // Vendor CSS
    wp_enqueue_style('mthan-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css', array(), '1.0');
    wp_enqueue_style('mthan-flaticon',    get_template_directory_uri() . '/assets/css/flaticon.css',        array(), '1.0');
    wp_enqueue_style('mthan-bootstrap',   get_template_directory_uri() . '/assets/css/bootstrap.css',       array(), '1.0');
    wp_enqueue_style('mthan-style-main',  get_template_directory_uri() . '/assets/css/style.css',           array('mthan-bootstrap', 'mthan-fontawesome', 'mthan-flaticon'), '1.0');
    wp_enqueue_style('mthan-responsive',  get_template_directory_uri() . '/assets/css/responsive.css',      array('mthan-style-main'), '1.0');

    // Theme CSS
    wp_enqueue_style('mthan-style', get_stylesheet_uri(), array('mthan-style-main'), wp_get_theme()->get('Version'));

    // Vendor Scripts
    wp_enqueue_script('mthan-popper',         get_template_directory_uri() . '/assets/js/popper.min.js',       array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-bootstrap',      get_template_directory_uri() . '/assets/js/bootstrap.min.js',    array('jquery', 'mthan-popper'), '1.0', true);
    wp_enqueue_script('mthan-jquery-ui',      get_template_directory_uri() . '/assets/js/jquery-ui.js',        array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-jquery-fancybox',get_template_directory_uri() . '/assets/js/jquery.fancybox.js',  array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-owl',            get_template_directory_uri() . '/assets/js/owl.js',              array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-scrollbar',      get_template_directory_uri() . '/assets/js/scrollbar.js',        array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-appear',         get_template_directory_uri() . '/assets/js/appear.js',           array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-wow',            get_template_directory_uri() . '/assets/js/wow.js',              array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-validate',       get_template_directory_uri() . '/assets/js/validate.js',         array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-custom-script',  get_template_directory_uri() . '/assets/js/custom-script.js',    array('jquery', 'mthan-bootstrap', 'mthan-validate', 'mthan-jquery-ui'), '1.0', true);

    // Theme Script
    wp_enqueue_script('mthan-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'mthan-custom-script'), '1.0', true);
}

// ──────────────────────────────────────────────────────────────────
// Custom Scripts Output
// ──────────────────────────────────────────────────────────────────
function mthan_wp_head_scripts() {
    $options = get_option('mthan_theme_options');
    if (!empty($options['header_scripts'])) {
        echo $options['header_scripts'] . "\n";
    }
}

function mthan_wp_body_open_scripts() {
    $options = get_option('mthan_theme_options');
    if (!empty($options['body_scripts'])) {
        echo $options['body_scripts'] . "\n";
    }
}

function mthan_wp_footer_scripts() {
    $options = get_option('mthan_theme_options');
    if (!empty($options['footer_scripts'])) {
        echo $options['footer_scripts'] . "\n";
    }
}

/**
 * Safe helper to get image URL from Theme Options (supports both 'media' and 'upload' fields).
 */
function mthan_get_img_url($field_value, $default_url = '')
{
    if (empty($field_value)) {
        return $default_url;
    }
    if (is_array($field_value)) {
        return !empty($field_value['url']) ? $field_value['url'] : $default_url;
    }
    return $field_value;
}
