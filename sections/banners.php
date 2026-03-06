<?php defined('ABSPATH') || exit;

/**
 * Returns the CSF field definitions for the banner section instance.
 * Called by mthan_get_section_instance_fields() → section-instance-fields.php.
 *
 * NOTE: 'title' field MUST be first — CSF group.php:96 uses fields[0] value
 * as the accordion title text. 'image' (media → array) as fields[0] would
 * cause "Array to string conversion".
 *
 * @return array[]
 */
function mthan_section_banners_options()
{
    return array(
        array('type' => 'subheading', 'content' => 'Banner Section Options'),
        array(
            'id'           => 'banner_slides',
            'type'         => 'group',
            'title'        => 'Slides',
            'button_title' => '+ Add Slide',
            'fields'       => array(
                array('id' => 'title',    'type' => 'text',   'title' => 'Title (H1)'),
                array('id' => 'subtitle', 'type' => 'text',   'title' => 'Subtitle'),
                array('id' => 'image',    'type' => 'media',  'library' => 'image', 'title' => 'Background Image'),
                array('id' => 'align',    'type' => 'select', 'title' => 'Content Alignment', 'options' => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right'), 'default' => 'center'),
                array('id' => 'btn1_text','type' => 'text',   'title' => 'Button 1 Text', 'default' => 'Read More'),
                mthan_page_select_field('btn1_link', 'Button 1 Page'),
                array('id' => 'btn2_text','type' => 'text',   'title' => 'Button 2 Text', 'default' => 'Contact Us'),
                mthan_page_select_field('btn2_link', 'Button 2 Page'),
            ),
        ),
    );
}

/**
 * Render the banner-section section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_banners_html($section_data)
{
    $slug = 'banners';
    $raw_slides = mthan_get_section_val($slug, $section_data, 'slides', array());

    if (empty($raw_slides)) {
        $base = get_template_directory_uri() . '/assets/images/main-slider/';
        $raw_slides = array(
            array(
                'image'     => array('url' => $base . '1.jpg'),
                'subtitle'  => 'Welcome to Pruners',
                'title'     => 'Brilliant Hands <br>For Your Landscaping',
                'align'     => 'left',
                'btn1_text' => 'Read More',
                'btn1_link' => '#',
                'btn2_text' => 'Contact Us',
                'btn2_link' => '#',
            ),
            array(
                'image'     => array('url' => $base . '2.jpg'),
                'subtitle'  => 'Form of Impression',
                'title'     => 'Complete Solution <br>for Your Landscaping',
                'align'     => 'right',
                'btn1_text' => 'Read More',
                'btn1_link' => '#',
                'btn2_text' => 'Services',
                'btn2_link' => '#',
            ),
            array(
                'image'     => array('url' => $base . '3.jpg'),
                'subtitle'  => '100% Gurantee Works',
                'title'     => 'We Give Guarantee <br>for Healthy Landscapes',
                'align'     => 'left',
                'btn1_text' => 'Read More',
                'btn1_link' => '#',
                'btn2_text' => 'Contact Us',
                'btn2_link' => '#',
            ),
        );
    }

    $slides = array();
    foreach ($raw_slides as $s) {
        $img   = !empty($s['image']['url']) ? $s['image']['url'] : '';
        $title = !empty($s['title'])        ? $s['title']        : '';
        if (!$img && !$title) { continue; }

        $btn1_id = !empty($s['btn1_link']) ? $s['btn1_link'] : '';
        $btn2_id = !empty($s['btn2_link']) ? $s['btn2_link'] : '';
        if (is_array($btn1_id)) { $btn1_id = reset($btn1_id); }
        if (is_array($btn2_id)) { $btn2_id = reset($btn2_id); }

        $slides[] = array(
            'img'       => $img,
            'subtitle'  => !empty($s['subtitle'])  ? $s['subtitle']  : '',
            'title'     => $title,
            'align'     => !empty($s['align'])     ? $s['align']     : 'center',
            'btn1_text' => !empty($s['btn1_text']) ? $s['btn1_text'] : '',
            'btn1_link' => $btn1_id ? (is_numeric($btn1_id) ? get_permalink((int) $btn1_id) : $btn1_id) : '#',
            'btn2_text' => !empty($s['btn2_text']) ? $s['btn2_text'] : '',
            'btn2_link' => $btn2_id ? (is_numeric($btn2_id) ? get_permalink((int) $btn2_id) : $btn2_id) : '#',
        );
    }
    ?>
<section class="banner-section banner-two">
    <div class="banner-carousel owl-theme owl-carousel">
        <?php foreach ($slides as $slide) { $alignment_class = ' ' . $slide['align'] . '-aligned'; ?>
        <div class="slide-item">
            <div class="image-layer" style="background-image: url(<?php echo esc_url($slide['img']); ?>);"></div>
            <div class="auto-container">
                <div class="content-box<?php echo $alignment_class; ?>">
                    <div class="content clearfix">
                        <div class="inner">
                            <?php if ($slide['subtitle']) { ?>
                            <div class="subtitle">
                                <?php echo esc_html($slide['subtitle']); ?>
                            </div>
                            <?php } ?>
                            <?php if ($slide['title']) { ?>
                            <h1>
                                <?php echo esc_html($slide['title']); ?>
                            </h1>
                            <?php } ?>
                            <div class="link-box clearfix">
                                <?php if ($slide['btn1_text']) { ?>
                                <a href="<?php echo esc_url($slide['btn1_link']); ?>" class="theme-btn btn-style-one">
                                    <span class="btn-title">
                                        <?php echo esc_html($slide['btn1_text']); ?> <i class="arrow flaticon-play-button-1"></i>
                                    </span>
                                </a>
                                <?php } ?>
                                <?php if ($slide['btn2_text']) { ?>
                                <a href="<?php echo esc_url($slide['btn2_link']); ?>" class="theme-btn btn-style-three">
                                    <span class="btn-title">
                                        <?php echo esc_html($slide['btn2_text']); ?> <i class="arrow flaticon-play-button-1"></i>
                                    </span>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
    <?php
}
