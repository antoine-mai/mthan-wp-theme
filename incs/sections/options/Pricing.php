<?php defined('ABSPATH') || exit;

/**
 * Pricing Section Options
 */
function mthan_section_Pricing_options() {
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    return array(
        array(
            'id'    => 'title_icon',
            'type'  => 'upload',
            'title' => 'Title Icon',
            'default' => $icon_path . 'leaf-four.png',
        ),
        array(
            'id'    => 'subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Pricing & Plans',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Maintenance Cost',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Pricing Plans',
            'default' => array(
                array(
                    'title'     => 'Basic Care Plan',
                    'price'     => '59',
                    'frequency' => 'Price Per Single Visit',
                    'btn_text'  => 'Get It Now',
                    'features'  => "Mowing\nEdging\nWeedeating\n[x] Lawn & Bed\n[x] Shrub Cleanup",
                ),
                array(
                    'title'     => 'Basic + Care Plan',
                    'price'     => '99',
                    'frequency' => 'Price Per Month',
                    'btn_text'  => 'Get It Now',
                    'features'  => "Mowing\nEdging\nWeedeating\nLawn & Bed\n[x] Shrub Cleanup",
                ),
                array(
                    'title'     => 'Total Care Plan',
                    'price'     => '149',
                    'frequency' => 'Price Per Month',
                    'btn_text'  => 'Get It Now',
                    'features'  => "Mowing\nEdging\nWeedeating\nLawn & Bed\nShrub Cleanup",
                ),
                array(
                    'title'     => 'Total + Care Plan',
                    'price'     => '299',
                    'frequency' => 'Price For Lifetime',
                    'btn_text'  => 'Get It Now',
                    'features'  => "Mowing\nEdging\nWeedeating\nLawn & Bed\nShrub Cleanup",
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Plan Title',
                ),
                array(
                    'id'    => 'price',
                    'type'  => 'text',
                    'title' => 'Price',
                ),
                array(
                    'id'    => 'currency',
                    'type'  => 'text',
                    'title' => 'Currency Symbol',
                    'default' => '$',
                ),
                array(
                    'id'    => 'frequency',
                    'type'  => 'text',
                    'title' => 'Frequency Text',
                ),
                array(
                    'id'    => 'features',
                    'type'  => 'textarea',
                    'title' => 'Features List',
                    'help'  => 'One feature per line. Use [x] at the beginning for disabled features.',
                ),
                array(
                    'id'    => 'btn_text',
                    'type'  => 'text',
                    'title' => 'Button Text',
                ),
                mthan_page_select_field('btn_link', 'Button Link'),
            ),
        ),
    );
}
