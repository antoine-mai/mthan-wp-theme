<?php defined('ABSPATH') || exit;

/**
 * Render the About section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_About1_html($section_data) { ?>
<?php
    $slug = 'About1';
    
    // Get all values
    $title_icon     = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle       = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title          = mthan_get_section_val($slug, $section_data, 'title');
    $bigger_text    = mthan_get_section_val($slug, $section_data, 'bigger_text');
    $description    = mthan_get_section_val($slug, $section_data, 'description');
    
    // Quote Box
    $quote_thumb    = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'quote_thumb'));
    $video_link     = mthan_get_section_val($slug, $section_data, 'video_link');
    $quote_text     = mthan_get_section_val($slug, $section_data, 'quote_text');
    $author_name    = mthan_get_section_val($slug, $section_data, 'quote_author_name');
    $author_desig   = mthan_get_section_val($slug, $section_data, 'quote_author_designation');
    
    // Lower Box
    $btn_text       = mthan_get_section_val($slug, $section_data, 'btn_text');
    $btn_link       = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn_link'));
    $signature      = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'signature'));
    
    // Image Column
    $main_image     = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'main_image'));
    $anim_image     = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'anim_image'));
    
    // Caption
    $caption_icon   = mthan_get_section_val($slug, $section_data, 'caption_icon');
    $caption_big    = mthan_get_section_val($slug, $section_data, 'caption_big_text');
    $caption_txt    = mthan_get_section_val($slug, $section_data, 'caption_text');
?>
<section class="about-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <?php if ($title_icon) { ?>
                        <div class="title-icon">
                            <span class="icon"><img src="<?php echo esc_url($title_icon); ?>" alt="icon"></span>
                        </div>
                        <?php } ?>
                        
                        <?php if ($subtitle) { ?>
                        <div class="subtitle"><?php echo esc_html($subtitle); ?></div>
                        <?php } ?>
                        
                        <?php if ($title) { ?>
                        <h2><?php echo wp_kses_post($title); ?></h2>
                        <?php } ?>
                    </div>
                    
                    <div class="text">
                        <?php if ($bigger_text) { ?>
                        <p class="bigger-text"><?php echo esc_html($bigger_text); ?></p> 
                        <?php } ?>
                        
                        <?php if ($description) { ?>
                        <p><?php echo wp_kses_post($description); ?></p>
                        <?php } ?>
                    </div>
                    
                    <div class="quote-box">
                        <?php if ($video_link) { ?>
                        <a href="<?php echo esc_url($video_link); ?>" class="vid-link lightbox-image">
                            <?php if ($quote_thumb) { ?>
                            <span class="image"><img src="<?php echo esc_url($quote_thumb); ?>" alt="thumb"></span>
                            <?php } ?>
                            <span class="icon flaticon-play-button-1"></span>
                        </a>
                        <?php } ?>
                        
                        <div class="quote">
                            <div class="quote-icon"><span></span></div>
                            <?php if ($quote_text) { ?>
                            <div class="quote-text"><?php echo esc_html($quote_text); ?></div>
                            <?php } ?>
                            
                            <div class="info">
                                <?php if ($author_name) { ?>
                                <span class="name"><?php echo esc_html($author_name); ?>,</span> 
                                <?php } ?>
                                
                                <?php if ($author_desig) { ?>
                                <span class="designation"><?php echo esc_html($author_desig); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lower-box clearfix">
                        <?php if ($btn_text) { ?>
                        <div class="link-box">
                            <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four">
                                <span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span>
                            </a>
                        </div>
                        <?php } ?>
                        
                        <?php if ($signature) { ?>
                        <div class="signature"><img src="<?php echo esc_url($signature); ?>" alt="signature"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image-box clearfix">
                        <?php if ($main_image) { ?>
                        <figure class="image"><img src="<?php echo esc_url($main_image); ?>" alt="image"></figure>
                        <?php } ?>
                        
                        <?php if ($anim_image) { ?>
                        <div class="anim-image"><img src="<?php echo esc_url($anim_image); ?>" alt="anim-image"></div>
                        <?php } ?>
                        
                        <div class="caption">
                            <?php if ($caption_icon) { ?>
                            <span class="icon <?php echo esc_attr($caption_icon); ?>"></span> 
                            <?php } ?>
                            
                            <?php if ($caption_big) { ?>
                            <span class="big-txt"><?php echo esc_html($caption_big); ?></span> 
                            <?php } ?>
                            
                            <?php if ($caption_txt) { ?>
                            <span class="txt"><?php echo nl2br(esc_html($caption_txt)); ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
