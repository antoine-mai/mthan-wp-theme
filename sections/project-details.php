<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the project-details section instance.
 * @return array
 */
function mthan_section_project_details_options()
{
    return array(
        array(
            'id'    => 'project_image',
            'type'  => 'media',
            'title' => 'Main Project Image',
            'library' => 'image',
        ),
        array(
            'id'    => 'project_title',
            'type'  => 'textarea',
            'title' => 'Heading',
            'default' => 'Here to Know <br>About Our Project',
        ),
        array(
            'id'    => 'project_content',
            'type'  => 'wp_editor',
            'title' => 'Project Description',
            'default' => '<p>Indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain trouble that are bound Demoralized by the charms of pleasure of the moment so blinded desire our power of choice is untrammelled has when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and and owing to the claims of duty or the obligations.</p><p>Foresee the pain trouble that are bound demoralized by the charms of pleasure the moment blinded desire our power of choice is untrammelled and when nothing prevents.</p>',
        ),
        array(
            'id'     => 'project_info',
            'type'   => 'repeater',
            'title'  => 'Project Info Blocks',
            'fields' => array(
                array(
                    'id'    => 'icon',
                    'type'  => 'text',
                    'title' => 'Icon Class',
                ),
                array(
                    'id'    => 'label',
                    'type'  => 'text',
                    'title' => 'Label',
                ),
                array(
                    'id'    => 'value',
                    'type'  => 'textarea',
                    'title' => 'Value',
                ),
            ),
            'default' => array(
                array('icon' => 'flaticon-marketing', 'label' => 'Client', 'value' => 'Shwan <br>Communities'),
                array('icon' => 'flaticon-location-1', 'label' => 'Location', 'value' => 'Newyork <br>United States'),
                array('icon' => 'flaticon-trees', 'label' => 'Services', 'value' => 'Landscape <br>Design'),
                array('icon' => 'flaticon-home-2', 'label' => 'Property', 'value' => 'Luxury <br>Apartment'),
                array('icon' => 'flaticon-calendar-1', 'label' => 'Date', 'value' => '14 Feb to <br>26 Feb, 2020'),
                array('icon' => 'flaticon-sticker', 'label' => 'Price', 'value' => '8500 <br>US Dollar'),
            ),
        ),
    );
}

/**
 * Render the project-details section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_project_details_html($section_data) { 
    $slug    = 'project-details';
    $image   = mthan_sec_img($slug, $section_data, 'image', get_template_directory_uri() . '/assets/images/gallery/53.jpg');
    $title   = mthan_get_section_val($slug, $section_data, 'title', 'Here to Know <br>About Our Project');
    $content = mthan_get_section_val($slug, $section_data, 'content', '');
    $info    = mthan_get_section_val($slug, $section_data, 'info', array());
    $alt     = strip_tags($title);
?>
<section class="project-details">
    <div class="auto-container">
        <div class="main-image">
            <a href="<?php echo esc_url($image); ?>" class="lightbox-image" data-fancybox="gallery">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>" title="<?php echo esc_attr($alt); ?>">
            </a>
        </div>
        <div class="upper-box">
            <div class="row clearfix">
                <div class="title-col col-lg-4 col-md-12 col-sm-12">
                    <h3><?php echo wp_kses_post($title); ?></h3>
                </div>
                <div class="text-col col-lg-8 col-md-12 col-sm-12">
                    <div class="text">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($info)) : ?>
        <div class="info">
            <div class="row clearfix">
                <?php foreach ($info as $item) : ?>
                <div class="block col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="inner">
                        <?php if (!empty($item['icon'])) : ?>
                            <div class="icon-box"><span class="<?php echo esc_attr($item['icon']); ?>"></span></div>
                        <?php endif; ?>
                        <?php if (!empty($item['label'])) : ?>
                            <h6><?php echo esc_html($item['label']); ?></h6>
                        <?php endif; ?>
                        <?php if (!empty($item['value'])) : ?>
                            <div class="sub-text"><?php echo wp_kses_post($item['value']); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php }
