<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the awards section instance.
 * @return array
 */
function mthan_section_awards_options()
{
    return array(
        array(
            'id'    => 'awards_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Our Success',
        ),
        array(
            'id'    => 'awards_title',
            'type'  => 'textarea',
            'title' => 'Title (HTML supported)',
            'default' => 'Most Awards Won <br>By a Company in <br>USA - <span class="theme_color">Pruners&CO</span>',
        ),
        array(
            'id'    => 'awards_text',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'It is a long established fact that a reader will distracted by the readable content.',
        ),
        array(
            'id'    => 'awards_btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'All Our Awards',
        ),
        array(
            'id'    => 'awards_btn_link',
            'type'  => 'text',
            'title' => 'Button URL',
            'default' => '#',
        ),
        array(
            'id'    => 'awards_bg_image',
            'type'  => 'media',
            'title' => 'Left Column Background',
            'library' => 'image',
        ),
        array(
            'id'     => 'awards_carousel',
            'type'   => 'group',
            'title'  => 'Awards Carousel',
            'fields' => array(
                array(
                    'id'    => 'year',
                    'type'  => 'text',
                    'title' => 'Year',
                ),
                array(
                    'id'    => 'subtitle',
                    'type'  => 'text',
                    'title' => 'Subtitle',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Award Name',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'media',
                    'title' => 'Lightbox Image',
                    'library' => 'image',
                ),
            ),
            'default' => array(
                array(
                    'year'     => '2017',
                    'subtitle' => 'wyn’s 2017',
                    'title'    => 'Customer Choice of The Year',
                ),
                array(
                    'year'     => '2014',
                    'subtitle' => 'asla 2014',
                    'title'    => 'Residential Design Awards',
                ),
                array(
                    'year'     => '2010',
                    'subtitle' => 'wyn’s 2010',
                    'title'    => 'Public Parks and Open Space',
                ),
            ),
        ),
    );
}

/**
 * Render the awards section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/ 
function mthan_section_awards_html($section_data) { 
    $subtitle = !empty($section_data['awards_subtitle']) ? $section_data['awards_subtitle'] : 'Our Success';
    $title    = !empty($section_data['awards_title']) ? $section_data['awards_title'] : 'Most Awards Won <br>By a Company in <br>USA - <span class="theme_color">Pruners&CO</span>';
    $text     = !empty($section_data['awards_text']) ? $section_data['awards_text'] : 'It is a long established fact that a reader will distracted by the readable content.';
    $btn_text = !empty($section_data['awards_btn_text']) ? $section_data['awards_btn_text'] : 'All Our Awards';
    $btn_link = !empty($section_data['awards_btn_link']) ? $section_data['awards_btn_link'] : '#';
    $bg_image = !empty($section_data['awards_bg_image']['url']) ? $section_data['awards_bg_image']['url'] : 'images/background/awards-bg.jpg';
    $awards   = !empty($section_data['awards_carousel']) ? $section_data['awards_carousel'] : array();
?>
<section class="awards-section">
        <div class="bottom-image"><img src="/wp-content/assets/images/resource/anim-image-4.png" alt="" title=""></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-col">
                    <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
                        <div class="bg-icon"><img src="/wp-content/assets/images/icons/awards-bg-icon.png" alt="" title=""></div>
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
                                    $a_image    = !empty($award['image']['url']) ? $award['image']['url'] : 'images/gallery/7.jpg';
                                ?>
                                <!--Award Block-->
                                <div class="award-block">
                                    <div class="inner-box">
                                        <div class="icon-box"><span class="award-date">Awards <br><?php echo esc_html($a_year); ?></span></div>
                                        <div class="date"><?php echo esc_html($a_subtitle); ?></div>
                                        <h6><?php echo wp_kses_post($a_title); ?></h6>
                                        <div class="link-box">
                                            <a href="<?php echo esc_url($a_image); ?>" class="has-tooltip lightbox-image" title="Award Images"><span class="fa fa-image"></span><span class="t-tip-box"><span class="t-t-text">Award Images</span></span></a>
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
