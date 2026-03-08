<?php defined('ABSPATH') or die('Cheatin\' uh?');

if (class_exists('CSF')) {

    $admin_dir = get_template_directory() . '/admin/';

    // ── Create Top-level Mthan Menu ────────────────────────────────────────
    add_action('admin_menu', function() {
        add_menu_page(
            'MTHAN', 
            'MTHAN', 
            'manage_options', 
            'mthan-admin', 
            null, 
            get_template_directory_uri() . '/assets/images/mthan-logo.png', 
            2
        );
        
        add_submenu_page(
            'mthan-admin',
            'About',
            'About',
            'manage_options',
            'mthan-about',
            function() {
                ?>
                <div class="wrap">
                    <h1>About MTHAN Theme</h1>
                    <p>MTHAN is a premium WordPress theme designed for Landscaping and Gardening businesses.</p>
                    <p>Version: 1.0.0</p>
                    <p>Author: mthan.net</p>
                </div>
                <?php
            }
        );
    });

    // ── Create Single Options Instance as Submenu ──────────────────────────
    CSF::createOptions(MTHAN_THEME_OPTIONS, [
        'menu_title'         => 'Options',
        'menu_slug'          => 'mthan-theme-options',
        'menu_type'          => 'submenu',
        'menu_parent'        => 'mthan-admin',
        'show_sub_menu'      => false,
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