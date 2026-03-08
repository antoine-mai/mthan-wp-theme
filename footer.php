<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>
<?php
$theme_options = get_option('mthan_theme_options');
$post_options = get_post_meta(get_the_ID(), 'mthan_page_options', true);
if (empty($post_options) && is_single()) {
    $post_options = get_post_meta(get_the_ID(), 'mthan_post_options', true);
}

// Determine footer layout configuration
$footer_tabs   = !empty($theme_options['footer_tabs']) ? $theme_options['footer_tabs'] : [];
$footer_layout = !empty($post_options['custom_footer_layout'])
    ? $post_options['custom_footer_layout']
    : (!empty($footer_tabs['footer_layout']) ? $footer_tabs['footer_layout'] : 'style-1');

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
            $url = mthan_get_link($item['url'] ?? '#');
            $icon_url = mthan_get_img_url($item['icon'] ?? '');
            $text_color = !empty($item['text_color']) ? "color: {$item['text_color']};" : '';
        ?>
        <li>
            <a href="<?php echo esc_url($url); ?>">
                <?php if ($icon_url): ?>
                <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($title); ?>" class="icon" style="height: 20px; width: auto; display: block; margin: 0 auto 2px auto;">
                <?php endif; ?>
                <span class="text" style="<?php echo esc_attr($text_color); ?>"><?php echo esc_html($title); ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>