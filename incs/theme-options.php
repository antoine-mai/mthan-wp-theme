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
    require_once $admin_dir . 'section-instance-fields.php';
    $sections = array(
        'general.php',
        'layouts.php',
        'header.php',
        'footer.php',
        'blog.php',
        'social.php',
        'sections.php',
    );

    foreach ($sections as $section) {
        if (file_exists($admin_dir . $section)) {
            require_once $admin_dir . $section;
        }
    }

    // Include all section option files from admin/section-options/
    foreach (glob($admin_dir . 'section-options/*.php') as $section_option_file) {
        require_once $section_option_file;
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