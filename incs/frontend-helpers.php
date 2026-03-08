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
    
    $key = '';
    
    // 1. Determine context (Page vs Post vs Service etc)
    if (is_page()) {
        $key = ($position === 'before') ? 'page_before_content' : 'page_after_content';
    } elseif (is_singular('mthan_service')) {
        $key = ($position === 'before') ? 'service_before_content' : 'service_after_content';
    } elseif (is_singular('mthan_project')) {
        $key = ($position === 'before') ? 'project_before_content' : 'project_after_content';
    } elseif (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout())) {
        $key = ($position === 'before') ? 'shop_before_content' : 'shop_after_content';
    } elseif (is_singular('post') || is_home() || is_archive() || is_search()) {
        $key = ($position === 'before') ? 'post_before_content' : 'post_after_content';
    }

    // 2. Validate key and data in nested layouts array
    if (empty($key) || empty($layouts[$key]) || !is_array($layouts[$key])) {
        return;
    }

    // 3. Render each selected section
    foreach ($layouts[$key] as $item) {
        // Support both 'template' (new) and 'section' (old)
        $slug = !empty($item['template']) ? $item['template'] : (!empty($item['section']) ? $item['section'] : '');
        
        if (empty($slug)) {
            continue;
        }

        $func = 'mthan_section_' . $slug . '_html';
        if (function_exists($func)) {
             // Pass the item data to the renderer
             $func($item);
        }
    }
}


