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

if (class_exists('CSF')) {

    $admin_dir = get_template_directory() . '/admin/';
    require_once $admin_dir . 'fields.php'; // Load section fields helper

    // Each of these will be a separate menu item under MTHAN
    $admin_sections = [
        'general.php'    => ['title' => 'General'],
        'typography.php' => ['title' => 'Typography'],
        'layouts.php'    => ['title' => 'Layouts'],
        'header.php'     => ['title' => 'Header'],
        'footer.php'     => ['title' => 'Footer'],
        'mobile-bar.php' => ['title' => 'Mobile Bar'],
        'scripts.php'    => ['title' => 'Scripts'],
        'sections.php'   => ['title' => 'Sections'],
    ];

    global $mthan_options_id;

    foreach ($admin_sections as $file => $config) {
        $slug = basename($file, '.php');
        $mthan_options_id = 'mthan_options_' . str_replace('-', '_', $slug);
        
        // Define the options page
        CSF::createOptions($mthan_options_id, [
            'menu_title'      => $config['title'],
            'menu_slug'       => 'mthan-' . $slug,
            'menu_type'       => 'submenu',
            'menu_parent'     => 'mthan-admin',
            'framework_title' => $config['title'],
            'theme'           => 'dark',
            'database'        => 'option',
            'option_name'     => MTHAN_THEME_OPTIONS, // Always save to the same option name
        ]);

        if (file_exists($admin_dir . $file)) {
            require_once $admin_dir . $file;
        }
    }

    // Update section
    if (file_exists($admin_dir . 'update.php')) {
        $mthan_options_id = 'mthan_options_update';
        CSF::createOptions($mthan_options_id, [
            'menu_title'      => 'Update',
            'menu_slug'       => 'mthan-update',
            'menu_type'       => 'submenu',
            'menu_parent'     => 'mthan-admin',
            'framework_title' => 'Theme Update',
            'theme'           => 'dark',
            'database'        => 'option',
            'option_name'     => MTHAN_THEME_OPTIONS, // Keep persistent
        ]);
        require_once $admin_dir . 'update.php';
    }

    // Metaboxes
    $metabox_dir = get_template_directory() . '/admin/metabox/';
    foreach (['mthan-page-metabox.php'] as $metabox) {
        if (file_exists($metabox_dir . $metabox)) {
            require_once $metabox_dir . $metabox;
        }
    }
}