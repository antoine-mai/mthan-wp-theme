<?php defined('ABSPATH') || exit;
/**
 * Returns list of sections that have style variants.
 * Key = base section slug, value = array of file slugs (index = style number - 1).
 */
function mthan_get_section_style_map()
{
    /**
     * Key = base section slug
     * Value = array of internal identifiers or separate file slugs.
     * If all values match the key, it's considered internal switching.
     */
    return array(
        'cta'             => array('cta', 'cta'),
        'contact'         => array('contact', 'contact', 'contact'),
        'facts'           => array('facts', 'facts'),
        'projects'        => array('projects', 'projects'),
        'team'            => array('team', 'team'),
        'testimonials'    => array('testimonials', 'testimonials'),
        'why-us'          => array('why-us', 'why-us', 'why-us'),
        'process'         => array('process', 'process'),
    );
}

/**
 * Returns the static list of allowed section slugs.
 */
function mthan_get_registered_sections()
{
    return array(
        'banners',
        'about-1',
        'about-2',
        'about-3',
        'main-services',
        'why-us',
        'what-we-do',
        'projects',
        'facts',
        'testimonials',
        'team',
        'process',
        'cta',
        'contact',
        'blog',
        'sponsors',
        'appoint',
        'pricing',
        'faqs',
        'areas',
        'awards',
        'reviews',
        'map',
        'page-banner',
        'mvg-history',
        'product-details',
        'project-details',
        'project-outline',
        'project-feedback',
        'related-project',
        'coming-soon',
        'error',
        'cart',
        'checkout',
        'myaccount',
    );
}

/**
 * Returns slugs that are STYLE VARIANTS (hidden from the section dropdown).
 */
function mthan_get_section_variant_slugs()
{
    $variants = array();
    foreach (mthan_get_section_style_map() as $base => $styles) {
        foreach (array_slice($styles, 1) as $variant) {
            // Only consider it a variant to hide if it's a DIFFERENT file
            if ($variant !== $base) {
                $variants[] = $variant;
            }
        }
    }
    return $variants;
}

/**
 * Returns the available base sections for dropdowns (enabled in theme options).
 */
function mthan_get_available_base_sections()
{
    $theme_options = get_option('mthan_theme_options');
    $variant_slugs = mthan_get_section_variant_slugs();
    $registered    = mthan_get_registered_sections();
    $result        = array('' => '— Select Section —');

    foreach ($registered as $slug) {
        if (in_array($slug, $variant_slugs)) {
            continue;
        }
        $toggle_key = 'enable_section_' . str_replace('-', '_', $slug);
        if (isset($theme_options[$toggle_key]) && $theme_options[$toggle_key] === false) {
            continue;
        }
        $style_map   = mthan_get_section_style_map();
        $style_count = isset($style_map[$slug]) ? count($style_map[$slug]) : 1;
        $label       = ucwords(str_replace('-', ' ', $slug));
        if ($style_count > 1) {
            $label .= " ({$style_count} styles)";
        }
        $result[$slug] = $label;
    }
    return $result;
}

// ──────────────────────────────────────────────────────────────────
// Section Rendering
// ──────────────────────────────────────────────────────────────────

/**
 * Compiles a string of CSS properties (without the style attribute) from the section_background field.
 */
function mthan_get_section_bg_css($section_data)
{
    $styles = [];
    $slug = !empty($section_data['section_template']) ? $section_data['section_template'] : '';
    if (!$slug) return '';

    // Background - use helper to handle Instance -> Global fallback
    $bg = mthan_get_section_val($slug, $section_data, 'background', array());

    if (!empty($bg) && is_array($bg)) {
        if (!empty($bg['background-color'])) {
            $styles[] = 'background-color: ' . $bg['background-color'] . ';';
        }
        if (!empty($bg['background-image']['url'])) {
            $styles[] = 'background-image: url(\'' . esc_url($bg['background-image']['url']) . '\');';
            foreach (array('repeat', 'position', 'attachment', 'size') as $prop) {
                if (!empty($bg['background-' . $prop])) {
                    $styles[] = 'background-' . $prop . ': ' . $bg['background-' . $prop] . ';';
                }
            }
        }
    }

    // Padding - use helper to handle Instance -> Global fallback
    $p = mthan_get_section_val($slug, $section_data, 'padding', array());

    if (!empty($p) && is_array($p)) {
        $unit = !empty($p['unit']) ? $p['unit'] : 'px';
        if (isset($p['top']) && $p['top'] !== '') {
            $styles[] = 'padding-top: ' . $p['top'] . $unit . ';';
        }
        if (isset($p['bottom']) && $p['bottom'] !== '') {
            $styles[] = 'padding-bottom: ' . $p['bottom'] . $unit . ';';
        }
    }

    return implode(' ', $styles);
}

