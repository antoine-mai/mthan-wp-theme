<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * The Index file renders the Front Page (or static page assigned as homepage).
 * Sections are configured via the Page Options metabox (Before/After Content).
 */

get_header();

if (is_front_page() || is_page()) {
    // Get the current page's post meta
    $post_id   = get_the_ID();
    $post_meta = get_post_meta($post_id, MTHAN_PAGE_OPTIONS, true) ?: [];

    $before = !empty($post_meta['page_before_content']) ? $post_meta['page_before_content'] : [];
    $after  = !empty($post_meta['page_after_content'])  ? $post_meta['page_after_content']  : [];

    if (!empty($before)) {
        mthan_include_section_items($before);
    }

    // Render the page's main content (editor content)
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            if (!empty(get_the_content())) {
                echo '<div class="page-content">';
                the_content();
                echo '</div>';
            }
        }
    }

    if (!empty($after)) {
        mthan_include_section_items($after);
    }

} else {
    // Fallback: blog archive
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/post-card');
        }
        the_posts_pagination();
    }
}

get_footer();