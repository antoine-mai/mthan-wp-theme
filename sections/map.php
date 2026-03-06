<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the map section instance.
 * @return array
 */
function mthan_section_map_options()
{
    return array(
        array(
            'id'    => 'map_src',
            'type'  => 'text',
            'title' => 'Google Map Embed Source Link',
            'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77179.27405929092!2d144.96587780970705!3d-37.8497500129152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d34379057b1%3A0xf0456760532d450!2sQueen%20Victoria%20Market!5e0!3m2!1sen!2s!4v1602054031836!5m2!1sen!2s',
        ),
    );
}

/**
 * Render the map section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_map_html($section_data) { 
    $slug = 'map';
    $map_src = mthan_get_section_val($slug, $section_data, 'src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77179.27405929092!2d144.96587780970705!3d-37.8497500129152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d34379057b1%3A0xf0456760532d450!2sQueen%20Victoria%20Market!5e0!3m2!1sen!2s!4v1602054031836!5m2!1sen!2s');
?>
<section class="map-section">
        <div class="map-outer">
            <div class="map-box">
                <iframe src="<?php echo esc_url($map_src); ?>"  allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>
<?php }
