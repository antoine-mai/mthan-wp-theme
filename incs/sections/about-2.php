<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the about-2 section.
 */
function mthan_section_about_2_html($section_data) {
    $slug  = 'about-2';
    $sub_title = mthan_get_section_val($slug, $section_data, 'subtitle', 'About Us');
    $title     = mthan_get_section_val($slug, $section_data, 'title', 'Professional Gardener');
    $content   = mthan_get_section_val($slug, $section_data, 'about_content', '');
    $image     = mthan_sec_img($slug, $section_data, 'image', get_template_directory_uri() . '/assets/images/resource/about-1.png');
    $sub_icon  = mthan_sec_img($slug, $section_data, 'subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-two.png');
    $btn_text  = mthan_get_section_val($slug, $section_data, 'btn_text', 'Read More');
    $btn_link  = mthan_sec_link($slug, $section_data, 'btn_link', '#');
    $vid_url   = mthan_get_section_val($slug, $section_data, 'video_url', '#');
    $ins_title = mthan_get_section_val($slug, $section_data, 'insured_title', 'Fully Insured');
    $ins_text  = mthan_get_section_val($slug, $section_data, 'insured_text', '');
    $iso_num   = mthan_get_section_val($slug, $section_data, 'iso_number', 'ISO 9001:2015');
    ?>
    <section class="about-two">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Text Column-->
                <div class="text-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($sub_icon); ?>" alt="icon"></span></div>
                            <div class="subtitle"><?php echo esc_html($sub_title); ?></div>
                            <h2><?php echo esc_html($title); ?></h2>
                        </div>
                        <div class="text"><?php echo wp_kses_post($content); ?></div>
                        <div class="insured">
                            <div class="icon"><span class="flaticon-reward"></span></div>
                            <h5><?php echo esc_html($ins_title); ?></h5>
                            <div class="text"><?php echo esc_html($ins_text); ?></div>
                        </div>
                        <div class="lower-box clearfix">
                            <div class="link-box">
                                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four"><span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a>
                            </div>
                            <div class="iso">
                                <div class="iso-icon"><span class="flaticon-null-1"></span></div>
                                <div class="number"><?php echo esc_html($iso_num); ?></div>
                                <div class="txt">Certified Company</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="image-box">
                            <div class="image"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"></div>
                            <?php if($vid_url): ?>
                            <a href="<?php echo esc_url($vid_url); ?>" class="vid-link lightbox-image"><span class="icon flaticon-play-button-1"></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-text.png" alt=""></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}