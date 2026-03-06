<?php
/*
Template Name: Site Map
*/
defined('ABSPATH') or die('Cheatin\' uh?');
get_header();

$layout_type = mthan_get_layout_type();
mthan_render_global_sections('before', $layout_type);
mthan_render_page_sections('before');

// The sitemap content to render
ob_start();
?>
<div class="sitemap-inner-content" style="padding: 40px 0;">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
    endif;
    ?>

    <div class="row clearfix" style="margin-top: 30px;">
        <!-- Pages -->
        <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom: 30px;">
            <h3><?php esc_html_e('Pages', 'prunet'); ?></h3>
            <ul class="sitemap-list" style="list-style: disc; padding-left: 20px;">
                <?php wp_list_pages(array('title_li' => '')); ?>
            </ul>
        </div>
        
        <!-- Categories -->
        <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom: 30px;">
            <h3><?php esc_html_e('Categories', 'prunet'); ?></h3>
            <ul class="sitemap-list" style="list-style: disc; padding-left: 20px;">
                <?php wp_list_categories(array('title_li' => '')); ?>
            </ul>
        </div>

        <!-- Latest Posts -->
        <div class="col-lg-4 col-md-12 col-sm-12" style="margin-bottom: 30px;">
            <h3><?php esc_html_e('Recent Posts', 'prunet'); ?></h3>
            <ul class="sitemap-list" style="list-style: disc; padding-left: 20px;">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 15,
                    'post_status' => 'publish'
                ));
                foreach($recent_posts as $post) : ?>
                    <li>
                        <a href="<?php echo get_permalink($post['ID']) ?>">
                            <?php echo esc_html($post['post_title']) ?>
                        </a>
                    </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</div>
<?php
$sitemap_content = ob_get_clean();

if ($layout_type == 'main') : 
    // Default / Main Layout (No Sidebar)
    echo '<div class="auto-container">';
    echo $sitemap_content;
    echo '</div>';
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
                    <?php echo $sitemap_content; ?>
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

<?php 
mthan_render_page_sections('after');
mthan_render_global_sections('after', $layout_type);
get_footer();
