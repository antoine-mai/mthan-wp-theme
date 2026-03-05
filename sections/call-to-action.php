<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the call-to-action section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_call_to_action_html($section_data) {
$heading = !empty($section_data['cta_heading']) ? $section_data['cta_heading'] : 'Do you need tree care for your home?';
$btn_text = !empty($section_data['cta_btn_text']) ? $section_data['cta_btn_text'] : 'Send Message';
$btn_link = !empty($section_data['cta_btn_link']) ? $section_data['cta_btn_link'] : '#';
$phone = !empty($section_data['cta_phone']) ? $section_data['cta_phone'] : '+31 65 792 63 11';
?>
<section class="call-to-action">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="title-col col-xl-7 col-lg-12 col-md-12">
                <div class="inner">
                    <h4>
                        <?php echo esc_html($heading); ?>
                    </h4>
                </div>
            </div>
            <div class="info-col col-xl-5 col-lg-12 col-md-12">
                <div class="inner clearfix">
                    <ul class="info clearfix">
                        <li><a href="<?php echo esc_url($btn_link); ?>"><span>
                                    <?php echo esc_html($btn_text); ?>
                                </span> <i class="arrow flaticon-play-button-1"></i></a></li>
                        <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><span>
                                    <?php echo esc_html($phone); ?>
                                </span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
}
