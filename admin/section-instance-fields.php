<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the per-instance option fields for each section type.
 * These are merged into every group repeater in layouts.php and metaboxes.
 *
 * Each field uses 'dependency' so it only shows when the matching
 * section_template is selected.
 */
function mthan_get_section_instance_fields()
{
    return array(

        // ── Banner Section ────────────────────────────────────────────
            array(
            'type' => 'subheading',
            'content' => 'Banner Section Options',
            'dependency' => array('section_template', '==', 'banner-section'),
        ),
        // Slide 1
            array('id' => 'banner_slide_1_image', 'type' => 'media', 'library' => 'image', 'title' => 'Slide 1 – Background Image', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_1_subtitle', 'type' => 'text', 'title' => 'Slide 1 – Subtitle', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_1_title', 'type' => 'text', 'title' => 'Slide 1 – Title (H1)', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_1_align', 'type' => 'select', 'title' => 'Slide 1 – Alignment', 'options' => array('left' => 'Left', 'right' => 'Right'), 'default' => 'left', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_1_btn1_text', 'type' => 'text', 'title' => 'Slide 1 – Button 1 Text', 'default' => 'Read More', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_1_btn1_link', 'type' => 'text', 'title' => 'Slide 1 – Button 1 Link', 'default' => '#', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_1_btn2_text', 'type' => 'text', 'title' => 'Slide 1 – Button 2 Text', 'default' => 'Contact Us', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_1_btn2_link', 'type' => 'text', 'title' => 'Slide 1 – Button 2 Link', 'default' => '#', 'dependency' => array('section_template', '==', 'banner-section')),
        // Slide 2
            array('id' => 'banner_slide_2_image', 'type' => 'media', 'library' => 'image', 'title' => 'Slide 2 – Background Image', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_2_subtitle', 'type' => 'text', 'title' => 'Slide 2 – Subtitle', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_2_title', 'type' => 'text', 'title' => 'Slide 2 – Title (H1)', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_2_align', 'type' => 'select', 'title' => 'Slide 2 – Alignment', 'options' => array('left' => 'Left', 'right' => 'Right'), 'default' => 'right', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_2_btn1_text', 'type' => 'text', 'title' => 'Slide 2 – Button 1 Text', 'default' => 'Read More', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_2_btn1_link', 'type' => 'text', 'title' => 'Slide 2 – Button 1 Link', 'default' => '#', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_2_btn2_text', 'type' => 'text', 'title' => 'Slide 2 – Button 2 Text', 'default' => 'Services', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_2_btn2_link', 'type' => 'text', 'title' => 'Slide 2 – Button 2 Link', 'default' => '#', 'dependency' => array('section_template', '==', 'banner-section')),
        // Slide 3
            array('id' => 'banner_slide_3_image', 'type' => 'media', 'library' => 'image', 'title' => 'Slide 3 – Background Image', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_3_subtitle', 'type' => 'text', 'title' => 'Slide 3 – Subtitle', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_3_title', 'type' => 'text', 'title' => 'Slide 3 – Title (H1)', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_3_align', 'type' => 'select', 'title' => 'Slide 3 – Alignment', 'options' => array('left' => 'Left', 'right' => 'Right'), 'default' => 'left', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_3_btn1_text', 'type' => 'text', 'title' => 'Slide 3 – Button 1 Text', 'default' => 'Read More', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_3_btn1_link', 'type' => 'text', 'title' => 'Slide 3 – Button 1 Link', 'default' => '#', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_3_btn2_text', 'type' => 'text', 'title' => 'Slide 3 – Button 2 Text', 'default' => 'Services', 'dependency' => array('section_template', '==', 'banner-section')),
            array('id' => 'banner_slide_3_btn2_link', 'type' => 'text', 'title' => 'Slide 3 – Button 2 Link', 'default' => '#', 'dependency' => array('section_template', '==', 'banner-section')),

    );
}