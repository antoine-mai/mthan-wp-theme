<?php defined('ABSPATH') || exit;

/**
 * Render the Areas section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Areas_html($section_data)
{
    $slug = 'Areas';
    $items = mthan_get_section_val($slug, $section_data, 'items', array());

    if (empty($items)) {
        return;
    }
    ?>
    <section class="areas-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <?php foreach ($items as $item) { 
                        $title = isset($item['title']) ? $item['title'] : '';
                        $sub   = isset($item['subtitle']) ? $item['subtitle'] : '';
                        $icon  = isset($item['icon']) ? $item['icon'] : '';
                        $link  = mthan_get_link(isset($item['link']) ? $item['link'] : '');
                        ?>
                        <!--Area Block-->
                        <div class="area-block col-lg-4 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="content">
                                    <div class="icon">
                                        <?php echo mthan_get_icon_html($icon); ?>
                                    </div>
                                    <h5>
                                        <a href="<?php echo esc_url($link); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </h5>
                                    <div class="sub-text">
                                        <?php echo esc_html($sub); ?>
                                    </div>
                                </div>
                                <div class="link-box">
                                    <a href="<?php echo esc_url($link); ?>" class="theme-btn">
                                        <span class="flaticon-plus-1"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