/**
 * Include / call a list of section items.
 * Prefers function-based dispatch: mthan_section_{slug}_html($section_data).
 * Falls back to legacy file include if the function is not defined.
 * Automatically injects background styles into the first <section> or <div> tag.
 */
function mthan_include_section_items($items)
{
    $sections_dir = get_template_directory() . '/incs/sections/';
    $style_map    = mthan_get_section_style_map();

    foreach ((array)$items as $item)
    {
        if (!is_array($item) || empty($item['section_template'])) {
            continue;
        }

        $base_slug = $item['section_template'];
        $style_num = !empty($item['section_style']) ? (int)$item['section_style'] : 1;

        if (isset($style_map[$base_slug])) {
            $style_files = $style_map[$base_slug];
            $actual_slug = $style_files[$style_num - 1] ?? $style_files[0];
        } else {
            $actual_slug = $base_slug;
        }

        $GLOBALS['_mthan_current_section'] = $item;

        $fn = 'mthan_section_' . str_replace('-', '_', $actual_slug) . '_html';
        
        ob_start();
        if (function_exists($fn)) {
            $fn($item);
        } else {
            $file = $sections_dir . $actual_slug . '.php';
            if (file_exists($file)) {
                $section_data = $item;
                include $file;
            }
        }
        $content = ob_get_clean();

        // Auto-inject ID and background style into the first <section> or <div> tag
        $sec_id = !empty($item['section_id']) ? $item['section_id'] : '';
        $bg_css = mthan_get_section_bg_css($item);

        if ($sec_id) {
            if (preg_match('/id=["\']/', $content)) {
                // If it already has an ID, we might not want to overwrite it...
                // but usually the user setting should win or we should allow it.
                // Let's replace it if the user specified one.
                $content = preg_replace('/id=(["\'])(.*?)\1/i', 'id=$1' . esc_attr($sec_id) . '$1', $content, 1);
            } else {
                $content = preg_replace('/(<(?:section|div)[^>]*)/i', '$1 id="' . esc_attr($sec_id) . '"', $content, 1);
            }
        }

        if ($bg_css) {
            if (preg_match('/style=["\']/', $content)) {
                // Append to existing style attribute
                $content = preg_replace('/style=(["\'])(.*?)\1/i', 'style=$1$2 ' . $bg_css . '$1', $content, 1);
            } else {
                // Add new style attribute
                $content = preg_replace('/(<(?:section|div)[^>]*)/i', '$1 style="' . $bg_css . '"', $content, 1);
            }
        }

        echo $content;
    }
}

/**
 * Retrieve a section value with fallback: Instance -> Global -> Default.
 * @param string $slug The base slug (e.g. 'about')
 * @param array $instance_data Local section data
 * @param string $field Suffix of the field ID (e.g. 'subtitle')
 * @param mixed $default Hardcoded default
 */
function mthan_get_section_val($slug, $instance_data, $field, $default = '')
{
    $key = $slug . '_' . $field;
    $val = isset($instance_data[$key]) ? $instance_data[$key] : '';

    $is_empty = empty($val);

    // Deep check for empty arrays (Spacing, Background, Media)
    if (!$is_empty && is_array($val)) {
        if (isset($val['url']) && empty($val['url'])) {
            $is_empty = true;
        } elseif (isset($val['top']) && $val['top'] === '' && isset($val['bottom']) && $val['bottom'] === '') {
            $is_empty = true;
        } elseif (isset($val['background-color']) && empty($val['background-color']) && empty($val['background-image']['url'])) {
            $is_empty = true;
        }
    }

    if (!$is_empty) {
        return $val;
    }

    return $default;
}

/**
 * Helper to get image URL with fallback.
 */
function mthan_sec_img($slug, $instance_data, $field, $default_url = '')
{
    $val = mthan_get_section_val($slug, $instance_data, $field, $default_url);
    if (is_array($val) && !empty($val['url'])) {
        return $val['url'];
    }
    return (!empty($val) && !is_array($val)) ? $val : $default_url;
}

