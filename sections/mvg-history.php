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
                    'type'  => 'text',
                    'title' => 'Icon Class',
                    'default' => 'flaticon-bullseye',
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
    $sec_subtitle = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $mvg_blocks   = isset($section_data['mvg_blocks']) ? $section_data['mvg_blocks'] : array();
    $desc_blocks  = isset($section_data['desc_carousel']) ? $section_data['desc_carousel'] : array();
    $history      = isset($section_data['history_repeater']) ? $section_data['history_repeater'] : array();
    $btn_text     = isset($section_data['history_btn_text']) ? $section_data['history_btn_text'] : '';
    $btn_link     = isset($section_data['history_btn_link']) ? $section_data['history_btn_link'] : array();
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
                                $title = isset($block['title']) ? $block['title'] : '';
                                $sub   = isset($block['subtitle']) ? $block['subtitle'] : '';
                                $lett  = isset($block['letter']) ? $block['letter'] : '';
                                $img   = isset($block['image']) ? $block['image'] : '';
                                $img_url = !empty($img['url']) ? $img['url'] : '';
                            ?>
                            <div class="mvg-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <img src="<?php echo esc_url($img_url); ?>" alt="" title="">
                                    </div>
                                    <div class="lower-box">
                                        <div class="subtitle"><?php if($sub): ?><span><?php echo esc_html($sub); ?></span><?php else: echo esc_html($sec_subtitle); endif; ?></div>
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
                                    $title = isset($desc['title']) ? $desc['title'] : '';
                                    $text  = isset($desc['text']) ? $desc['text'] : '';
                                    $icon  = isset($desc['icon']) ? $desc['icon'] : 'flaticon-bullseye';
                                    $link  = isset($desc['link']) ? $desc['link'] : array();
                                ?>
                                <div class="desc-block">
                                    <div class="inner">
                                        <div class="fade-icon"><span class="<?php echo esc_attr($icon); ?>"></span></div>
                                        <div class="icon-box"><span class="<?php echo esc_attr($icon); ?>"></span></div>
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
                        $yr = isset($h['year']) ? $h['year'] : '';
                        $tl = isset($h['title']) ? $h['title'] : '';
                        $tx = isset($h['text']) ? $h['text'] : '';
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

