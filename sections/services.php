<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the services section instance.
 * @return array
 */
function mthan_section_services_options()
{
    return array(
        array(
            'id' => 'services_subtitle',
            'type' => 'text',
            'title' => 'Subtitle',
            'default' => 'Our Services',
        ),
        array(
            'id' => 'services_subtitle_icon',
            'type' => 'media',
            'library' => 'image',
            'preview' => false,
            'title' => 'Subtitle Icon',
            'default' => array('url' => get_template_directory_uri() . '/assets/images/icons/leaf-center.png')
        ),
        array(
            'id' => 'services_title',
            'type' => 'text',
            'title' => 'Title',
            'default' => 'What We Offer',
        ),
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
                    'preview' => false,
                    'title' => 'Image',
                ),
                    array(
                    'id' => 'services_icon',
                    'type' => 'upload',
                    'preview' => false,
                    'title' => 'Icon Upload',
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
    $slug = 'services';
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'subtitle', 'Our Services');
    $sec_title = mthan_get_section_val($slug, $section_data, 'title', 'What We Offer');
    $sec_sub_icon = mthan_sec_img($slug, $section_data, 'subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-center.png');
    $services_repeater = mthan_get_section_val($slug, $section_data, 'main_services_list', array());
?>
<section class="main-services">
    <div class="auto-container">
        <?php if($sec_title || $sec_subtitle): ?>
        <div class="sec-title centered">
            <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($sec_sub_icon); ?>" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
            <h2><?php echo esc_html($sec_title); ?></h2>
        </div>
        <?php endif; ?>

        <div class="row clearfix">
            <?php if (is_array($services_repeater)) : foreach ($services_repeater as $service):
        $img = !empty($service['services_image']['url']) ? $service['services_image']['url'] : '';
        $icon = !empty($service['services_icon']) ? $service['services_icon'] : '';
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