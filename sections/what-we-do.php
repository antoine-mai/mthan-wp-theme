<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the what-we-do section instance.
 * @return array
 */
function mthan_section_what_we_do_options()
{
    return array(
            array(
            'id' => 'wwd_subtitle',
            'type' => 'text',
            'title' => 'Subtitle',
            'default' => 'What We Do',
        ),
            array(
            'id' => 'wwd_title',
            'type' => 'text',
            'title' => 'Title',
            'default' => 'Special Services For You',
        ),
            array(
            'id' => 'tabs_repeater',
            'type' => 'group',
            'title' => 'Services Tabs',
            'max' => 5,
            'fields' => array(
                    array(
                    'id' => 'nav_title',
                    'type' => 'text',
                    'title' => 'Nav Tab Title',
                ),
                    array(
                    'id' => 'nav_icon',
                    'type' => 'upload',
                    'preview' => false,
                    'title' => 'Icon Upload',
                ),
                    array(
                    'id' => 'bg_image',
                    'type' => 'media',
                    'library' => 'image',
                    'preview' => false,
                    'title' => 'Background Image (Left)',
                ),
                    array(
                    'id' => 'box_title',
                    'type' => 'text',
                    'title' => 'Project Box Title',
                    'default' => "Let's Start Your Project",
                ),
                    array(
                    'id' => 'box_text',
                    'type' => 'text',
                    'title' => 'Project Box Text',
                    'default' => 'Make an appointment & Start your project today.',
                ),
                    array(
                    'id' => 'box_btn_text',
                    'type' => 'text',
                    'title' => 'Project Box Button Text',
                    'default' => 'Appointment',
                ),
                    array(
                    'id' => 'box_btn_link',
                    'type' => 'text',
                    'title' => 'Project Box Button Link',
                    'default' => '#',
                ),
                    array(
                    'id' => 'content_subtitle',
                    'type' => 'text',
                    'title' => 'Content Subtitle',
                    'default' => 'know About',
                ),
                    array(
                    'id' => 'content_title',
                    'type' => 'text',
                    'title' => 'Content Title',
                ),
                    array(
                    'id' => 'content_text',
                    'type' => 'textarea',
                    'title' => 'Content Text',
                ),
                    array(
                    'id' => 'bro_thumb',
                    'type' => 'media',
                    'library' => 'image',
                    'preview' => false,
                    'title' => 'Brochure Thumb',
                ),
                    array(
                    'id' => 'bro_title',
                    'type' => 'text',
                    'title' => 'Brochure Title',
                    'default' => 'Projects & Case Studies',
                ),
                    array(
                    'id' => 'bro_link_text',
                    'type' => 'text',
                    'title' => 'Brochure Link Text',
                    'default' => 'Download.pdf',
                ),
                    array(
                    'id' => 'bro_link_url',
                    'type' => 'text',
                    'title' => 'Brochure Link URL',
                    'default' => '#',
                ),
                    array(
                    'id' => 'more_link_text',
                    'type' => 'text',
                    'title' => 'More Link Text',
                    'default' => 'More about service',
                ),
                    array(
                    'id' => 'more_link_url',
                    'type' => 'text',
                    'title' => 'More Link URL',
                    'default' => '#',
                ),
            ),
            'default' => array(
                    array(
                    'nav_title' => 'Spring Cleanup',
                    'nav_icon' => 'flaticon-hedge',
                    'bg_image' => array('url' => get_template_directory_uri() . '/assets/images/background/image-1.jpg'),
                    'box_title' => "Let's <br>Start Your Project",
                    'box_text' => 'Make an appointment & Start your project today.',
                    'box_btn_text' => 'Appointment',
                    'box_btn_link' => '#',
                    'content_subtitle' => 'know About',
                    'content_title' => 'Spring Cleanup',
                    'content_text' => 'We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...',
                    'bro_thumb' => array('url' => get_template_directory_uri() . '/assets/images/resource/bro-thumb-1.jpg'),
                    'bro_title' => 'Projects & Case Studies',
                    'bro_link_text' => 'Download.pdf',
                    'bro_link_url' => '#',
                    'more_link_text' => 'More about service',
                    'more_link_url' => '#',
                ),
                    array(
                    'nav_title' => 'Plants Plantintg',
                    'nav_icon' => 'flaticon-digging-1',
                    'bg_image' => array('url' => get_template_directory_uri() . '/assets/images/background/image-2.jpg'),
                    'box_title' => "Let's <br>Start Your Project",
                    'box_text' => 'Make an appointment & Start your project today.',
                    'box_btn_text' => 'Appointment',
                    'box_btn_link' => '#',
                    'content_subtitle' => 'know About',
                    'content_title' => 'Plants Plantintg',
                    'content_text' => 'We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...',
                    'bro_thumb' => array('url' => get_template_directory_uri() . '/assets/images/resource/bro-thumb-1.jpg'),
                    'bro_title' => 'Projects & Case Studies',
                    'bro_link_text' => 'Download.pdf',
                    'bro_link_url' => '#',
                    'more_link_text' => 'More about service',
                    'more_link_url' => '#',
                ),
                    array(
                    'nav_title' => 'Water Fountain',
                    'nav_icon' => 'flaticon-sprinkler',
                    'bg_image' => array('url' => get_template_directory_uri() . '/assets/images/background/image-3.jpg'),
                    'box_title' => "Let's <br>Start Your Project",
                    'box_text' => 'Make an appointment & Start your project today.',
                    'box_btn_text' => 'Appointment',
                    'box_btn_link' => '#',
                    'content_subtitle' => 'know About',
                    'content_title' => 'Water Fountain',
                    'content_text' => 'We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...',
                    'bro_thumb' => array('url' => get_template_directory_uri() . '/assets/images/resource/bro-thumb-1.jpg'),
                    'bro_title' => 'Projects & Case Studies',
                    'bro_link_text' => 'Download.pdf',
                    'bro_link_url' => '#',
                    'more_link_text' => 'More about service',
                    'more_link_url' => '#',
                ),
                    array(
                    'nav_title' => 'Hard Scaping',
                    'nav_icon' => 'flaticon-painting',
                    'bg_image' => array('url' => get_template_directory_uri() . '/assets/images/background/image-4.jpg'),
                    'box_title' => "Let's <br>Start Your Project",
                    'box_text' => 'Make an appointment & Start your project today.',
                    'box_btn_text' => 'Appointment',
                    'box_btn_link' => '#',
                    'content_subtitle' => 'know About',
                    'content_title' => 'Hard Scaping',
                    'content_text' => 'We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...',
                    'bro_thumb' => array('url' => get_template_directory_uri() . '/assets/images/resource/bro-thumb-1.jpg'),
                    'bro_title' => 'Projects & Case Studies',
                    'bro_link_text' => 'Download.pdf',
                    'bro_link_url' => '#',
                    'more_link_text' => 'More about service',
                    'more_link_url' => '#',
                ),
                    array(
                    'nav_title' => 'Garden Care',
                    'nav_icon' => 'flaticon-wheelbarrow',
                    'bg_image' => array('url' => get_template_directory_uri() . '/assets/images/background/image-5.jpg'),
                    'box_title' => "Let's <br>Start Your Project",
                    'box_text' => 'Make an appointment & Start your project today.',
                    'box_btn_text' => 'Appointment',
                    'box_btn_link' => '#',
                    'content_subtitle' => 'know About',
                    'content_title' => 'Garden Care',
                    'content_text' => 'We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...',
                    'bro_thumb' => array('url' => get_template_directory_uri() . '/assets/images/resource/bro-thumb-1.jpg'),
                    'bro_title' => 'Projects & Case Studies',
                    'bro_link_text' => 'Download.pdf',
                    'bro_link_url' => '#',
                    'more_link_text' => 'More about service',
                    'more_link_url' => '#',
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
function mthan_section_what_we_do_html($section_data)
{
    $sec_title = !empty($section_data['wwd_title']) ? $section_data['wwd_title'] : 'Special Services For You';
    $sec_subtitle = !empty($section_data['wwd_subtitle']) ? $section_data['wwd_subtitle'] : 'What We Do';
    $tabs = !empty($section_data['tabs_repeater']) ? $section_data['tabs_repeater'] : array();
?>
<section class="what-we-do">
    <div class="tabs-box service-tabs">
        <div class="upper-box">
            <div class="pattern-layer"></div>

            <div class="auto-container">
                <div class="sec-title">
                    <div class="title-icon"><span class="icon"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-two.png"
                                alt="<?php echo esc_attr($sec_subtitle); ?>"
                                title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                    <div class="subtitle">
                        <?php echo esc_html($sec_subtitle); ?>
                    </div>
                    <h2>
                        <?php echo esc_html($sec_title); ?>
                    </h2>
                </div>

                <div class="buttons">
                    <ul class="tab-buttons row clearfix">
                        <?php foreach ($tabs as $index => $tab):
        $nav_title = !empty($tab['nav_title']) ? $tab['nav_title'] : '';
        $nav_icon = !empty($tab['nav_icon']) ? $tab['nav_icon'] : '';
?>
                        <li class="tab-btn <?php echo ($index === 0) ? 'active-btn' : ''; ?> col"
                            data-tab="#tab-<?php echo esc_attr($index); ?>">
                            <span class="hvr-seeds"></span>
                            <div class="icon-box">
                                <span class="icon <?php echo esc_attr($nav_icon); ?>"></span>
                                <span class="icon hvr-icon <?php echo esc_attr($nav_icon); ?>"></span>
                            </div>
                            <div class="btn-title">
                                <?php echo esc_html($nav_title); ?>
                            </div>
                            <span class="arrow flaticon-right-1"></span>
                        </li>
                        <?php
    endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>

        <div class="tabs-content">
            <?php foreach ($tabs as $index => $tab):
        $nav_icon = !empty($tab['nav_icon']) ? $tab['nav_icon'] : '';
        $bg_image = !empty($tab['bg_image']['url']) ? $tab['bg_image']['url'] : get_template_directory_uri() . '/assets/images/resource/tab-image-1.jpg';
        $box_title = !empty($tab['box_title']) ? $tab['box_title'] : "Let's Start Your Project";
        $box_text = !empty($tab['box_text']) ? $tab['box_text'] : '';
        $box_btn = !empty($tab['box_btn_text']) ? $tab['box_btn_text'] : 'Appointment';
        $box_link = !empty($tab['box_btn_link']) ? $tab['box_btn_link'] : '#';
        $c_subtitle = !empty($tab['content_subtitle']) ? $tab['content_subtitle'] : 'know About';
        $c_title = !empty($tab['content_title']) ? $tab['content_title'] : '';
        $c_text = !empty($tab['content_text']) ? $tab['content_text'] : '';
        $bro_thumb = !empty($tab['bro_thumb']['url']) ? $tab['bro_thumb']['url'] : get_template_directory_uri() . '/assets/images/resource/brochure-1.jpg';
        $bro_title = !empty($tab['bro_title']) ? $tab['bro_title'] : 'Projects & Case Studies';
        $bro_l_text = !empty($tab['bro_link_text']) ? $tab['bro_link_text'] : 'Download.pdf';
        $bro_l_url = !empty($tab['bro_link_url']) ? $tab['bro_link_url'] : '#';
        $m_text = !empty($tab['more_link_text']) ? $tab['more_link_text'] : 'More about service';
        $m_url = !empty($tab['more_link_url']) ? $tab['more_link_url'] : '#';
?>
            <!--Tab-->
            <div class="tab <?php echo ($index === 0) ? 'active-tab' : ''; ?>" id="tab-<?php echo esc_attr($index); ?>">
                <div class="row outer-container clearfix">
                    <!--Image Column-->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);">
                        </div>
                        <div class="inner clearfix">
                            <div class="content">
                                <div class="inner-box">
                                    <div class="icon-box"><span class="flaticon-leaves"></span></div>
                                    <h5>
                                        <?php echo wp_kses_post(nl2br($box_title)); ?>
                                    </h5>
                                    <div class="text">
                                        <?php echo esc_html($box_text); ?>
                                    </div>
                                    <div class="link-box clearfix">
                                        <a href="<?php echo esc_url($box_link); ?>"
                                            class="theme-btn btn-style-one alt-hover"><span class="btn-title">
                                                <?php echo esc_html($box_btn); ?> <i
                                                    class="arrow flaticon-play-button-1"></i>
                                            </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Text Column-->
                    <div class="text-column col-lg-6 col-md-12 col-sm-12">
                        <div class="big-icon"><?php if($nav_icon): ?><img src="<?php echo esc_url($nav_icon); ?>" alt="icon"><?php endif; ?></div>
                        <div class="inner">
                            <div class="content">
                                <div class="s-title">
                                    <div class="icon"><?php if($nav_icon): ?><img src="<?php echo esc_url($nav_icon); ?>" alt="icon"><?php endif; ?></div>
                                    <div class="subtitle">
                                        <?php echo esc_html($c_subtitle); ?>
                                    </div>
                                    <h4>
                                        <?php echo esc_html($c_title); ?>
                                    </h4>
                                </div>
                                <div class="text">
                                    <?php echo esc_html($c_text); ?>
                                </div>

                                <div class="b-box">
                                    <?php if ($bro_thumb): ?>
                                    <div class="image"><a href="<?php echo esc_url($bro_l_url); ?>"><img
                                                src="<?php echo esc_url($bro_thumb); ?>"
                                                alt="<?php echo esc_attr($bro_title); ?>"
                                                title="<?php echo esc_attr($bro_title); ?>"></a></div>
                                    <?php
        endif; ?>
                                    <div class="bro-title">
                                        <?php echo esc_html($bro_title); ?>
                                    </div>
                                    <div class="bro-link"><a href="<?php echo esc_url($bro_l_url); ?>"
                                            class="theme-btn">
                                            <?php echo esc_html($bro_l_text); ?> <i
                                                class="arrow flaticon-play-button-1"></i>
                                        </a></div>
                                </div>

                                <div class="more-link">
                                    <a href="<?php echo esc_url($m_url); ?>" class="theme-btn">
                                        <?php echo esc_html($m_text); ?> <i class="arrow flaticon-play-button-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    endforeach; ?>

        </div>
    </div>
</section>
<?php
}