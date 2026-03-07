<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the areas section instance.
 * @return array
 */
function mthan_section_areas_options()
{
    return array(
        mthan_subtitle_field(''),
        mthan_title_field(''),
        array(
            'id'     => 'areas_blocks',
            'type'   => 'group',
            'title'  => 'Area Blocks',
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'subtitle',
                    'type'  => 'text',
                    'title' => 'Subtext',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'text',
                    'title' => 'Icon Class',
                ),
                mthan_page_select_field('link', 'Link Page'),
            ),
            'default' => array(
                array(
                    'title'    => 'Commercial Area',
                    'subtitle' => 'Land local open spaces',
                    'icon'     => 'flaticon-flower-shop',
                    'link'     => '#',
                ),
                array(
                    'title'    => 'Residential Area',
                    'subtitle' => 'Land surrounding a home',
                    'icon'     => 'flaticon-house-1',
                    'link'     => '#',
                ),
                array(
                    'title'    => 'Public Area',
                    'subtitle' => 'Land open to the Public',
                    'icon'     => 'flaticon-park-3',
                    'link'     => '#',
                ),
            ),
        ),
    );
}
