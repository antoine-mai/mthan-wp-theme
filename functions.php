<?php defined('ABSPATH') || exit;
/**
 * 
 **/
define('MTHAN_THEME_DIR', get_template_directory());
define('MTHAN_THEME_VERSION', '1.0.0');
// Theme setup
if (!function_exists('mthan_setup')) {
    function mthan_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        load_theme_textdomain('mthan-wp', get_template_directory() . '/languages');
        register_nav_menus(array(
            'primary-menu' => __('Primary Menu', 'mthan-wp'),
        ));
    }
}
add_action('after_setup_theme', 'mthan_setup');

// Add 'dropdown' class to nav menu items that have children.
// The theme JS (custom-script.js) targets li.dropdown to append the angle-right icon.
add_filter('nav_menu_css_class', function ($classes, $item) {
    if (in_array('menu-item-has-children', $classes, true)) {
        $classes[] = 'dropdown';
    }
    return $classes;
}, 10, 2);

// Enqueue styles and scripts
function mthan_enqueue_assets()
{
    // Vendor CSS
    wp_enqueue_style('mthan-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css', array(), '1.0');
    wp_enqueue_style('mthan-flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), '1.0');
    wp_enqueue_style('mthan-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '1.0');
    wp_enqueue_style('mthan-style-main', get_template_directory_uri() . '/assets/css/style.css', array('mthan-bootstrap', 'mthan-fontawesome', 'mthan-flaticon'), '1.0');
    wp_enqueue_style('mthan-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('mthan-style-main'), '1.0');

    // Theme CSS
    wp_enqueue_style('mthan-style', get_stylesheet_uri(), array('mthan-style-main'), wp_get_theme()->get('Version'));

    // Vendor Scripts
    wp_enqueue_script('mthan-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery', 'mthan-popper'), '1.0', true);
    wp_enqueue_script('mthan-jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-jquery-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-owl', get_template_directory_uri() . '/assets/js/owl.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-appear', get_template_directory_uri() . '/assets/js/appear.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-custom-script', get_template_directory_uri() . '/assets/js/custom-script.js', array('jquery', 'mthan-bootstrap'), '1.0', true);

    // Theme Script
    wp_enqueue_script('mthan-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'mthan-custom-script'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mthan_enqueue_assets');

// Include Codestar Framework
if (file_exists(get_template_directory() . '/incs/codestar/codestar-framework.php')) {
    require_once get_template_directory() . '/incs/codestar/codestar-framework.php';
}

// Include Theme Options
if (file_exists(get_template_directory() . '/incs/theme-options.php')) {
    require_once get_template_directory() . '/incs/theme-options.php';
}

/**
 * Returns list of sections that have style variants.
 * Key = base section slug (used in dropdown), value = array of file slugs (index = style number - 1).
 */
function mthan_get_section_style_map()
{
    return array(
        'about-section' => array('about-section', 'about-two', 'about-three'),
        'call-to-action' => array('call-to-action', 'call-to-two'),
        'contact-section' => array('contact-section', 'contact-two', 'contact-three'),
        'facts-section' => array('facts-section', 'facts-two'),
        'projects-section' => array('projects-section', 'projects-two'),
        'team-section' => array('team-section', 'team-two'),
        'testimonials-one' => array('testimonials-one', 'testimonials-two'),
        'why-us' => array('why-us', 'why-us-two', 'why-us-three'),
        'work-process' => array('work-process', 'work-process-two'),
    );
}

/**
 * Returns the flat list of slugs that are STYLE VARIANTS (not base sections).
 * These are hidden from the section dropdown.
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
 * Returns the $available_sections array for dropdowns (base sections only, toggled on in settings).
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
            // Skip style variants — they're accessible via the Style selector
            if (in_array($slug, $variant_slugs)) {
                continue;
            }
            // Check enabled toggle
            $toggle_key = 'enable_section_' . str_replace('-', '_', $slug);
            if (isset($theme_options[$toggle_key]) && $theme_options[$toggle_key] === false) {
                continue;
            }
            // Build label
            $style_map = mthan_get_section_style_map();
            $style_count = isset($style_map[$slug]) ? count($style_map[$slug]) : 1;
            $label = ucwords(str_replace('-', ' ', $slug));
            if ($style_count > 1) {
                $label .= " ({$style_count} styles)";
            }
            $result[$slug] = $label;
        }
    }
    return $result;
}

/**
 * Helper: include a list of section items.
 * Each template has access to:
 *   - $section_data — the raw item array
 *   - mthan_sec_val($field, $default) — convenient reader for per-instance options
 * Resolves style variants: base slug + style number → correct file.
 */
function mthan_include_section_items($items)
{
    $sections_dir = get_template_directory() . '/sections/';
    $style_map    = mthan_get_section_style_map();

    foreach ((array)$items as $item) {
        if (!is_array($item) || empty($item['section_template'])) {
            continue;
        }

        $base_slug = $item['section_template'];
        $style_num = !empty($item['section_style']) ? (int)$item['section_style'] : 1;

        // Resolve to actual template file using style map
        if (isset($style_map[$base_slug])) {
            $style_files = $style_map[$base_slug];
            $actual_slug = $style_files[$style_num - 1] ?? $style_files[0];
        } else {
            $actual_slug = $base_slug;
        }

        $file = $sections_dir . $actual_slug . '.php';
        if (file_exists($file)) {
            $section_data = $item;
            $GLOBALS['_mthan_current_section'] = $item; // for mthan_sec_val()
            include $file;
        }
    }
}

/**
 * Read a per-instance field value from the current section.
 * In templates: mthan_sec_val('subtitle', 'Default Text')
 *
 * @param string $field   Field suffix, e.g. 'subtitle', 'title', 'text'
 * @param string $default Fallback if field is empty
 * @return string
 */
function mthan_sec_val($field, $default = '')
{
    $sd = isset($GLOBALS['_mthan_current_section']) ? $GLOBALS['_mthan_current_section'] : array();
    $slug = !empty($sd['section_template']) ? $sd['section_template'] : '';
    $key = $slug . '_' . $field;
    return !empty($sd[$key]) ? $sd[$key] : $default;
}

/**
 * Render global sections from Theme Options > Layout Settings.
 *
 * @param string $position  'before' or 'after'
 * @param string $page_type 'main' or 'blog'
 */
function mthan_render_global_sections($position = 'before', $page_type = 'main')
{
    $theme_options = get_option('mthan_theme_options');
    $layouts_tabs = !empty($theme_options['layouts_tabs']) ? $theme_options['layouts_tabs'] : array();
    $global_key = $page_type . '_layout_' . $position . '_content';
    $items = !empty($layouts_tabs[$global_key]) ? $layouts_tabs[$global_key] : array();
    mthan_include_section_items($items);
}

/**
 * Render per-page/post sections from the page/post metabox.
 *
 * @param string $position 'before' or 'after'
 */
function mthan_render_page_sections($position = 'before')
{
    if (!is_singular()) {
        return;
    }
    $meta_key = is_page() ? 'mthan_page_options' : 'mthan_post_options';
    $post_meta = get_post_meta(get_the_ID(), $meta_key, true);
    $group_key = (is_page() ? 'page' : 'post') . '_' . $position . '_content';
    $items = !empty($post_meta[$group_key]) && is_array($post_meta[$group_key])
        ? $post_meta[$group_key]
        : array();
    mthan_include_section_items($items);
}

// Admin JS: auto-fill section Name field from select label
function mthan_admin_section_autofill_js()
{
?>
<script>
(function ($) {
    function syncSectionName($select) {
        var label = $select.find('option:selected').text().trim();
        var $group = $select.closest('.csf-field-group-item, .csf-group-item');
        var $nameField = $group.find('input[data-section-name]');
        if ($nameField.length && label) {
            $nameField.val(label).trigger('input').trigger('change');
        }
    }
    // On change
    $(document).on('change', 'select', function () {
        var $select = $(this);
        var $group = $select.closest('.csf-field-group-item, .csf-group-item');
        if ($group.length && $group.find('input[data-section-name]').length) {
            syncSectionName($select);
        }
    });
    // On cloning (when new group item is added)
    $(document).on('csf:group-added csf:repeater-added', function (e, $item) {
        $item.find('select').each(function () {
            var $s = $(this);
            var $g = $s.closest('.csf-field-group-item, .csf-group-item');
            if ($g.length && $g.find('input[data-section-name]').length) {
                syncSectionName($s);
            }
        });
    });
})(jQuery);
</script>
<?php
}
add_action('admin_footer', 'mthan_admin_section_autofill_js');