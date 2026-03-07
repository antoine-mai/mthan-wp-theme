<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Render the about-1 section.
 */
function mthan_section_about_1_html($section_data) { ?>
<?php
    
    $q_des     = mthan_get_section_val($slug, $section_data, 'quote_designation');
    $sig_img   = mthan_get_section_val($slug, $section_data, 'signature_image');
    $content   = mthan_get_section_val($slug, $section_data, 'about_content');
    $sub_icon  = mthan_get_section_val($slug, $section_data, 'subtitle_icon');
    $q_auth    = mthan_get_section_val($slug, $section_data, 'quote_author');
    $q_text    = mthan_get_section_val($slug, $section_data, 'quote_text');
    $anim_img  = mthan_get_section_val($slug, $section_data, 'anim_image');
    $vid_url   = mthan_get_section_val($slug, $section_data, 'video_url');
    $exp_count = mthan_get_section_val($slug, $section_data, 'exp_count');
    $sub_title = mthan_get_section_val($slug, $section_data, 'subtitle');
    $btn_text  = mthan_get_section_val($slug, $section_data, 'btn_text');
    $exp_text  = mthan_get_section_val($slug, $section_data, 'exp_text');
    $title     = mthan_get_section_val($slug, $section_data, 'title');
    $image     = mthan_get_section_val($slug, $section_data, 'image');
    $btn_link  = mthan_sec_link($slug, $section_data, 'btn_link');
    $slug      = 'about-1';
?>
<section class="about-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <div class="title-icon">
                            <span class="icon">
                                <img src="<?php echo esc_url($sub_icon); ?>" alt="icon" />
                            </span>
                        </div>
                        <div class="subtitle">
                            <?php echo esc_html($sub_title); ?>
                        </div>
                        <h2>
                            <?php echo esc_html($title); ?>
                        </h2>
                    </div>
                    <div class="text">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                    <div class="quote-box">
                        <?php if($vid_url) { ?>
                        <a href="<?php echo esc_url($vid_url); ?>" class="vid-link lightbox-image">
                            <span class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/quote-thumb.jpg" alt="" />
                            </span>
                            <span class="icon flaticon-play-button-1"></span>
                        </a>
                        <?php } ?>
                        <div class="quote">
                            <div class="quote-icon">
                                <span></span>
                            </div>
                            <div class="quote-text">
                                <?php echo esc_html($q_text); ?>
                            </div>
                            <div class="info">
                                <span class="name">
                                    <?php echo esc_html($q_auth); ?>
                                </span>
                                <span class="designation">
                                    <?php echo esc_html($q_des); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="link-box">
                            <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four">
                                <span class="btn-title"><?php echo esc_html($btn_text); ?>
                                    <i class="arrow flaticon-play-button-1"></i>
                                </span>
                            </a>
                        </div>
                        <?php if($sig_img) { ?>
                        <div class="signature">
                            <img src="<?php echo esc_url($sig_img); ?>" alt="">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image-box clearfix">
                        <figure class="image">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                        </figure>
                        <div class="anim-image">
                            <img src="<?php echo esc_url($anim_img); ?>" alt="">
                        </div>
                        <div class="caption">
                            <span class="icon flaticon-leaves"></span> 
                            <span class="big-txt">
                                <?php echo esc_html($exp_count); ?>
                            </span> 
                            <span class="txt">
                                <?php echo wp_kses_post($exp_text); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
<?php }