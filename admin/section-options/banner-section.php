<?php defined('ABSPATH') or die('Cheatin\' uh?');
if (!class_exists('CSF')) {
    return;
}

CSF::createSection('mthan_theme_options', array(
    'title' => 'Banner Section',
    'icon' => 'fa fa-image',
    'fields' => array(

            array(
            'id' => 'banner_slides',
            'type' => 'group',
            'title' => 'Slides',
            'button_title' => 'Add Slide',
            'accordion_title_auto' => true,
            'accordion_title_prefix' => 'Slide: ',
            'accordion_title_number' => true,
            'fields' => array(

                    array(
                    'id' => 'name',
                    'type' => 'text',
                    'title' => 'Name',
                    'attributes' => array('data-section-name' => '1', 'placeholder' => 'Slide name'),
                ),

                    array(
                    'id' => 'background_image',
                    'type' => 'media',
                    'title' => 'Background Image',
                    'library' => 'image',
                ),

                    array(
                    'id' => 'subtitle',
                    'type' => 'text',
                    'title' => 'Subtitle',
                ),

                    array(
                    'id' => 'title',
                    'type' => 'text',
                    'title' => 'Title (H1)',
                ),

                    array(
                    'id' => 'align',
                    'type' => 'select',
                    'title' => 'Content Alignment',
                    'options' => array(
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                    ),
                    'default' => 'center',
                ),

                    array(
                    'id' => 'btn1_text',
                    'type' => 'text',
                    'title' => 'Button 1 Text',
                    'default' => 'Read More',
                ),

                    array(
                    'id' => 'btn1_link',
                    'type' => 'text',
                    'title' => 'Button 1 Link',
                    'default' => '#',
                ),

                    array(
                    'id' => 'btn2_text',
                    'type' => 'text',
                    'title' => 'Button 2 Text',
                    'default' => 'Contact Us',
                ),

                    array(
                    'id' => 'btn2_link',
                    'type' => 'text',
                    'title' => 'Button 2 Link',
                    'default' => '#',
                ),

            ),
        ),

    ),
));