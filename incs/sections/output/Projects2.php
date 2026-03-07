<?php defined('ABSPATH') || exit;

/**
 * Render the Projects 2 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Projects2_html($section_data) { ?>
<?php
    $slug = 'Projects2';
    $title_icon = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle   = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title      = mthan_get_section_val($slug, $section_data, 'title');
    $btn_text   = mthan_get_section_val($slug, $section_data, 'btn_text');
    $btn_link   = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn_link'));
    $items      = mthan_get_section_val($slug, $section_data, 'items', array());

    if (empty($items)) return;
?>
<section class="projects-two">
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
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four">
                    <span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span>
                </a>
            </div>
            <?php } ?>
        </div>

        <div class="masonry-box">
            <div class="row masonry-container clearfix">
                <?php foreach ($items as $item) { 
                    $img    = mthan_sec_img(isset($item['image']) ? $item['image'] : '');
                    $cat    = isset($item['category']) ? $item['category'] : '';
                    $cat_l  = mthan_get_link(isset($item['category_link']) ? $item['category_link'] : '');
                    $i_tit  = isset($item['title']) ? $item['title'] : '';
                    $i_link = mthan_get_link(isset($item['link']) ? $item['link'] : '');
                    $width  = isset($item['width']) ? $item['width'] : 'col-lg-3 col-md-6 col-sm-12';
                ?>
                <!--Project Block-->
                <div class="project-block-two masonry-item <?php echo esc_attr($width); ?>">
                    <div class="inner-box">
                        <?php if ($img) { ?>
                        <div class="image-box">
                            <img src="<?php echo esc_url($img); ?>" alt="image">
                        </div>
                        <?php } ?>
                        <div class="hover-box">
                            <div class="hvr-content">
                                <?php if ($cat) { ?>
                                <div class="cat"><a href="<?php echo esc_url($cat_l); ?>"><?php echo esc_html($cat); ?></a></div>
                                <?php } ?>
                                <?php if ($i_tit) { ?>
                                <h5><a href="<?php echo esc_url($i_link); ?>"><?php echo esc_html($i_tit); ?></a></h5>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php }
