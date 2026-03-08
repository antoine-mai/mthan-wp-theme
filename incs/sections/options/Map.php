<?php defined('ABSPATH') || exit;

/**
 * Map Section Options
 */
function mthan_section_Map_options() {
    return array(
        array(
            'id'    => 'map_iframe',
            'type'  => 'textarea',
            'title' => 'Google Map Iframe Source',
            'help'  => 'Paste the src URL from the Google Maps embed code, OR the full <iframe> tag.',
            'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77179.27405929092!2d144.96587780970705!3d-37.8497500129152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d34379057b1%3A0xf0456760532d450!2sQueen%20Victoria%20Market!5e0!3m2!1sen!2s!4v1602054031836!5m2!1sen!2s',
        ),
        array(
            'id'    => 'map_height',
            'type'  => 'text',
            'title' => 'Map Height',
            'default' => '500px',
        ),
    );
}
