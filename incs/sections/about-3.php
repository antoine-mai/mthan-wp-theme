<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the about-3 section.
 */
function mthan_section_about_3_html($section_data) {
    $slug  = 'about-3';
    $sub_title = mthan_get_section_val($slug, $section_data, 'subtitle', 'About Us');
    $title     = mthan_get_section_val($slug, $section_data, 'title', 'Professional Gardener');
    $content   = mthan_get_section_val($slug, $section_data, 'about_content', '');
    $image     = mthan_sec_img($slug, $section_data, 'image', get_template_directory_uri() . '/assets/images/resource/about-1.png');
    $sub_icon  = mthan_sec_img($slug, $section_data, 'subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-two.png');
    $q_text    = mthan_get_section_val($slug, $section_data, 'quote_text', '');
    $q_auth    = mthan_get_section_val($slug, $section_data, 'quote_author', '');
    $q_des     = mthan_get_section_val($slug, $section_data, 'quote_designation', '');
    $sig_img   = mthan_sec_img($slug, $section_data, 'signature_image', '');
    $iso_num   = mthan_get_section_val($slug, $section_data, 'iso_number', 'ISO 9001:2015');
    ?>
    <section class="about-three">
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
                        
                        <div class="quote-box">
                            <div class="quote">
                                <div class="quote-icon"></div>
                                <div class="quote-text"><?php echo esc_html($q_text); ?></div>
                                <div class="info">
                                    <span class="name"><?php echo esc_html($q_auth); ?></span> <span class="designation"><?php echo esc_html($q_des); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="lower-box clearfix">
                            <?php if($sig_img): ?>
                            <div class="signature"><img src="<?php echo esc_url($sig_img); ?>" alt="signature"></div>
                            <?php endif; ?>
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
                            <div class="caption">
                                <div class="big-txt">25</div>
                                <div class="txt">Years of <br>Experience</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}