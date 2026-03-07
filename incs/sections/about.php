<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Render the about section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_about_html($section_data)
{
    $slug  = 'about';
    $style = mthan_get_section_val($slug, $section_data, 'section_style', '1');

    if ($style === '2') {
        mthan_section_about_html_2($section_data);
    } elseif ($style === '3') {
        mthan_section_about_html_3($section_data);
    } else {
        mthan_section_about_html_1($section_data);
    }
}

/**
 * Helper to get common data
 */
function mthan_get_about_common_data($section_data)
{
    $slug = 'about';
    return [
        'subtitle' => mthan_get_section_val($slug, $section_data, 'subtitle', 'About Us'),
        'title'    => mthan_get_section_val($slug, $section_data, 'title', 'Professional Gardener'),
        'text'     => mthan_get_section_val($slug, $section_data, 'text', ''),
        'text_2'   => mthan_get_section_val($slug, $section_data, 'text_2', ''),
        'btn_text' => mthan_get_section_val($slug, $section_data, 'btn_text', 'Read More'),
        'btn_link' => mthan_sec_link($slug, $section_data, 'btn_link', '#'),
        'video_link' => mthan_sec_link($slug, $section_data, 'about_video_link', '#'),
        'video_icon' => mthan_get_section_val($slug, $section_data, 'about_video_icon', 'flaticon-play-button-1'),

        'quote_text'  => mthan_get_section_val($slug, $section_data, 'about_quote_text', ''),
        'quote_name'  => mthan_get_section_val($slug, $section_data, 'about_quote_name', ''),
        'quote_desig' => mthan_get_section_val($slug, $section_data, 'about_quote_designation', ''),

        'cert_title'  => mthan_get_section_val($slug, $section_data, 'about_cert_title', 'Certified Company'),
        'cert_number' => mthan_get_section_val($slug, $section_data, 'about_cert_number', 'ISO 9001:2015'),

        'subtitle_icon' => mthan_sec_img($slug, $section_data, 'about_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-two.png'),
        'signature'     => mthan_sec_img($slug, $section_data, 'about_signature', get_template_directory_uri() . '/assets/images/resource/signature-1.png'),
        'feat_img'      => mthan_sec_img($slug, $section_data, 'about_featured_image', get_template_directory_uri() . '/assets/images/resource/featured-image-1.jpg'),
        'anim_img'      => mthan_sec_img($slug, $section_data, 'about_anim_image', get_template_directory_uri() . '/assets/images/resource/anim-image-1.png'),
        'vid_thumb'     => mthan_sec_img($slug, $section_data, 'about_vid_thumb', get_template_directory_uri() . '/assets/images/resource/vid-thumb-1.jpg'),
        'iso_icon'      => mthan_sec_img($slug, $section_data, 'about_iso_icon', get_template_directory_uri() . '/assets/images/icons/iso-icon.png'),
        
        'experience_year' => mthan_get_section_val($slug, $section_data, 'about_exp_years', '16'),
        'experience_text' => mthan_get_section_val($slug, $section_data, 'about_exp_text', 'Years <br>of Experience'),
    ];
}

/**
 * Style 1 Rendering
 */
