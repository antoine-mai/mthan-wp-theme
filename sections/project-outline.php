<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the project-outline section instance.
 * @return array
 */
function mthan_section_project_outline_options()
{
    return array(
        array(
            'id'    => 'outline_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Outline Of Project',
        ),
        array(
            'id'     => 'outline_repeater',
            'type'   => 'repeater',
            'title'  => 'Outline Blocks',
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'media',
                    'title' => 'Image',
                    'library' => 'image',
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
                    'title' => 'Link URL',
                    'default' => '#',
                ),
            ),
            'default' => array(
                array(
                    'title' => 'Before Work',
                    'text'  => 'These cases are perfectly simple and easy to distinguish.',
                    'link'  => '#',
                ),
                array(
                    'title' => 'During Work',
                    'text'  => 'These cases are perfectly simple and easy to distinguish.',
                    'link'  => '#',
                ),
                array(
                    'title' => 'After Work',
                    'text'  => 'These cases are perfectly simple and easy to distinguish.',
                    'link'  => '#',
                ),
            ),
        ),
    );
}

/**
 * Render the project-outline section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_project_outline_html($section_data) {
    $title    = !empty($section_data['outline_title']) ? $section_data['outline_title'] : 'Outline Of Project';
    $outlines = !empty($section_data['outline_repeater']) ? $section_data['outline_repeater'] : array();
?>
<section class="project-outline">
    <div class="auto-container">
        <div class="title">
            <h3><?php echo esc_html($title); ?></h3>
        </div>

        <?php if (!empty($outlines)) : ?>
        <div class="row clearfix">
            <?php foreach ($outlines as $item) : 
                $img = !empty($item['image']['url']) ? $item['image']['url'] : get_template_directory_uri() . '/assets/images/resource/featured-image-13.jpg';
                $t   = !empty($item['title']) ? $item['title'] : 'Project Outline';
                $txt = !empty($item['text']) ? $item['text'] : '';
                $lnk = !empty($item['link']) ? $item['link'] : '#';
            ?>
            <!--Outline Block-->
            <div class="outline-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($t); ?>" title="<?php echo esc_attr($t); ?>">
                    </div>
                    <div class="hover-box">
                        <div class="hvr-content">
                            <h5><a href="<?php echo esc_url($lnk); ?>"><?php echo esc_html($t); ?></a></h5>
                            <div class="text"><?php echo esc_html($txt); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php }
