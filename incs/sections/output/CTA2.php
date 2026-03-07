<?php defined('ABSPATH') || exit;

/**
 * Render the Call To Action 2 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_CTA2_html($section_data) { ?>
<?php
    $slug = 'CTA2';
    $bg_image = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'bg_image'));
    $title    = mthan_get_section_val($slug, $section_data, 'title');
    $btn1_text = mthan_get_section_val($slug, $section_data, 'btn1_text');
    $btn1_link = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn1_link'));
    $btn2_text = mthan_get_section_val($slug, $section_data, 'btn2_text');
    $btn2_link = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn2_link'));
?>
<section class="call-to-two">
    <?php if ($bg_image) { ?>
    <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
    <?php } ?>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="title-col col-xl-7 col-lg-6 col-md-12">
                <div class="inner">
                    <?php if ($title) { ?>
                    <h4><?php echo wp_kses_post($title); ?></h4>
                    <?php } ?>
                </div>
            </div>
            <div class="links-col col-xl-5 col-lg-6 col-md-12">
                <div class="inner clearfix">
                    <ul class="clearfix">
                        <?php if ($btn1_text) { ?>
                        <li><a href="<?php echo esc_url($btn1_link); ?>" class="theme-btn btn-style-four"><span class="btn-title"><?php echo esc_html($btn1_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a></li>
                        <?php } ?>
                        <?php if ($btn2_text) { ?>
                        <li><a href="<?php echo esc_url($btn2_link); ?>" class="theme-btn btn-style-five"><span class="btn-title"><?php echo esc_html($btn2_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
