<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the awards section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/ 
function mthan_section_awards_html($section_data) { 
    $slug = 'awards';
    $subtitle = mthan_get_section_val($slug, $section_data, 'subtitle', 'Our Success');
    $title    = mthan_get_section_val($slug, $section_data, 'title', 'Most Awards Won <br>By a Company in <br>USA - <span class="theme_color">Pruners&CO</span>');
    $text     = mthan_get_section_val($slug, $section_data, 'text', 'It is a long established fact that a reader will distracted by the readable content.');
    $btn_text = mthan_get_section_val($slug, $section_data, 'btn_text', 'All Our Awards');
    $btn_link = mthan_sec_link($slug, $section_data, 'btn_link', '#');
    $bg_image = mthan_sec_img($slug, $section_data, 'bg_image', get_template_directory_uri() . '/assets/images/background/awards-bg.jpg');
    $awards   = mthan_get_section_val($slug, $section_data, 'carousel', array());
?>
<section class="awards-section">
        <div class="bottom-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/anim-image-4.png" alt="<?php echo esc_attr($subtitle); ?>" title="<?php echo esc_attr($subtitle); ?>"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-col">
                    <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
                        <div class="bg-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/awards-bg-icon.png" alt="<?php echo esc_attr($subtitle); ?>" title="<?php echo esc_attr($subtitle); ?>"></div>
                    <div class="inner clearfix">
                        <div class="content-box">
                            <div class="content">
                                <div class="title-box">
                                    <div class="icon-box"><span class="icon flaticon-guarantee-3"></span></div>
                                    <div class="subtitle"><?php echo esc_html($subtitle); ?></div>
                                    <h4><?php echo wp_kses_post($title); ?></h4>
                                </div>
                                <div class="text"><?php echo esc_html($text); ?></div>
                                <div class="link-box"><a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-three"><span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Right Column-->
                <div class="right-col">

                    <div class="inner clearfix">
                        <?php if (!empty($awards)) : ?>
                        <div class="carousel-box">
                            <div class="awards-carousel owl-theme owl-carousel">
                                
                                <?php foreach ($awards as $award) : 
                                    $a_year     = !empty($award['year']) ? $award['year'] : '';
                                    $a_subtitle = !empty($award['subtitle']) ? $award['subtitle'] : '';
                                    $a_title    = !empty($award['title']) ? $award['title'] : '';
                                    $a_image    = !empty($award['image']['url']) ? $award['image']['url'] : get_template_directory_uri() . '/assets/images/gallery/7.jpg';
                                ?>
                                <!--Award Block-->
                                <div class="award-block">
                                    <div class="inner-box">
                                        <div class="icon-box"><span class="award-date">Awards <br><?php echo esc_html($a_year); ?></span></div>
                                        <div class="date"><?php echo esc_html($a_subtitle); ?></div>
                                        <h6><?php echo wp_kses_post($a_title); ?></h6>
                                        <div class="link-box">
                                            <a href="<?php echo esc_url($a_image); ?>" class="has-tooltip lightbox-image" title="<?php echo esc_attr($a_title); ?>"><span class="fa fa-image"></span><span class="t-tip-box"><span class="t-t-text"><?php echo esc_html($a_title); ?></span></span></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                
                            </div>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>
    </section>
<?php }
