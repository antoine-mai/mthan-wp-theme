<?php defined('ABSPATH') or die('Cheatin\' uh?');

// ── Register MTHAN Parent Menu ─────────────────────────────────────────
add_action('admin_menu', function() {
    add_menu_page(
        'MTHAN Management',
        'MTHAN',
        'manage_options',
        'mthan-admin',
        '', // Callback empty because we use submenus
        get_template_directory_uri() . '/assets/images/mthan-logo.png',
        2
    );
});

// ── Admin Bar Menu Hook ──────────────────────────────────────────────────
add_action('admin_bar_menu', function($wp_admin_bar) {
    if (!current_user_can('manage_options')) {
        return;
    }
    $logo_url = get_template_directory_uri() . '/assets/images/mthan-logo.png';
    $title = '<img src="' . esc_url($logo_url) . '" style="width:18px; height:18px; vertical-align:middle; margin-top:-3px; margin-right:6px; border-radius:2px;"> MTHAN';
    
    $wp_admin_bar->add_node(array(
        'id'    => 'mthan-admin',
        'title' => $title,
        'href'  => admin_url('admin.php?page=mthan-admin'),
    ));
}, 41); // Priority 41 places it right after 'Customize' (priority 40)

if (class_exists('CSF')) {

    $admin_dir = get_template_directory() . '/admin/';
    require_once $admin_dir . 'fields.php'; // Load section fields helper

    // ── Create Single Options Instance ─────────────────────────────────────
    CSF::createOptions(MTHAN_THEME_OPTIONS, [
        'menu_title'         => 'Options',
        'menu_slug'          => 'mthan-admin', // Same as parent to be the default landing
        'menu_type'          => 'submenu',
        'menu_parent'        => 'mthan-admin',
        'framework_title'    => 'MTHAN <small>Management</small>',
        'theme'              => 'dark',
        'database'           => 'option',
        'option_name'        => MTHAN_THEME_OPTIONS,
        'show_all_options'   => true,
        'show_search'        => true,
        'show_reset_all'     => true,
        'show_reset_section' => true,
        'nav'                => 'normal', // Left-side tabs
    ]);

    // ── Load All Sections ──────────────────────────────────────────────────
    $admin_files = [
        'general.php',
        'social.php',
        'typography.php',
        'layouts.php',
        'header.php',
        'blog.php',
        'services.php',
        'contact.php',
        'home-page.php',
        'search-page.php',
        'footer.php',
        'mobile-bar.php',
        'scripts.php',
        'sections.php',
        'update.php',
    ];

    foreach ($admin_files as $file) {
        if (file_exists($admin_dir . $file)) {
            require_once $admin_dir . $file;
        }
    }

    // Metaboxes
    $metabox_dir = get_template_directory() . '/admin/metabox/';
    foreach (['mthan-page-metabox.php'] as $metabox) {
        if (file_exists($metabox_dir . $metabox)) {
            require_once $metabox_dir . $metabox;
        }
    }
}