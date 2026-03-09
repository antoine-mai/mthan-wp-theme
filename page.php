<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
get_header();

    $layout_type      = mthan_get_layout_type();
    $sidebar_settings = mthan_get_sidebar_settings();
    $sidebar_enabled  = $sidebar_settings['enabled'];
    $sidebar_pos      = $sidebar_settings['position'];

    // Map internal layout names to CSS classes (e.g. service -> services)
    $layout_classes = [
        'main'    => 'default-page',
        'blog'    => 'blog-page',
        'service' => 'services-page',
        'shop'    => 'shop-page',
        'project' => 'projects-page',
    ];
    $layout_class = isset($layout_classes[$layout_type]) ? $layout_classes[$layout_type] : $layout_type . '-page';

    // Determine global context based on layout type
    $global_context = ($layout_type === 'blog') ? 'post' : $layout_type;

    mthan_render_global_sections('before', $global_context);
mthan_render_page_sections('before');

?>

<div class="sidebar-page-container <?php echo esc_attr($layout_class); ?>">
    <div class="auto-container">
        <div class="row clearfix">
            
            <?php if ($sidebar_enabled && $sidebar_pos == 'left') : ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php endif; ?>

            <div class="content-side <?php echo ($sidebar_enabled) ? 'col-lg-8' : 'col-lg-12'; ?> col-md-12 col-sm-12">
                <?php 
                // Load the layout specific template part
                get_template_part('template-parts/page-layout', $layout_type); 
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