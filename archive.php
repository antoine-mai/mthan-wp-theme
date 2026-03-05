<?php defined('ABSPATH') or die('Cheatin\' uh?');
get_header();
mthan_render_global_sections('before', 'blog');
mthan_render_page_sections('before');
?>

<div class="sidebar-page-container blog-page">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="blog-content">
                    <h1><?php the_archive_title(); ?></h1>
                    <?php if (have_posts()) : while (have_posts()) : the_post();
                        get_template_part('template-parts/content');
                    endwhile; else : ?>
                        <p><?php esc_html_e('No posts found.', 'mthan'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
        </div>
    </div>
</div>

<?php 
mthan_render_page_sections('after');
mthan_render_global_sections('after', 'blog');
get_footer(); ?>
