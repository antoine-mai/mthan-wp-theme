<?php defined('ABSPATH') or die('Cheatin\' uh?');

if (class_exists('CSF')) {

    $admin_dir = get_template_directory() . '/admin/';
    require_once $admin_dir . 'fields.php'; // Load section fields helper

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
        'nav'                => 'normal', // Left-side tabs
        'output_css'         => true,
        'enqueue_webfont'    => true,
    ]);

    // ── Load All Sections dynamically ────────────────────────────────────────
    $preferred_order = [
        'general.php',
        'typography.php',
        'layouts.php',
        'sections.php',
        'header.php',
        'mobile-bar.php',
        'blog.php',
        'search.php',
        'contact.php',
        'footer.php',
        'scripts.php',
        'update.php'
    ];

    $loaded_files = ['fields.php'];

    // 1. Load priority files in exact order
    foreach ($preferred_order as $file) {
        if (file_exists($admin_dir . $file)) {
            require_once $admin_dir . $file;
            $loaded_files[] = $file;
        }
    }

    // 2. Auto-load any new/custom files appended later
    foreach (glob($admin_dir . '*.php') as $file) {
        $basename = basename($file);
        if (!in_array($basename, $loaded_files)) {
            require_once $file;
            $loaded_files[] = $basename;
        }
    }

    // Metaboxes
    $metabox_dir = get_template_directory() . '/admin/metabox/';
    foreach (['page-metabox.php', 'nav-menu-metabox.php'] as $metabox) {
        if (file_exists($metabox_dir . $metabox)) {
            require_once $metabox_dir . $metabox;
        }
    }
}