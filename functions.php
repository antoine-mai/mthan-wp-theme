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
 * Render a list of sections.
 *
 * @param string $position  'before' or 'after'
 * @param string $page_type 'main' or 'blog'
 */
function mthan_render_sections($position = 'before', $page_type = 'main')
{
    $theme_options = get_option('mthan_theme_options');
    $layouts_tabs = !empty($theme_options['layouts_tabs']) ? $theme_options['layouts_tabs'] : array();

    // Determine global key
    $global_key = $page_type . '_layout_' . $position . '_content';
    $global_sections = !empty($layouts_tabs[$global_key]) ? $layouts_tabs[$global_key] : array();

    // Per-page/post override (sorter field)
    $post_sections = array();
    if (is_singular()) {
        $meta_key = is_page() ? 'mthan_page_options' : 'mthan_post_options';
        $post_meta = get_post_meta(get_the_ID(), $meta_key, true);
        $sorter_key = (is_page() ? 'page' : 'post') . '_' . $position . '_content';
        if (!empty($post_meta[$sorter_key]['enabled'])) {
            $post_sections = $post_meta[$sorter_key]['enabled'];
        }
    }

    // Use per-post list if set, otherwise fall back to global
    $sections_to_render = !empty($post_sections) ? $post_sections : (array)$global_sections;

    $sections_dir = get_template_directory() . '/sections/';
    foreach ($sections_to_render as $section_key => $section_label) {
        // Key can be a filename (from sorter) or an array entry (from group)
        $filename = is_array($section_label) && !empty($section_label['section_template'])
            ? $section_label['section_template']
            : (is_string($section_key) ? $section_key : $section_label);

        $file = $sections_dir . $filename . '.php';
        if (file_exists($file)) {
            include $file;
        }
    }
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
            // Only target selects inside group items that have a data-section-name input nearby
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