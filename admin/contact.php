<?php defined('ABSPATH') or die('Cheatin\' uh?');

// Contact Settings
CSF::createSection(MTHAN_THEME_OPTIONS, array(
    'id'    => 'contact_settings',
    'title' => 'Contact',
    'icon'  => 'fas fa-envelope',
    'fields' => array(
        array(
            'id'    => 'contact_phone',
            'type'  => 'text',
            'title' => 'Phone Number',
        ),
        array(
            'id'    => 'contact_email',
            'type'  => 'text',
            'title' => 'Email Address',
        ),
        array(
            'id'    => 'contact_address',
            'type'  => 'textarea',
            'title' => 'Address',
        ),
        array(
            'id'    => 'contact_working_hours',
            'type'  => 'textarea',
            'title' => 'Working Hours',
            'desc'  => 'Enter working hours, one per line.',
        ),
        array(
            'id'    => 'contact_map_iframe',
            'type'  => 'textarea',
            'title' => 'Map Iframe',
            'desc'  => 'Paste the Google Maps iframe embed code here.',
        ),
    )
));
