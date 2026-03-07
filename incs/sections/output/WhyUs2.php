<?php defined('ABSPATH') || exit;

/**
 * Render the Why Us 2 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_WhyUs2_html($section_data) { ?>
<?php
    $slug = 'WhyUs2';
    $bg_img       = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'bg_image'));
    $rating_count = mthan_get_section_val($slug, $section_data, 'rating_count');
    $rating_text  = mthan_get_section_val($slug, $section_data, 'rating_text');
    $floated_text = mthan_get_section_val($slug, $section_data, 'floated_text');
    $title_icon   = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle     = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title        = mthan_get_section_val($slug, $section_data, 'title');
    $description  = mthan_get_section_val($slug, $section_data, 'description');
    $features     = mthan_get_section_val($slug, $section_data, 'features');
    $btn_text     = mthan_get_section_val($slug, $section_data, 'btn_text');
    $btn_link     = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn_link'));
    $items        = mthan_get_section_val($slug, $section_data, 'items', array());
?>
<section class="why-us-two">
    <div class="outer-container">
        <div class="row clearfix">
            <!--Left Column-->
            <div class="left-col col-lg-6 col-md-12 col-sm-12">
                <?php if ($bg_img) { ?>
                <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_img); ?>);"></div>
                <?php } ?>
                <div class="inner clearfix">
                    <div class="content-box">
                        <div class="rating">
                            <div class="stars"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                            <?php if ($rating_count) { ?>
                            <div class="count"><?php echo esc_html($rating_count); ?></div>
                            <?php } ?>
                            <?php if ($rating_text) { ?>
                            <div class="rate-text"><?php echo wp_kses_post($rating_text); ?></div>
                            <?php } ?>
                        </div>
                        <?php if ($floated_text) { ?>
                        <div class="floated-text">
                            <div class="floated-inner">
                                <span class="txt"><?php echo esc_html($floated_text); ?></span>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="pattern"></div>
                        <div class="content">
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
                            <?php if ($description) { ?>
                            <div class="text"><?php echo wp_kses_post($description); ?></div>
                            <?php } ?>
                            
                            <?php if ($features) { 
                                $feature_list = explode("\n", str_replace("\r", "", $features));
                            ?>
                            <ul>
                                <?php foreach ($feature_list as $feature) { 
                                    if (trim($feature)) {
                                        echo '<li>' . esc_html(trim($feature)) . '</li>';
                                    }
                                } ?>
                            </ul>
                            <?php } ?>

                            <?php if ($btn_text) { ?>
                            <div class="link-box">
                                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four">
                                    <span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--Right Column-->
            <div class="right-col col-lg-6 col-md-12 col-sm-12">
                <div class="pattern-layer"></div>

                <div class="inner clearfix">
                    <div class="row clearfix">
                        <?php foreach ($items as $item) { 
                            $tit  = isset($item['title']) ? $item['title'] : '';
                            $icon = isset($item['icon']) ? $item['icon'] : '';
                            $txt  = isset($item['text']) ? $item['text'] : '';
                            $lnk  = mthan_get_link(isset($item['link']) ? $item['link'] : '');
                        ?>
                        <!--Why Block-->
                        <div class="why-block-two col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><?php echo mthan_get_icon_html($icon); ?></div>
                                <?php if ($tit) { ?>
                                <h5><?php echo esc_html($tit); ?></h5>
                                <?php } ?>
                                <?php if ($txt) { ?>
                                <div class="text"><?php echo wp_kses_post($txt); ?></div>
                                <?php } ?>
                                <div class="link-box"><a href="<?php echo esc_url($lnk); ?>"><span class="flaticon-right-1"></span></a></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<?php }
