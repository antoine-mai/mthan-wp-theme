<?php defined('ABSPATH') || exit;

/**
 * Facts 2 Section Options
 */
function mthan_section_Facts2_options() {
    return array(
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Fact Blocks',
            'default' => array(
                array(
                    'icon'  => 'flaticon-gardener',
                    'count' => '84',
                    'speed' => '3000',
                    'title' => 'Specialist',
                    'subtitle' => 'Professional Designers',
                ),
                array(
                    'icon'  => 'flaticon-park',
                    'count' => '35',
                    'speed' => '2000',
                    'title' => 'Projects',
                    'subtitle' => 'Ongoing in Company',
                ),
                array(
                    'icon'  => 'flaticon-medal',
                    'count' => '23',
                    'suffix' => '+',
                    'speed' => '2000',
                    'title' => 'Award',
                    'subtitle' => 'Winning Landscapers',
                ),
                array(
                    'icon'  => 'flaticon-customer-review-1',
                    'count' => '84',
                    'suffix' => '%',
                    'speed' => '2000',
                    'title' => 'Clients',
                    'subtitle' => 'Satisfied by Our Work',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'icon',
                    'type'  => 'text',
                    'title' => 'Icon Class',
                ),
                array(
                    'id'    => 'count',
                    'type'  => 'text',
                    'title' => 'Count Number',
                ),
                array(
                    'id'    => 'suffix',
                    'type'  => 'text',
                    'title' => 'Suffix (e.g. +, %)',
                ),
                array(
                    'id'    => 'speed',
                    'type'  => 'text',
                    'title' => 'Animation Speed (ms)',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'subtitle',
                    'type'  => 'text',
                    'title' => 'Subtitle',
                ),
            ),
        ),
    );
}
