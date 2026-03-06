<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the blog section instance.
 * @return array
 */
function mthan_section_blog_options()
{
    return array(
        array(
            'id'      => 'blog_sec_subtitle',
            'type'    => 'text',
            'title'   => 'Subtitle',
            'default' => 'News & Updates',
        ),
        array(
            'id'      => 'blog_sec_subtitle_icon',
            'type'    => 'media',
            'library' => 'image',
            'preview' => false,
            'title'   => 'Subtitle Icon',
            'default' => array('url' => get_template_directory_uri() . '/assets/images/icons/leaf-two.png')
        ),
        array(
            'id'      => 'blog_sec_title',
            'type'    => 'text',
            'title'   => 'Title',
            'default' => 'Latest From Blog',
        ),
        array(
            'id'      => 'blog_btn_text',
            'type'    => 'text',
            'title'   => 'Button Text',
            'default' => 'View More Blog',
        ),
        array(
            'id'      => 'blog_btn_link',
            'type'    => 'text',
            'title'   => 'Button Link',
            'default' => '#',
        ),
        array(
            'id'      => 'blog_count',
            'type'    => 'number',
            'title'   => 'Number of Posts',
            'default' => 3,
        ),
        array(
            'id'          => 'blog_category',
            'type'        => 'select',
            'title'       => 'Filter by Category',
            'options'     => 'categories',
            'placeholder' => 'All Categories',
        ),
        array(
            'id'      => 'blog_show_pagination',
            'type'    => 'switcher',
            'title'   => 'Show Pagination',
            'default' => false,
        ),
    );
}

/**
 * Render the blog section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_blog_html($section_data)
{
    $slug = 'blog';
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'News & Updates');
    $sec_sub_icon = mthan_sec_img($slug, $section_data, 'sec_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-two.png');
    $sec_title    = mthan_get_section_val($slug, $section_data, 'sec_title', 'Latest From Blog');
    $btn_text     = mthan_get_section_val($slug, $section_data, 'btn_text', 'View More Blog');
    $btn_link     = mthan_get_section_val($slug, $section_data, 'btn_link', '#');
    $count        = (int)mthan_get_section_val($slug, $section_data, 'count', 3);
    $cat          = mthan_get_section_val($slug, $section_data, 'category', '');
    $paged        = (get_query_var('paged')) ? get_query_var('paged') : 1;

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
<section class="blog-section">
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($sec_sub_icon); ?>" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                <h2><?php echo esc_html($sec_title); ?></h2>
            </div>
            <?php if ($btn_text) { ?>
            <div class="link-box">
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn"><span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a>
            </div>
            <?php } ?>
        </div>

        <div class="blog-posts">
            <div class="row clearfix">
                <?php
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $categories = get_the_category();
                        $cat_name   = !empty($categories) ? $categories[0]->name : 'Uncategorized';
                        $cat_link   = !empty($categories) ? get_category_link($categories[0]->term_id) : '#';
                        $author_name = get_the_author();
                ?>
                <!--News block-->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="upper">
                            <?php if (has_post_thumbnail()) { ?>
                            <div class="image-box">
                                <?php the_post_thumbnail('mthan_blog_grid'); ?>
                            </div>
                            <?php } ?>
                            <div class="info clearfix">
                                <div class="cat"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($cat_name); ?></a></div>
                                <div class="date"><span class="icon far fa-calendar"></span> <?php echo esc_html(get_the_date()); ?></div>
                            </div>
                            <div class="hvr-link theme-btn"><a href="<?php the_permalink(); ?>"><span class="flaticon-cross"></span></a></div>
                        </div>
                        <div class="lower">
                            <h5><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h5>
                            <div class="posted-by"><span class="icon far fa-user"></span> <?php echo esc_html($author_name); ?></div>
                            <div class="more-link"><a href="<?php the_permalink(); ?>"><span class="icon flaticon-right-arrow"></span></a></div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>

        <?php if (!empty($section_data['blog_show_pagination'])) { ?>
        <div class="pagination-box">
            <?php
            echo paginate_links(array(
                'total'     => $query->max_num_pages,
                'current'   => $paged,
                'prev_text' => '<span class="fa fa-caret-left"></span>',
                'next_text' => '<span class="fa fa-caret-right"></span>',
                'type'      => 'list',
                'class'     => 'styled-pagination'
            ));
            ?>
        </div>
        <?php } ?>
    </div>
</section>
<?php
}
