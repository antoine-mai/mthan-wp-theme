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

    $key = '';
    
    // 1. Determine context (Page vs Post)
    if (is_page()) {
        $key = ($position === 'before') ? 'page_before_content' : 'page_after_content';
    } elseif (is_singular('service')) {
        $key = ($position === 'before') ? 'service_before_content' : 'service_after_content';
    } elseif (is_singular('post') || is_home() || is_archive() || is_search()) {
        // "Post Layout" applies to blog index, archives, search, and single posts.
        $key = ($position === 'before') ? 'post_before_content' : 'post_after_content';
    }

    // 2. Validate key and data
    if (empty($key) || empty($options[$key]) || !is_array($options[$key])) {
        return;
    }

    // 3. Render each selected section
    foreach ($options[$key] as $item) {
        $slug = !empty($item['section']) ? $item['section'] : '';
        
        if (empty($slug)) {
            continue;
        }

        $func = 'mthan_section_' . $slug . '_html';
        if (function_exists($func)) {
             // Pass empty array so it uses the defaults from the section options file
             $func(array());
        }
    }
}


