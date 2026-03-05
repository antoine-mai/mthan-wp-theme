<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the what-we-do section instance.
 * @return array
 */
function mthan_section_what_we_do_options()
{
    return array(
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'What We Do',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Special Services For You',
        ),
        array(
            'id'     => 'tabs_repeater',
            'type'   => 'group',
            'title'  => 'Services Tabs',
            'fields' => array(
                array(
                    'id'    => 'nav_title',
                    'type'  => 'text',
                    'title' => 'Nav Tab Title',
                ),
                array(
                    'id'    => 'nav_icon',
                    'type'  => 'text',
                    'title' => 'Nav Tab Icon (flaticon class)',
                ),
                array(
                    'id'    => 'bg_image',
                    'type'  => 'upload',
                    'title' => 'Background Image (Left)',
                ),
                array(
                    'id'    => 'box_title',
                    'type'  => 'text',
                    'title' => 'Project Box Title',
                    'default' => "Let's Start Your Project",
                ),
                array(
                    'id'    => 'box_text',
                    'type'  => 'text',
                    'title' => 'Project Box Text',
                    'default' => 'Make an appointment & Start your project today.',
                ),
                array(
                    'id'    => 'box_btn_text',
                    'type'  => 'text',
                    'title' => 'Project Box Button Text',
                    'default' => 'Appointment',
                ),
                array(
                    'id'    => 'box_btn_link',
                    'type'  => 'text',
                    'title' => 'Project Box Button Link',
                    'default' => '#',
                ),
                array(
                    'id'    => 'content_subtitle',
                    'type'  => 'text',
                    'title' => 'Content Subtitle',
                    'default' => 'know About',
                ),
                array(
                    'id'    => 'content_title',
                    'type'  => 'text',
                    'title' => 'Content Title',
                ),
                array(
                    'id'    => 'content_text',
                    'type'  => 'textarea',
                    'title' => 'Content Text',
                ),
                array(
                    'id'    => 'bro_thumb',
                    'type'  => 'upload',
                    'title' => 'Brochure Thumb',
                ),
                array(
                    'id'    => 'bro_title',
                    'type'  => 'text',
                    'title' => 'Brochure Title',
                    'default' => 'Projects & Case Studies',
                ),
                array(
                    'id'    => 'bro_link_text',
                    'type'  => 'text',
                    'title' => 'Brochure Link Text',
                    'default' => 'Download.pdf',
                ),
                array(
                    'id'    => 'bro_link_url',
                    'type'  => 'text',
                    'title' => 'Brochure Link URL',
                    'default' => '#',
                ),
                array(
                    'id'    => 'more_link_text',
                    'type'  => 'text',
                    'title' => 'More Link Text',
                    'default' => 'More about service',
                ),
                array(
                    'id'    => 'more_link_url',
                    'type'  => 'text',
                    'title' => 'More Link URL',
                    'default' => '#',
                ),
            ),
        ),
    );
}

