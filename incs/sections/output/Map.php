<?php defined('ABSPATH') || exit;

/**
 * Render the Map section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Map_html($section_data) { ?>
<?php
    $slug = 'Map';
    $map_content = mthan_get_section_val($slug, $section_data, 'map_iframe');
    $map_height  = mthan_get_section_val($slug, $section_data, 'map_height', '500px');

    if (empty($map_content)) return;

    // Check if it's a full iframe tag or just a URL
    if (strpos($map_content, '<iframe') !== false) {
        $map_html = $map_content;
    } else {
        $map_html = '<iframe src="' . esc_url($map_content) . '" allowfullscreen="" aria-hidden="false" tabindex="0" style="border:0; width:100%; height:' . esc_attr($map_height) . ';"></iframe>';
    }
?>
<section class="map-section">
    <div class="map-outer">
        <div class="map-box">
            <?php echo $map_html; ?>
        </div>
    </div>
</section>
<?php }
