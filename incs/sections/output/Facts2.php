<?php defined('ABSPATH') || exit;

/**
 * Render the Facts 2 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Facts2_html($section_data) { ?>
<?php
    $slug = 'Facts2';
    $layout = mthan_get_section_val($slug, $section_data, 'layout_type', 'boxed');
    $container = ($layout === 'fullwide') ? 'container-fluid' : 'outer-container';
    $breakout  = ($layout === 'fullwide') ? 'mthan-fullwide-section' : '';
    
    $items = mthan_get_section_val($slug, $section_data, 'items', array());
    $global_speed = mthan_get_section_val($slug, $section_data, 'speed', '1000');

    $styles = mthan_section_styles($slug, $section_data);
    if (empty($items)) return;
?>
<section class="facts-two <?php echo esc_attr($styles['class']); ?> <?php echo esc_attr($breakout); ?>" <?php echo $styles['style']; ?>>
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row clearfix">
            <?php foreach ($items as $item) { ?>
            <?php
                $icon     = isset($item['icon']) ? $item['icon'] : '';
                $count    = isset($item['count']) ? $item['count'] : '0';
                $suffix   = isset($item['suffix']) ? $item['suffix'] : '';
                $speed    = !empty($item['speed']) ? $item['speed'] : $global_speed;
                $title    = isset($item['title']) ? $item['title'] : '';
                $subtitle = isset($item['subtitle']) ? $item['subtitle'] : '';
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
                            <?php echo esc_html($suffix); ?>
                            <?php } ?>
                            
                            <?php if ($title) { ?>
                            <span class="title"><?php echo esc_html($title); ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <?php if ($subtitle) { ?>
                    <div class="sub-text"><?php echo esc_html($subtitle); ?></div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php }
