<?php defined('ABSPATH') || exit;

/**
 * Contact 3 Section Options
 */
function mthan_section_Contact3_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';
    $bg_path = get_template_directory_uri() . '/assets/images/background/';

    return array(
        // Left Column (Text & Info)
        array(
            'id'    => 'left_icon',
            'type'  => 'upload',
            'title' => 'Top Hidden Icon',
            'default' => 'flaticon-internet',
        ),
        array(
            'id'    => 'sec_title_icon',
            'type'  => 'upload',
            'title' => 'Section Title Icon',
            'default' => $icon_path . 'leaf-two.png',
        ),
        array(
            'id'    => 'subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Get In Touch',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Here to Help You',
        ),
        // Address Block
        array(
            'id'    => 'address_title',
            'type'  => 'text',
            'title' => 'Address Title',
            'default' => 'Main Office',
        ),
        array(
            'id'    => 'address_text',
            'type'  => 'textarea',
            'title' => 'Address Text',
            'default' => 'PO Box 515381 Lander, Garden Street LA 90029 USA.',
        ),
        array(
            'id'    => 'map_link_text',
            'type'  => 'text',
            'title' => 'Map Link Text',
            'default' => 'Find On Map',
        ),
        mthan_page_select_field('map_url', 'Map URL', [
            'default' => [
                'url' => 'https://www.google.com/maps'
            ]
        ]),
        // Info Blocks (Phones, Email, Hours)
        array(
            'id'    => 'info_items',
            'type'  => 'group',
            'title' => 'Contact Info Blocks',
            'max'   => 2,
            'default' => array(
                array(
                    'title' => 'Phone & Email',
                    'icon'  => 'flaticon-message-1',
                    'lines' => "(+5) 678 90 12 345\nservice@landerteam.com",
                ),
                array(
                    'title' => 'Working Hours',
                    'icon'  => 'flaticon-clock',
                    'lines' => "Mon-Friday: 09am to 07pm\nSat: 10.00am to 04pm",
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'upload',
                    'title' => 'Icon (Class or Image)',
                ),
                array(
                    'id'    => 'lines',
                    'type'  => 'textarea',
                    'title' => 'Lines (one per line)',
                ),
            ),
        ),
        // Right Column (Form)
        array(
            'id'    => 'form_bg',
            'type'  => 'upload',
            'title' => 'Form Column Background',
            'default' => $bg_path . 'contact-form-bg.jpg',
        ),
        array(
            'id'    => 'form_image',
            'type'  => 'upload',
            'title' => 'Right Foreground Image',
            'default' => $img_path . 'contact-image.png',
        ),
        array(
            'id'    => 'form_subtitle',
            'type'  => 'text',
            'title' => 'Form Subtitle',
            'default' => 'Drop a Line',
        ),
        array(
            'id'    => 'form_title',
            'type'  => 'text',
            'title' => 'Form Title',
            'default' => 'Send Message Us',
        ),
        array(
            'id'    => 'form_shortcode',
            'type'  => 'text',
            'title' => 'Contact Form 7 Shortcode',
            'help'  => 'Paste your CF7 shortcode here. If empty, the demo form will be shown.',
        ),
    );
}
