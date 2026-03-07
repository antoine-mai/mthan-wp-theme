<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the call-to-action section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_cta_html($section_data) { 
    $slug  = 'cta';
    $style = mthan_get_section_val($slug, $section_data, 'section_style', '1');
    
    if ($style === '2') {
        mthan_section_cta_html_2($section_data);
        return;
    }

    $heading  = mthan_get_section_val($slug, $section_data, 'heading', 'Do you need tree care for your home?');
    $btn_text = mthan_get_section_val($slug, $section_data, 'btn_text', 'Send Message');
    $btn_link = mthan_sec_link($slug, $section_data, 'btn_link', '#');
    $phone    = mthan_get_section_val($slug, $section_data, 'phone', '+31 65 792 63 11');
?>
<section class="call-to-action">
    <div class="auto-container">
        <div class="row clearfix align-items-center">
            <div class="title-col col-xl-7 col-lg-12 col-md-12">
                <div class="inner">
                    <h4>
                        <?php echo esc_html($heading); ?>
                    </h4>
                </div>
            </div>
            <div class="info-col col-xl-5 col-lg-12 col-md-12">
                <div class="inner clearfix">
                    <ul class="info clearfix">
                        <li><a href="<?php echo esc_url($btn_link); ?>"><span><?php echo esc_html($btn_text); ?></span> <i class="arrow flaticon-play-button-1"></i></a></li>
                        <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><span><?php echo esc_html($phone); ?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}

/**
 * Style 2 for CTA
 */
function mthan_section_cta_html_2($section_data) {
    $slug = 'cta';
    $bg_image  = mthan_sec_img($slug, $section_data, 'bg_2', get_template_directory_uri() . '/assets/images/background/call-to-bg.jpg');
    $heading   = mthan_get_section_val($slug, $section_data, 'heading_2', 'In Need of  Gardening & Landscaping <br>Maintenence Service?');
    $btn1_text = mthan_get_section_val($slug, $section_data, 'btn1_text_2', 'Commercial');
    $btn1_link = mthan_sec_link($slug, $section_data, 'btn1_link_2', '#');
    $btn2_text = mthan_get_section_val($slug, $section_data, 'btn2_text_2', 'Residential');
    $btn2_link = mthan_sec_link($slug, $section_data, 'btn2_link_2', '#');
?>
<section class="call-to-two">
    <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="title-col col-xl-7 col-lg-6 col-md-12">
                <div class="inner">
                    <h4><?php echo wp_kses_post($heading); ?></h4>
                </div>
            </div>
            <div class="links-col col-xl-5 col-lg-6 col-md-12">
                <div class="inner clearfix">
                    <ul class="clearfix">
                        <?php if ($btn1_text) { ?>
                        <li><a href="<?php echo esc_url($btn1_link); ?>" class="theme-btn btn-style-four"><span class="btn-title"><?php echo esc_html($btn1_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a></li>
                        <?php } ?>
                        <?php if ($btn2_text) { ?>
                        <li><a href="<?php echo esc_url($btn2_link); ?>" class="theme-btn btn-style-five"><span class="btn-title"><?php echo esc_html($btn2_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
