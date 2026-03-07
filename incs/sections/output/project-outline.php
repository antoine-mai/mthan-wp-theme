<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the project-outline section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_project_outline_html($section_data) {
    $slug     = 'project-outline';
    $title    = mthan_get_section_val($slug, $section_data, 'title', 'Outline Of Project');
    $outlines = mthan_get_section_val($slug, $section_data, 'repeater', array());
?>
<section class="project-outline">
    <div class="auto-container">
        <div class="title">
            <h3><?php echo esc_html($title); ?></h3>
        </div>

        <?php if (!empty($outlines)) : ?>
        <div class="row clearfix">
            <?php foreach ($outlines as $item) : 
                $img_url = ( ! empty( $item['image'] ) && is_array( $item['image'] ) && ! empty( $item['image']['url'] ) ) ? $item['image']['url'] : '';
                $img     = ! empty( $img_url ) ? $img_url : get_template_directory_uri() . '/assets/images/resource/featured-image-13.jpg';
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
