<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
get_header();
mthan_render_global_sections('before', 'blog');
mthan_render_page_sections('before');
?>

<?php 
$sidebar_settings = mthan_get_sidebar_settings();
$sidebar_enabled  = $sidebar_settings['enabled'];
$sidebar_pos      = $sidebar_settings['position'];
?>

<div class="sidebar-page-container blog-page">
    <div class="auto-container">
        <div class="row clearfix">
            <?php if ($sidebar_enabled && $sidebar_pos == 'left') { ?>
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php } ?>

            <!--Content Side-->
            <div class="content-side <?php echo ($sidebar_enabled) ? 'col-lg-8' : 'col-lg-12'; ?> col-md-12 col-sm-12">
                <div class="blog-content">
                    <h1><?php the_archive_title(); ?></h1>
                    <?php 
                    $theme_options = get_option('mthan_theme_options');
                    $archive_template = !empty($theme_options['blog_archive_template']) ? $theme_options['blog_archive_template'] : 'grid-2';
                    
                    $row_class = 'row clearfix';
                    $item_class = 'col-lg-6 col-md-12 col-sm-12'; // Default grid-2

                    if ($archive_template == 'grid-3') {
                        $item_class = 'col-lg-4 col-md-6 col-sm-12';
                    } elseif ($archive_template == 'list') {
                        $row_class = 'list-view';
                        $item_class = 'col-12';
                    }
                    ?>
                    <div class="<?php echo esc_attr($row_class); ?>">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); 
                            $news_block_class = $item_class;
                            if ($archive_template == 'grid-2') {
                                $news_block_class .= ' alternate';
                            }
                            ?>
                            <div class="news-block <?php echo esc_attr($news_block_class); ?> hvr-float-shadow">
                                <?php 
                                if ($archive_template == 'grid-3') {
                                    get_template_part('template-parts/content', 'grid-3');
                                } elseif ($archive_template == 'grid-2') {
                                    get_template_part('template-parts/content', 'grid-2');
                                } else {
                                    get_template_part('template-parts/content');
                                }
                                ?>
                            </div>
                        <?php endwhile; else : ?>
                            <p><?php esc_html_e('No posts found.', 'mthan'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ($sidebar_enabled && $sidebar_pos == 'right') { ?>
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php 
mthan_render_page_sections('after');
mthan_render_global_sections('after', 'blog');
get_footer(); ?>
