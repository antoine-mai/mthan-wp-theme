<?php defined('ABSPATH') or die('Cheatin\' uh?');


/**
 * Render the error section.
 */
function mthan_section_error_html($section_data) { 
    $slug = 'error';
    $bg   = !empty($section_data['error_bg']['url']) ? $section_data['error_bg']['url'] : get_template_directory_uri() . '/assets/images/background/bg-404.jpg';
    $img  = !empty($section_data['error_title_img']['url']) ? $section_data['error_title_img']['url'] : get_template_directory_uri() . '/assets/images/resource/404-image.png';
    $hd   = !empty($section_data['error_heading']) ? $section_data['error_heading'] : 'Oops! Page Not Found.';
    $txt  = !empty($section_data['error_text']) ? $section_data['error_text'] : 'It looks like nothing was found at this location. Maybe try one of the links below or a search?';
    $btn_txt = mthan_get_section_val($slug, $section_data, 'btn_text', 'Back to Home');
    $btn_url = mthan_sec_link($slug, $section_data, 'btn_link', '#');
?>
<section class="error-section">
        <div class="image-layer" style="background-image: url(<?php echo esc_url($bg); ?>);"></div>

        <div class="auto-container">
            <div class="error-image">
                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($hd); ?>" title="<?php echo esc_attr($hd); ?>">
            </div>

            <div class="content-box">
                <h4><?php echo esc_html($hd); ?></h4>
                <div class="text"><?php echo esc_html($txt); ?></div>
                <div class="link-box">
                    <a href="<?php echo esc_url($btn_url); ?>" class="theme-btn btn-style-four"><span class="btn-title"><?php echo esc_html($btn_txt); ?> <i class="arrow flaticon-play-button-1"></i></span></a>
                </div>
            </div>
        </div>
    </section>
<?php }
