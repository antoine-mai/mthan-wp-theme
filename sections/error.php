<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the error section instance.
 * @return array
 */
function mthan_section_error_options()
{
    return array(
        array(
            'id'      => 'error_bg',
            'type'    => 'media',
            'library' => 'image',
            'preview' => false,
            'title'   => 'Background Image',
            'default' => array('url' => get_template_directory_uri() . '/assets/images/background/bg-404.jpg')
        ),
        array(
            'id'      => 'error_title_img',
            'type'    => 'media',
            'library' => 'image',
            'preview' => false,
            'title'   => 'Error Image (e.g. 404)',
            'default' => array('url' => get_template_directory_uri() . '/assets/images/resource/404-image.png')
        ),
        array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => 'Heading',
            'default' => 'Oops! Page Not Found.',
        ),
        array(
            'id'    => 'error_text',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
        ),
        array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'Back to Home',
        ),
        array(
            'id'    => 'error_btn_link',
            'type'  => 'text',
            'title' => 'Button URL',
            'default' => '#',
        ),
    );
}

/**
 * Render the error section.
 */
function mthan_section_error_html($section_data) { 
    $bg   = !empty($section_data['error_bg']['url']) ? $section_data['error_bg']['url'] : get_template_directory_uri() . '/assets/images/background/bg-404.jpg';
    $img  = !empty($section_data['error_title_img']['url']) ? $section_data['error_title_img']['url'] : get_template_directory_uri() . '/assets/images/resource/404-image.png';
    $hd   = !empty($section_data['error_heading']) ? $section_data['error_heading'] : 'Oops! Page Not Found.';
    $txt  = !empty($section_data['error_text']) ? $section_data['error_text'] : 'It looks like nothing was found at this location. Maybe try one of the links below or a search?';
    $btn_txt = !empty($section_data['error_btn_text']) ? $section_data['error_btn_text'] : 'Back to Home';
    $btn_url = !empty($section_data['error_btn_link']) ? $section_data['error_btn_link'] : '#';
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
