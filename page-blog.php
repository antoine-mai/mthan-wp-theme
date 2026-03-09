<?php
/**
 * Template Name: Blog Page
 **/
get_header();

$theme_options = get_option(MTHAN_THEME_OPTIONS);
$layouts_tabs  = !empty($theme_options['layouts_tabs']) ? $theme_options['layouts_tabs'] : [];

$blog_layout   = !empty($layouts_tabs['blog_layout']) ? $layouts_tabs['blog_layout'] : 'list';
$posts_per_page = !empty($layouts_tabs['blog_posts_per_page']) ? $layouts_tabs['blog_posts_per_page'] : 10;

// Render global sections - use 'post' context to match "Blog Layout" settings
mthan_render_global_sections('before', 'post');
mthan_render_page_sections('before');

// Sidebar logic
$sidebar_settings = mthan_get_sidebar_settings();
$sidebar_enabled  = $sidebar_settings['enabled'];
$sidebar_pos      = $sidebar_settings['position'];
?>

<div class="sidebar-page-container blog-page">
    <div class="auto-container">
        <div class="row clearfix">
            
            <?php if ($sidebar_enabled && $sidebar_pos == 'left') : ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php endif; ?>

            <div class="content-side <?php echo ($sidebar_enabled) ? 'col-lg-8' : 'col-lg-12'; ?> col-md-12 col-sm-12">
                <div class="blog-content">
                    <?php
                    mthan_render_page_sections('content');
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => $posts_per_page,
                        'paged'          => $paged,
                    );
                    $blog_query = new WP_Query($args);

                    if ($blog_query->have_posts()) :
                        
                        $row_class = ($blog_layout == 'list') ? 'blog-list-view' : 'row clearfix';
                        echo '<div class="' . esc_attr($row_class) . '">';

                        while ($blog_query->have_posts()) : $blog_query->the_post();
                            
                            if ($blog_layout == 'list') {
                                ?>
                                <div class="news-block alternate">
                                    <?php get_template_part('template-parts/content', 'list'); ?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="news-block col-lg-6 col-md-12 col-sm-12">
                                    <?php get_template_part('template-parts/content', 'grid-2'); ?>
                                </div>
                                <?php
                            }

                        endwhile;
                        echo '</div>';

                        // Pagination
                        $big = 999999999;
                        $pagination = paginate_links(array(
                            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format'    => '?paged=%#%',
                            'current'   => max(1, $paged),
                            'total'     => $blog_query->max_num_pages,
                            'type'      => 'array',
                            'prev_text' => '<span class="fa fa-caret-left"></span>',
                            'next_text' => '<span class="fa fa-caret-right"></span>',
                        ));

                        if ($pagination) {
                            echo '<div class="pagination-box"><ul class="styled-pagination">';
                            foreach ($pagination as $link) {
                                if (strpos($link, 'current') !== false) {
                                    echo '<li><a href="#" class="active">' . strip_tags($link) . '</a></li>';
                                } else {
                                    echo '<li>' . $link . '</li>';
                                }
                            }
                            echo '</ul></div>';
                        }
                        
                        wp_reset_postdata();
                    else : ?>
                        <p><?php esc_html_e('No posts found.', 'mthan'); ?></p>
                    <?php endif; ?>
                </div>
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
mthan_render_global_sections('after', 'page');
get_footer();
