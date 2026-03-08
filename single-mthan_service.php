<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Single Service Template
 */
get_header();

// Render global sections (Page Banner, etc.)
mthan_render_global_sections('before', 'service');
?>
<?php
$theme_options = get_option(MTHAN_THEME_OPTIONS);
$spacing = !empty($theme_options['service_spacing']) 
    ? $theme_options['service_spacing'] 
    : ['top' => '100', 'bottom' => '100', 'unit' => 'px'];
$sec_style = '';
if (!empty($spacing)) {
    $unit = !empty($spacing['unit']) ? $spacing['unit'] : 'px';
    if (isset($spacing['top'])) $sec_style .= 'padding-top:' . $spacing['top'] . $unit . ';';
    if (isset($spacing['bottom'])) $sec_style .= 'padding-bottom:' . $spacing['bottom'] . $unit . ';';
}
?>

<main class="services-page-section" <?php if ($sec_style) echo 'style="' . esc_attr($sec_style) . '"'; ?>>
    <?php if (have_posts()) { while (have_posts()) { the_post(); ?>
    <?php
        $service_meta = get_post_meta(get_the_ID(), MTHAN_SERVICE_OPTIONS, true);
        $icon = !empty($service_meta['service_icon']) 
            ? $service_meta['service_icon'] 
            : 'flaticon-hedge'; // Fallback
        $prev_service = get_previous_post();
        $next_service = get_next_post();
    ?>
    <?php if ($prev_service || $next_service) { ?>
    <section>
        <div class="auto-container">
            <div class="post-controls" style="margin-bottom: 40px; border-bottom: none; padding-bottom: 0;">
                <div class="inner clearfix">
                    <?php if ($prev_service) : ?>
                        <div class="prev-post">
                            <a href="<?php echo esc_url(get_permalink($prev_service->ID)); ?>">
                                <?php if (has_post_thumbnail($prev_service->ID)) {
                                    echo get_the_post_thumbnail($prev_service->ID, 'thumbnail');
                                } ?>
                                <div class="upper-title">
                                    <span class="icon fa fa-caret-left"></span>&ensp; <?php echo esc_html(get_the_title($prev_service->ID)); ?>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($next_service) : ?>
                        <div class="next-post">
                            <a href="<?php echo esc_url(get_permalink($next_service->ID)); ?>">
                                <?php if (has_post_thumbnail($next_service->ID)) {
                                    echo get_the_post_thumbnail($next_service->ID, 'thumbnail');
                                } ?>
                                <div class="upper-title">
                                    <?php echo esc_html(get_the_title($next_service->ID)); ?> &ensp;<span class="icon fa fa-caret-right"></span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php } ?>
    <section>
        <div class="auto-container">
            <div class="sec-title">
                <div class="title-icon">
                    <span class="icon">
                        <?php echo mthan_get_icon_html($icon); ?>
                    </span>
                </div>
                <div class="subtitle">
                    <?php esc_html_e('Service Details', 'mthan'); ?>
                </div>
                <h2>
                    <?php the_title(); ?>
                </h2>
            </div>
        </div>
    </section>   
    <?php
        mthan_render_post_sections('before');
        the_content();
    ?>
<?php } } ?>
</main>

<?php
mthan_render_post_sections('after');
mthan_render_global_sections('after', 'service');
get_footer();
