<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * The Index file is now strictly used for rendering the Home Page sections 
 * configured in MTHAN Theme Options -> Home Page.
 */

$options = get_option(MTHAN_THEME_OPTIONS);
$homepage_sections = !empty($options['homepage_sections']) ? $options['homepage_sections'] : array();

get_header();

if (!empty($homepage_sections)) {
    mthan_render_global_sections('before', 'main');
    mthan_include_section_items($homepage_sections);
    mthan_render_global_sections('after', 'main');
} else {
    echo '<div class="no-sections-found" style="padding: 100px 0; text-align: center;">';
    echo '<h2>No Home Page sections configured.</h2>';
    echo '<p>Please go to <strong>MTHAN > Home Page</strong> to add sections.</p>';
    echo '</div>';
}

get_footer();