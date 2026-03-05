<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the contact section instance.
 * @return array
 */
function mthan_section_contact_options()
{
    return array(
        array(
            'id'      => 'style',
            'type'    => 'select',
            'title'   => 'Style',
            'options' => array(
                '1' => 'Style 1 (Image Right)',
                '2' => 'Style 2 (Map Left)',
                '3' => 'Style 3 (Split Content)',
            ),
            'default' => '1',
        ),
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Get in Touch',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Contact Us',
        ),
        array(
            'id'    => 'discount_text',
            'type'  => 'text',
            'title' => 'Discount Label',
            'default' => 'Save up to 40%',
            'dependency' => array('style', '==', '1'),
        ),
        array(
            'id'    => 'sub_text',
            'type'  => 'textarea',
            'title' => 'Sub-text (Description)',
            'default' => 'Get free estimates from Pruners lawn care and gardening professionals in your city.',
            'dependency' => array('style', 'any', '1,2'),
        ),
        // Style 2 specific
        array(
            'id'    => 'map_iframe',
            'type'  => 'textarea',
            'title' => 'Map Iframe URL/Embed',
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'info_address',
            'type'  => 'textarea',
            'title' => 'Address Text',
            'default' => '53 Garden Street Los Anegles 90029 USA',
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'info_phone',
            'type'  => 'text',
            'title' => 'Phone Number',
            'default' => '(+5) 678 90 12 345',
            'dependency' => array('style', '==', '2'),
        ),
        array(
            'id'    => 'info_email',
            'type'  => 'text',
            'title' => 'Email Address',
            'default' => 'service@Prunersteam.com',
            'dependency' => array('style', '==', '2'),
        ),
        // Style 3 specific
        array(
            'id'    => 'main_office_text',
            'type'  => 'textarea',
            'title' => 'Main Office Address',
            'default' => 'PO Box 515381 Lander, Garden Street LA 90029 USA.',
            'dependency' => array('style', '==', '3'),
        ),
        array(
            'id'    => 'working_hours',
            'type'  => 'textarea',
            'title' => 'Working Hours List (one per line)',
            'default' => "Mon-Friday: 09am to 07pm\nSat: 10.00am to 04pm",
            'dependency' => array('style', '==', '3'),
        ),
        array(
            'id'    => 'form_bg_image',
            'type'  => 'upload',
            'title' => 'Form BG Image',
            'dependency' => array('style', '==', '3'),
        ),
        array(
            'id'    => 'right_person_image',
            'type'  => 'upload',
            'title' => 'Right Person Image',
            'dependency' => array('style', '==', '3'),
        ),
    );
}

/**
 * Render the contact section.
 */
function mthan_section_contact_html($section_data) {
    $style = isset($section_data['style']) ? $section_data['style'] : '1';
    
    if ($style === '2') {
        mthan_section_contact_html_2($section_data);
    } elseif ($style === '3') {
        mthan_section_contact_html_3($section_data);
    } else {
        mthan_section_contact_html_1($section_data);
    }
}

/**
 * Style 1 Rendering (Image Right)
 */
function mthan_section_contact_html_1($section_data) {
    $sec_title    = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $sec_subtitle = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $discount     = isset($section_data['discount_text']) ? $section_data['discount_text'] : '';
    $subtext      = isset($section_data['sub_text']) ? $section_data['sub_text'] : '';
?>
<section class="contact-section">
        <div class="pattern-layer"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Text Column-->
                <div class="text-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                            <div class="sub-text"><?php echo esc_html($subtext); ?></div>
                        </div>
                        <div class="form-outer">
                            <div class="form-box">
                                <div class="discount"><?php echo esc_html($discount); ?></div>
                                <!--Newsletter-->
                                <div class="quote-form default-form">
                                    <form method="post" action="contact.html">
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
                                                        <option>Spring Cleanup</option>
                                                        <option>Plants Planting</option>
                                                        <option>Water Fountain</option>
                                                        <option>Hard Scaping</option>
                                                        <option>Garden Care</option>
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
                <!--Image Column-->
                <div class="image-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="image-box clearfix">
                            <figure class="image"><img src="images/resource/anim-image-2.png" alt="" title=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}

/**
 * Style 2 Rendering (Map Left)
 */
