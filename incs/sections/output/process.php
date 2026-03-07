<?php defined('ABSPATH') or die('Cheatin\' uh?');


/**
 * Render the process section.
 */
function mthan_section_process_html($section_data) {
    $slug  = 'process';
    $style = mthan_get_section_val($slug, $section_data, 'section_style', '1');
    
    if ($style === '2') {
        mthan_section_process_html_2($section_data);
    } else {
        mthan_section_process_html_1($section_data);
    }
}

/**
 * Style 1 Rendering (Image Blocks)
 */
function mthan_section_process_html_1($section_data) {
    $slug = 'process';
    $sec_title    = mthan_get_section_val($slug, $section_data, 'sec_title', 'Our Simple Step Working Process');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'how we work');
    $header_text  = mthan_get_section_val($slug, $section_data, 'header_text', 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.');
    $repeater     = mthan_get_section_val($slug, $section_data, 'process_repeater', array());
    $fallback_imgs = array(
        get_template_directory_uri() . '/assets/images/resource/featured-image-5.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-6.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-7.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-8.jpg',
    );
?>
<section class="work-process">
        <div class="round-pattern-layer"></div>
        <div class="right-leaf"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/leaf-1.png" alt="<?php echo esc_attr($sec_title); ?>" title="<?php echo esc_attr($sec_title); ?>"></div>
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="left-col col-xl-6 col-lg-12 col-md-12">
                        <div class="sec-title alternate">
                            <div class="title-icon"><span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-four.png" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                    <div class="right-col col-xl-6 col-lg-12 col-md-12">
                        <div class="text"><?php echo esc_html($header_text); ?></div>
                    </div>
                </div>
            </div>

            <div class="process">
                <div class="row clearfix">
                    <?php foreach($repeater as $i => $item): 
                        $title = !empty($item['title']) ? $item['title'] : '';
                        $step  = !empty($item['step_label']) ? $item['step_label'] : '';
                        $icon  = !empty($item['icon']) ? $item['icon'] : '';
                        $img   = !empty($item['image']['url']) ? $item['image']['url'] : $fallback_imgs[$i % count($fallback_imgs)];
                        $text  = !empty($item['text']) ? $item['text'] : '';
                    ?>
                    <!--Process Block-->
                    <div class="process-block col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                                <div class="hover-box">
                                    <div class="hvr-content">
                                        <div class="text"><?php echo esc_html($text); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <div class="icon-box">
                                    <span class="<?php echo esc_attr($icon); ?>"></span>
                                </div>
                                <div class="step"><?php echo esc_html($step); ?></div>
                                <h5><?php echo esc_html($title); ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php
}

/**
 * Style 2 Rendering (Icon Blocks)
 */
function mthan_section_process_html_2($section_data) {
    $slug = 'process';
    $sec_title    = mthan_get_section_val($slug, $section_data, 'sec_title', 'Our Simple Step Working Process');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'how we work');
    $header_text  = mthan_get_section_val($slug, $section_data, 'header_text', 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.');
    $repeater     = mthan_get_section_val($slug, $section_data, 'process_repeater', array());
?>
<section class="work-process-two">
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="left-col col-xl-6 col-lg-12 col-md-12">
                        <div class="sec-title alternate">
                            <div class="title-icon"><span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-four.png" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                    <div class="right-col col-xl-6 col-lg-12 col-md-12">
                        <div class="text"><?php echo esc_html($header_text); ?></div>
                    </div>
                </div>
            </div>

            <div class="process">
                <div class="row clearfix">
                    <?php foreach($repeater as $item): 
                        $title = !empty($item['title']) ? $item['title'] : '';
                        $step  = !empty($item['step_label']) ? $item['step_label'] : '';
                        $icon  = !empty($item['icon']) ? $item['icon'] : '';
                        $text  = !empty($item['text']) ? $item['text'] : '';
                    ?>
                    <!--Process Block-->
                    <div class="process-block-two col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon">
                                    <span class="<?php echo esc_attr($icon); ?>"></span>
                                </div>
                                <div class="count"><span class="number"><?php echo esc_html($step); ?></span></div>
                            </div>
                            <h5><?php echo esc_html($title); ?></h5>
                            <div class="text"><?php echo esc_html($text); ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php
}
