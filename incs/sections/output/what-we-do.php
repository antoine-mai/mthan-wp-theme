<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the what-we-do section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_what_we_do_html($section_data)
{
    $slug = 'what-we-do';
    $sec_title = mthan_get_section_val($slug, $section_data, 'title', 'Special Services For You');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'subtitle', 'What We Do');
    $sec_sub_icon = mthan_sec_img($slug, $section_data, 'wwd_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-two.png');
    $tabs = mthan_get_section_val($slug, $section_data, 'tabs_repeater', array());
?>
<section class="what-we-do">
    <div class="tabs-box service-tabs">
        <div class="upper-box">
            <div class="pattern-layer"></div>

            <div class="auto-container">
                <div class="sec-title">
                    <div class="title-icon"><span class="icon"><img
                                src="<?php echo esc_url($sec_sub_icon); ?>"
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
        $nav_title = !empty($tab['name']) ? $tab['name'] : '';
        $nav_icon = !empty($tab['icon']) ? $tab['icon'] : '';
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
        $nav_icon = !empty($tab['icon']) ? $tab['icon'] : '';
        $bg_image = !empty($tab['bg_image']['url']) ? $tab['bg_image']['url'] : get_template_directory_uri() . '/assets/images/resource/tab-image-1.jpg';
        $box_title = !empty($tab['box_title']) ? $tab['box_title'] : "Let's Start Your Project";
        $box_text = !empty($tab['box_text']) ? $tab['box_text'] : '';
        $box_btn = !empty($tab['box_btn_text']) ? $tab['box_btn_text'] : 'Appointment';
        $box_link_id = !empty($tab['box_btn_link']) ? $tab['box_btn_link'] : '#';
        $box_link = is_numeric($box_link_id) ? get_permalink($box_link_id) : $box_link_id;
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