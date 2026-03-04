<?php
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
    $sections = array(
        'general.php',
        'header.php',
        'footer.php',
        'blog.php',
        'social.php',
        'sections-toggle.php',
    );

    foreach ($sections as $section) {
        if (file_exists($admin_dir . $section)) {
            require_once $admin_dir . $section;
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