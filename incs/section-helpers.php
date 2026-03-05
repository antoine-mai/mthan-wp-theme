<?php defined('ABSPATH') || exit;

// ──────────────────────────────────────────────────────────────────
// Section Style Map & Variant Helpers
// ──────────────────────────────────────────────────────────────────

/**
 * Returns list of sections that have style variants.
 * Key = base section slug, value = array of file slugs (index = style number - 1).
 */
function mthan_get_section_style_map()
{
    return array(
        'about'           => array('about', 'about_html_2', 'about_html_3'),
        'call-to-action'  => array('call-to-action', 'call-to-two'),
        'contact-section' => array('contact-section', 'contact-two', 'contact-three'),
        'facts-section'   => array('facts-section', 'facts-two'),
        'projects-section'=> array('projects-section', 'projects-two'),
        'team-section'    => array('team-section', 'team-two'),
        'testimonials-one'=> array('testimonials-one', 'testimonials-two'),
        'why-us'          => array('why-us', 'why-us-two', 'why-us-three'),
        'work-process'    => array('work-process', 'work-process-two'),
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
            $variants[] = $variant;
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
    $sections_path = get_template_directory() . '/sections/';
    $variant_slugs = mthan_get_section_variant_slugs();
    $result = array('' => '— Select Section —');

    if (is_dir($sections_path)) {
        foreach (glob($sections_path . '*.php') as $file) {
            $slug = basename($file, '.php');
            if (in_array($slug, $variant_slugs)) { continue; }
            $toggle_key = 'enable_section_' . str_replace('-', '_', $slug);
            if (isset($theme_options[$toggle_key]) && $theme_options[$toggle_key] === false) { continue; }
            $style_map   = mthan_get_section_style_map();
            $style_count = isset($style_map[$slug]) ? count($style_map[$slug]) : 1;
            $label       = ucwords(str_replace('-', ' ', $slug));
            if ($style_count > 1) { $label .= " ({$style_count} styles)"; }
            $result[$slug] = $label;
        }
    }
    return $result;
}

// ──────────────────────────────────────────────────────────────────
// Section Rendering
// ──────────────────────────────────────────────────────────────────

/**
 * Include / call a list of section items.
 * Prefers function-based dispatch: mthan_section_{slug}_html($section_data).
 * Falls back to legacy file include if the function is not defined.
 */
function mthan_include_section_items($items)
{
    $sections_dir = get_template_directory() . '/sections/';
    $style_map    = mthan_get_section_style_map();

    foreach ((array)$items as $item) {
        if (!is_array($item) || empty($item['section_template'])) { continue; }

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
        if (function_exists($fn)) {
            $fn($item);
        } else {
            $file = $sections_dir . $actual_slug . '.php';
            if (file_exists($file)) {
                $section_data = $item;
                include $file;
            }
        }
    }
}

/**
 * Read a per-instance field value from the current section.
 * In templates: mthan_sec_val('subtitle', 'Default Text')
 */
function mthan_sec_val($field, $default = '')
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
    return array_merge(array(
        'id'       => $id,
        'type'     => 'select',
        'title'    => $title,
        'options'  => 'pages',
        'multiple'=> $multiple,
        'chosen'   => true,
        'ajax'     => true,
    ), $args);
}

// ──────────────────────────────────────────────────────────────────
// Global & Per-Page Section Renderers
// ──────────────────────────────────────────────────────────────────

/**
 * Render global sections from Theme Options > Layout Settings.
 */
function mthan_render_global_sections($position = 'before', $page_type = 'main')
{
    $theme_options = get_option('mthan_theme_options');
    $layouts_tabs  = !empty($theme_options['layouts_tabs']) ? $theme_options['layouts_tabs'] : array();
    $global_key    = $page_type . '_layout_' . $position . '_content';
    $items         = !empty($layouts_tabs[$global_key]) ? $layouts_tabs[$global_key] : array();
    mthan_include_section_items($items);
}

/**
 * Render per-page/post sections from the page/post metabox.
 */
function mthan_render_page_sections($position = 'before')
{
    if (!is_singular()) { return; }
    $meta_key  = is_page() ? 'mthan_page_options' : 'mthan_post_options';
    $post_meta = get_post_meta(get_the_ID(), $meta_key, true);

    // If it's a page and we have enabling switchers, check them
    if (is_page()) {
        $enable_key = 'enable_page_' . $position . '_content';
        if (isset($post_meta[$enable_key]) && !$post_meta[$enable_key]) {
            return;
        }
    }

    $group_key = (is_page() ? 'page' : 'post') . '_' . $position . '_content';
    $items     = !empty($post_meta[$group_key]) && is_array($post_meta[$group_key])
        ? $post_meta[$group_key]
        : array();
    mthan_include_section_items($items);
}
