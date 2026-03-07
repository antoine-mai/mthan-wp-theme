<?php defined('ABSPATH') or die('Cheatin\' uh?');

if (class_exists('CSF')) {

    $admin_dir = get_template_directory() . '/admin/';

    // ── Create Single Options Instance ─────────────────────────────────────
    CSF::createOptions(MTHAN_THEME_OPTIONS, [
        'menu_title'         => 'MTHAN',
        'menu_slug'          => 'mthan-admin',
        'menu_type'          => 'menu',
        'menu_position'      => 2,
        'menu_icon'          => get_template_directory_uri() . '/assets/images/mthan-logo.png',
        'show_sub_menu'      => true,
        'show_bar_menu'      => true,
        'framework_title'    => 'MTHAN <small>Management</small>',
        'theme'              => 'dark',
        'database'           => 'option',
        'option_name'        => MTHAN_THEME_OPTIONS,
        'show_all_options'   => true,
        'show_search'        => true,
        'show_reset_all'     => true,
        'show_reset_section' => true,
        'nav'                => 'normal',
        'output_css'         => true,
        'enqueue_webfont'    => true,
    ]);

    // ── Load Admin Sub-items ───────────────────────────────────────────────
    $admin_files = [
        'general.php',
        'typography.php',
        'header.php',
        'layouts.php',
        'mobile-bar.php',
        'search.php',
        'contact.php',
        'footer.php',
        'scripts.php',
        'update.php'
    ];

    foreach ($admin_files as $file) {
        if (file_exists($admin_dir . $file)) {
            require_once $admin_dir . $file;
        }
    }

    // Metaboxes
    $incs_dir = get_template_directory() . '/incs/';
    if (file_exists($incs_dir . 'page-options.php')) {
        require_once $incs_dir . 'page-options.php';
    }
}