/**
 * Helper to get a permalink from a page/post ID or return the direct URL.
 */
function mthan_sec_link($slug, $instance_data, $field, $default_url = '#')
{
    $val = mthan_get_section_val($slug, $instance_data, $field, $default_url);
    if (is_numeric($val)) {
        return get_permalink($val);
    }
    return !empty($val) ? $val : $default_url;
}

/**
 * Helper to read a per-instance field value from the current section.
 * In templates: mthan_get_sec_val_legacy('subtitle', 'Default Text')
 */
function mthan_get_sec_val_legacy($field, $default = '')
{
    $sd   = isset($GLOBALS['_mthan_current_section']) ? $GLOBALS['_mthan_current_section'] : array();
    $slug = !empty($sd['section_template']) ? $sd['section_template'] : '';
    $key  = $slug . '_' . $field;
    return !empty($sd[$key]) ? $sd[$key] : $default;
}

/**
 * Returns a CSF select field configured for page/post selection.
 * Uses Chosen.js with AJAX for performance with large page lists.
 *
 * @param string $id    Field ID
 * @param string $title Field label
 * @param array  $args  Additional CSF field args to merge
 * @return array
 */
function mthan_page_select_field($id, $title, $args = array(), $multiple = false)
{
    return array_merge([
        'multiple' => $multiple,
        'type'     => 'select',
        'options'  => 'pages',
        'title'    => $title,
        'chosen'   => true,
        'ajax'     => true,
        'id'       => $id,
    ], $args);
}

// ──────────────────────────────────────────────────────────────────
// Global & Per-Page Section Renderers
// ──────────────────────────────────────────────────────────────────

/**
 * Render global sections from Theme Options > Layout Settings.
 */
function mthan_render_global_sections($position = 'before', $page_type = 'page')
{
    $theme_options = get_option('mthan_theme_options');
    $layouts_tabs  = !empty($theme_options['layouts_tabs']) ? $theme_options['layouts_tabs'] : array();
    
    // 0. Global Page Banner logic (only at the top of 'before' position)
    if ($position === 'before') {
        $render_banner = false;
        $banner_bg = '';
        $banner_title = get_the_title();

        if (is_singular()) {
            $post_meta = get_post_meta(get_the_ID(), MTHAN_PAGE_OPTIONS, true);
            $hide_local = !empty($post_meta['hide_page_banner']);
            
            // Check Global setting from Page Layout tab
            $global_enable = isset($layouts_tabs['global_page_banner_enable']) ? $layouts_tabs['global_page_banner_enable'] : true;
            
            if ($global_enable && !$hide_local) {
                $render_banner = true;
                // Priority: Local Meta > Global Theme Option > Default
                $banner_bg = !empty($post_meta['page_banner_bg']['url']) ? $post_meta['page_banner_bg']['url'] : '';
                if (!$banner_bg) {
                    $banner_bg = !empty($layouts_tabs['global_page_banner_bg']['url']) ? $layouts_tabs['global_page_banner_bg']['url'] : get_template_directory_uri() . '/assets/images/background/banner-image-1.jpg';
                }
                
                if (!empty($post_meta['page_banner_title'])) {
                    $banner_title = $post_meta['page_banner_title'];
                }
            }
        }

        if ($render_banner) {
            // Using the existing section HTML function if possible
            if (function_exists('mthan_section_page_banner_html')) {
                // The section helper looks for prefixed keys: slug_key
                mthan_section_page_banner_html([
                    'page-banner_image' => ['url' => $banner_bg],
                    'page-banner_title' => $banner_title
                ]);
            }
        }
    }

    // 1. Output Global Page Layout logic
    $global_base_key = 'page_layout_' . $position . '_content';
    $disable_global = false;
    
    if ($page_type !== 'page' && $page_type !== 'main') {
        $disable_global = !empty($layouts_tabs['disable_page_layout_' . $page_type]) ? $layouts_tabs['disable_page_layout_' . $page_type] : false;
    }

    // Per-page override: Hide all global sections
    if (is_singular('page')) {
        $page_meta = get_post_meta(get_the_ID(), MTHAN_PAGE_OPTIONS, true);
        if (!empty($page_meta['hide_global_sections'])) {
            return; // Completely stop rendering global sections for this page
        }
    }
    
    if (!$disable_global) {
        // Fallback checks 'main_layout_' for legacy data, but defaults to 'page_layout_'
        $legacy_base_key = 'main_layout_' . $position . '_content';
        $global_items = !empty($layouts_tabs[$global_base_key]) ? $layouts_tabs[$global_base_key] : (!empty($layouts_tabs[$legacy_base_key]) ? $layouts_tabs[$legacy_base_key] : array());
        mthan_include_section_items($global_items);
    }
    
    // 2. Output Specific Page Type (e.g., Blog or Service) layout logic
    if ($page_type !== 'page' && $page_type !== 'main') {
        $specific_key = $page_type . '_layout_' . $position . '_content';
        $specific_items = !empty($layouts_tabs[$specific_key]) ? $layouts_tabs[$specific_key] : array();
        mthan_include_section_items($specific_items);
    }
}

