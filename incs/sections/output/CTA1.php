<?php defined('ABSPATH') || exit;

/**
 * Render the Call To Action 1 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_CTA1_html($section_data) { ?>
<?php
    $slug = 'CTA1';
    $title    = mthan_get_section_val($slug, $section_data, 'title');
    $btn_text = mthan_get_section_val($slug, $section_data, 'btn_text');
    $btn_link = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn_link'));
    $phone    = mthan_get_section_val($slug, $section_data, 'phone');
?>
<section class="call-to-action">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="title-col col-xl-7 col-lg-12 col-md-12">
                <div class="inner">
                    <?php if ($title) { ?>
                    <h4><?php echo wp_kses_post($title); ?></h4>
                    <?php } ?>
                </div>
            </div>
            <div class="info-col col-xl-5 col-lg-12 col-md-12">
                <div class="inner clearfix">
                    <ul class="info clearfix">
                        <?php if ($btn_text) { ?>
                        <li><a href="<?php echo esc_url($btn_link); ?>"><span><?php echo esc_html($btn_text); ?></span> <i class="arrow flaticon-play-button-1"></i></a></li>
                        <?php } ?>
                        <?php if ($phone) { ?>
                        <li><a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>"><span><?php echo esc_html($phone); ?></span></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
