<?php defined('ABSPATH') || exit;

/**
 * Handle front-page Logic:
 * If a default home page is set in MTHAN Theme Options (mthan_options_default_pages),
 * we load that page's content and sections.
 */

$options = get_option('mthan_options_default_pages');
$homepage_id = !empty($options['default_homepage']) ? (int)$options['default_homepage'] : 0;

if ($homepage_id) {
    // Modify global $post to point to the selected home page
    $post = get_post($homepage_id);
    if ($post) {
        setup_postdata($post);
        
        get_header();
        
        $layout_type = mthan_get_layout_type();
        
        // Sections
        mthan_render_global_sections('before', $layout_type);
        mthan_render_page_sections('before');
        
        // Main Content
        the_content();
        
        // Sections After
        mthan_render_page_sections('after');
        mthan_render_global_sections('after', $layout_type);
        
        get_footer();
        
        wp_reset_postdata();
        exit;
    }
}

// Fallback to default index.php behavior or regular page loading if no homepage_id is set
require get_template_directory() . '/index.php';
