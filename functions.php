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
 * Helper: include a list of section items.
 * Each template has access to $section_data (the item's saved options).
 */
function mthan_include_section_items($items)
{
    $sections_dir = get_template_directory() . '/sections/';
    foreach ((array)$items as $item) {
        if (!is_array($item) || empty($item['section_template'])) {
            continue;
        }
        $file = $sections_dir . $item['section_template'] . '.php';
        if (file_exists($file)) {
            $section_data = $item; // Available as $section_data inside the template
            include $file;
        }
    }
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
     ( fu nct ion  ($ ) {
        function syncSectionName($select) {
            var label = $select.find('option:selected').text().trim();
            var $group = $select.closest('.csf-field-group-item, .csf-group-item');
            var $nameField = $group.find('input[data-section-name]');
            if ($nameField.length && label) {
                $nameField.val(label).trigger('input').trigger('change');
            }
        }
        // On change
        $(document).on('change', ' se lect' ,  functi on  () {
            var $select = $(this);
            // Only target selects inside group items that have a data-section-name input nearby
            var $group = $select.closest('.csf-field-group-item, .csf-group-item');
            if ($group.length && $group.find('input[data-section-name]').length) {
                syncSectionName($select);
            }
        });
        // On cloning (when new group item is added)
        $(document).on('csf:group-added csf:re peater-ad  ded', func  tion (e, $ item) {
            $item .f ind('sele ct ').each(fu nc tion () {
                var $s = $(this);
                var $g = $s.closest('.csf-field-group-item, .csf-group-item');
                if ($g.length && $g.find('input[data-section-name]').length) {
                    syncSectionName($s);
                }
         );
      ;
    })(jy);
</script>
<?php
}
add_action('admin_footer', 'mthan_admin_section_autofill_js');