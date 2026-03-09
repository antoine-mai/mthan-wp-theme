<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Default Page Template
 **/
get_header();

$layout_type      = mthan_get_layout_type();
$sidebar_settings = mthan_get_sidebar_settings();
$sidebar_enabled  = $sidebar_settings['enabled'];
$sidebar_pos      = $sidebar_settings['position'];

mthan_render_global_sections('before', $layout_type);
mthan_render_page_sections('before');
?>

<div class="sidebar-page-container <?php echo ($layout_type === 'service') ? 'services-page' : ''; ?>">
    <div class="auto-container">
        <div class="row clearfix">
            
            <?php if ($sidebar_enabled && $sidebar_pos == 'left') : ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php endif; ?>

            <div class="content-side <?php echo ($sidebar_enabled) ? 'col-lg-8' : 'col-lg-12'; ?> col-md-12 col-sm-12">
                <?php 
                mthan_render_page_sections('content');
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>

            <?php if ($sidebar_enabled && $sidebar_pos == 'right') : ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php
mthan_render_page_sections('after');
mthan_render_global_sections('after', $layout_type);
get_footer();