<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Single Service Template
**/
if (have_posts())
{
    the_post(); // Setup global $post early

    $theme_options = get_option(MTHAN_THEME_OPTIONS);
    $service_meta  = get_post_meta(get_the_ID(), MTHAN_SERVICE_OPTIONS, true);

    // Spacing Logic
    $spacing = !empty($theme_options['service_spacing']) 
        ? $theme_options['service_spacing'] 
        : ['top' => '100', 'bottom' => '100', 'unit' => 'px'];
    $sec_style = '';
    if (!empty($spacing))
    {
        $unit = !empty($spacing['unit']) 
            ? $spacing['unit'] 
            : 'px';
        if (isset($spacing['top'])) $sec_style .= 'padding-top:' . $spacing['top'] . $unit . ';';
        if (isset($spacing['bottom'])) $sec_style .= 'padding-bottom:' . $spacing['bottom'] . $unit . ';';
    }

    // Service Specific Data
    $icon        = !empty($service_meta['service_icon']) 
        ? $service_meta['service_icon'] 
        : 'flaticon-hedge';
        
    // Priority: Metabox > Global Theme Option > Default 'boxed'
    $layout_type = !empty($service_meta['service_layout']) 
        ? $service_meta['service_layout'] 
        : (!empty($theme_options['service_layout']) ? $theme_options['service_layout'] : 'boxed');

    // Sidebar & Navigation
    $sidebar_settings = mthan_get_sidebar_settings();
    $sidebar_enabled  = $sidebar_settings['enabled'];
    $sidebar_pos      = $sidebar_settings['position'];
    $sidebar_id       = $sidebar_settings['id'];

    $prev_service     = get_previous_post();
    $next_service     = get_next_post();

    $container_class  = ($layout_type === 'fullwide') 
        ? 'container-fluid' 
        : 'auto-container';

    get_header();
    mthan_render_global_sections('before', 'service');
?>

<main class="services-page-section" <?php if ($sec_style) echo 'style="' . esc_attr($sec_style) . '"'; ?>>

    <div class="<?php echo esc_attr($container_class); ?>">
        
        <?php if (empty($service_meta['service_hide_heading'])) { ?>
        <div class="sec-title">
            <div class="title-icon">
                <span class="icon">
                    <?php echo mthan_get_icon_html($icon); ?>
                </span>
            </div>
            <div class="subtitle">
                <?php esc_html_e('Dịch vụ', 'mthan'); ?>
            </div>
            <h2>
                <?php the_title(); ?>
            </h2>
        </div>
        <?php } ?>

        <?php if ($prev_service || $next_service) { ?>
        <style>.post-controls.no-line:before { display: none !important; }</style>
        <div class="post-controls no-line" style="margin-bottom: 40px; border-bottom: none; padding-bottom: 0;">
            <div class="inner clearfix">
                <?php if ($prev_service) { ?>
                <div class="prev-post" style="width: auto; max-width: 25%;">
                    <a href="<?php echo esc_url(get_permalink($prev_service->ID)); ?>" style="display: flex; align-items: center; padding: 0;">
                        <?php if (has_post_thumbnail($prev_service->ID)) { ?>
                        <div class="thumb" style="position: relative; top: 0; left: 0; margin-right: 15px; flex-shrink: 0;">
                            <?php echo get_the_post_thumbnail($prev_service->ID, 'thumbnail'); ?>
                        </div>
                        <?php } ?>
                        <div class="upper-title" style="position: relative; top: 0; left: 0; padding: 0; font-weight: 700; color: #132728; font-family: 'Libre Baskerville', serif;">
                            <span class="icon fa fa-caret-left"></span>
                            &ensp; <?php echo esc_html(get_the_title($prev_service->ID)); ?>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <?php if ($next_service) { ?>
                <div class="next-post" style="width: auto; max-width: 25%;">
                    <a href="<?php echo esc_url(get_permalink($next_service->ID)); ?>" style="display: flex; align-items: center; justify-content: flex-end; padding: 0;">
                        <div class="upper-title" style="position: relative; top: 0; right: 0; padding: 0; font-weight: 700; color: #132728; font-family: 'Libre Baskerville', serif;">
                            <?php echo esc_html(get_the_title($next_service->ID)); ?> 
                            &ensp;
                            <span class="icon fa fa-caret-right"></span>
                        </div>
                        <?php if (has_post_thumbnail($next_service->ID)) { ?>
                        <div class="thumb" style="position: relative; top: 0; right: 0; margin-left: 15px; flex-shrink: 0;">
                            <?php echo get_the_post_thumbnail($next_service->ID, 'thumbnail'); ?>
                        </div>
                        <?php } ?>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <div class="row clearfix">
            
            <?php if ($sidebar_enabled && $sidebar_pos == 'left' && is_active_sidebar($sidebar_id)) { ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <?php dynamic_sidebar($sidebar_id); ?>
                </aside>
            </div>
            <?php } ?>

            <div class="content-side <?php echo ($sidebar_enabled && is_active_sidebar($sidebar_id)) ? 'col-lg-8' : 'col-lg-12'; ?> col-md-12 col-sm-12">
                <section class="service-details">
                    <div class="service-content">
                        <?php
                            mthan_render_post_sections('before');
                            the_content();
                            mthan_render_post_sections('after');
                        ?>
                    </div>
                </section>
            </div>

            <?php if ($sidebar_enabled && $sidebar_pos == 'right' && is_active_sidebar($sidebar_id)) { ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <?php dynamic_sidebar($sidebar_id); ?>
                </aside>
            </div>
            <?php } ?>

        </div>
    </div>

    <?php } ?>
</main>
<?php
mthan_render_global_sections('after', 'service');
get_footer();
