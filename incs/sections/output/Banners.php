<?php defined('ABSPATH') || exit;
/**
 * Render the Banners section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Banners_html($section_data) { ?>
<?php
    $slug = 'Banners';
    $slides = mthan_get_section_val($slug, $section_data, 'slides', array());
    if (empty($slides)) return;
?>
<section class="banner-section banner-one">
    <div class="banner-carousel owl-theme owl-carousel">
        <?php foreach ($slides as $slide) { ?>
        <?php 
            $btn1_link = mthan_get_link(isset($slide['btn1_link'])
                ? $slide['btn1_link']
                : '');
            $btn2_link = mthan_get_link(isset($slide['btn2_link'])
                ? $slide['btn2_link']
                : '');
            $img = mthan_sec_img(isset($slide['image'])
                ? $slide['image']
                : '');
            $subtitle = isset($slide['subtitle'])
                ? $slide['subtitle']
                : '';
            $title = isset($slide['title'])
                ? $slide['title']
                : '';
            $text = isset($slide['text'])
                ? $slide['text']
                : '';
        ?>
        <div class="slide-item">
            <div class="image-layer" style="background-image: url(<?php echo esc_url($img); ?>);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content clearfix">
                        <div class="inner">
                            <?php if ($subtitle) { ?>
                            <div class="subtitle">
                                <span class="icon"></span>
                                <?php echo esc_html($subtitle); ?>
                            </div>
                            <?php } ?>
                            <?php if ($title) { ?>
                            <h1>
                                <?php echo wp_kses_post($title); ?>
                            </h1>
                            <?php } ?>
                            <?php if ($text) { ?>
                            <div class="text">
                                <?php echo esc_html($text); ?>
                            </div>
                            <?php } ?>
                            <div class="link-box clearfix">
                                <?php if (!empty($slide['btn1_text'])) { ?>
                                <a href="<?php echo esc_url($btn1_link); ?>" class="theme-btn btn-style-one">
                                    <span class="btn-title">
                                        <?php echo esc_html($slide['btn1_text']); ?>
                                        <i class="arrow flaticon-play-button-1"></i>
                                    </span>
                                </a>
                                <?php } ?>
                                
                                <?php if (!empty($slide['btn2_text'])) { ?>
                                <a href="<?php echo esc_url($btn2_link); ?>" class="theme-btn btn-style-two">
                                    <span class="btn-title">
                                        <?php echo esc_html($slide['btn2_text']); ?>
                                        <i class="arrow flaticon-play-button-1"></i>
                                    </span>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php }
