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
                        <div class="prev-post" style="width: auto; max-width: 48%;">
                            <a href="<?php echo esc_url(get_permalink($prev_service->ID)); ?>" style="display: flex; align-items: center; padding: 0;">
                                <?php if (has_post_thumbnail($prev_service->ID)) { ?>
                                    <div class="thumb" style="position: relative; top: 0; left: 0; margin-right: 15px; flex-shrink: 0;">
                                        <?php echo get_the_post_thumbnail($prev_service->ID, 'thumbnail'); ?>
                                    </div>
                                <?php } ?>
                                <div class="upper-title" style="position: relative; top: 0; left: 0; padding: 0; font-weight: 700; color: #132728; font-family: 'Libre Baskerville', serif;">
                                    <span class="icon fa fa-caret-left"></span>&ensp; <?php echo esc_html(get_the_title($prev_service->ID)); ?>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($next_service) : ?>
                        <div class="next-post" style="width: auto; max-width: 48%;">
                            <a href="<?php echo esc_url(get_permalink($next_service->ID)); ?>" style="display: flex; align-items: center; justify-content: flex-end; padding: 0;">
                                <div class="upper-title" style="position: relative; top: 0; right: 0; padding: 0; font-weight: 700; color: #132728; font-family: 'Libre Baskerville', serif;">
                                    <?php echo esc_html(get_the_title($next_service->ID)); ?> &ensp;<span class="icon fa fa-caret-right"></span>
                                </div>
                                <?php if (has_post_thumbnail($next_service->ID)) { ?>
                                    <div class="thumb" style="position: relative; top: 0; right: 0; margin-left: 15px; flex-shrink: 0;">
                                        <?php echo get_the_post_thumbnail($next_service->ID, 'thumbnail'); ?>
                                    </div>
                                <?php } ?>
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
