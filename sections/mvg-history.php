<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Render the mvg-history section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/

/**
 * Returns the CSF field definitions for the mvg-history section instance.
 * @return array
 */
function mthan_section_mvg_history_options()
{
    return array(
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Lander',
        ),
        array(
            'id'     => 'mvg_blocks',
            'type'   => 'group',
            'title'  => 'MVG Blocks',
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'subtitle',
                    'type'  => 'text',
                    'title' => 'Subtitle',
                ),
                array(
                    'id'    => 'letter',
                    'type'  => 'text',
                    'title' => 'Big Letter (e.g. M, V, G)',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'preview' => false,
                    'title' => 'Background Image',
                ),
            ),
            'default' => array(
                array('title' => 'Our Mission', 'subtitle' => 'Pruners', 'letter' => 'M', 'image' => ''),
                array('title' => 'Our Vision', 'subtitle' => 'Pruners', 'letter' => 'V', 'image' => ''),
                array('title' => 'Our Goals', 'subtitle' => 'Pruners', 'letter' => 'G', 'image' => ''),
            ),
        ),
        array(
            'id'     => 'desc_carousel',
            'type'   => 'group',
            'title'  => 'Description Carousel',
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Description',
                ),
                array(
                    'id'    => 'icon',
                    'type' => 'upload',
                    'preview' => false,
                    'title' => 'Icon Image',
                ),
                array(
                    'id'    => 'link',
                    'type'  => 'link',
                    'title' => 'Read More Link',
                ),
            ),
        ),
        array(
            'id'     => 'history_repeater',
            'type'   => 'group',
            'title'  => 'History Timeline',
            'fields' => array(
                array(
                    'id'    => 'year',
                    'type'  => 'text',
                    'title' => 'Year',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Description',
                ),
            ),
        ),
        array(
            'id'    => 'history_btn_text',
            'type'  => 'text',
            'title' => 'See All Button Text',
            'default' => 'View Full History',
        ),
        array(
            'id'    => 'history_btn_link',
            'type'  => 'link',
            'title' => 'See All Button Link',
        ),
    );
}

/**
 * Render the mvg-history section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_mvg_history_html($section_data) { 
    $slug = 'mvg-history';
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'Lander');
    $mvg_blocks   = mthan_get_section_val($slug, $section_data, 'mvg_blocks', array());
    $desc_blocks  = mthan_get_section_val($slug, $section_data, 'desc_carousel', array());
    $history      = mthan_get_section_val($slug, $section_data, 'history_repeater', array());
    $btn_text     = mthan_get_section_val($slug, $section_data, 'history_btn_text', 'View Full History');
    $btn_link     = mthan_get_section_val($slug, $section_data, 'history_btn_link', array());
?>
<section class="mvg-history">
    <div class="mvg">
        <div class="auto-container">
            <div class="mvg-box">
                <div class="row clearfix">
                    <!--MVG-->
                    <div class="mvg-col col-xl-9 col-lg-12 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            <?php foreach($mvg_blocks as $block): 
                                $title = !empty($block['title']) ? $block['title'] : '';
                                $sub   = !empty($block['subtitle']) ? $block['subtitle'] : $sec_subtitle;
                                $lett  = !empty($block['letter']) ? $block['letter'] : '';
                                $img   = !empty($block['image']) ? $block['image'] : '';
                                $img_url = !empty($img['url']) ? $img['url'] : '';
                            ?>
                            <div class="mvg-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <?php if($img_url): ?>
                                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="lower-box">
                                        <div class="subtitle"><span><?php echo esc_html($sub); ?></span></div>
                                        <h5><?php echo esc_html($title); ?></h5>
                                        <div class="letter"><?php echo esc_html($lett); ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!--Description-->
                    <div class="description-col col-xl-3 col-lg-12 col-md-12 col-sm-12">
                        <div class="carousel-box">
                            <div class="mvg-carousel owl-theme owl-carousel">
                                <?php foreach($desc_blocks as $desc): 
                                    $title = !empty($desc['title']) ? $desc['title'] : '';
                                    $text  = !empty($desc['text']) ? $desc['text'] : '';
                                    $icon  = !empty($desc['icon']) ? $desc['icon'] : '';
                                    $link  = !empty($desc['link']) ? $desc['link'] : array();
                                ?>
                                <div class="desc-block">
                                    <div class="inner">
                                        <?php if($icon): ?><div class="fade-icon"><img src="<?php echo esc_url($icon); ?>" alt="icon"></div><?php endif; ?>
                                        <?php if($icon): ?><div class="icon-box"><img src="<?php echo esc_url($icon); ?>" alt="icon"></div><?php endif; ?>
                                        <h5><?php echo esc_html($title); ?></h5>
                                        <div class="text"><?php echo esc_html($text); ?></div>
                                        <?php if(!empty($link['url'])): ?>
                                        <div class="link"><a href="<?php echo esc_url($link['url']); ?>" class="theme-btn"><?php echo esc_html($link['text'] ?: 'Continue Reading'); ?> <i class="arrow flaticon-play-button-1"></i></a></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="history-box">
        <div class="auto-container">
            <div class="carousel-box">
                <div class="history-carousel owl-theme owl-carousel">
                    <?php foreach($history as $h): 
                        $yr = !empty($h['year']) ? $h['year'] : '';
                        $tl = !empty($h['title']) ? $h['title'] : '';
                        $tx = !empty($h['text']) ? $h['text'] : '';
                    ?>
                    <div class="history-block">
                        <div class="inner">
                            <div class="date">
                                <div class="date-inner"><span><?php echo esc_html($yr); ?></span></div>
                            </div>
                            <h5><?php echo esc_html($tl); ?></h5>
                            <div class="text"><?php echo esc_html($tx); ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if(!empty($btn_link['url'])): ?>
            <div class="see-all"><a href="<?php echo esc_url($btn_link['url']); ?>" class="theme-btn"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></a></div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php }
