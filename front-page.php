<?php defined('ABSPATH') || exit;

/**
 * Handle front-page Logic:
 * If a default home page is set in MTHAN Theme Options (mthan_options_default_pages),
 * we load that page's content and sections.
 */

$options = get_option(MTHAN_THEME_OPTIONS);
$homepage_sections = !empty($options['homepage_sections']) ? $options['homepage_sections'] : array();

if (!empty($homepage_sections)) {
    get_header();
    
    // Render global before sections
    mthan_render_global_sections('before', 'main');
    
    // Render the builder sections
    mthan_include_section_items($homepage_sections);
    
    // Render global after sections
    mthan_render_global_sections('after', 'main');
    
    get_footer();
    exit;
}

// Fallback to default index.php behavior or regular page loading
require get_template_directory() . '/index.php';
