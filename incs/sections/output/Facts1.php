<?php defined('ABSPATH') || exit;

/**
 * Render the Facts 1 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Facts1_html($section_data) { ?>
<?php
    $slug = 'Facts1';
    $bg_image = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'bg_image'));
    $items    = mthan_get_section_val($slug, $section_data, 'items', array());

    $layout   = mthan_get_section_val($slug, $section_data, 'layout_type', 'boxed');
    $container = ($layout === 'fullwide') ? 'container-fluid' : 'auto-container';
    $breakout  = ($layout === 'fullwide') ? 'mthan-fullwide-section' : '';

    $styles = mthan_section_styles($slug, $section_data);
    if (empty($items)) return;
?>
<section class="facts-section <?php echo esc_attr($styles['class']); ?> <?php echo esc_attr($breakout); ?>" <?php echo $styles['style']; ?>>
    <?php if ($bg_image) { ?>
    <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
    <?php } ?>
    
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row clearfix">
            <?php foreach ($items as $item) { ?>
            <?php
                $icon   = isset($item['icon']) ? $item['icon'] : '';
                $count  = isset($item['count']) ? $item['count'] : '0';
                $suffix = isset($item['suffix']) ? $item['suffix'] : '';
                $speed  = isset($item['speed']) ? $item['speed'] : '2000';
                $title  = isset($item['title']) ? $item['title'] : '';
            ?>
            <!--Fact Block-->
            <div class="fact-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner">
                    <?php if ($icon) { ?>
                    <div class="icon-box"><?php echo mthan_get_icon_html($icon); ?></div>
                    <?php } ?>
                    
                    <div class="fact-count">
                        <div class="count-box">
                            <span class="count-text" data-stop="<?php echo esc_attr($count); ?>" data-speed="<?php echo esc_attr($speed); ?>">0</span>
                            <?php if ($suffix) { ?>
                            <sup><?php echo esc_html($suffix); ?></sup>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <?php if ($title) { ?>
                    <h4><?php echo esc_html($title); ?></h4>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php }
