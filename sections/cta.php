<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the cta section instance.
 * @return array
 */
function mthan_section_cta_options()
{
    return array(
        array(
            'id'      => 'cta_style',
            'type'    => 'select',
            'title'   => 'Style',
            'options' => array(
                '1' => 'Style 1 (Standard)',
                '2' => 'Style 2 (With Background)',
            ),
            'default' => '1',
        ),
        // Style 1 Fields
        array(
            'id'    => 'cta_heading',
            'type'  => 'text',
            'title' => 'Heading',
            'default' => 'Do you need tree care for your home?',
            'dependency' => array('cta_style', '==', '1'),
        ),
        array(
            'id'    => 'cta_btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'Send Message',
            'dependency' => array('cta_style', '==', '1'),
        ),
        mthan_page_select_field('cta_btn_link', 'Button Link', array('dependency' => array('cta_style', '==', '1'))),
        array(
            'id'    => 'cta_phone',
            'type'  => 'text',
            'title' => 'Phone',
            'default' => '+31 65 792 63 11',
            'dependency' => array('cta_style', '==', '1'),
        ),
        // Style 2 Fields
        array(
            'id'    => 'cta_bg_2',
            'type'  => 'media',
            'title' => 'Background Image',
            'library' => 'image',
            'dependency' => array('cta_style', '==', '2'),
        ),
        array(
            'id'    => 'cta_heading_2',
            'type'  => 'textarea',
            'title' => 'Heading (HTML supported)',
            'default' => 'In Need of  Gardening & Landscaping <br>Maintenence Service?',
            'dependency' => array('cta_style', '==', '2'),
        ),
        array(
            'id'    => 'cta_btn1_text_2',
            'type'  => 'text',
            'title' => 'Button 1 Text',
            'default' => 'Commercial',
            'dependency' => array('cta_style', '==', '2'),
        ),
        mthan_page_select_field('cta_btn1_link_2', 'Button 1 Link', array('dependency' => array('cta_style', '==', '2'))),
        array(
            'id'    => 'cta_btn2_text_2',
            'type'  => 'text',
            'title' => 'Button 2 Text',
            'default' => 'Residential',
            'dependency' => array('cta_style', '==', '2'),
        ),
        mthan_page_select_field('cta_btn2_link_2', 'Button 2 Link', array('dependency' => array('cta_style', '==', '2'))),
    );
}

/**
 * Render the call-to-action section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_cta_html($section_data) { 
    $slug = 'cta';
    $style = mthan_get_section_val($slug, $section_data, 'style', '1');
    
    if ($style === '2') {
        mthan_section_cta_html_2($section_data);
        return;
    }

    $heading  = mthan_get_section_val($slug, $section_data, 'heading', 'Do you need tree care for your home?');
    $btn_text = mthan_get_section_val($slug, $section_data, 'btn_text', 'Send Message');
    $btn_link_id = mthan_get_section_val($slug, $section_data, 'btn_link', '#');
    $btn_link = is_numeric($btn_link_id) ? get_permalink($btn_link_id) : $btn_link_id;
    $phone    = mthan_get_section_val($slug, $section_data, 'phone', '+31 65 792 63 11');
?>
<section class="call-to-action">
    <div class="auto-container">
        <div class="row clearfix">
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
    $btn1_link_id = mthan_get_section_val($slug, $section_data, 'btn1_link_2', '#');
    $btn1_link = is_numeric($btn1_link_id) ? get_permalink($btn1_link_id) : $btn1_link_id;
    $btn2_text = mthan_get_section_val($slug, $section_data, 'btn2_text_2', 'Residential');
    $btn2_link_id = mthan_get_section_val($slug, $section_data, 'btn2_link_2', '#');
    $btn2_link = is_numeric($btn2_link_id) ? get_permalink($btn2_link_id) : $btn2_link_id;
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
