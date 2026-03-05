<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the services section instance.
 * @return array
 */
function mthan_section_services_options()
{
    return array(
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Our Solutions',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Main Services',
        ),
        array(
            'id'    => 'sec_text',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
        array(
            'id'     => 'services_repeater',
            'type'   => 'group',
            'title'  => 'Services List',
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Image',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'text',
                    'title' => 'Icon Class (Flaticon)',
                    'default' => 'flaticon-hedge',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Description',
                ),
                array(
                    'id'    => 'link',
                    'type'  => 'text',
                    'title' => 'Link',
                    'default' => '#',
                ),
            ),
            'default' => array(
                array(
                    'title' => 'Spring Cleanup',
                    'text'  => 'Indignation and dislike men who are so beguiled demoralized ...',
                    'icon'  => 'flaticon-hedge',
                ),
                array(
                    'title' => 'Garden Care',
                    'text'  => 'Frequently occur that pleasures have to berepudiated & accepted ...',
                    'icon'  => 'flaticon-wheelbarrow',
                ),
                array(
                    'title' => 'Water Fountain',
                    'text'  => 'Duty through weakness of will which is the same as saying through ...',
                    'icon'  => 'flaticon-sprinkler',
                ),
            ),
        ),
    );
}

/**
 * Render the services section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_services_html($section_data) { 
    $sec_title         = isset($section_data['sec_title']) ? $section_data['sec_title'] : 'Main Services';
    $sec_subtitle      = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Our Solutions';
    $sec_text          = isset($section_data['sec_text']) ? $section_data['sec_text'] : '';
    $services_repeater = isset($section_data['services_repeater']) ? $section_data['services_repeater'] : array();
?>
<section class="main-services">
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="left-col col-xl-6 col-lg-12 col-md-12">
                        <div class="sec-title alternate">
                            <div class="title-icon"><span class="icon"><img src="images/icons/leaf-four.png" alt="" title=""></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                    <?php if($sec_text): ?>
                    <div class="right-col col-xl-6 col-lg-12 col-md-12">
                        <div class="text"><?php echo esc_html($sec_text); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row clearfix">
                <?php foreach($services_repeater as $service): 
                    $img   = isset($service['image']) ? $service['image'] : '';
                    $icon  = isset($service['icon']) ? $service['icon'] : 'flaticon-hedge';
                    $title = isset($service['title']) ? $service['title'] : '';
                    $text  = isset($service['text']) ? $service['text'] : '';
                    $link  = isset($service['link']) ? $service['link'] : '#';
                ?>
                <!--Service block-->
                <div class="service-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="upper">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>">
                            </div>
                            <div class="hvr-icon"><span class="<?php echo esc_attr($icon); ?>"></span></div>
                        </div>
                        <div class="lower">
                            <div class="icon-right"><span class="<?php echo esc_attr($icon); ?>"></span></div>
                            <h5><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h5>
                            <div class="text"><?php echo esc_html($text); ?></div>
                            <div class="more-link"><a href="<?php echo esc_url($link); ?>">Read More <i class="icon fa fa-caret-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php }
