<?php defined('ABSPATH') or die('Cheatin\' uh?');


/**
 * Render the coming-soon section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_coming_soon_html($section_data) {
    $bg       = !empty($section_data['cs_bg']['url']) ? $section_data['cs_bg']['url'] : get_template_directory_uri() . '/assets/images/background/bg-coming-soon.jpg';
    $logo     = !empty($section_data['cs_logo']['url']) ? $section_data['cs_logo']['url'] : get_template_directory_uri() . '/assets/images/white-logo.png';
    $big_text = !empty($section_data['cs_big_text']) ? $section_data['cs_big_text'] : 'We introduce something awesome in our work!.';
    $title    = !empty($section_data['cs_title']) ? $section_data['cs_title'] : 'Coming Soon';
    $date     = !empty($section_data['cs_date']) ? $section_data['cs_date'] : '2026/12/31';
    $f_action = !empty($section_data['cs_form_action']) ? $section_data['cs_form_action'] : '#';
?>
<section class="coming-soon">
        <div class="image-layer" style="background-image: url(<?php echo esc_url($bg); ?>);"></div>

        <div class="outer-container">
            <div class="content">
                <div class="content-inner">
                    <div class="auto-container">
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"></a></div>
                        </div>
                        <div class="big-text"><?php echo esc_html($big_text); ?></div>
                        <h1><?php echo esc_html($title); ?></h1>
                        <div class="time-counter"><div class="time-countdown clearfix" data-countdown="<?php echo esc_attr($date); ?>"></div></div>

                        <div class="subscribe">
                            <div class="form-box">
                                <form method="post" action="<?php echo esc_url($f_action); ?>">
                                    <div class="form-group clearfix">
                                        <input type="email" name="email" value="" placeholder="Email Address *" required>
                                        <span class="alt-icon far fa-envelope"></span>
                                        <button type="submit" class="theme-btn btn-style-three"><span class="btn-title">Subscribe <i class="arrow flaticon-play-button-1"></i></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
