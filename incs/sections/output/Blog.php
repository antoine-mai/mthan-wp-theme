<?php defined('ABSPATH') || exit;

/**
 * Render the Blog section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Blog_html($section_data) { ?>
<?php
    $slug = 'Blog';
    $title_icon = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle   = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title      = mthan_get_section_val($slug, $section_data, 'title');
    $btn_text   = mthan_get_section_val($slug, $section_data, 'btn_text');
    $btn_link   = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn_link'));
    $count      = mthan_get_section_val($slug, $section_data, 'count', 3);
    $category   = mthan_get_section_val($slug, $section_data, 'category');

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $count,
        'post_status'    => 'publish',
    );

    if (!empty($category)) {
        $args['cat'] = $category;
    }

    $query = new WP_Query($args);
?>
<section class="blog-section">
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <?php if ($title_icon) { ?>
                <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($title_icon); ?>" alt="icon"></span></div>
                <?php } ?>
                <?php if ($subtitle) { ?>
                <div class="subtitle"><?php echo esc_html($subtitle); ?></div>
                <?php } ?>
                <?php if ($title) { ?>
                <h2><?php echo wp_kses_post($title); ?></h2>
                <?php } ?>
            </div>
            <?php if ($btn_text) { ?>
            <div class="link-box">
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn"><span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a>
            </div>
            <?php } ?>
        </div>

        <div class="blog-posts">
            <div class="row clearfix">
                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
                    $cats = get_the_category();
                    $cat_name = !empty($cats) ? $cats[0]->name : '';
                    $cat_link = !empty($cats) ? get_category_link($cats[0]->term_id) : '#';
                ?>
                <!--News block-->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="upper">
                            <div class="image-box">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('full');
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/resource/news-image-1.jpg" alt="' . get_the_title() . '">';
                                } ?>
                            </div>
                            <div class="info clearfix">
                                <?php if ($cat_name) { ?>
                                <div class="cat"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($cat_name); ?></a></div>
                                <?php } ?>
                                <div class="date"><span class="icon far fa-calendar"></span> <?php echo get_the_date(); ?></div>
                            </div>
                            <div class="hvr-link theme-btn"><a href="<?php the_permalink(); ?>"><span class="flaticon-cross"></span></a></div>
                        </div>
                        <div class="lower">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <div class="posted-by"><span class="icon far fa-user"></span> <?php the_author(); ?></div>
                            <div class="more-link"><a href="<?php the_permalink(); ?>"><span class="icon flaticon-right-arrow"></span></a></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>

    </div>
</section>
<?php }
