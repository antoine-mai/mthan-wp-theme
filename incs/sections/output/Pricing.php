<?php defined('ABSPATH') || exit;

/**
 * Render the Pricing section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Pricing_html($section_data) { ?>
<?php
    $slug = 'Pricing';
    $title_icon  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle    = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title       = mthan_get_section_val($slug, $section_data, 'title');
    $description = mthan_get_section_val($slug, $section_data, 'description');
    $items       = mthan_get_section_val($slug, $section_data, 'items', array());

    if (empty($items)) return;
?>
<section class="pricing-section">
    <div class="auto-container">
        <div class="title-box">
            <div class="row clearfix">
                <div class="left-col col-xl-6 col-lg-12 col-md-12">
                    <div class="sec-title alternate">
                        <?php if ($title_icon) { ?>
                        <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($title_icon); ?>" alt="icon"></span></div>
                        <?php } ?>
                        <?php if ($subtitle) { ?>
                        <div class="subtitle"><?php echo esc_html($subtitle); ?></div>
                        <?php } ?>
                        <?php if ($title) { ?>
                        <h2><?php echo wp_kses_post($title); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($description) { ?>
                <div class="right-col col-xl-6 col-lg-12 col-md-12">
                    <div class="text"><?php echo wp_kses_post($description); ?></div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="pricing">
            <div class="row clearfix">
                <?php foreach ($items as $item) { 
                    $p_tit   = isset($item['title']) ? $item['title'] : '';
                    $price   = isset($item['price']) ? $item['price'] : '';
                    $curr    = isset($item['currency']) ? $item['currency'] : '$';
                    $freq    = isset($item['frequency']) ? $item['frequency'] : '';
                    $feats   = isset($item['features']) ? $item['features'] : '';
                    $btn_t   = isset($item['btn_text']) ? $item['btn_text'] : '';
                    $btn_l   = mthan_get_link(isset($item['btn_link']) ? $item['btn_link'] : '');
                ?>
                <!--Price Block-->
                <div class="price-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="leaf"></div>
                        <div class="content">
                            <div class="price"><sup><?php echo esc_html($curr); ?></sup><?php echo esc_html($price); ?></div>
                            <h6 class="plan-title"><?php echo wp_kses_post($p_tit); ?></h6>
                            <?php if ($freq) { ?>
                            <div class="frequency"><?php echo esc_html($freq); ?></div>
                            <?php } ?>
                            <div class="features">
                                <ul>
                                    <?php 
                                        if ($feats) {
                                            $feature_list = explode("\n", str_replace("\r", "", $feats));
                                            foreach ($feature_list as $feature) {
                                                $feature = trim($feature);
                                                if (empty($feature)) continue;

                                                $icon_class = 'fa-check';
                                                $li_class   = '';
                                                
                                                if (strpos($feature, '[x]') === 0) {
                                                    $icon_class = 'fa-times';
                                                    $feature    = trim(substr($feature, 3));
                                                }

                                                echo '<li><span class="icon fa ' . esc_attr($icon_class) . '"></span> ' . esc_html($feature) . '</li>';
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                            <?php if ($btn_t) { ?>
                            <div class="link-box">
                                <a href="<?php echo esc_url($btn_l); ?>" class="theme-btn btn-style-six">
                                    <span class="btn-title"><?php echo esc_html($btn_t); ?> <i class="arrow flaticon-play-button-1"></i></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
</section>
<?php }
