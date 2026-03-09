<?php defined('ABSPATH') || exit;

// ──────────────────────────────────────────────────────────────────
// Theme Setup
// ──────────────────────────────────────────────────────────────────
if (!function_exists('mthan_setup')) {
    function mthan_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        load_theme_textdomain('mthan-wp', get_template_directory() . '/languages');
    }
}

/**
 * Register widget area.
 */
function mthan_widgets_init() {
    // Dynamic sidebars from Theme Options
    $options = get_option(MTHAN_THEME_OPTIONS);
    $dynamic_sidebars = !empty($options['dynamic_sidebars']) ? $options['dynamic_sidebars'] : array();

    if (!empty($dynamic_sidebars)) {
        foreach ($dynamic_sidebars as $sidebar) {
            if (empty($sidebar['id']) || empty($sidebar['name'])) {
                continue;
            }

            register_sidebar(array(
                'name'          => esc_html($sidebar['name']),
                'id'            => esc_attr($sidebar['id']),
                'description'   => isset($sidebar['description']) ? esc_html($sidebar['description']) : '',
                'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-inner"><div class="sidebar-title"><h4>',
                'after_title'   => '</h4></div>',
            ));
        }
    }
}
add_action('widgets_init', 'mthan_widgets_init');


// ──────────────────────────────────────────────────────────────────
// Enqueue Styles & Scripts
// ──────────────────────────────────────────────────────────────────
function mthan_enqueue_assets()
{
    // Vendor CSS
    wp_enqueue_style('mthan-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css', array(), '1.0');
    wp_enqueue_style('mthan-flaticon',    get_template_directory_uri() . '/assets/css/flaticon.css',        array(), '1.0');
    wp_enqueue_style('mthan-bootstrap',   get_template_directory_uri() . '/assets/css/bootstrap.css',       array(), '1.0');
    wp_enqueue_style('mthan-style-main',  get_template_directory_uri() . '/assets/css/style.css',           array('mthan-bootstrap', 'mthan-fontawesome', 'mthan-flaticon'), '1.0');
    wp_enqueue_style('mthan-responsive',  get_template_directory_uri() . '/assets/css/responsive.css',      array('mthan-style-main'), '1.0');

    // Theme CSS
    wp_enqueue_style('mthan-style', get_stylesheet_uri(), array('mthan-style-main'), wp_get_theme()->get('Version'));

    // Vendor Scripts
    wp_enqueue_script('mthan-popper',         get_template_directory_uri() . '/assets/js/popper.min.js',       array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-bootstrap',      get_template_directory_uri() . '/assets/js/bootstrap.min.js',    array('jquery', 'mthan-popper'), '1.0', true);
    wp_enqueue_script('mthan-jquery-ui',      get_template_directory_uri() . '/assets/js/jquery-ui.js',        array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-jquery-fancybox',get_template_directory_uri() . '/assets/js/jquery.fancybox.js',  array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-owl',            get_template_directory_uri() . '/assets/js/owl.js',              array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-scrollbar',      get_template_directory_uri() . '/assets/js/scrollbar.js',        array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-appear',         get_template_directory_uri() . '/assets/js/appear.js',           array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-wow',            get_template_directory_uri() . '/assets/js/wow.js',              array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-validate',       get_template_directory_uri() . '/assets/js/validate.js',         array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-isotope',        get_template_directory_uri() . '/assets/js/isotope.js',          array('jquery'), '1.0', true);
    wp_enqueue_script('mthan-custom-script',  get_template_directory_uri() . '/assets/js/custom-script.js',    array('jquery', 'mthan-bootstrap', 'mthan-validate', 'mthan-jquery-ui', 'mthan-isotope'), '1.0', true);

    // Theme Script
    wp_enqueue_script('mthan-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'mthan-custom-script'), '1.0', true);
}

// ──────────────────────────────────────────────────────────────────
// Custom Scripts Output
// ──────────────────────────────────────────────────────────────────
function mthan_wp_head_scripts() {
    $options = get_option('mthan_theme_options');
    if (!empty($options['header_scripts'])) {
        echo $options['header_scripts'] . "\n";
    }
}

function mthan_wp_body_open_scripts() {
    $options = get_option('mthan_theme_options');
    if (!empty($options['body_scripts'])) {
        echo $options['body_scripts'] . "\n";
    }
}

function mthan_wp_footer_scripts() {
    $options = get_option('mthan_theme_options');
    if (!empty($options['footer_scripts'])) {
        echo $options['footer_scripts'] . "\n";
    }
}

/**
 * Safe helper to get image URL from Theme Options (supports both 'media' and 'upload' fields).
 */
function mthan_get_img_url($field_value, $default_url = '')
{
    if (empty($field_value)) {
        return $default_url;
    }
    if (is_array($field_value)) {
        return !empty($field_value['url']) ? $field_value['url'] : $default_url;
    }
    return $field_value;
}

/**
 * Adjust the number of posts displayed on the blog archive.
 */
function mthan_adjust_blog_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && (is_home() || is_archive() || is_search()) && !is_post_type_archive(array('mthan_service', 'mthan_project'))) {
        $options = get_option('mthan_theme_options');
        $layouts = !empty($options['layouts_tabs']) ? $options['layouts_tabs'] : [];
        $count   = !empty($layouts['blog_posts_per_page']) ? $layouts['blog_posts_per_page'] : 10;
        
        $query->set('posts_per_page', $count);
    }
}
add_action('pre_get_posts', 'mthan_adjust_blog_posts_per_page');
/**
 * Get sidebar settings based on context.
 */
function mthan_get_sidebar_settings() {
    $options = get_option(MTHAN_THEME_OPTIONS);
    $settings = [
        'enabled'  => false,
        'position' => 'right',
        'id'       => ''
    ];

    if (is_singular('mthan_service')) {
        $service_meta = get_post_meta(get_the_ID(), MTHAN_SERVICE_OPTIONS, true);
        $settings['enabled']  = !empty($service_meta['service_sidebar_enable']);
        $settings['position'] = !empty($service_meta['service_sidebar_position']) ? $service_meta['service_sidebar_position'] : 'left';
        $settings['id']       = !empty($service_meta['service_sidebar_select']) ? $service_meta['service_sidebar_select'] : '';
    } elseif (is_singular('mthan_project')) {
        $settings['enabled']  = !empty($options['project_sidebar_enable']);
        $settings['position'] = !empty($options['project_sidebar_position']) ? $options['project_sidebar_position'] : 'right';
        $settings['id']       = !empty($options['project_sidebar_select']) ? $options['project_sidebar_select'] : '';
    } elseif (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout())) {
        $settings['enabled']  = !empty($options['shop_sidebar_enable']);
        $settings['position'] = !empty($options['shop_sidebar_position']) ? $options['shop_sidebar_position'] : 'left';
        $settings['id']       = !empty($options['shop_sidebar_select']) ? $options['shop_sidebar_select'] : '';
    } elseif (is_page()) {
        $settings['enabled']  = !empty($options['page_sidebar_enable']);
        $settings['position'] = !empty($options['page_sidebar_position']) ? $options['page_sidebar_position'] : 'right';
        $settings['id']       = !empty($options['page_sidebar_select']) ? $options['page_sidebar_select'] : '';
    } elseif (is_singular('post')) {
        $settings['enabled']  = !empty($options['blog_single_sidebar_enable']);
        $settings['position'] = !empty($options['blog_single_sidebar_position']) ? $options['blog_single_sidebar_position'] : 'right';
        $settings['id']       = !empty($options['blog_single_sidebar_select']) ? $options['blog_single_sidebar_select'] : '';
    } elseif (is_home() || is_archive() || is_search()) {
        $settings['enabled']  = !empty($options['blog_sidebar_enable']);
        $settings['position'] = !empty($options['blog_sidebar_position']) ? $options['blog_sidebar_position'] : 'right';
        $settings['id']       = !empty($options['blog_sidebar_select']) ? $options['blog_sidebar_select'] : '';
    }
    
    return $settings;
}
