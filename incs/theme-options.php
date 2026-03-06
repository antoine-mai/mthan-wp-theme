<?php defined('ABSPATH') or die('Cheatin\' uh?');

if (class_exists('CSF')) {

    // Create options
    CSF::createOptions(MTHAN_THEME_OPTIONS, [
        'menu_title'      => 'MTHAN',
        'menu_slug'       => 'mthan-admin',
        'menu_type'       => 'menu',
        'menu_icon'       => get_template_directory_uri() . '/assets/images/mthan-logo.png',
        'menu_position'   => 2,
        'framework_title' => 'MTHAN Platform',
        'theme'           => 'dark',
    ]);

    // Include all section files from the admin folder
    $admin_dir = get_template_directory() . '/admin/';

    // Load per-instance section fields helper (used by layouts.php and metaboxes)
    require_once $admin_dir . 'fields.php';

    $admin_sections = [
        'general.php',
        'homepage.php',
        'typography.php',
        'layouts.php',
        'header.php',
        'footer.php',
        'mobile-bar.php',
        'scripts.php',
        'sections.php',
    ];

    foreach ($admin_sections as $section) {
        if (file_exists($admin_dir . $section)) {
            require_once $admin_dir . $section;
        }
    }

    // Register global options from each section file
    $sections_path = get_template_directory() . '/sections/*.php';
    foreach (glob($sections_path) as $section_file) {
        $slug = basename($section_file, '.php');
        $global_options_func = 'mthan_section_' . str_replace('-', '_', $slug) . '_global_options';
        if (function_exists($global_options_func)) {
            CSF::createSection(MTHAN_THEME_OPTIONS, $global_options_func());
        }
    }

    // Always include Update section at the very end
    if (file_exists($admin_dir . 'update.php')) {
        require_once $admin_dir . 'update.php';
    }

    // Include all metabox files
    $metabox_dir = get_template_directory() . '/admin/metabox/';
    foreach (['mthan-page-metabox.php'] as $metabox) {
        if (file_exists($metabox_dir . $metabox)) {
            require_once $metabox_dir . $metabox;
        }
    }

}