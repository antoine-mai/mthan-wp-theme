<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the why-us section instance.
 * @return array
 */
function mthan_section_why_us_options()
{
    return array(
        array(
            'id'      => 'style',
            'type'    => 'select',
            'title'   => 'Style',
            'options' => array(
                '1' => 'Style 1 (Grid)',
                '2' => 'Style 2 (Split)',
                '3' => 'Style 3 (Flap)',
            ),
            'default' => '1',
        ),
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'why choose us',
        ),
        array(
            'id'    => 'sec_subtitle_icon',
            'type'  => 'media',
            'library' => 'image',
            'preview' => false,
            'title' => 'Subtitle Icon',
            'default' => array('url' => get_template_directory_uri() . '/assets/images/icons/leaf-four.png')
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'The Number One Choice For Landscaping',
        ),
        array(
            'id'    => 'header_text',
            'type'  => 'textarea',
            'title' => 'Header Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
            'dependency' => array('style', 'any', '1,3'),
        ),
        // Style 2 specific fields
        array(
            'id'    => 'left_bg_image',
            'type'  => 'media',
            'library' => 'image',
            'preview' => false,
            'title' => 'Left Column BG Image',
            'dependency' => array('style', '==', '2'),
            'default' => array('url' => get_template_directory_uri() . '/assets/images/background/why-us-bg.jpg')
        ),
        array(
            'id'    => 'rating_value',
            'type'  => 'text',
            'title' => 'Rating Value',
            'default' => '4.9',
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'rating_text',
            'type'  => 'text',
            'title' => 'Rating Text',
            'default' => 'Customer Rating',
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'floated_text',
            'type'  => 'text',
            'title' => 'Floated Text',
            'default' => 'Since 2008',
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'content_text',
            'type'  => 'textarea',
            'title' => 'Content Text',
            'default' => 'It is a long established fact that a reader will distracted by the readable content.',
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'list_items',
            'type'  => 'textarea',
            'title' => 'List Items (one per line)',
            'default' => "Clean, Branded Vehicles\nProfessional, Uniformed Personnel\nTimely Response Guarantee\nReliable Equipment Maintained Daily",
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'How We Work',
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'btn_link',
            'type'  => 'text',
            'title' => 'Button Link',
            'default' => '#',
            'dependency' => array('style', '==', '2'),
        ),
        // Repeater for blocks
        array(
            'id'     => 'why_repeater',
            'type'   => 'group',
            'title'  => 'Why Us Blocks',
            'max'    => 8,
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'upload',
                    'preview' => false,
                    'title' => 'Icon Upload',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Description',
                ),
                array(
                    'id'    => 'link',
                    'type'  => 'text',
                    'title' => 'Link URL',
                ),
            ),
            'default' => array(
                array(
                    'title' => 'Experienced',
                    'icon' => 'flaticon-null',
                    'text' => 'Indignation and dislike mens who are so beguiled & the demoralized.',
                    'link' => '#'
                ),
                array(
                    'title' => 'Upfront Pricing',
                    'icon' => 'flaticon-insurance',
                    'text' => 'Take trivial example which of ever undertakes laborious physical exercise.',
                    'link' => '#'
                ),
                array(
                    'title' => 'Fully Insured',
                    'icon' => 'flaticon-offer',
                    'text' => 'Readable content page when looking at its layout making look like readable.',
                    'link' => '#'
                ),
                array(
                    'title' => 'Quality Products',
                    'icon' => 'flaticon-shovel',
                    'text' => 'How all this mistaken idea of denouncing pleasure and praising complete.',
                    'link' => '#'
                ),
                array(
                    'title' => 'Pet & Kid Safe',
                    'icon' => 'flaticon-dog-2',
                    'text' => 'How all this mistaken idea of denouncing pleasure and praising complete.',
                    'link' => '#'
                ),
                array(
                    'title' => 'Expert Staff',
                    'icon' => 'flaticon-gardener-1',
                    'text' => 'Take trivial example which of ever undertakes laborious physical exercise.',
                    'link' => '#'
                ),
                array(
                    'title' => '100% Guarantee',
                    'icon' => 'flaticon-medal-1',
                    'text' => 'Indignation and dislike mens who are so beguiled & the demoralized.',
                    'link' => '#'
                ),
                array(
                    'title' => 'Ontime Delivery',
                    'icon' => 'flaticon-on-time',
                    'text' => 'Readable content page when looking at its layout making look like readable.',
                    'link' => '#'
                ),
            )
        ),
    );
}

