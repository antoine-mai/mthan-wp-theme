<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the related-project section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_related_project_html($section_data) {
    $slug     = 'related-project';
    $title    = mthan_get_section_val($slug, $section_data, 'title', 'Related Projects');
    $projects = mthan_get_section_val($slug, $section_data, 'repeater', array());
?>
<section class="related-project">
    <div class="auto-container">
        <div class="title">
            <h3><?php echo esc_html($title); ?></h3>
        </div>
        <?php if (!empty($projects)) : ?>
        <div class="row clearfix">
            <?php foreach ($projects as $item) : 
                $img = !empty($item['image']['url']) ? $item['image']['url'] : get_template_directory_uri() . '/assets/images/gallery/25.jpg';
                $c   = !empty($item['cat']) ? $item['cat'] : '';
                $t   = !empty($item['title']) ? $item['title'] : 'Project Title';
                $lnk = !empty($item['link']) ? $item['link'] : '#';
            ?>
            <!-- Gallery Item -->
            <div class="gallery-item-three col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($t); ?>" title="<?php echo esc_attr($t); ?>">
                    </div>
                    <div class="link-box"><a href="<?php echo esc_url($lnk); ?>"><span class="icon flaticon-right-arrow-1"></span></a></div>
                    <div class="hover-box">
                        <div class="hvr-content">
                            <div class="cat"><a href="<?php echo esc_url($lnk); ?>"><?php echo esc_html($c); ?></a></div>
                            <h5><a href="<?php echo esc_url($lnk); ?>"><?php echo esc_html($t); ?></a></h5>
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
