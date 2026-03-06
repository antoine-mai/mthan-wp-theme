<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the sponsors section instance.
 * @return array
 */
function mthan_section_sponsors_options()
{
    return array(
        array(
            'id'     => 'sponsors_repeater',
            'type'   => 'group',
            'title'  => 'Sponsors List',
            'fields' => array(
                array(
                    'id'    => 'logo',
                    'type'  => 'upload',
                    'preview' => false,
                    'title' => 'Logo Image',
                ),
                array(
                    'id'    => 'link',
                    'type'  => 'text',
                    'title' => 'Link',
                    'default' => '#',
                ),
            ),
        ),
    );
}

/**
 * Render the sponsors section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/ 
function mthan_section_sponsors_html($section_data) { 
    $slug = 'sponsors';
    $sponsors_repeater = mthan_get_section_val($slug, $section_data, 'repeater', array());
?>
<section class="sponsors-section">
        <div class="sponsors-outer">
            <!--Sponsors-->
            <div class="auto-container">
                <!--Sponsors Carousel-->
                <div class="sponsors-carousel owl-theme owl-carousel">
                    <?php foreach($sponsors_repeater as $item): 
                        $logo = !empty($item['logo']) ? $item['logo'] : '';
                        $link = !empty($item['link']) ? $item['link'] : '#';
                        if($logo):
                    ?>
                    <div class="slide-item">
                        <figure class="image-box">
                            <a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr__('sponsor', 'mthan'); ?>" title="<?php echo esc_attr__('sponsor', 'mthan'); ?>"></a>
                        </figure>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php }
