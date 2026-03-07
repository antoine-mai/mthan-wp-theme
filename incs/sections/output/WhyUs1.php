<?php defined('ABSPATH') || exit;

/**
 * Render the Why Us section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_WhyUs1_html($section_data) { ?>
<?php
    $slug = 'WhyUs1';
    $title_icon  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle    = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title       = mthan_get_section_val($slug, $section_data, 'title');
    $description = mthan_get_section_val($slug, $section_data, 'description');
    $items       = mthan_get_section_val($slug, $section_data, 'items', array());

    if (empty($items)) return;
?>
<section class="why-us">
    <div class="pattern-layer"></div>
    <div class="right-leaf"></div>
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

        <div class="row clearfix">
            <?php foreach ($items as $item) { 
                $i_tit  = isset($item['title']) ? $item['title'] : '';
                $icon   = isset($item['icon']) ? $item['icon'] : '';
                $text   = isset($item['text']) ? $item['text'] : '';
                $link   = mthan_get_link(isset($item['link']) ? $item['link'] : '');
            ?>
            <!--Why Block-->
            <div class="why-block col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="icon-box">
                        <?php echo mthan_get_icon_html($icon); ?>
                    </div>
                    <?php if ($i_tit) { ?>
                    <h5><?php echo esc_html($i_tit); ?></h5>
                    <?php } ?>
                    <?php if ($text) { ?>
                    <div class="text"><?php echo wp_kses_post($text); ?></div>
                    <?php } ?>
                    <div class="more-link"><a class="theme-btn" href="<?php echo esc_url($link); ?>"><span class="icon flaticon-right-arrow-1"></span></a></div>
                    <div class="right-curve"></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php }
