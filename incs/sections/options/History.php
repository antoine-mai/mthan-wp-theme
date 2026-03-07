<?php defined('ABSPATH') || exit;

/**
 * History Section Options
 */
function mthan_section_History_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    
    return array(
        // MVG Blocks (Exactly 3 usually)
        array(
            'id'    => 'mvg_items',
            'type'  => 'group',
            'title' => 'MVG Blocks (Mission, Vision, Goals)',
            'max'   => 3,
            'default' => array(
                array(
                    'title'    => 'Our Mission',
                    'subtitle' => 'Pruners',
                    'letter'   => 'M',
                    'image'    => $img_path . 'mission-image.jpg',
                ),
                array(
                    'title'    => 'Our Vision',
                    'subtitle' => 'Pruners',
                    'letter'   => 'V',
                    'image'    => $img_path . 'vision-image.jpg',
                ),
                array(
                    'title'    => 'Our Goals',
                    'subtitle' => 'Pruners',
                    'letter'   => 'G',
                    'image'    => $img_path . 'goal-image.jpg',
                ),
            ),
            'fields' => array(
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
                array(
                    'id'    => 'letter',
                    'type'  => 'text',
                    'title' => 'Overlay Letter (e.g. M, V, G)',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Image',
                    'help'  => 'Recommended size: 270x300px',
                ),
            ),
        ),
        // MVG Descriptions Carousel
        array(
            'id'    => 'mvg_desc_items',
            'type'  => 'group',
            'title' => 'MVG Descriptions (Carousel)',
            'default' => array(
                array(
                    'title' => 'Mission Statement',
                    'icon'  => 'flaticon-bullseye',
                    'text'  => 'Business will frequently occur that pleasures have to be repudiated & annoyances accepted.',
                ),
                array(
                    'title' => 'Vision Statement',
                    'icon'  => 'flaticon-bullseye',
                    'text'  => 'Business will frequently occur that pleasures have to be repudiated & annoyances accepted.',
                ),
                array(
                    'title' => 'Goals Statement',
                    'icon'  => 'flaticon-bullseye',
                    'text'  => 'Business will frequently occur that pleasures have to be repudiated & annoyances accepted.',
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
                    'type'  => 'text',
                    'title' => 'Icon Class (flaticon-...)',
                    'default' => 'flaticon-bullseye',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Description',
                ),
                array(
                    'id'    => 'link_text',
                    'type'  => 'text',
                    'title' => 'Link Text',
                    'default' => 'Continue Reading',
                ),
                mthan_page_select_field('link_url', 'Link URL'),
            ),
        ),
        // History Timeline Carousel
        array(
            'id'    => 'history_items',
            'type'  => 'group',
            'title' => 'History Timeline Items',
            'default' => array(
                array('year' => '2004', 'title' => 'Early Start', 'text' => 'It is a long established fact that will be distracted.'),
                array('year' => '2006', 'title' => 'Growing Pains', 'text' => 'Indignation and dislike men who are so good beguiled.'),
                array('year' => '2007', 'title' => 'Future Goals', 'text' => 'Demoralized by the charms off the pleasure moment.'),
                array('year' => '2009', 'title' => '1000+ Projects', 'text' => 'Foresee the pain & trouble finaly bound too ensure.'),
            ),
            'fields' => array(
                array(
                    'id'    => 'year',
                    'type'  => 'text',
                    'title' => 'Year',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Short Text',
                ),
            ),
        ),
        // Bottom Button
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Bottom Button Text',
            'default' => 'View Full History',
        ),
        mthan_page_select_field('btn_link', 'Bottom Button Link'),
    );
}
