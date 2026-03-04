<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>
<?php
$theme_options = get_option('mthan_theme_options');
$post_options = get_post_meta(get_the_ID(), 'mthan_page_options', true);
if (empty($post_options) && is_single()) {
    $post_options = get_post_meta(get_the_ID(), 'mthan_post_options', true);
}

// Determine footer layout configuration
$footer_layout = !empty($post_options['custom_footer_layout'])
    ? $post_options['custom_footer_layout']
    : (!empty($theme_options['footer_layout']) ? $theme_options['footer_layout'] : 'style-1');

// Load the selected footer style template
get_template_part('template-parts/footer', $footer_layout);
?>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-arrows"></span></div>

<?php wp_footer(); ?>
</body>

</html>