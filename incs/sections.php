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
        'About1'  => 'About 1',
        'About2'  => 'About 2',
        'Facts1'  => 'Facts 1',
        'Facts2'  => 'Facts 2',
        'WhatWeDo1' => 'What We Do 1',
        'WhatWeDo2' => 'What We Do 2',
        'Projects1' => 'Projects 1',
        'Projects2' => 'Projects 2',
        'WhyUs1'       => 'Why Us 1',
        'WhyUs2'       => 'Why Us 2',
        'HowItWorks1'  => 'How It Works 1',
        'HowItWorks2'  => 'How It Works 2',
        'Team'         => 'Team',
        'Testimonials1' => 'Testimonials 1',
        'Testimonials2' => 'Testimonials 2',
        'Blog'          => 'Blog',
        'Pricing'       => 'Pricing',
        'CTA1'          => 'Call To Action 1',
        'CTA2'          => 'Call To Action 2',
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
    
    if (isset($data[$field_id]) && $data[$field_id] !== '' && $data[$field_id] !== array()) {
        return $data[$field_id];
    }

    // Otherwise, try to find the default from the section registration
    static $sec_defaults = array();
    if (!isset($sec_defaults[$slug])) {
        $sec_defaults[$slug] = array();
        $func = 'mthan_section_' . $slug . '_options';
        if (function_exists($func)) {
            $fields = $func();
            foreach ($fields as $field) {
                if (isset($field['id']) && isset($field['default'])) {
                    $sec_defaults[$slug][$field['id']] = $field['default'];
                }
            }
        }
    }

    if (isset($sec_defaults[$slug][$key])) {
        return $sec_defaults[$slug][$key];
    }

    return $default;
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
    // If it's a CSF link field (array)
    if (is_array($link)) return !empty($link['url']) ? $link['url'] : '#';
    // If it's a numerical ID
    if (is_numeric($link)) return get_permalink((int) $link);
    return $link;
}

/**
 * Intelligent Icon Renderer.
 * Supports both Image URLs and Icon Classes.
 */
function mthan_get_icon_html($val, $attr = '') {
    if (empty($val)) return '';
    
    $url = mthan_sec_img($val);
    
    // If it contains a slash or common image extension, treat as image
    if (strpos($url, '/') !== false || preg_match('/\.(jpg|jpeg|png|gif|svg|webp)/i', $url)) {
        return '<img src="' . esc_url($url) . '" alt="icon" ' . $attr . '>';
    }
    
    // Otherwise it's likely a flaticon/fa class
    return '<span class="' . esc_attr($val) . '" ' . $attr . '></span>';
}

/**
 * Render all sections for a post.
 */
function mthan_render_page_sections($position = 'before') {
    $meta = get_post_meta(get_the_ID(), MTHAN_PAGE_OPTIONS, true);
    $key  = ($position === 'after') ? 'page_after_sections' : 'page_before_sections';
    $sections = isset($meta[$key]) ? $meta[$key] : array();

    if (!is_array($sections)) {
        return;
    }

    foreach ($sections as $section) {
        $template = isset($section['template']) ? $section['template'] : '';
        if (empty($template)) {
            continue;
        }

        $func = 'mthan_section_' . $template . '_html';
        if (function_exists($func)) {
            $func($section);
        }
    }
}
