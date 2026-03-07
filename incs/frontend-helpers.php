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
 * Stub for global section rendering.
 */
function mthan_render_global_sections($position = 'before', $layout = 'main') {
    return;
}

/**
 * Stub for page-specific section rendering.
 */
function mthan_render_page_sections($position = 'before') {
    return;
}
