<?php defined('ABSPATH') || exit;

/**
 * Render the About 3 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_About3_html($section_data) { ?>
<?php
    $slug = 'About3';
    $title_ico   = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle    = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title       = mthan_get_section_val($slug, $section_data, 'title');
    $bigger_text = mthan_get_section_val($slug, $section_data, 'bigger_text');
    $description = mthan_get_section_val($slug, $section_data, 'description');
    
    // Quote Box
    $vid_thumb   = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'vid_thumb'));
    $vid_link    = mthan_get_section_val($slug, $section_data, 'vid_link');
    $quote_text  = mthan_get_section_val($slug, $section_data, 'quote_text');
    $author_name = mthan_get_section_val($slug, $section_data, 'quote_author_name');
    $author_des  = mthan_get_section_val($slug, $section_data, 'quote_author_designation');
    $lower_text  = mthan_get_section_val($slug, $section_data, 'lower_text');
    
    // Bottom
    $signature   = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'signature'));
    $iso_ico     = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'iso_icon'));
    $iso_txt     = mthan_get_section_val($slug, $section_data, 'iso_text');
    $iso_num     = mthan_get_section_val($slug, $section_data, 'iso_number');
    
    // Image Column
    $main_image  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'main_image'));
    $exp_num     = mthan_get_section_val($slug, $section_data, 'experience_number');
    $exp_txt     = mthan_get_section_val($slug, $section_data, 'experience_text');
?>
<section class="about-three">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <?php if ($title_ico) { ?>
                        <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($title_ico); ?>" alt="icon"></span></div>
                        <?php } ?>
                        <?php if ($subtitle) { ?>
                        <div class="subtitle"><?php echo esc_html($subtitle); ?></div>
                        <?php } ?>
                        <?php if ($title) { ?>
                        <h2><?php echo esc_html($title); ?></h2>
                        <?php } ?>
                    </div>
                    <div class="text">
                        <?php if ($bigger_text) { ?>
                        <p class="bigger-text"><?php echo wp_kses_post($bigger_text); ?></p>
                        <?php } ?>
                        <?php if ($description) { ?>
                        <p><?php echo wp_kses_post($description); ?></p>
                        <?php } ?>
                    </div>
                    <div class="quote-box">
                        <?php if ($vid_thumb) { ?>
                        <a href="<?php echo esc_url($vid_link); ?>" class="vid-link lightbox-image">
                            <span class="image"><img src="<?php echo esc_url($vid_thumb); ?>" alt="video thumbnail"></span>
                            <span class="icon flaticon-play-button-1"></span>
                        </a>
                        <?php } ?>
                        <div class="quote">
                            <div class="quote-icon"><span></span></div>
                            <?php if ($quote_text) { ?>
                            <div class="quote-text"><?php echo wp_kses_post($quote_text); ?></div>
                            <?php } ?>
                            <div class="info">
                                <?php if ($author_name) { ?>
                                <span class="name"><?php echo esc_html($author_name); ?>,</span> 
                                <?php } ?>
                                <?php if ($author_des) { ?>
                                <span class="designation"><?php echo esc_html($author_des); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($lower_text) { ?>
                    <div class="lower-text"><?php echo wp_kses_post($lower_text); ?></div>
                    <?php } ?>
                    <div class="lower-box clearfix">
                        <?php if ($signature) { ?>
                        <div class="signature"><img src="<?php echo esc_url($signature); ?>" alt="signature"></div>
                        <?php } ?>
                        <div class="iso">
                            <?php if ($iso_ico) { ?>
                            <div class="iso-icon"><span class="icon"><img src="<?php echo esc_url($iso_ico); ?>" alt="iso"></span></div>
                            <?php } ?>
                            <?php if ($iso_txt) { ?>
                            <div class="txt"><?php echo esc_html($iso_txt); ?></div>
                            <?php } ?>
                            <?php if ($iso_num) { ?>
                            <div class="number"><?php echo esc_html($iso_num); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image-box clearfix">
                        <?php if ($main_image) { ?>
                        <figure class="image"><img src="<?php echo esc_url($main_image); ?>" alt="about image"></figure>
                        <?php } ?>
                        <?php if ($exp_num) { ?>
                        <div class="caption">
                            <span class="big-txt"><?php echo esc_html($exp_num); ?></span>
                            <span class="txt"><?php echo wp_kses_post($exp_txt); ?></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
