<?php
/**
 * WooCommerce Hooks and Handlers
 *
 * This file handles all theme-specific customizations for WooCommerce.
 */

defined('ABSPATH') || exit;

// ── Single Product Layout ──────────────────────────────────────────

// Remove default WooCommerce wrappers
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Product Summary Customizations
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

// Add custom functions toSummary hook instead
add_action('woocommerce_single_product_summary', 'mthan_woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'mthan_woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'mthan_woocommerce_template_single_price', 15);
add_action('woocommerce_single_product_summary', 'mthan_woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'mthan_woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'mthan_woocommerce_template_single_meta', 40);

/**
 * Custom Title (Matches h3 from theme)
 */
function mthan_woocommerce_template_single_title() {
    echo '<h3 class="product_title entry-title">' . get_the_title() . '</h3>';
}

/**
 * Custom Rating (Matches rating-box from theme)
 */
function mthan_woocommerce_template_single_rating() {
    global $product;
    if ( ! wc_review_ratings_enabled() ) return;

    $rating_count = $product->get_rating_count();
    $review_count = $product->get_review_count();
    $average      = $product->get_average_rating();

    if ($rating_count > 0) {
        echo '<div class="woocommerce-product-rating">';
        echo wc_get_rating_html($average, $rating_count);
        echo '<div class="reviews"><a href="#reviews" class="woocommerce-review-link" rel="nofollow">[' . sprintf(_n('%s Customer Review', '%s Customer Reviews', $review_count, 'mthan-wp'), $review_count) . ']</a></div>';
        echo '</div>';
    }
}

/**
 * Custom Price (Matches item-price from theme)
 */
function mthan_woocommerce_template_single_price() {
    global $product;
    echo '<div class="item-price">' . $product->get_price_html() . '</div>';
    echo '<div class="share"><a href="#"><i class="flaticon-share-1"></i></a></div>';
}

/**
 * Custom Excerpt
 */
function mthan_woocommerce_template_single_excerpt() {
    global $post;
    if ( ! $post->post_excerpt ) return;
    echo '<div class="text">' . apply_filters('woocommerce_short_description', $post->post_excerpt) . '</div>';
}

/**
 * Custom Meta (Tags/Categories)
 */
function mthan_woocommerce_template_single_meta() {
    global $product;
    echo '<div class="product-category">';
    wc_get_template('single-product/meta.php');
    echo '</div>';
}

/**
 * Customize Quantity Input class
 */
add_filter('woocommerce_quantity_input_classes', function($classes) {
    if (is_singular('product')) {
        $classes[] = 'quantity-spinner';
    }
    return $classes;
});

// ── Overriding Content Wrapper ───────────────────────────────────────
add_action('woocommerce_before_main_content', 'mthan_woocommerce_wrapper_start', 10);
function mthan_woocommerce_wrapper_start() {
    // Render Page Banner and other "before" global sections
    mthan_render_global_sections('before');

    if (is_singular('product')) return;

    $sidebar_settings = mthan_get_sidebar_settings();
    $sidebar_enabled  = $sidebar_settings['enabled'];
    $sidebar_pos      = $sidebar_settings['position'];

    if ($sidebar_enabled) {
        if ($sidebar_pos == 'left') {
            echo '<div class="sidebar-page-container shop-page"><div class="auto-container"><div class="row clearfix">';
            echo '<div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">';
            get_template_part('template-parts/sidebar', 'blog');
            echo '</div>';
            echo '<div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12"><div class="our-shop">';
        } else {
            echo '<div class="sidebar-page-container shop-page"><div class="auto-container"><div class="row clearfix">';
            echo '<div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12"><div class="our-shop">';
        }
    } else {
        echo '<div class="auto-container py-5"><div class="our-shop">';
    }
}

// ── Pagination ──────────────────────────────────────────────────────

add_filter('woocommerce_pagination_args', function($args) {
    $args['prev_text'] = '<span class="fa fa-caret-left"></span>';
    $args['next_text'] = '<span class="fa fa-caret-right"></span>';
    $args['type']      = 'list';
    return $args;
});

// Wrap pagination with theme class
add_action('woocommerce_after_shop_loop', function() {
    echo '<div class="pagination-box">';
}, 9);

add_action('woocommerce_after_shop_loop', function() {
    echo '</div>';
}, 11);

add_action('woocommerce_after_main_content', 'mthan_woocommerce_wrapper_end', 10);
function mthan_woocommerce_wrapper_end() {
    if (is_singular('product')) {
        mthan_render_global_sections('after');
        return;
    }

    $sidebar_settings = mthan_get_sidebar_settings();
    $sidebar_enabled  = $sidebar_settings['enabled'];
    $sidebar_pos      = $sidebar_settings['position'];

    if ($sidebar_enabled) {
        echo '</div></div>'; // closes our-shop, content-side
        
        if ($sidebar_pos == 'right') {
            echo '<div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">';
            get_template_part('template-parts/sidebar', 'blog');
            echo '</div>'; // closes sidebar-side
        }
        
        echo '</div>'; // closes row
        echo '</div>'; // closes auto-container
        echo '</div>'; // closes sidebar-page-container
    } else {
        echo '</div>'; // closes our-shop
        echo '</div>'; // closes auto-container
    }

    mthan_render_global_sections('after');
}
