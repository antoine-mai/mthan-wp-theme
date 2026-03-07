<?php defined('ABSPATH') || exit;

/**
 * Render the How It Works section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_HowItWorks1_html($section_data) { ?>
<?php
    $slug = 'HowItWorks1';
    $title_icon  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle    = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title       = mthan_get_section_val($slug, $section_data, 'title');
    $description = mthan_get_section_val($slug, $section_data, 'description');
    $items       = mthan_get_section_val($slug, $section_data, 'items', array());

    if (empty($items)) return;
?>
<section class="work-process">
    <div class="round-pattern-layer"></div>
    <div class="right-leaf"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/leaf-1.png" alt="leaf"></div>
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

        <div class="process">
            <div class="row clearfix">
                <?php foreach ($items as $item) { 
                    $img   = mthan_sec_img(isset($item['image']) ? $item['image'] : '');
                    $tit   = isset($item['title']) ? $item['title'] : '';
                    $step  = isset($item['step']) ? $item['step'] : '';
                    $icon  = isset($item['icon']) ? $item['icon'] : '';
                    $text  = isset($item['text']) ? $item['text'] : '';
                ?>
                <!--Process Block-->
                <div class="process-block col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <?php if ($img) { ?>
                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($tit); ?>">
                            <?php } ?>
                            <div class="hover-box">
                                <div class="hvr-content">
                                    <?php if ($text) { ?>
                                    <div class="text"><?php echo wp_kses_post($text); ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="lower-box">
                            <div class="icon-box">
                                <?php echo mthan_get_icon_html($icon); ?>
                            </div>
                            <?php if ($step) { ?>
                            <div class="step"><?php echo esc_html($step); ?></div>
                            <?php } ?>
                            <?php if ($tit) { ?>
                            <h5><?php echo esc_html($tit); ?></h5>
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
