<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Control core classes for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'mthan_theme_options';

    // Create options
    CSF::createOptions($prefix, array(
        'menu_title' => 'Theme Options',
        'menu_slug' => 'mthan-theme-options',
        'menu_type' => 'submenu',
        'menu_parent' => 'themes.php', // Adds it under Appearance
        'menu_position' => 999, // Position at the end
        'framework_title' => 'Theme Options',
        'theme' => 'light', // Preferred theme
    ));

    // Include all section files from the admin folder
    $admin_dir = get_template_directory() . '/admin/';

    // Load per-instance section fields helper (used by layouts.php and metaboxes)
    require_once $admin_dir . 'fields.php';
    $sections = array(
        'general.php',
        'typography.php',
        'layouts.php',
        'header.php',
        'mobile-bar.php',
        'footer.php',
        'blog.php',
        'social.php',
        'contact.php',
        'scripts.php',
        'sections.php',
    );

    foreach ($sections as $section) {
        if (file_exists($admin_dir . $section)) {
            require_once $admin_dir . $section;
        }
    }

    $sections_path = get_template_directory() . '/sections/*.php';
    // Include all section files so their functions are defined
    foreach (glob($sections_path) as $section_file) {
        require_once $section_file;
        $slug = basename($section_file, '.php');
        $global_options_func = 'mthan_section_' . str_replace('-', '_', $slug) . '_global_options';
        if (function_exists($global_options_func)) {
            CSF::createSection($prefix, $global_options_func());
        }
    }

    // Include all metabox files from the admin/metabox folder
    $metabox_dir = get_template_directory() . '/admin/metabox/';
    $metaboxes = array(
        'page-metabox.php',
        'post-metabox.php',
    );

    foreach ($metaboxes as $metabox) {
        if (file_exists($metabox_dir . $metabox)) {
            require_once $metabox_dir . $metabox;
        }
    }

}