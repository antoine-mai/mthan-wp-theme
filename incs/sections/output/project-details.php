<?php defined('ABSPATH') or die('Cheatin\' uh?');

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
