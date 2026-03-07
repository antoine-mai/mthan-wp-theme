<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Template Name: Page
 * 
**/
get_header();
$layout_type = mthan_get_layout_type();
mthan_render_global_sections('before', $layout_type);
mthan_render_page_sections('before');

if ($layout_type == 'main' || $layout_type == 'page') : 
    // Default / Main Layout (No Sidebar)
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
    endif;
else : 
    // Blog or Service Layout (With Sidebar)
    $sidebar_pos = ($layout_type == 'service') ? 'left' : 'right';
    ?>
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <?php if ($sidebar_pos == 'left') : ?>
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <?php get_template_part('template-parts/sidebar', 'blog'); ?>
                </div>
                <?php endif; ?>

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <?php if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                            the_content();
                        endwhile;
                    endif; ?>
                </div>

                <?php if ($sidebar_pos == 'right') : ?>
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <?php get_template_part('template-parts/sidebar', 'blog'); ?>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php mthan_render_page_sections('after');
mthan_render_global_sections('after', $layout_type);
get_footer();