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

    $args = array(
        'post_type'      => 'mthan_service',
        'posts_per_page' => $count,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    if (!$query->have_posts()) return;
?>
<section class="main-services">
    <div class="auto-container">
        <div class="row clearfix">
            <?php while ($query->have_posts()) { 
                $query->the_post();
                $title = get_the_title();
                $img   = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $lnk   = get_permalink();
                
                $desc  = get_the_excerpt(); 
                
                $icon  = get_post_meta(get_the_ID(), 'service_icon', true);
                if (empty($icon)) $icon = 'flaticon-hedge';
            ?>
            <!--Service block-->
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
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
                        <div class="more-link">
                            <a href="<?php echo esc_url($lnk); ?>">
                                <?php esc_html_e('Read More', 'mthan'); ?> <i class="icon fa fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <?php if ($query->max_num_pages > 1) : ?>
        <div class="pagination-box text-center">
            <style>.styled-pagination { padding: 0 !important; }</style>
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
            
            // Fix for theme style: 
            $links = str_replace('page-numbers', 'styled-pagination', $links);
            // Robust replacement for current page span
            $links = preg_replace('/<span[^>]*class=["\'][^"\']*current[^"\']*["\'][^>]*>([0-9]+)<\/span>/', '<a href="#" class="active">$1</a>', $links);
            // Mark prev/next with 'control' class
            $links = str_replace('class="prev styled-pagination"', 'class="prev styled-pagination control"', $links);
            $links = str_replace('class="next styled-pagination"', 'class="next styled-pagination control"', $links);
            
            echo $links;
            ?>
        </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>
<?php }
