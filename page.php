<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
get_header();
$layout_type = mthan_get_layout_type();
mthan_render_global_sections('before', $layout_type);
mthan_render_page_sections('before');
if ($layout_type == 'main' || $layout_type == 'page')
{
    if (have_posts())
    {
        while (have_posts())
        {
            the_post();
            the_content();
        }
    }
 } else { 
    $sidebar_settings = mthan_get_sidebar_settings();
    $sidebar_enabled  = $sidebar_settings['enabled'];
    $sidebar_pos      = $sidebar_settings['position'];
?>
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">  
            <?php if ($sidebar_enabled && $sidebar_pos == 'left') { ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php } ?>
            <div class="content-side <?php echo ($sidebar_enabled) ? 'col-lg-8' : 'col-lg-12'; ?> col-md-12 col-sm-12">
                <?php get_template_part('template-parts/content', 'page'); ?>
            </div>
            <?php if ($sidebar_enabled && $sidebar_pos == 'right') { ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php }
mthan_render_page_sections('after');
mthan_render_global_sections('after', $layout_type);
get_footer();