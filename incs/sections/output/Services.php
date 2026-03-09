<?php defined('ABSPATH') || exit;

/**
 * Render the Services section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Services_html($section_data) { ?>
<?php
    $slug = 'Services';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if (is_front_page()) {
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    }

    $count = mthan_get_section_val($slug, $section_data, 'count', -1);

    $read_more = mthan_get_section_val($slug, $section_data, 'read_more_text', 'Read More');

    $title_icon = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle   = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title      = mthan_get_section_val($slug, $section_data, 'title');

    $columns   = mthan_get_section_val($slug, $section_data, 'columns', '3');
    $col_class = 'col-lg-4 col-md-6 col-sm-12'; // Default 3 columns

    if ($columns == '2') {
        $col_class = 'col-lg-6 col-md-6 col-sm-12';
    } elseif ($columns == '4') {
        $col_class = 'col-lg-3 col-md-6 col-sm-12';
    }

    $args = array(
        'post_type'      => 'mthan_service',
        'posts_per_page' => $count,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    $styles = mthan_section_styles($slug, $section_data);
    if (!$query->have_posts()) return;
?>
<section class="main-services <?php echo esc_attr($styles['class']); ?>" <?php echo $styles['style']; ?>>
    <div class="auto-container">
        <?php if ($title_icon || $subtitle || $title) { ?>
        <div class="sec-title text-center">
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
        <?php } ?>

        <div class="row clearfix">
            <?php while ($query->have_posts()) { 
                $query->the_post();
                $title = get_the_title();
                $img   = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $lnk   = get_permalink();
                
                $desc  = get_the_excerpt(); 
                
                $service_meta = get_post_meta(get_the_ID(), MTHAN_SERVICE_OPTIONS, true);
                $icon         = !empty($service_meta['service_icon']) ? $service_meta['service_icon'] : 'flaticon-hedge';
            ?>
            <!--Service block-->
            <div class="service-block <?php echo esc_attr($col_class); ?>">
                <div class="inner-box">
                    <div class="upper">
                        <?php if ($img) { ?>
                        <div class="image-box">
                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>">
                        </div>
                        <?php } ?>
                        <div class="hvr-icon"><?php echo mthan_get_icon_html($icon); ?></div>
                    </div>
                    <div class="lower">
                        <div class="icon-right"><?php echo mthan_get_icon_html($icon); ?></div>
                        <?php if ($title) { ?>
                        <h5><a href="<?php echo esc_url($lnk); ?>"><?php echo esc_html($title); ?></a></h5>
                        <?php } ?>
                        <?php if ($desc) { ?>
                        <div class="text"><?php echo wp_kses_post($desc); ?></div>
                        <?php } ?>
                        <?php if ($read_more) { ?>
                        <div class="more-link">
                            <a href="<?php echo esc_url($lnk); ?>">
                                <?php echo esc_html($read_more); ?> <i class="icon fa fa-caret-right"></i>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
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
