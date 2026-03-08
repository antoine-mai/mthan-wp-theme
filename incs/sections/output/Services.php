<?php defined('ABSPATH') || exit;

/**
 * Render the Services section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Services_html($section_data) { ?>
<?php
    $slug = 'Services';
    $count = mthan_get_section_val($slug, $section_data, 'count', -1);

    $args = array(
        'post_type'      => 'mthan_service',
        'posts_per_page' => $count,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    if (!$query->have_posts()) return;
?>
<section class="main-services">
    <div class="auto-container">
        <div class="row clearfix">
            <?php while ($query->have_posts()) { 
                $query->the_post();
                $title = get_the_title();
                $img   = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $lnk   = get_permalink();
                
                // For now, these might be empty since editor/excerpt are disabled
                // User might add custom fields later, or we use a fallback
                $desc  = get_the_excerpt(); 
                
                // Icon handling: we could try to get it from meta if we decide to re-add it
                // For now, use a default icon or check if a custom field exists
                $icon  = get_post_meta(get_the_ID(), 'service_icon', true);
                if (empty($icon)) $icon = 'flaticon-hedge';
            ?>
            <!--Service block-->
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="upper">
                        <?php if ($img) { ?>
                        <div class="image-box">
                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>">
                        </div>
                        <?php } ?>
                        <div class="hvr-icon"><?php echo mthan_get_icon_html($icon); ?></div>
                    </div>
                    <div class="lower">
                        <div class="icon-right"><?php echo mthan_get_icon_html($icon); ?></div>
                        <?php if ($title) { ?>
                        <h5><a href="<?php echo esc_url($lnk); ?>"><?php echo esc_html($title); ?></a></h5>
                        <?php } ?>
                        <?php if ($desc) { ?>
                        <div class="text"><?php echo wp_kses_post($desc); ?></div>
                        <?php } ?>
                        <div class="more-link">
                            <a href="<?php echo esc_url($lnk); ?>">
                                <?php esc_html_e('Read More', 'mthan'); ?> <i class="icon fa fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php }
