<?php defined('ABSPATH') || exit;

/**
 * Render the Gallery Grid 4 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_GalleryGrid4_html($section_data) { ?>
<?php
    $slug = 'GalleryGrid4';
    $title_icon  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle    = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title       = mthan_get_section_val($slug, $section_data, 'title');
    $description = mthan_get_section_val($slug, $section_data, 'description');
    
    $filters     = mthan_get_section_val($slug, $section_data, 'filters', array());
    $items       = mthan_get_section_val($slug, $section_data, 'items', array());
    
    $footer_type = mthan_get_section_val($slug, $section_data, 'footer_type', 'pagination');
    $styles = mthan_section_styles($slug, $section_data);
?>
<section class="gallery-section <?php echo esc_attr($styles['class']); ?>" <?php echo $styles['style']; ?>>
    <div class="auto-container">
        <!-- Title Box -->
        <div class="title-box">
            <div class="row clearfix">
                <div class="left-col col-xl-6 col-lg-12 col-md-12">
                    <div class="sec-title alternate">
                        <?php if ($title_icon) { ?>
                        <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($title_icon); ?>" alt="icon"></span></div>
                        <?php } ?>
                        <?php if ($subtitle) { ?>
                        <div class="subtitle"><?php echo esc_html($subtitle); ?></div>
                        <?php } ?>
                        <?php if ($title) { ?>
                        <h2><?php echo esc_html($title); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($description) { ?>
                <div class="right-col col-xl-6 col-lg-12 col-md-12">
                    <div class="text"><?php echo wp_kses_post($description); ?></div>
                </div>
                <?php } ?>
            </div>
        </div>

        <!--MixitUp Gallery-->
        <div class="mixitup-gallery">
            <!--Filter-->
            <?php if (!empty($filters)) { ?>
            <div class="gallery-filters style-two centered clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <?php 
                    $first = true;
                    foreach ($filters as $f) {
                        $f_label = isset($f['label']) ? $f['label'] : '';
                        $f_slug  = isset($f['slug']) ? $f['slug'] : 'all';
                        $f_count = isset($f['count']) ? $f['count'] : '';
                        $active_class = $first ? 'active' : '';
                        
                        // Ensure slug starts with a dot if not 'all'
                        if ($f_slug !== 'all' && strpos($f_slug, '.') !== 0) {
                            $f_slug = '.' . $f_slug;
                        }
                    ?>
                    <li class="<?php echo esc_attr($active_class); ?> filter" data-role="button" data-filter="<?php echo esc_attr($f_slug); ?>">
                        <?php echo esc_html($f_label); ?>
                        <?php if ($f_count !== '') { ?>
                        <span class="count"><?php echo esc_html($f_count); ?></span>
                        <?php } ?>
                    </li>
                    <?php $first = false; } ?>
                </ul>
            </div>
            <?php } ?>

            <!-- Filter List -->
            <?php if (!empty($items)) { ?>
            <div class="filter-list row clearfix">
                <?php foreach ($items as $item) { 
                    $item_title = isset($item['title']) ? $item['title'] : '';
                    $item_cat   = isset($item['category']) ? $item['category'] : '';
                    $item_fil   = isset($item['filters']) ? $item['filters'] : '';
                    $item_img   = mthan_sec_img(isset($item['image']) ? $item['image'] : '');
                    $item_lnk   = mthan_get_link(isset($item['link']) ? $item['link'] : '#');
                ?>
                <!-- Gallery Item -->
                <div class="gallery-item-three mix all <?php echo esc_attr($item_fil); ?> col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <?php if ($item_img) { ?>
                        <div class="image-box">
                            <img src="<?php echo esc_url($item_img); ?>" alt="<?php echo esc_attr($item_title); ?>">
                        </div>
                        <?php } ?>
                        <div class="link-box"><a href="<?php echo esc_url($item_lnk); ?>"><span class="icon flaticon-right-arrow-1"></span></a></div>
                        <div class="hover-box">
                            <div class="hvr-content">
                                <?php if ($item_cat) { ?>
                                <div class="cat"><a href="<?php echo esc_url($item_lnk); ?>"><?php echo esc_html($item_cat); ?></a></div>
                                <?php } ?>
                                <?php if ($item_title) { ?>
                                <h5><a href="<?php echo esc_url($item_lnk); ?>"><?php echo esc_html($item_title); ?></a></h5>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>

        </div>
    </div>
</section>
<?php }
