<?php defined('ABSPATH') || exit;

/**
 * Call To Action 1 Section Options
 */
function mthan_section_CTA1_options() {
    return array(
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Do you need tree care for your home?',
        ),
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'Send Message',
        ),
        array(
            'id'    => 'btn_link',
            'type'  => 'link',
            'title' => 'Button Link',
        ),
        array(
            'id'    => 'phone',
            'type'  => 'text',
            'title' => 'Phone Number',
            'default' => '+31 65 792 63 11',
        ),
    );
}