/**
 * Render the what-we-do section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_what_we_do_html($section_data) { 
    $sec_title    = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $sec_subtitle = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $tabs         = isset($section_data['tabs_repeater']) ? $section_data['tabs_repeater'] : array();
?>
<section class="what-we-do">
        <div class="tabs-box service-tabs">
            <div class="upper-box">
                <div class="pattern-layer"></div>

                <div class="auto-container">
                    <div class="sec-title">
                        <div class="title-icon"><span class="icon"><img src="/wp-content/assets/images/icons/leaf-two.png" alt="" title=""></span></div>
                        <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                        <h2><?php echo esc_html($sec_title); ?></h2>
                    </div>

                    <div class="buttons">
                        <ul class="tab-buttons row clearfix">
                            <?php foreach($tabs as $index => $tab): 
                                $nav_title = isset($tab['nav_title']) ? $tab['nav_title'] : '';
                                $nav_icon  = isset($tab['nav_icon']) ? $tab['nav_icon'] : '';
                            ?>
                            <li class="tab-btn <?php echo ($index === 0) ? 'active-btn' : ''; ?> col" data-tab="#tab-<?php echo esc_attr($index); ?>">
                                <span class="hvr-seeds"></span>
                                <div class="icon-box">
                                    <span class="icon <?php echo esc_attr($nav_icon); ?>"></span>
                                    <span class="icon hvr-icon <?php echo esc_attr($nav_icon); ?>"></span>
                                </div>
                                <div class="btn-title"><?php echo esc_html($nav_title); ?></div>
                                <span class="arrow flaticon-right-1"></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="tabs-content">
                <?php foreach($tabs as $index => $tab): 
                    $nav_icon   = isset($tab['nav_icon']) ? $tab['nav_icon'] : '';
                    $bg_image   = isset($tab['bg_image']) ? $tab['bg_image'] : '';
                    $box_title  = isset($tab['box_title']) ? $tab['box_title'] : '';
                    $box_text   = isset($tab['box_text']) ? $tab['box_text'] : '';
                    $box_btn    = isset($tab['box_btn_text']) ? $tab['box_btn_text'] : '';
                    $box_link   = isset($tab['box_btn_link']) ? $tab['box_btn_link'] : '';
                    $c_subtitle = isset($tab['content_subtitle']) ? $tab['content_subtitle'] : '';
                    $c_title    = isset($tab['content_title']) ? $tab['content_title'] : '';
                    $c_text     = isset($tab['content_text']) ? $tab['content_text'] : '';
                    $bro_thumb  = isset($tab['bro_thumb']) ? $tab['bro_thumb'] : '';
                    $bro_title  = isset($tab['bro_title']) ? $tab['bro_title'] : '';
                    $bro_l_text = isset($tab['bro_link_text']) ? $tab['bro_link_text'] : '';
                    $bro_l_url  = isset($tab['bro_link_url']) ? $tab['bro_link_url'] : '';
                    $m_text     = isset($tab['more_link_text']) ? $tab['more_link_text'] : '';
                    $m_url      = isset($tab['more_link_url']) ? $tab['more_link_url'] : '';
                ?>
                <!--Tab-->
                <div class="tab <?php echo ($index === 0) ? 'active-tab' : ''; ?>" id="tab-<?php echo esc_attr($index); ?>">
                    <div class="row outer-container clearfix">
                        <!--Image Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
                            <div class="inner clearfix">
                                <div class="content">
                                    <div class="inner-box">
                                        <div class="icon-box"><span class="flaticon-leaves"></span></div>
                                        <h5><?php echo wp_kses_post(nl2br($box_title)); ?></h5>
                                        <div class="text"><?php echo esc_html($box_text); ?></div>
                                        <div class="link-box clearfix">
                                            <a href="<?php echo esc_url($box_link); ?>" class="theme-btn btn-style-one alt-hover"><span class="btn-title"><?php echo esc_html($box_btn); ?> <i class="arrow flaticon-play-button-1"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Text Column-->
                        <div class="text-column col-lg-6 col-md-12 col-sm-12">
                            <div class="big-icon"><span class="<?php echo esc_attr($nav_icon); ?>"></span></div>
                            <div class="inner">
                                <div class="content">
                                    <div class="s-title">
                                        <div class="icon"><span class="<?php echo esc_attr($nav_icon); ?>"></span></div>
                                        <div class="subtitle"><?php echo esc_html($c_subtitle); ?></div>
                                        <h4><?php echo esc_html($c_title); ?></h4>
                                    </div>
                                    <div class="text"><?php echo esc_html($c_text); ?></div>

                                    <div class="b-box">
                                        <?php if($bro_thumb): ?><div class="image"><a href="<?php echo esc_url($bro_l_url); ?>"><img src="<?php echo esc_url($bro_thumb); ?>" alt="brochure"></a></div><?php endif; ?>
                                        <div class="bro-title"><?php echo esc_html($bro_title); ?></div>
                                        <div class="bro-link"><a href="<?php echo esc_url($bro_l_url); ?>" class="theme-btn"><?php echo esc_html($bro_l_text); ?> <i class="arrow flaticon-play-button-1"></i></a></div>
                                    </div>

                                    <div class="more-link">
                                        <a href="<?php echo esc_url($m_url); ?>" class="theme-btn"><?php echo esc_html($m_text); ?> <i class="arrow flaticon-play-button-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php }
