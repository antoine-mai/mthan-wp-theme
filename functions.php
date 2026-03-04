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
    wp_enqueue_style('mthan-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('mthan-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
    wp_enqueue_script('mthan-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
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

// Git Pull AJAX handler
add_action('wp_ajax_mthan_git_pull', 'mthan_ajax_git_pull_handler');
function mthan_ajax_git_pull_handler()
{
    // Basic security check - only admins can pull
    if (!current_user_can('manage_options')) {
        wp_send_json_error('You do not have permission to perform this action.');
    }

    $theme_dir = get_template_directory();

    // Execute git pull in the theme directory
    // Note: requires the web server user to have git access and correct permissions
    $command = "cd " . escapeshellarg($theme_dir) . " && git pull 2>&1";
    $output = shell_exec($command);

    if ($output === null) {
        wp_send_json_error('Could not execute git command.');
    }

    wp_send_json_success($output);
}

// Enqueue admin scripts for theme options
add_action('admin_enqueue_scripts', 'mthan_admin_enqueue_scripts');
function mthan_admin_enqueue_scripts($hook)
{
    // Only load on theme options page if possible, or globally in admin
    wp_enqueue_script('mthan-admin-git-pull', get_template_directory_uri() . '/assets/js/admin-git-pull.js', array('jquery'), filemtime(get_template_directory() . '/assets/js/admin-git-pull.js'), true);
}