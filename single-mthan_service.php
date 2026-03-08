<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Single Service Template
 */
get_header();

// Render global sections (Page Banner, etc.)
mthan_render_global_sections('before', 'service');
?>

<section class="services-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12">
                <div class="service-details">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); 
                        $icon = get_post_meta(get_the_ID(), 'project_icon', true); // Check project_icon too
                        if (empty($icon)) $icon = get_post_meta(get_the_ID(), 'service_icon', true);
                    ?>
                        <div class="sec-title">
                            <?php if ($icon) { ?>
                            <div class="title-icon"><span class="icon"><?php echo mthan_get_icon_html($icon); ?></span></div>
                            <?php } ?>
                            <div class="subtitle"><?php esc_html_e('Service Details', 'mthan'); ?></div>
                            <h2><?php the_title(); ?></h2>
                        </div>
                        
                        <?php 
                        // Render Service-specific sections inside the content-side
                        mthan_render_post_sections('before');
                        
                        the_content();
                        ?>

                    <?php endwhile; endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
// Render footer sections
mthan_render_post_sections('after');
mthan_render_global_sections('after', 'service');

get_footer();
?>
