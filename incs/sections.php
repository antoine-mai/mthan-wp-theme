<?php defined('ABSPATH') || exit;

/**
 * Register available sections.
 * 
 * @return array Slugs and labels.
 */
function mthan_get_sections() {
    return [
        'Banners' => 'Banners',
        'PageBanner' => 'Page Banner',
        'Areas'   => 'Areas',
        'About1'  => 'About 1',
        'About2'  => 'About 2',
        'About3'  => 'About 3',
        'History' => 'History',
        'Services' => 'Services',
        'Facts1'  => 'Facts 1',
        'Facts2'  => 'Facts 2',
        'WhatWeDo1' => 'What We Do 1',
        'WhatWeDo2' => 'What We Do 2',
        'Projects1' => 'Projects 1',
        'Projects2' => 'Projects 2',
        'GalleryGrid3' => 'Gallery Grid 3',
        'GalleryGrid4' => 'Gallery Grid 4',
        'WhyUs1'       => 'Why Us 1',
        'WhyUs2'       => 'Why Us 2',
        'WhyUs3'       => 'Why Us 3',
        'HowItWorks1'  => 'How It Works 1',
        'HowItWorks2'  => 'How It Works 2',
        'Team1'         => 'Team 1',
        'Team2'         => 'Team 2',
        'Testimonials1' => 'Testimonials 1',
        'Testimonials2' => 'Testimonials 2',
        'Blog'          => 'Blog',
        'Pricing'       => 'Pricing',
        'CallToAction1' => 'Call To Action 1',
        'CallToAction2' => 'Call To Action 2',
        'Contact1'      => 'Contact 1',
        'Contact2'      => 'Contact 2',
        'Contact3'      => 'Contact 3',
        'ContentEditor' => 'Content Editor',
        // 'Map'           => 'Map',
        'Awards'        => 'Awards',
        'Sponsors'      => 'Sponsors',
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

            // Inject common styling fields
            $common_fields = mthan_get_common_section_fields();
            foreach ($common_fields as $cf) {
                // Add dependency to each field
                $cf['dependency'] = array('template', '==', $slug);
                
                // Prefix ID to avoid collisions
                if (isset($cf['id'])) {
                    $cf['id'] = $slug . '_' . $cf['id'];
                }
                
                $all_fields[] = $cf;
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
 * Common fields for all sections (Spacing, Background).
 */
function mthan_get_common_section_fields() {
    return array(
        array(
            'type'    => 'subheading',
            'content' => 'Section Styling & Background',
        ),
        array(
            'id'    => 'section_bg_color',
            'type'  => 'color',
            'title' => 'Background Color',
        ),
        array(
            'id'    => 'section_bg_image',
            'type'  => 'upload',
            'title' => 'Background Image',
        ),
        array(
            'id'    => 'section_padding',
            'type'  => 'spacing',
            'title' => 'Padding',
            'default' => array(
                'unit' => 'px',
            ),
        ),
        array(
            'id'    => 'section_margin',
            'type'  => 'spacing',
            'title' => 'Margin',
            'default' => array(
                'unit' => 'px',
            ),
        ),
        array(
            'id'    => 'section_extra_class',
            'type'  => 'text',
            'title' => 'Extra CSS Class',
        ),
    );
}

/**
 * Generate style and classes for a section based on common fields.
 */
function mthan_section_styles($slug, $section_data) {
    $bg_color    = mthan_get_section_val($slug, $section_data, 'section_bg_color');
    $bg_image    = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'section_bg_image'));
    $padding     = mthan_get_section_val($slug, $section_data, 'section_padding');
    $margin      = mthan_get_section_val($slug, $section_data, 'section_margin');
    
    $styles = array();
    
    if ($bg_color) {
        $styles[] = "background-color: " . $bg_color . ";";
    }
    
    if ($bg_image) {
        $styles[] = "background-image: url(" . esc_url($bg_image) . ");";
        $styles[] = "background-repeat: no-repeat;";
        $styles[] = "background-size: cover;";
        $styles[] = "background-position: center;";
    }
    
    if ($padding && is_array($padding)) {
        $unit = !empty($padding['unit']) ? $padding['unit'] : 'px';
        if (isset($padding['top']) && $padding['top'] !== '')    $styles[] = "padding-top: " . $padding['top'] . $unit . ";";
        if (isset($padding['bottom']) && $padding['bottom'] !== '') $styles[] = "padding-bottom: " . $padding['bottom'] . $unit . ";";
        if (isset($padding['left']) && $padding['left'] !== '')   $styles[] = "padding-left: " . $padding['left'] . $unit . ";";
        if (isset($padding['right']) && $padding['right'] !== '')  $styles[] = "padding-right: " . $padding['right'] . $unit . ";";
    }
    
    if ($margin && is_array($margin)) {
        $unit = !empty($margin['unit']) ? $margin['unit'] : 'px';
        if (isset($margin['top']) && $margin['top'] !== '')    $styles[] = "margin-top: " . $margin['top'] . $unit . ";";
        if (isset($margin['bottom']) && $margin['bottom'] !== '') $styles[] = "margin-bottom: " . $margin['bottom'] . $unit . ";";
        if (isset($margin['left']) && $margin['left'] !== '')   $styles[] = "margin-left: " . $margin['left'] . $unit . ";";
        if (isset($margin['right']) && $margin['right'] !== '')  $styles[] = "margin-right: " . $margin['right'] . $unit . ";";
    }
    
    $style_attr = !empty($styles) ? ' style="' . implode(' ', $styles) . '"' : '';
    $extra_class = mthan_get_section_val($slug, $section_data, 'section_extra_class');
    
    return array(
        'style' => $style_attr,
        'class' => $extra_class
    );
}

/**
 * Render all sections for a post (Page, Service, Project).
 */
function mthan_render_post_sections($position = 'before') {
    $post_type = get_post_type();
    $meta_key  = '';
    $data_key  = '';

    switch ($post_type) {
        case 'page':
            $meta_key = MTHAN_PAGE_OPTIONS;
            $data_key = ($position === 'after') ? 'page_after_sections' : 'page_before_sections';
            break;
        case 'post':
            $meta_key = MTHAN_PAGE_OPTIONS;
            $data_key = ($position === 'after') ? 'page_after_sections' : 'page_before_sections';
            break;
        case 'mthan_service':
            $meta_key = MTHAN_SERVICE_OPTIONS;
            $data_key = 'service_sections'; // Consolidated to just 1 group
            break;
        case 'mthan_project':
            $meta_key = MTHAN_PROJECT_OPTIONS;
            $data_key = 'project_sections'; // Consolidated to just 1 group
            break;
    }

    if (empty($meta_key) || empty($data_key)) {
        return;
    }

    // For service/project, they only have 1 group. If position is 'after', we might want to skip or handle differently.
    // However, usually these consolidated sections are treated as "the" content.
    // If user says "only 1 section", they probably mean they will manage the whole layout there.
    
    // For Service/Project, let's only render if position is 'before' (or just once).
    if (($post_type === 'mthan_service' || $post_type === 'mthan_project') && $position === 'after') {
        return;
    }

    $meta = get_post_meta(get_the_ID(), $meta_key, true);
    $sections = isset($meta[$data_key]) ? $meta[$data_key] : array();

    if (!is_array($sections)) {
        return;
    }

    foreach ($sections as $section) {
        $template = !empty($section['template']) ? $section['template'] : (!empty($section['section']) ? $section['section'] : '');
        if (empty($template)) {
            continue;
        }

        $func = 'mthan_section_' . $template . '_html';
        if (function_exists($func)) {
            $func($section);
        }
    }
}

/**
 * Legacy wrapper for page sections.
 */
function mthan_render_page_sections($position = 'before') {
    mthan_render_post_sections($position);
}
