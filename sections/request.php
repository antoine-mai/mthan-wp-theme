<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the request section instance.
 * @return array
 */
function mthan_section_request_options()
{
    return array(
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Request a Quote',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Free Estimates',
        ),
        array(
            'id'    => 'sec_sub_text',
            'type'  => 'textarea',
            'title' => 'Sub Text',
            'default' => 'Get free estimates from lander lawn care and gardening professionals in your city.',
        ),
        array(
            'id'    => 'right_image',
            'type'  => 'upload',
                    'preview' => false,
            'title' => 'Right Side Image',
        ),
        array(
            'id'    => 'discount_text',
            'type'  => 'text',
            'title' => 'Discount Label',
            'default' => 'Save up to 40%',
        ),
        array(
            'id'    => 'services_list',
            'type'  => 'textarea',
            'title' => 'Services (one per line)',
            'default' => "Spring Cleanup\nPlants Planting\nWater Fountain\nHard Scaping\nGarden Care",
        ),
    );
}

/**
 * Render the request section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_request_html($section_data) { 
    $sec_title     = !empty($section_data['sec_title']) ? $section_data['sec_title'] : 'Free Estimates';
    $sec_subtitle  = !empty($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Request a Quote';
    $sec_sub_text  = !empty($section_data['sec_sub_text']) ? $section_data['sec_sub_text'] : '';
    $right_image   = !empty($section_data['right_image']) ? $section_data['right_image'] : '';
    $discount_text = !empty($section_data['discount_text']) ? $section_data['discount_text'] : '';
    $services_list = !empty($section_data['services_list']) ? $section_data['services_list'] : '';
?>
<section class="service-request">
        <div class="auto-container">
            <div class="inner-box">
                <?php if($right_image): ?>
                <div class="right-image"><img src="<?php echo esc_url($right_image); ?>" alt="<?php echo esc_attr($sec_title); ?>" title="<?php echo esc_attr($sec_title); ?>"></div>
                <?php endif; ?>
                <div class="content-box">
                    <div class="sec-title">
                        <div class="title-icon"><span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-two.png" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                        <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                        <h2><?php echo esc_html($sec_title); ?></h2>
                        <?php if($sec_sub_text): ?>
                        <div class="sub-text"><?php echo esc_html($sec_sub_text); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-outer">
                        <div class="form-box">
                            <?php if($discount_text): ?>
                            <div class="discount"><?php echo esc_html($discount_text); ?></div>
                            <?php endif; ?>
                            <!--Newsletter-->
                            <div class="quote-form default-form">
                                <form method="post" action="#">
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <input type="text" name="name" value="" placeholder="Your Name *" required>
                                                <span class="alt-icon far fa-user"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <input type="email" name="email" value="" placeholder="Email Address *" required>
                                                <span class="alt-icon far fa-envelope"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <input type="text" name="phone" value="" placeholder="Phone *" required>
                                                <span class="alt-icon fa fa-phone-alt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <select class="custom-select-box" name="service">
                                                    <option>Choose Service</option>
                                                    <?php 
                                                    if($services_list){
                                                        $services = explode("\n", str_replace("\r", "", $services_list));
                                                        foreach($services as $s){
                                                            $s = trim($s);
                                                            if($s) echo '<option value="'.esc_attr($s).'">'.esc_html($s).'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <input type="text" name="address" value="" placeholder="Address *" required>
                                                <span class="alt-icon fa fa-map-marker-alt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <button type="submit" class="theme-btn btn-style-three alternate"><span class="btn-title">Get a Quote <i class="arrow flaticon-play-button-1"></i></span></button>
                                            </div>
                                        </div>
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
