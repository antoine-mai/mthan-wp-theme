<?php defined('ABSPATH') || exit;
/**
 * Frontend Helpers — Minimal stubs to prevent crashes.
 */

/**
 * Determin the layout type of the current page.
 */
function mthan_get_layout_type() {
    if (is_singular()) {
        $meta = get_post_meta(get_the_ID(), 'mthan_page_options', true);
        return !empty($meta['page_layout_type']) ? $meta['page_layout_type'] : 'main';
    }
    return 'main';
}

/**
 * Render global sections from Theme Options.
 */
function mthan_render_global_sections($position = 'before', $layout = 'main') {
    $options = get_option(MTHAN_THEME_OPTIONS);
    if (!is_array($options)) {
        return;
    }

    $layouts = !empty($options['layouts_tabs']) ? $options['layouts_tabs'] : [];
    
    // 1. Render Global Page Banner (Page Layout specific)
    if ($position === 'before' && is_page() && !is_front_page()) {
        $enable_banner = isset($layouts['global_page_banner_enable']) ? $layouts['global_page_banner_enable'] : true;
        if ($enable_banner && function_exists('mthan_section_PageBanner_html')) {
            $banner_data = [
                'PageBanner_bg_image' => !empty($layouts['global_page_banner_bg']) ? $layouts['global_page_banner_bg'] : ''
            ];
            mthan_section_PageBanner_html($banner_data);
        }
    }

    $key = '';
    
    // 2. Determine context (Page vs Post)
    if (is_page()) {
        $key = ($position === 'before') ? 'page_before_content' : 'page_after_content';
    } elseif (is_singular('mthan_service')) {
        $key = ($position === 'before') ? 'service_before_content' : 'service_after_content';
    } elseif (is_singular('mthan_project')) {
        $key = ($position === 'before') ? 'project_before_content' : 'project_after_content';
    } elseif (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout())) {
        $key = ($position === 'before') ? 'shop_before_content' : 'shop_after_content';
    } elseif (is_singular('post') || is_home() || is_archive() || is_search()) {
        // "Post Layout" applies to blog index, archives, search, and single posts.
        $key = ($position === 'before') ? 'post_before_content' : 'post_after_content';
    }

    // 3. Validate key and data in nested layouts array
    if (empty($key) || empty($layouts[$key]) || !is_array($layouts[$key])) {
        return;
    }

    // 4. Render each selected section
    foreach ($layouts[$key] as $item) {
        $slug = !empty($item['section']) ? $item['section'] : '';
        
        if (empty($slug)) {
            continue;
        }

        $func = 'mthan_section_' . $slug . '_html';
        if (function_exists($func)) {
             // Pass empty array so it uses the defaults from the section options file
             $func($item);
        }
    }
}


