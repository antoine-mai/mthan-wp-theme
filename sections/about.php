<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the about section instance.
 * @return array
 */
function mthan_section_about_options()
{
    return array(
        array(
            'id' => 'about_subtitle',
            'type' => 'text',
            'title' => 'Subtitle (small label)',
            'default' => 'About Us',
        ),
        array(
            'id' => 'about_title',
            'type' => 'text',
            'title' => 'Section Title (H2)',
            'default' => 'Professional Gardener',
        ),
        array(
            'id' => 'about_text',
            'type' => 'textarea',
            'title' => 'Description (Style 1)',
            'default' => 'Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.',
        ),
        // Style 1 specific fields
        array(
            'id' => 'about_1_projects_count',
            'type' => 'text',
            'title' => 'Style 1 - Projects Count',
            'default' => '2k',
            'dependency' => array('section_style', '==', '1'),
        ),
        array(
            'id' => 'about_1_projects_text',
            'type' => 'text',
            'title' => 'Style 1 - Projects Text',
            'default' => 'Projects <br>were completed',
            'dependency' => array('section_style', '==', '1'),
        ),
        array(
            'id' => 'about_1_quote_text',
            'type' => 'textarea',
            'title' => 'Style 1 - Quote Text',
            'default' => '“Our Company has established a reputation as the leader in landscape design.”',
            'dependency' => array('section_style', '==', '1'),
        ),
        array(
            'id' => 'about_1_quote_name',
            'type' => 'text',
            'title' => 'Style 1 - Quote Name',
            'default' => 'Chris Stanley,',
            'dependency' => array('section_style', '==', '1'),
        ),
        array(
            'id' => 'about_1_quote_designation',
            'type' => 'text',
            'title' => 'Style 1 - Quote Designation',
            'default' => 'Founder of Pruners',
            'dependency' => array('section_style', '==', '1'),
        ),
        
        // Style 2 specific fields
        array(
            'id' => 'about_2_insured_title',
            'type' => 'text',
            'title' => 'Style 2 - Insured Title',
            'default' => 'Fully Insured',
            'dependency' => array('section_style', '==', '2'),
        ),
        array(
            'id' => 'about_2_insured_text',
            'type' => 'textarea',
            'title' => 'Style 2 - Insured Text',
            'default' => 'Indignation and dislike men who are so that our garden therefore always holds in these matters too this stone has beguiled and occur demoralized.',
            'dependency' => array('section_style', '==', '2'),
        ),
        array(
            'id' => 'about_2_cert_title',
            'type' => 'text',
            'title' => 'Style 2 - Certificate Title',
            'default' => 'Certified Company',
            'dependency' => array('section_style', '==', '2'),
        ),
        array(
            'id' => 'about_2_cert_number',
            'type' => 'text',
            'title' => 'Style 2 - Certificate Number',
            'default' => 'ISO 9001:2015',
            'dependency' => array('section_style', '==', '2'),
        ),

        // Style 3 specific fields
        array(
            'id' => 'about_3_exp_years',
            'type' => 'text',
            'title' => 'Style 3 - Experience Years',
            'default' => '16',
            'dependency' => array('section_style', '==', '3'),
        ),
        array(
            'id' => 'about_3_exp_text',
            'type' => 'text',
            'title' => 'Style 3 - Experience Text',
            'default' => 'Years <br>of Experience',
            'dependency' => array('section_style', '==', '3'),
        ),
        array(
            'id' => 'about_image_1',
            'type' => 'media',
            'title' => 'Image 1 (Main)',
            'library' => 'image',
        ),
        array(
            'id' => 'about_video_link',
            'type' => 'text',
            'title' => 'Video Link',
            'default' => 'https://www.youtube.com/watch?v=CB_rXABU8DI',
        ),
        array(
            'id' => 'about_btn_text',
            'type' => 'text',
            'title' => 'Button Text',
            'default' => 'Read More',
        ),
        array(
            'id' => 'about_btn_link',
            'type' => 'text',
            'title' => 'Button Link',
            'default' => 'about.html',
        )
    );
}

