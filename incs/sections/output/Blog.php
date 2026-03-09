<?php defined('ABSPATH') || exit;

/**
 * Render the Blog section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Blog_html($section_data) { ?>
<?php
    $slug = 'Blog';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if (is_front_page()) {
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    }

    $title_icon = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle   = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title      = mthan_get_section_val($slug, $section_data, 'title');
    $btn_text   = mthan_get_section_val($slug, $section_data, 'btn_text');
    $btn_link   = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn_link'));
    $count      = mthan_get_section_val($slug, $section_data, 'count', 3);
    $category   = mthan_get_section_val($slug, $section_data, 'category');
    $default_thumb = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'default_thumb', get_template_directory_uri() . '/assets/images/resource/news-image-1.jpg'));

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $count,
        'paged'          => $paged,
        'post_status'    => 'publish',
    );

    if (!empty($category)) {
        $args['cat'] = $category;
    }

    $query = new WP_Query($args);
    $styles = mthan_section_styles($slug, $section_data);

    $layout_style = mthan_get_section_val($slug, $section_data, 'layout_style', 'grid');
    $columns      = mthan_get_section_val($slug, $section_data, 'columns', '3');

    $col_class = 'col-lg-12';
    if ($layout_style === 'grid') {
        if ($columns == '2') {
            $col_class = 'col-lg-6 col-md-6 col-sm-12';
        } elseif ($columns == '4') {
            $col_class = 'col-lg-3 col-md-6 col-sm-12';
        } else {
            $col_class = 'col-lg-4 col-md-6 col-sm-12'; // Default 3
        }
    }
?>
<section class="blog-section <?php echo esc_attr($styles['class']); ?>" <?php echo $styles['style']; ?>>
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

                    $block_class = ($layout_style === 'list') ? 'news-block alternate' : 'news-block';
                ?>
                <!--News block-->
                <div class="<?php echo esc_attr($block_class . ' ' . $col_class); ?>">
                    <div class="inner-box">
                        <div class="upper">
                            <div class="image-box">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('full');
                                } elseif ($default_thumb) {
                                    echo '<img src="' . esc_url($default_thumb) . '" alt="' . get_the_title() . '">';
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

        <?php if ($query->max_num_pages > 1) : ?>
        <div class="pagination-box text-center">
            <style>
                .styled-pagination { padding: 0 !important; }
                .styled-pagination li { vertical-align: middle !important; }
                .styled-pagination li a { display: flex !important; align-items: center; justify-content: center; line-height: 1 !important; }
            </style>
            <?php
            $links = paginate_links(array(
                'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format'       => '?paged=%#%',
                'current'      => max(1, $paged),
                'total'        => $query->max_num_pages,
                'prev_text'    => '<span class="fa fa-caret-left"></span>',
                'next_text'    => '<span class="fa fa-caret-right"></span>',
                'type'         => 'list',
            ));
            
            if ($links) {
                // 1. Convert span current to active link
                $links = preg_replace('/<span[^>]*class=["\']([^"\']*current[^"\']*)["\'][^>]*>([0-9]+)<\/span>/', '<a href="#" class="active">$2</a>', $links);
                
                // 2. Clear out all page-numbers related classes but preserving other potential classes (prev/next)
                $links = preg_replace('/class=["\']([^"\']*)page-numbers([^"\']*)["\']/', 'class="$1 $2"', $links);
                
                // 3. Set the correct class for the ul 
                $links = preg_replace('/<ul[^>]*>/', '<ul class="styled-pagination">', $links);
                
                // 4. Transform prev/next to control
                $links = str_replace('class="prev"', 'class="control prev"', $links);
                $links = str_replace('class="next"', 'class="control next"', $links);
                
                // 5. Final cleanup of class spacing
                $links = str_replace('class=" "', '', $links);
                $links = str_replace('class="  "', '', $links);
                $links = str_replace('  ', ' ', $links);
                
                echo $links;
            }
            ?>
        </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>
<?php }