/**
 * Render the why-us section.
 */
function mthan_section_why_us_html($section_data) {
    $slug = 'why-us';
    $style = mthan_get_section_val($slug, $section_data, 'style', '1');
    
    if ($style === '2') {
        mthan_section_why_us_html_2($section_data);
    } elseif ($style === '3') {
        mthan_section_why_us_html_3($section_data);
    } else {
        mthan_section_why_us_html_1($section_data);
    }
}

/**
 * Style 1 Rendering (Grid)
 */
function mthan_section_why_us_html_1($section_data) {
    $slug = 'why-us';
    $sec_title    = mthan_get_section_val($slug, $section_data, 'sec_title', 'The Number One Choice For Landscaping');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'why choose us');
    $sec_sub_icon = mthan_sec_img($slug, $section_data, 'sec_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-four.png');
    $header_text  = mthan_get_section_val($slug, $section_data, 'header_text', 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.');
    $repeater     = mthan_get_section_val($slug, $section_data, 'why_repeater', array());
?>
<section class="why-us">
        <div class="pattern-layer"></div>
        <div class="right-leaf"></div>
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="left-col col-xl-6 col-lg-12 col-md-12">
                        <div class="sec-title alternate">
                            <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($sec_sub_icon); ?>" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                    <div class="right-col col-xl-6 col-lg-12 col-md-12">
                        <div class="text"><?php echo esc_html($header_text); ?></div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php foreach($repeater as $item): 
                    $title = !empty($item['title']) ? $item['title'] : '';
                    $icon  = !empty($item['icon']) ? $item['icon'] : '';
                    $text  = !empty($item['text']) ? $item['text'] : '';
                    $link  = !empty($item['link']) ? $item['link'] : '';
                ?>
                <!--Why Block-->
                <div class="why-block col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="<?php echo esc_attr($icon); ?>"></span>
                        </div>
                        <h5><?php echo esc_html($title); ?></h5>
                        <div class="text"><?php echo esc_html($text); ?></div>
                        <?php if($link): ?><div class="more-link"><a class="theme-btn" href="<?php echo esc_url($link); ?>"><span class="icon flaticon-right-arrow-1"></span></a></div><?php endif; ?>
                        <div class="right-curve"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
}

/**
 * Style 2 Rendering (Split)
 */
function mthan_section_why_us_html_2($section_data) {
    $slug = 'why-us';
    $sec_title    = mthan_get_section_val($slug, $section_data, 'sec_title', 'The Number One Choice For Landscaping');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'why choose us');
    $sec_sub_icon = mthan_sec_img($slug, $section_data, 'sec_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-five.png');
    $bg_image     = mthan_sec_img($slug, $section_data, 'left_bg_image', get_template_directory_uri() . '/assets/images/background/why-us-bg.jpg');
    $r_val        = mthan_get_section_val($slug, $section_data, 'rating_value', '4.9');
    $r_text       = mthan_get_section_val($slug, $section_data, 'rating_text', 'Customer Rating');
    $f_text       = mthan_get_section_val($slug, $section_data, 'floated_text', 'Since 2008');
    $c_text       = mthan_get_section_val($slug, $section_data, 'content_text', 'It is a long established fact that a reader will distracted by the readable content.');
    $btn_text     = mthan_get_section_val($slug, $section_data, 'btn_text', 'How We Work');
    $btn_link     = mthan_get_section_val($slug, $section_data, 'btn_link', '#');
    $list_items   = explode("\n", str_replace("\r", "", mthan_get_section_val($slug, $section_data, 'list_items', "Clean, Branded Vehicles\nProfessional, Uniformed Personnel\nTimely Response Guarantee\nReliable Equipment Maintained Daily")));
    $repeater     = mthan_get_section_val($slug, $section_data, 'why_repeater', array());
