<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>
<?php
$theme_options = get_option('mthan_theme_options');
$post_options = get_post_meta(get_the_ID(), 'mthan_page_options', true);
if (empty($post_options) && is_single()) {
    $post_options = get_post_meta(get_the_ID(), 'mthan_post_options', true);
}

// Determine footer layout configuration
$footer_layout = !empty($post_options['custom_footer_layout']) ? $post_options['custom_footer_layout'] : 'style-1';

// Load the selected footer style template
get_template_part('template-parts/footer', $footer_layout);
?>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-arrows"></span></div>

<?php 
// Render mobile bar if enabled
if (!empty($theme_options['enable_mobile_bar']) && !empty($theme_options['mobile_bar_items'])) : 
?>
<div class="mthan-mobile-bar d-md-none d-block">
    <ul class="mobile-bar-inner clearfix">
        <?php foreach ($theme_options['mobile_bar_items'] as $item) : 
            $title = !empty($item['title']) ? $item['title'] : '';
            $url = !empty($item['url']) ? $item['url'] : '#';
            $icon = !empty($item['icon']) ? $item['icon'] : 'fas fa-link';
        ?>
        <li>
            <a href="<?php echo esc_url($url); ?>">
                <span class="icon <?php echo esc_attr($icon); ?>"></span>
                <span class="text"><?php echo esc_html($title); ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>