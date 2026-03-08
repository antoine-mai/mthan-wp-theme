<?php defined('ABSPATH') || exit;

/**
 * Render the Services section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_WhatWeDo1_html($section_data) { ?>
<?php
    $slug = 'WhatWeDo1';
    $title_icon = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle   = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title      = mthan_get_section_val($slug, $section_data, 'title');
    $interval   = mthan_get_section_val($slug, $section_data, 'auto_slide_interval', '3000');
    $tabs       = mthan_get_section_val($slug, $section_data, 'tabs', array());

    $styles = mthan_section_styles($slug, $section_data);
    if (empty($tabs)) return;
?>
<section class="what-we-do <?php echo esc_attr($styles['class']); ?>" <?php echo $styles['style']; ?>>
    <div class="tabs-box service-tabs" data-interval="<?php echo esc_attr($interval); ?>">
        <div class="upper-box">
            <div class="pattern-layer"></div>

            <div class="auto-container">
                <div class="sec-title">
                    <?php if ($title_icon) { ?>
                    <div class="title-icon">
                        <span class="icon">
                            <img src="<?php echo esc_url($title_icon); ?>" alt="icon">
                        </span>
                    </div>
                    <?php } ?>
                    
                    <?php if ($subtitle) { ?>
                    <div class="subtitle">
                        <?php echo esc_html($subtitle); ?>
                    </div>
                    <?php } ?>
                    
                    <?php if ($title) { ?>
                    <h2>
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                    <?php } ?>
                </div>

                <div class="buttons">
                    <ul class="tab-buttons row clearfix">
                        <?php foreach ($tabs as $index => $tab) { ?>
                        <li class="tab-btn <?php echo ($index === 0) ? 'active-btn' : ''; ?> col" data-tab="#service-tab-<?php echo $index; ?>">
                            <span class="hvr-seeds"></span>
                            <div class="icon-box">
                                <?php 
                                    echo mthan_get_icon_html(isset($tab['tab_icon']) ? $tab['tab_icon'] : '', 'class="icon"'); 
                                    echo mthan_get_icon_html(isset($tab['tab_hover_icon']) ? $tab['tab_hover_icon'] : '', 'class="icon hvr-icon"'); 
                                ?>
                            </div>
                            <div class="btn-title">
                                <?php echo esc_html(isset($tab['tab_title']) ? $tab['tab_title'] : ''); ?>
                            </div>
                            <span class="arrow flaticon-right-1"></span>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tabs-content">
            <?php foreach ($tabs as $index => $tab) { ?>
            <?php
                $bg_image      = mthan_sec_img(isset($tab['bg_image']) ? $tab['bg_image'] : '');
                $content_icon  = isset($tab['content_icon']) ? $tab['content_icon'] : '';
                $content_title = isset($tab['content_title']) ? $tab['content_title'] : '';
                $content_text  = isset($tab['content_text']) ? $tab['content_text'] : '';
                $app_link      = mthan_get_link(isset($tab['appointment_link']) ? $tab['appointment_link'] : '');
                
                $service_sub   = isset($tab['service_subtitle']) ? $tab['service_subtitle'] : '';
                $service_title = isset($tab['service_title']) ? $tab['service_title'] : '';
                $service_text  = isset($tab['service_text']) ? $tab['service_text'] : '';
                
                $bro_img       = mthan_sec_img(isset($tab['brochure_img']) ? $tab['brochure_img'] : '');
                $bro_title     = isset($tab['brochure_title']) ? $tab['brochure_title'] : '';
                $bro_link_text = isset($tab['brochure_link_text']) ? $tab['brochure_link_text'] : '';
                $bro_link_url  = isset($tab['brochure_link_url']) ? $tab['brochure_link_url'] : '#';
                
                $more_text     = isset($tab['more_link_text']) ? $tab['more_link_text'] : '';
                $more_url      = mthan_get_link(isset($tab['more_link_url']) ? $tab['more_link_url'] : '');
            ?>
            <!--Tab-->
            <div class="tab <?php echo ($index === 0) ? 'active-tab' : ''; ?>" id="service-tab-<?php echo $index; ?>">
                <div class="row outer-container clearfix">
                    <!--Image Column-->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <?php if ($bg_image) { ?>
                        <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
                        <?php } ?>
                        <div class="inner clearfix">
                            <div class="content">
                                <div class="inner-box">
                                    <?php if ($content_icon) { ?>
                                    <div class="icon-box"><?php echo mthan_get_icon_html($content_icon); ?></div>
                                    <?php } ?>
                                    
                                    <?php if ($content_title) { ?>
                                    <h5><?php echo wp_kses_post($content_title); ?></h5>
                                    <?php } ?>
                                    
                                    <?php if ($content_text) { ?>
                                    <div class="text"><?php echo esc_html($content_text); ?></div>
                                    <?php } ?>
                                    
                                    <div class="link-box clearfix">
                                        <a href="<?php echo esc_url($app_link); ?>" class="theme-btn btn-style-one alt-hover">
                                            <span class="btn-title">Appointment <i class="arrow flaticon-play-button-1"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Text Column-->
                    <div class="text-column col-lg-6 col-md-12 col-sm-12">
                        <div class="big-icon"><?php echo mthan_get_icon_html(isset($tab['tab_hover_icon']) ? $tab['tab_hover_icon'] : ''); ?></div>
                        <div class="inner">
                            <div class="content">
                                <div class="s-title">
                                    <div class="icon"><?php echo mthan_get_icon_html(isset($tab['tab_hover_icon']) ? $tab['tab_hover_icon'] : ''); ?></div>
                                    <?php if ($service_sub) { ?>
                                    <div class="subtitle"><?php echo esc_html($service_sub); ?></div>
                                    <?php } ?>
                                    <?php if ($service_title) { ?>
                                    <h4><?php echo esc_html($service_title); ?></h4>
                                    <?php } ?>
                                </div>
                                
                                <?php if ($service_text) { ?>
                                <div class="text"><?php echo esc_html($service_text); ?></div>
                                <?php } ?>

                                <div class="b-box">
                                    <?php if ($bro_img) { ?>
                                    <div class="image"><a href="<?php echo esc_url($bro_link_url); ?>"><img src="<?php echo esc_url($bro_img); ?>" alt="brochure"></a></div>
                                    <?php } ?>
                                    
                                    <?php if ($bro_title) { ?>
                                    <div class="bro-title"><?php echo esc_html($bro_title); ?></div>
                                    <?php } ?>
                                    
                                    <?php if ($bro_link_text) { ?>
                                    <div class="bro-link"><a href="<?php echo esc_url($bro_link_url); ?>" class="theme-btn"><?php echo esc_html($bro_link_text); ?> <i class="arrow flaticon-play-button-1"></i></a></div>
                                    <?php } ?>
                                </div>

                                <?php if ($more_text) { ?>
                                <div class="more-link">
                                    <a href="<?php echo esc_url($more_url); ?>" class="theme-btn"><?php echo esc_html($more_text); ?> <i class="arrow flaticon-play-button-1"></i></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php }
