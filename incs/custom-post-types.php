<?php defined('ABSPATH') || exit;

/**
 * Register Custom Post Types for Mthan Theme.
 */
function mthan_register_custom_post_types() {
    

    // ── Mthan Service ──────────────────────────────────────────────────
    register_post_type('mthan_service', array(
        'labels'      => array(
            'name'                  => 'Dịch vụ',
            'singular_name'         => 'Dịch vụ',
            'menu_name'             => 'Dịch vụ',
            'name_admin_bar'        => 'Dịch vụ',
            'add_new'               => 'Thêm dịch vụ',
            'add_new_item'          => 'Thêm dịch vụ mới',
            'edit_item'             => 'Chỉnh sửa dịch vụ',
            'new_item'              => 'Dịch vụ mới',
            'all_items'             => 'Tất cả dịch vụ',
            'view_item'             => 'Xem dịch vụ',
            'search_items'          => 'Tìm kiếm dịch vụ',
            'not_found'             => 'Không tìm thấy dịch vụ nào',
        ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-hammer',
        'show_in_menu' => 'mthan-admin',
        'supports'    => array('title', 'thumbnail', 'excerpt'),
        'rewrite'     => array('slug' => 'dich-vu', 'with_front' => false),
    ));

    // ── Mthan Project ──────────────────────────────────────────────────
    register_post_type('mthan_project', array(
        'labels'      => array(
            'name'                  => 'Dự án',
            'singular_name'         => 'Dự án',
            'menu_name'             => 'Dự án',
            'name_admin_bar'        => 'Dự án',
            'add_new'               => 'Thêm dự án',
            'add_new_item'          => 'Thêm dự án mới',
            'edit_item'             => 'Chỉnh sửa dự án',
            'new_item'              => 'Dự án mới',
            'all_items'             => 'Tất cả dự án',
            'view_item'             => 'Xem dự án',
            'search_items'          => 'Tìm kiếm dự án',
            'not_found'             => 'Không tìm thấy dự án nào',
        ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-portfolio',
        'show_in_menu' => 'mthan-admin',
        'supports'    => array('title', 'thumbnail', 'excerpt'),
        'rewrite'     => array('slug' => 'du-an', 'with_front' => false),
    ));
}
add_action('init', 'mthan_register_custom_post_types');