function mthan_section_contact_html_2($section_data) {
    $sec_title    = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $subtext      = isset($section_data['sub_text']) ? $section_data['sub_text'] : '';
    $map_iframe   = isset($section_data['map_iframe']) ? $section_data['map_iframe'] : '';
    $addr         = isset($section_data['info_address']) ? $section_data['info_address'] : '';
    $phone        = isset($section_data['info_phone']) ? $section_data['info_phone'] : '';
    $email        = isset($section_data['info_email']) ? $section_data['info_email'] : '';
?>
<section class="contact-two">
        <div class="pattern-layer"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Map Column-->
                <div class="map-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="title">
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                        <div class="map-outer">
                            <div class="map-box">
                                <?php if($map_iframe): echo $map_iframe; else: ?>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77179.27405929092!2d144.96587780970705!3d-37.8497500129152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d34379057b1%3A0xf0456760532d450!2sQueen%20Victoria%20Market!5e0!3m2!1sen!2s!4v1602054031836!5m2!1sen!2s"  allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                <?php endif; ?>
                            </div>
                            <div class="info-box">
                                <ul class="info clearfix">
                                    <li>
                                        <span class="icon flaticon-internet"></span>
                                        <div class="text"><?php echo wp_kses_post(nl2br($addr)); ?></div></li>
                                    <li>
                                        <span class="icon flaticon-message-1"></span>
                                        <div class="text"><a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>"><?php echo esc_html($phone); ?></a><br><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Form Column-->
                <div class="form-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="form-outer">
                            <div class="title-box"><h4>Make an Appointment</h4></div>
                            <div class="form-box">
                                <div class="text"><?php echo esc_html($subtext); ?></div>
                                <!--Appointment-->
                                <div class="default-form">
                                    <form method="post" action="contact.html">
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <input type="text" name="name" value="" placeholder="Your Name *" required>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <div class="field-inner">
                                                    <input type="text" name="phone" value="" placeholder="Phone *" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <div class="field-inner">
                                                    <input type="email" name="email" value="" placeholder="Email *" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <select class="custom-select-box" name="service">
                                                    <option>Choose Service</option>
                                                    <option>Spring Cleanup</option>
                                                    <option>Plants Planting</option>
                                                    <option>Water Fountain</option>
                                                    <option>Hard Scaping</option>
                                                    <option>Garden Care</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <select class="custom-select-box" name="service">
                                                    <option>Property Type</option>
                                                    <option>Commercial</option>
                                                    <option>Residential</option>
                                                    <option>Industries</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <button type="submit" class="theme-btn btn-style-four alternate"><span class="btn-title">Time Schedule <i class="arrow flaticon-play-button-1"></i></span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}

/**
 * Style 3 Rendering (Split Content)
 */
function mthan_section_contact_html_3($section_data) {
    $sec_title    = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $sec_subtitle = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $office_text  = isset($section_data['main_office_text']) ? $section_data['main_office_text'] : '';
    $hours        = isset($section_data['working_hours']) ? explode("\n", str_replace("\r", "", $section_data['working_hours'])) : array();
    $bg_image     = isset($section_data['form_bg_image']) ? $section_data['form_bg_image'] : '';
    $person_img   = isset($section_data['right_person_image']) ? $section_data['right_person_image'] : '';
?>
<section class="contact-three">
        <div class="outer-container">
            <div class="row clearfix">
                <!--Text Col-->
                <div class="text-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner clearfix">
                        <div class="top-icon"><span class="flaticon-internet"></span></div>
                        <div class="content-box">
                            <div class="sec-title">
                                <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
                                <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                                <h2><?php echo esc_html($sec_title); ?></h2>
                            </div>

                            <div class="address">
                                <h5>Main Office</h5>
                                <div class="text"><?php echo wp_kses_post(nl2br($office_text)); ?></div>
                                <div class="link">
                                    <a href="#" class="theme-btn"><span class="btn-title">Find On Map <i class="arrow flaticon-play-button-1"></i></span></a>
                                </div>
                            </div>

                            <div class="info">
                                <div class="row clearfix">
                                    <!--Block-->
                                    <div class="info-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <div class="icon"><span class="flaticon-message-1"></span></div>
                                            <h6>Phone & Email</h6>
                                            <ul>
                                                <li><a href="tel:56789012345">(+5) 678 90 12 345</a></li>
                                                <li><a href="mailto:service@landerteam.com">service@landerteam.com</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!--Block-->
                                    <div class="info-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <div class="icon"><span class="flaticon-clock"></span></div>
                                            <h6>Working Hours</h6>
                                            <ul>
                                                <?php foreach($hours as $h): if(trim($h)): ?>
                                                    <li><?php echo esc_html($h); ?></li>
                                                <?php endif; endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <!--Form Col-->
                <div class="form-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="image-layer" style="background-image:url(<?php echo esc_url($bg_image); ?>);"></div>
                    <div class="image-right"><img src="<?php echo esc_url($person_img); ?>" alt=""></div>
                    <div class="inner clearfix">
                        <div class="content-box">
                            <div class="sec-title">
                                <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
                                <div class="subtitle">Drop a Line</div>
                                <h2>Send Message Us</h2>
                            </div>

                            <div class="contact-form default-form">
                                <form method="post" action="sendemail.php" id="contact-form">
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="field-inner">
                                                <input type="text" name="username" value="" placeholder="Your Name *" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="field-inner">
                                                <input type="email" name="email" value="" placeholder="Email Address*" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <input type="text" name="phone" value="" placeholder="Phone" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <select class="custom-select-box" name="subject">
                                                    <option>Subject</option>
                                                    <option>Spring Cleanup</option>
                                                    <option>Plants Planting</option>
                                                    <option>Water Fountain</option>
                                                    <option>Hard Scaping</option>
                                                    <option>Garden Care</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="field-inner">
                                                <textarea name="message" placeholder="Your Message ..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="field-inner">
                                                <button type="submit" class="theme-btn btn-style-four alternate"><span class="btn-title">Submit Now <i class="arrow flaticon-play-button-1"></i></span></button>
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
<?php
}