?>
<section class="why-us-two">
    <div class="outer-container">
        <div class="row clearfix">
            <!--Left Column-->
            <div class="left-col col-lg-6 col-md-12 col-sm-12">
                <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
                <div class="inner clearfix">
                    <div class="content-box">
                        <div class="rating">
                            <div class="stars"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                            <div class="count"><?php echo esc_html($r_val); ?></div>
                            <div class="rate-text"><?php echo wp_kses_post(nl2br($r_text)); ?></div>
                        </div>
                        <div class="floated-text">
                            <div class="floated-inner">
                                <span class="txt"><?php echo esc_html($f_text); ?></span>
                            </div>
                        </div>
                        <div class="pattern"></div>
                        <div class="content">
                            <div class="sec-title">
                                <div class="title-icon">
                                    <span class="icon">
                                        <img src="<?php echo esc_url($sec_sub_icon); ?>" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>" />
                                    </span>
                                </div>
                                <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                                <h2><?php echo esc_html($sec_title); ?></h2>
                            </div>
                            <div class="text"><?php echo esc_html($c_text); ?></div>
                            <ul>
                                <?php foreach($list_items as $li): if(trim($li)): ?>
                                    <li><?php echo esc_html($li); ?></li>
                                <?php endif; endforeach; ?>
                            </ul>
                            <?php if($btn_text): ?><div class="link-box"><a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four"><span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a></div><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--Right Column-->
            <div class="right-col col-lg-6 col-md-12 col-sm-12">
                <div class="pattern-layer"></div>

                <div class="inner clearfix">
                    <div class="row clearfix">
                        <?php foreach($repeater as $item): 
                            $title = !empty($item['title']) ? $item['title'] : '';
                            $icon  = !empty($item['icon']) ? $item['icon'] : '';
                            $text  = !empty($item['text']) ? $item['text'] : '';
                            $link  = !empty($item['link']) ? $item['link'] : '';
                        ?>
                        <!--Why Block-->
                        <div class="why-block-two col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <?php if($icon): ?><div class="icon-box"><img src="<?php echo esc_url($icon); ?>" alt="icon"></div><?php endif; ?>
                                <h5><?php echo esc_html($title); ?></h5>
                                <div class="text"><?php echo esc_html($text); ?></div>
                                <?php if($link): ?><div class="link-box"><a href="<?php echo esc_url($link); ?>"><span class="flaticon-right-1"></span></a></div><?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
}

/**
 * Style 3 Rendering (Flap)
 */
function mthan_section_why_us_html_3($section_data) {
    $slug = 'why-us';
    $sec_title    = mthan_get_section_val($slug, $section_data, 'sec_title', 'The Number One Choice For Landscaping');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'why choose us');
    $sec_sub_icon = mthan_sec_img($slug, $section_data, 'sec_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-eight.png');
    $header_text  = mthan_get_section_val($slug, $section_data, 'header_text', 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.');
    $repeater     = mthan_get_section_val($slug, $section_data, 'why_repeater', array());
?>
<section class="why-us-three">
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="left-col col-xl-6 col-lg-12 col-md-12">
                        <div class="sec-title alternate">
                            <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($sec_sub_icon); ?>" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                    <div class="right-col col-xl-6 col-lg-12 col-md-12">
                        <div class="text"><?php echo esc_html($header_text); ?></div>
                    </div>
                </div>
            </div>

            <div class="why-box">
                <div class="row clearfix">
                    <?php foreach($repeater as $item): 
                        $title = !empty($item['title']) ? $item['title'] : '';
                        $icon  = !empty($item['icon']) ? $item['icon'] : '';
                        $text  = !empty($item['text']) ? $item['text'] : '';
                    ?>
                    <!--Why Block-->
                    <div class="why-block-three col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="flap"></span>
                                <span class="icon <?php echo esc_attr($icon); ?>"></span>
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
