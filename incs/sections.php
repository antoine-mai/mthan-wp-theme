<?php defined('ABSPATH') || exit;

/**
 * Register available sections.
 * 
 * @return array Slugs and labels.
 */
function mthan_get_sections() {
    return [
        'Banners' => 'Banners',
        'Areas'   => 'Areas',
        // Add more sections here...
    ];
}

/**
 * Collect all registered section fields with dependencies.
 */
function mthan_get_section_fields() {
    $sections = mthan_get_sections();
    $all_fields = array();

    foreach ($sections as $slug => $label) {
        $func = 'mthan_section_' . $slug . '_options';
        if (function_exists($func)) {
            $fields = $func();
            foreach ($fields as $field) {
                // Add dependency to each field
                $field['dependency'] = array('template', '==', $slug);
                
                // Prefix ID to avoid collisions (e.g. Banners_slides)
                if (isset($field['id'])) {
                    $field['id'] = $slug . '_' . $field['id'];
                }
                
                $all_fields[] = $field;
            }
        }
    }

    return $all_fields;
}

/**
 * Get a value for a specific section field.
 */
function mthan_get_section_val($slug, $data, $key, $default = '') {
    $field_id = $slug . '_' . $key;
    return isset($data[$field_id]) ? $data[$field_id] : $default;
}

/**
 * Helper to get a section image URL.
 */
function mthan_sec_img($val, $default = '') {
    if (empty($val)) return $default;
    if (is_array($val)) return !empty($val['url']) ? $val['url'] : $default;
    return $val;
}

/**
 * Handle link values (ID or URL).
 */
function mthan_get_link($link) {
    if (empty($link)) return '#';
    if (is_numeric($link)) return get_permalink((int) $link);
    return $link;
}

/**
 * Render all sections for a post.
 */
function mthan_render_page_sections($position = 'before') {
    $meta = get_post_meta(get_the_ID(), MTHAN_PAGE_OPTIONS, true);
    $sections = isset($meta['page_sections']) ? $meta['page_sections'] : array();

    if (!is_array($sections)) {
        return;
    }

    foreach ($sections as $section) {
        $template = isset($section['template']) ? $section['template'] : '';
        $sec_pos  = isset($section['position']) ? $section['position'] : 'before';

        if (empty($template) || $sec_pos !== $position) {
            continue;
        }

        $func = 'mthan_section_' . $template . '_html';
        if (function_exists($func)) {
            $func($section);
        }
    }
}