/**
 * Get the current layout type (main, blog, service)
 */
function mthan_get_layout_type()
{
    if (is_singular('post')) {
        return 'blog'; // Posts default to blog layout
    }

    if (is_page()) {
        $meta      = get_post_meta(get_the_ID(), 'mthan_page_options', true);
        $type      = !empty($meta['page_layout_type']) ? $meta['page_layout_type'] : 'page';
        if ($type === 'main') $type = 'page';
        return $type;
    }

    if (is_home() || is_archive() || is_search()) {
        return 'blog';
    }

    return 'page';
}

/**
 * Render per-page/post sections from the page/post metabox.
 */
function mthan_render_page_sections($position = 'before')
{
    if (!is_singular()) {
        return;
    }
    $meta_key  = is_page() ? 'mthan_page_options' : 'mthan_post_options';
    $post_meta = get_post_meta(get_the_ID(), $meta_key, true);

    // If it's a page and we have enabling switchers, check them
    if (is_page()) {
        $enable_key = 'enable_page_' . $position . '_content';
        if (isset($post_meta[$enable_key]) && !$post_meta[$enable_key]) {
            return;
        }
    }

    // Logic for determining which meta group to use
    // For posts, we use 'post_before/after_content'
    // For pages, we use 'page_before/after_content'
    $group_prefix = is_page() ? 'page' : 'post';
    $group_key    = $group_prefix . '_' . $position . '_content';

    $items = !empty($post_meta[$group_key]) 
        && is_array($post_meta[$group_key])
        ? $post_meta[$group_key]
        : array();
    mthan_include_section_items($items);
}

/**
 * Returns a standardized first field for groups/repeaters (Name/Title).
 *
 * @return array
 */
function mthan_name_field()
{
    return [
        'title' => 'Name / Title',
        'id'    => 'name',
        'type'  => 'text'
    ];
}
/**
 * Returns a standardized icon upload field.
 *
 * @return array
 */
function mthan_icon_field($title = 'Icon Upload', $default = '')
{
    return [
        'type'    => 'upload',
        'title'   => $title,
        'id'      => 'icon',
        'preview' => false,
        'desc'    => 'Upload an image or paste a font class icon (e.g., "fas fa-leaf" or "flaticon-gardener").',
        'default' => $default
    ];
}

/**
 * Returns a standardized section title field.
 *
 * @return array
 */
function mthan_title_field($default = '')
{
    return [
        'title'   => 'Section Title',
        'default' => $default,
        'id'      => 'title',
        'type'    => 'text'
    ];
}

/**
 * Returns a standardized section subtitle field.
 *
 * @return array
 */
function mthan_subtitle_field($default = '')
{
    return [
        'title'   => 'Section Subtitle',
        'id'      => 'subtitle',
        'default' => $default,
        'type'    => 'text'
    ];
}

/**
 * Returns a standardized button text field.
 *
 * @return array
 */
function mthan_btn_text_field($default = 'Read More', $title = 'Button Text', $id = 'btn_text')
{
    return [
        'default' => $default,
        'title'   => $title,
        'type'    => 'text',
        'id'      => $id
    ];
}

/**
 * Returns a standardized button link field.
 *
 * @return array
 */
function mthan_btn_link_field($default = '', $title = 'Button Link', $id = 'btn_link')
{
    return mthan_page_select_field($id, $title, [
        'default' => $default,
    ]);
}