/**
 * Render the about section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_about_html($section_data) { ?>
<?php 
    $sec_subtitle = !empty($section_data['about_subtitle']) ? $section_data['about_subtitle'] : 'About Us';
    $sec_title = !empty($section_data['about_title']) ? $section_data['about_title'] : 'Professional Gardener';
    $sec_text = !empty($section_data['about_text']) ? $section_data['about_text'] : 'Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.';

    $projects_count = !empty($section_data['about_1_projects_count']) ? $section_data['about_1_projects_count'] : '2k';
    $projects_text = !empty($section_data['about_1_projects_text']) ? $section_data['about_1_projects_text'] : 'Projects <br>were completed';
    $quote_text = !empty($section_data['about_1_quote_text']) ? $section_data['about_1_quote_text'] : '“Our Company has established a reputation as the leader in landscape design.”';
    $quote_name = !empty($section_data['about_1_quote_name']) ? $section_data['about_1_quote_name'] : 'Chris Stanley,';
    $quote_designation = !empty($section_data['about_1_quote_designation']) ? $section_data['about_1_quote_designation'] : 'Founder of Pruners';
    
    $about_video_link = !empty($section_data['about_video_link']) ? $section_data['about_video_link'] : 'https://www.youtube.com/watch?v=CB_rXABU8DI';
    $about_btn_text = !empty($section_data['about_btn_text']) ? $section_data['about_btn_text'] : 'Read More';
    $about_btn_link = !empty($section_data['about_btn_link']) ? $section_data['about_btn_link'] : 'about.html';
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
                                <img src="images/icons/leaf-two.png" alt="" title="">
                            </span>
                        </div>
                        <div class="subtitle"><?php echo $sec_subtitle; ?></div>
                        <h2><?php echo $sec_title; ?></h2>
                    </div>
                    <div class="text">
                        <p class="bigger-text"><?php echo $sec_text; ?></p>
                        <p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.</p>
                    </div>
                    <div class="quote-box">
                        <a href="<?php echo esc_url($about_video_link); ?>" class="vid-link lightbox-image">
                            <span class="image"><img src="images/resource/quote-thumb.jpg" alt="" title=""></span>
                            <span class="icon flaticon-play-button-1"></span>
                        </a>
                        <div class="quote">
                            <div class="quote-icon"><span></span></div>
                            <div class="quote-text"><?php echo $quote_text; ?></div>
                            <div class="info"><span class="name"><?php echo $quote_name; ?></span> <span class="designation"><?php echo $quote_designation; ?></span></div>
                        </div>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="link-box">
                            <a href="<?php echo esc_url($about_btn_link); ?>" class="theme-btn btn-style-four"><span class="btn-title"><?php echo $about_btn_text; ?> <i
                                        class="arrow flaticon-play-button-1"></i></span></a>
                        </div>
                        <div class="signature">
                            <img src="images/resource/signature-1.png" alt="" title="">
                        </div>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image-box clearfix">
                        <figure class="image"><img src="images/resource/featured-image-1.jpg" alt="" title=""></figure>
                        <div class="anim-image"><img src="images/resource/anim-image-1.png" alt="" title=""></div>
                        <div class="caption">
                            <span class="icon flaticon-leaves"></span>
                            <span class="big-txt"><?php echo $projects_count; ?></span>
                            <span class="txt"><?php echo $projects_text; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php function mthan_section_about_html_2($section_data) { ?>
<?php
    $sec_title    = isset($section_data['about_title']) ? $section_data['about_title'] : '';
    $sec_subtitle = isset($section_data['about_subtitle']) ? $section_data['about_subtitle'] : '';
    $sec_text = !empty($section_data['about_text']) ? $section_data['about_text'] : 'Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.';

    $insured_title = !empty($section_data['about_2_insured_title']) ? $section_data['about_2_insured_title'] : 'Fully Insured';
    $insured_text = !empty($section_data['about_2_insured_text']) ? $section_data['about_2_insured_text'] : 'Indignation and dislike men who are so that our garden therefore always holds in these matters too this stone has beguiled and occur demoralized.';
    $cert_title = !empty($section_data['about_2_cert_title']) ? $section_data['about_2_cert_title'] : 'Certified Company';
    $cert_number = !empty($section_data['about_2_cert_number']) ? $section_data['about_2_cert_number'] : 'ISO 9001:2015';

    $about_video_link = !empty($section_data['about_video_link']) ? $section_data['about_video_link'] : 'https://www.youtube.com/watch?v=CB_rXABU8DI';
    $about_btn_text = !empty($section_data['about_btn_text']) ? $section_data['about_btn_text'] : 'Read More';
    $about_btn_link = !empty($section_data['about_btn_link']) ? $section_data['about_btn_link'] : 'about.html';
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
                                    <img src="images/icons/leaf-two.png" alt="" title="">
                                </span>
                            </div>
                            <div class="subtitle"><?php echo $sec_subtitle; ?></div>
                            <h2><?php echo $sec_title; ?></h2>
                        </div>
                        <div class="text">
                            <p class="bigger-text">
                                <?php echo $sec_text; ?>
                            </p> 
                            <p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.</p>
                        </div>
                        <div class="insured">
                            <div class="icon"><span class="flaticon-insurance"></span></div>
                            <h5><?php echo $insured_title; ?></h5>
                            <div class="text"><?php echo $insured_text; ?></div>
                        </div>
                        <div class="lower-box clearfix">
                            <div class="link-box">
                                <a href="<?php echo esc_url($about_btn_link); ?>" class="theme-btn btn-style-three alternate"><span class="btn-title"><?php echo $about_btn_text; ?> <i class="arrow flaticon-play-button-1"></i></span></a>
                            </div>
                            <div class="iso">
                                <div class="iso-icon">
                                    <span class="icon">
                                        <img src="images/icons/iso-icon.png" alt="">
                                    </span>
                                </div>
                                <div class="txt"><?php echo $cert_title; ?></div>
                                <div class="number"><?php echo $cert_number; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="image-box">
                            <figure class="image">
                                <img src="images/resource/anim-image-3.png" alt="" title="">
                            </figure>
                            <a href="https://www.youtube.com/watch?v=CB_rXABU8DI" class="vid-link lightbox-image">
                                <span class="image">
                                    <img src="images/resource/vid-thumb-1.jpg" alt="" title="">
                                </span>
                                <span class="icon flaticon-play-button-1"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
function mthan_section_about_html_3($section_data) { ?>
<?php
    $sec_title    = isset($section_data['about_title']) ? $section_data['about_title'] : '';
    $sec_subtitle = isset($section_data['about_subtitle']) ? $section_data['about_subtitle'] : '';
    $sec_text = !empty($section_data['about_text']) ? $section_data['about_text'] : 'Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.';

    $quote_text = !empty($section_data['about_1_quote_text']) ? $section_data['about_1_quote_text'] : '“Our Company has established a reputation as the leader in landscape design.”';
    $quote_name = !empty($section_data['about_1_quote_name']) ? $section_data['about_1_quote_name'] : 'Chris Stanley,';
    $quote_designation = !empty($section_data['about_1_quote_designation']) ? $section_data['about_1_quote_designation'] : 'Founder of Pruners';
    
    $cert_title = !empty($section_data['about_2_cert_title']) ? $section_data['about_2_cert_title'] : 'Certified Company';
    $cert_number = !empty($section_data['about_2_cert_number']) ? $section_data['about_2_cert_number'] : 'ISO 9001:2015';

    $exp_years = !empty($section_data['about_3_exp_years']) ? $section_data['about_3_exp_years'] : '16';
    $exp_text = !empty($section_data['about_3_exp_text']) ? $section_data['about_3_exp_text'] : 'Years <br>of Experience';

    $about_video_link = !empty($section_data['about_video_link']) ? $section_data['about_video_link'] : 'https://www.youtube.com/watch?v=CB_rXABU8DI';
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
                                    <img src="images/icons/leaf-two.png" alt="" title="">
                                </span>
                            </div>
                            <div class="subtitle">
                                <?php echo $sec_subtitle; ?>
                            </div>
                            <h2>
                                <?php echo $sec_title; ?>
                            </h2>
                        </div>
                        <div class="text">
                            <p class="bigger-text">
                                <?php echo $sec_text; ?>
                            </p> 
                            <p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.</p>
                        </div>
                        <div class="quote-box">
                            <a href="<?php echo esc_url($about_video_link); ?>" class="vid-link lightbox-image">
                                <span class="image">
                                    <img src="images/resource/vid-thumb-2.jpg" alt="" title="">
                                </span>
                                <span class="icon flaticon-play-button-1"></span>
                            </a>
                            <div class="quote">
                                <div class="quote-icon"><span></span></div>
                                <div class="quote-text"><?php echo $quote_text; ?></div>
                                <div class="info">
                                    <span class="name"><?php echo $quote_name; ?></span> 
                                    <span class="designation"><?php echo $quote_designation; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="lower-text">
                            <?php echo $sec_text; ?>
                        </div>
                        <div class="lower-box clearfix">
                            <div class="signature">
                                <img src="images/resource/signature-1.png" alt="" title="">
                            </div>
                            <div class="iso">
                                <div class="iso-icon">
                                    <span class="icon">
                                        <img src="images/icons/iso-icon.png" alt="">
                                    </span>
                                </div>
                                <div class="txt">
                                    <?php echo $cert_title; ?>
                                </div>
                                <div class="number">
                                    <?php echo $cert_number; ?>
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
                                <img src="images/resource/featured-image-12.jpg" alt="" title="">
                            </figure>
                            <div class="caption">
                                <span class="big-txt"><?php echo $exp_years; ?></span> 
                                <span class="txt"><?php echo $exp_text; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