function mthan_section_about_html_1($section_data)
{
    $slug = 'about';
    $common = mthan_get_about_common_data($section_data);
    $projects_count = mthan_get_section_val($slug, $section_data, 'about_projects_count', '2k');
    $projects_text  = mthan_get_section_val($slug, $section_data, 'about_projects_text', 'Projects <br>were completed');
    $projects_icon  = mthan_get_section_val($slug, $section_data, 'about_projects_icon', 'flaticon-leaves');
    $quote_thumb    = mthan_sec_img($slug, $section_data, 'about_quote_thumb', get_template_directory_uri() . '/assets/images/resource/quote-thumb.jpg');
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
                                <img src="<?php echo esc_url($common['subtitle_icon']); ?>" alt="<?php echo esc_attr($common['subtitle']); ?>" title="<?php echo esc_attr($common['subtitle']); ?>">
                            </span>
                        </div>
                        <div class="subtitle">
                            <?php echo esc_html($common['subtitle']); ?>
                        </div>
                        <h2>
                            <?php echo esc_html($common['title']); ?>
                        </h2>
                    </div>
                    <div class="text">
                        <?php if ($common['text']) { ?>
                        <p class="bigger-text">
                            <?php echo esc_html($common['text']); ?>
                        </p>
                        <?php } ?>
                        <?php if ($common['text_2']) { ?>
                        <p>
                            <?php echo esc_html($common['text_2']); ?>
                        </p>
                        <?php } ?>
                    </div>
                    <div class="quote-box">
                        <a href="<?php echo esc_url($common['video_link']); ?>" class="vid-link lightbox-image">
                            <span class="image">
                                <img src="<?php echo esc_url($quote_thumb); ?>" alt="<?php echo esc_attr($common['quote_name']); ?>" title="<?php echo esc_attr($common['quote_name']); ?>" />
                            </span>
                            <span class="icon <?php echo esc_attr($common['video_icon']); ?>"></span>
                        </a>
                        <div class="quote">
                            <div class="quote-icon">
                                <span></span>
                            </div>
                            <div class="quote-text">
                                <?php echo esc_html($common['quote_text']); ?>
                            </div>
                            <div class="info">
                                <span class="name">
                                    <?php echo esc_html($common['quote_name']); ?>
                                </span>
                                <span class="designation">
                                    <?php echo esc_html($common['quote_desig']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="link-box">
                            <a href="<?php echo esc_url($common['btn_link']); ?>" class="theme-btn btn-style-four">
                                <span class="btn-title">
                                    <?php echo esc_html($common['btn_text']); ?>
                                    <i class="arrow flaticon-play-button-1"></i>
                                </span>
                            </a>
                        </div>
                        <div class="signature">
                            <img src="<?php echo esc_url($common['signature']); ?>" alt="<?php echo esc_attr($common['quote_name']); ?> Signature" />
                        </div>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image-box clearfix">
                        <figure class="image">
                            <img src="<?php echo esc_url($common['feat_img']); ?>" alt="<?php echo esc_attr($common['title']); ?>" title="<?php echo esc_attr($common['title']); ?>" />
                        </figure>
                        <div class="anim-image">
                            <img src="<?php echo esc_url($common['anim_img']); ?>" alt="<?php echo esc_attr($common['title']); ?>" title="<?php echo esc_attr($common['title']); ?>" />
                        </div>
                        <div class="caption">
                            <span class="icon <?php echo esc_attr($projects_icon); ?>"></span>
                            <span class="big-txt">
                                <?php echo esc_html($projects_count); ?>
                            </span>
                            <span class="txt">
                                <?php echo wp_kses_post($projects_text); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}?>

<?php function mthan_section_about_html_2($section_data)
{
    $slug = 'about';
    $common = mthan_get_about_common_data($section_data);
    $insured_title = mthan_get_section_val($slug, $section_data, 'about_insured_title', 'Fully Insured');
    $insured_text  = mthan_get_section_val($slug, $section_data, 'about_insured_text', '');
    $insured_icon  = mthan_get_section_val($slug, $section_data, 'about_insured_icon', 'flaticon-insurance');
    $anim_img_2    = mthan_sec_img($slug, $section_data, 'about_anim_image', get_template_directory_uri() . '/assets/images/resource/anim-image-3.png');
?>
<section class="about-two">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <div class="title-icon">
                            <span class="icon">
                                <img src="<?php echo esc_url($common['subtitle_icon']); ?>" alt="<?php echo esc_attr($common['subtitle']); ?>" title="<?php echo esc_attr($common['subtitle']); ?>" />
                            </span>
                        </div>
                        <div class="subtitle">
                            <?php echo esc_html($common['subtitle']); ?>
                        </div>
                        <h2>
                            <?php echo esc_html($common['title']); ?>
                        </h2>
                    </div>
                    <div class="text">
                        <?php if ($common['text']) { ?>
                        <p class="bigger-text">
                            <?php echo esc_html($common['text']); ?>
                        </p>
                        <?php } ?>
                        <?php if ($common['text_2']) { ?>
                        <p>
                            <?php echo esc_html($common['text_2']); ?>
                        </p>
                        <?php } ?>
                    </div>
                    <div class="insured">
                        <div class="icon">
                            <span class="<?php echo esc_attr($insured_icon); ?>"></span>
                        </div>
                        <h5>
                            <?php echo esc_html($insured_title); ?>
                        </h5>
                        <div class="text">
                            <?php echo esc_html($insured_text); ?>
                        </div>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="link-box">
                            <a href="<?php echo esc_url($common['btn_link']); ?>" class="theme-btn btn-style-three alternate">
                                <span class="btn-title">
                                    <?php echo esc_html($common['btn_text']); ?>
                                    <i class="arrow flaticon-play-button-1"></i>
                                </span>
                            </a>
                        </div>
                        <div class="iso">
                            <div class="iso-icon">
                                <span class="icon">
                                    <img src="<?php echo esc_url($common['iso_icon']); ?>" alt="<?php echo esc_attr($common['cert_title']); ?>" title="<?php echo esc_attr($common['cert_title']); ?>" />
                                </span>
                            </div>
                            <div class="txt">
                                <?php echo esc_html($common['cert_title']); ?>
                            </div>
                            <div class="number">
                                <?php echo esc_html($common['cert_number']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image-box">
                        <figure class="image">
                            <img src="<?php echo esc_url($anim_img_2); ?>" alt="<?php echo esc_attr($common['title']); ?>" title="<?php echo esc_attr($common['title']); ?>" />
                        </figure>
                        <a href="<?php echo esc_url($common['video_link']); ?>" class="vid-link lightbox-image">
                            <span class="image">
                                <img src="<?php echo esc_url($common['vid_thumb']); ?>" alt="<?php echo esc_attr($common['title']); ?>" title="<?php echo esc_attr($common['title']); ?>" />
                            </span>
                            <span class="icon <?php echo esc_attr($common['video_icon']); ?>"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}?>

<?php function mthan_section_about_html_3($section_data)
{
    $slug = 'about';
    $common = mthan_get_about_common_data($section_data);
    $feat_img_3  = mthan_sec_img($slug, $section_data, 'about_featured_image', get_template_directory_uri() . '/assets/images/resource/featured-image-12.jpg');
    $vid_thumb_3 = mthan_sec_img($slug, $section_data, 'about_vid_thumb', get_template_directory_uri() . '/assets/images/resource/vid-thumb-2.jpg');
?>
<section class="about-three">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <div class="title-icon">
                            <span class="icon">
                                <img src="<?php echo esc_url($common['subtitle_icon']); ?>" alt="<?php echo esc_attr($common['subtitle']); ?>" title="<?php echo esc_attr($common['subtitle']); ?>" />
                            </span>
                        </div>
                        <div class="subtitle">
                            <?php echo esc_html($common['subtitle']); ?>
                        </div>
                        <h2>
                            <?php echo esc_html($common['title']); ?>
                        </h2>
                    </div>
                    <div class="text">
                        <?php if ($common['text']) { ?>
                        <p class="bigger-text">
                            <?php echo esc_html($common['text']); ?>
                        </p>
                        <?php } ?>
                        <?php if ($common['text_2']) { ?>
                        <p>
                            <?php echo esc_html($common['text_2']); ?>
                        </p>
                        <?php } ?>
                    </div>
                    <div class="quote-box">
                        <a href="<?php echo esc_url($common['video_link']); ?>" class="vid-link lightbox-image">
                            <span class="image">
                                <img src="<?php echo esc_url($vid_thumb_3); ?>" alt="<?php echo esc_attr($common['title']); ?>" title="<?php echo esc_attr($common['title']); ?>" />
                            </span>
                            <span class="icon <?php echo esc_attr($common['video_icon']); ?>"></span>
                        </a>
                        <div class="quote">
                            <div class="quote-icon">
                                <span></span>
                            </div>
                            <div class="quote-text">
                                <?php echo esc_html($common['quote_text']); ?>
                            </div>
                            <div class="info">
                                <span class="name">
                                    <?php echo esc_html($common['quote_name']); ?>
                                </span>
                                <span class="designation">
                                    <?php echo esc_html($common['quote_desig']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="lower-text">
                        <?php echo esc_html($common['text']); ?>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="signature">
                            <img src="<?php echo esc_url($common['signature']); ?>" alt="<?php echo esc_attr($common['quote_name']); ?> Signature">
                        </div>
                        <div class="iso">
                            <div class="iso-icon">
                                <span class="icon">
                                    <img src="<?php echo esc_url($common['iso_icon']); ?>" alt="<?php echo esc_attr($common['cert_title']); ?>" title="<?php echo esc_attr($common['cert_title']); ?>">
                                </span>
                            </div>
                            <div class="txt">
                                <?php echo esc_html($common['cert_title']); ?>
                            </div>
                            <div class="number">
                                <?php echo esc_html($common['cert_number']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image-box clearfix">
                        <figure class="image">
                            <img src="<?php echo esc_url($feat_img_3); ?>" alt="<?php echo esc_attr($common['title']); ?>" title="<?php echo esc_attr($common['title']); ?>">
                        </figure>
                        <div class="caption">
                            <span class="big-txt">
                                <?php echo esc_html($common['experience_year']); ?>
                            </span>
                            <span class="txt">
                                <?php echo wp_kses_post($common['experience_text']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}