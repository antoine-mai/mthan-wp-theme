<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the services section instance.
 * @return array
 */
function mthan_section_services_options()
{
    return array(
        array(
            'id' => 'main_services_list',
            'type' => 'group',
            'title' => 'Services List',
            'fields' => array(
                    array(
                    'id' => 'services_title',
                    'type' => 'text',
                    'title' => 'Title',
                ),
                    array(
                    'id' => 'services_image',
                    'type' => 'upload',
                    'title' => 'Image',
                ),
                    array(
                    'id' => 'services_icon',
                    'type' => 'text',
                    'title' => 'Icon Class (Flaticon)',
                    'default' => 'flaticon-hedge',
                ),
                    array(
                    'id' => 'services_text',
                    'type' => 'textarea',
                    'title' => 'Description',
                ),
                mthan_page_select_field('services_link', 'Link to Page'),
            ),
            'default' => array(
                    array(
                    'services_title' => 'Spring Cleanup',
                    'services_text' => 'Indignation and dislike men who are so beguiled demoralized ...',
                    'services_icon' => 'flaticon-hedge',
                ),
                    array(
                    'services_title' => 'Garden Care',
                    'services_text' => 'Frequently occur that pleasures have to berepudiated & accepted ...',
                    'services_icon' => 'flaticon-wheelbarrow',
                ),
                    array(
                    'services_title' => 'Water Fountain',
                    'services_text' => 'Duty through weakness of will which is the same as saying through ...',
                    'services_icon' => 'flaticon-sprinkler',
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
function mthan_section_services_html($section_data)
{
    $services_repeater = !empty($section_data['services_list']) && is_array($section_data['services_list']) ? $section_data['services_list'] : array();
?>
<section class="main-services">
    <div class="auto-container">

        <div class="row clearfix">
            <?php if (is_array($services_repeater)) : foreach ($services_repeater as $service):
        $img = !empty($service['services_image']['url']) ? $service['services_image']['url'] : '';
        $icon = !empty($service['services_icon']) ? $service['services_icon'] : 'flaticon-hedge';
        $title = !empty($service['services_title']) ? $service['services_title'] : 'Service Title';
        $text = !empty($service['services_text']) ? $service['services_text'] : 'Service text description here ...';
        $link = !empty($service['services_link']) ? get_permalink($service['services_link']) : '#';
?>
            <!--Service block-->
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="upper">
                        <div class="image-box">
                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>"
                                title="<?php echo esc_attr($title); ?>">
                        </div>
                        <div class="hvr-icon"><span class="<?php echo esc_attr($icon); ?>"></span></div>
                    </div>
                    <div class="lower">
                        <div class="icon-right"><span class="<?php echo esc_attr($icon); ?>"></span></div>
                        <h5><a href="<?php echo esc_url($link); ?>">
                                <?php echo esc_html($title); ?>
                            </a></h5>
                        <div class="text">
                            <?php echo esc_html($text); ?>
                        </div>
                        <div class="more-link"><a href="<?php echo esc_url($link); ?>">Read More <i
                                    class="icon fa fa-caret-right"></i></a></div>
                    </div>
                </div>
            </div>
            <?php
    endforeach; endif; ?>

        </div>
    </div>
</section>
<?php
}