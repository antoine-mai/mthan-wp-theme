<?php defined('ABSPATH') || exit;

/**
 * Register Custom Post Types for Mthan Theme.
 */
function mthan_register_custom_post_types() {
    

    // ── Mthan Service ──────────────────────────────────────────────────
    register_post_type('mthan_service', array(
        'labels'      => array(
            'name'          => 'Services',
            'singular_name' => 'Service',
        ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-hammer',
        'show_in_menu' => 'mthan-admin',
        'supports'    => array('title', 'thumbnail'),
    ));

    // ── Mthan Project ──────────────────────────────────────────────────
    register_post_type('mthan_project', array(
        'labels'      => array(
            'name'          => 'Projects',
            'singular_name' => 'Project',
        ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-portfolio',
        'show_in_menu' => 'mthan-admin',
        'supports'    => array('title', 'thumbnail'),
    ));
}
add_action('init', 'mthan_register_custom_post_types');
