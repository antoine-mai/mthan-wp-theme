<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the blog section instance.
 * @return array
 */
function mthan_section_blog_options()
{
    return array(
        array(
            'id'      => 'blog_count',
            'type'    => 'number',
            'title'   => 'Number of Posts',
            'default' => 6,
        ),
        array(
            'id'          => 'blog_category',
            'type'        => 'select',
            'title'       => 'Filter by Category',
            'options'     => 'categories',
            'placeholder' => 'All Categories',
        ),
        array(
            'id'    => 'blog_show_pagination',
            'type'  => 'switcher',
            'title' => 'Show Pagination',
            'default' => false,
        ),
    );
}

/**
 * Render the blog section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_blog_html($section_data) { 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $count = !empty($section_data['blog_count']) ? (int)$section_data['blog_count'] : 6;
    $cat   = !empty($section_data['blog_category']) ? $section_data['blog_category'] : '';
    
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $count,
        'paged'          => $paged,
    );
    
    if ($cat) {
        $args['cat'] = $cat;
    }
    
    $query = new WP_Query($args);
?>
<section class="blog-section blog-page">
        <div class="auto-container">

            <div class="blog-posts">
                <div class="row clearfix">
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
                        $categories = get_the_category();
                        $cat_name   = !empty($categories) ? $categories[0]->name : 'Uncategorized';
                        $cat_link   = !empty($categories) ? get_category_link($categories[0]->term_id) : '#';
                    ?>
                    <!--News block-->
                    <div class="news-block alternate col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="upper">
                                <?php if (has_post_thumbnail()) : ?>
                                <div class="image-box">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                                <?php endif; ?>
                                <div class="info clearfix">
                                    <div class="cat"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($cat_name); ?></a></div>
                                    <div class="date"><span class="icon far fa-calendar"></span> <?php echo get_the_date(); ?></div>
                                </div>
                                <div class="hvr-link theme-btn"><a href="<?php the_permalink(); ?>"><span class="flaticon-cross"></span></a></div>
                            </div>
                            <div class="lower">
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <div class="post-meta">
                                    <ul class="clearfix">
                                        <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><span class="icon far fa-user"></span> <?php the_author(); ?></a></li>
                                        <li><a href="<?php comments_link(); ?>"><span class="icon far fa-comment"></span> Comments: <?php comments_number('0', '1', '%'); ?></a></li>
                                    </ul>
                                </div>
                                <div class="more-link"><a href="<?php the_permalink(); ?>"><span class="icon flaticon-right-arrow"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); endif; ?>

                </div>

                <?php if (!empty($section_data['blog_show_pagination'])) : ?>
                <div class="pagination-box">
                    <?php 
                        echo paginate_links(array(
                            'total'     => $query->max_num_pages,
                            'current'   => $paged,
                            'prev_text' => '<span class="fa fa-caret-left"></span>',
                            'next_text' => '<span class="fa fa-caret-right"></span>',
                            'type'      => 'list',
                            'class'     => 'styled-pagination' // Note: standard wp paginate_links doesn't inject custom class easily into <ul>, might need custom walker or just wrap it.
                        ));
                    ?>
                </div>
                <?php endif; ?>

            </div>

        </div>
    </section>
<?php }
