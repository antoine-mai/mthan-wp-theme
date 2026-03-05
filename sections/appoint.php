<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the appoint section instance.
 * @return array
 */
function mthan_section_appoint_options()
{
    return array(
        array(
            'id' => 'appoint_subtitle',
            'type' => 'text',
            'title' => 'Subtitle',
            'default' => 'About Us', // Note: This was "About Us" in HTML, though it seems weird.
        ),
        array(
            'id' => 'appoint_title',
            'type' => 'text',
            'title' => 'Section Title',
            'default' => 'Request Job Estimate',
        ),
        array(
            'id' => 'appoint_btn_text',
            'type' => 'text',
            'title' => 'Button Text',
            'default' => 'Request Job Estimate',
        ),
        array(
            'id' => 'appoint_btn_link',
            'type' => 'text',
            'title' => 'Button Link',
            'default' => '#',
        ),
        array(
            'id' => 'appoint_form_title',
            'type' => 'text',
            'title' => 'Form Title',
            'default' => 'Create Appointment',
        ),
        array(
            'id' => 'appoint_form_text',
            'type' => 'textarea',
            'title' => 'Form Description',
            'default' => 'Fill out the form below and then Set a Day and Time that works best for you!.',
        ),
        array(
            'id' => 'appoint_success_msg',
            'type' => 'text',
            'title' => 'Success Message',
            'default' => 'Thank you for make an appoitnment!.',
        ),
        array(
            'id' => 'appoint_calendar_title',
            'type' => 'text',
            'title' => 'Calendar Selection Title',
            'default' => 'Choose Your Comfortable Time',
        ),
    );
}

/**
 * Render the appoint section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_appoint_html($section_data) { ?>
<?php
    $sec_title    = !empty($section_data['appoint_title']) ? $section_data['appoint_title'] : 'Request Job Estimate';
    $sec_subtitle = !empty($section_data['appoint_subtitle']) ? $section_data['appoint_subtitle'] : 'About Us';
    $btn_text     = !empty($section_data['appoint_btn_text']) ? $section_data['appoint_btn_text'] : 'Request Job Estimate';
    $btn_link     = !empty($section_data['appoint_btn_link']) ? $section_data['appoint_btn_link'] : '#';
    $form_title   = !empty($section_data['appoint_form_title']) ? $section_data['appoint_form_title'] : 'Create Appointment';
    $form_text    = !empty($section_data['appoint_form_text']) ? $section_data['appoint_form_text'] : 'Fill out the form below and then Set a Day and Time that works best for you!.';
    $success_msg  = !empty($section_data['appoint_success_msg']) ? $section_data['appoint_success_msg'] : 'Thank you for make an appoitnment!.';
    $cal_title    = !empty($section_data['appoint_calendar_title']) ? $section_data['appoint_calendar_title'] : 'Choose Your Comfortable Time';
?>
<section class="appoint-section">
        <div class="auto-container">

            <div class="upper-box clearfix">
                <div class="sec-title">
                    <div class="title-icon"><span class="icon"><img src="/wp-content/assets/images/icons/leaf-two.png" alt="" title=""></span></div>
                    <div class="subtitle"><?php echo $sec_subtitle; ?></div>
                    <h2><?php echo $sec_title; ?></h2>
                </div>
                <div class="link-box">
                    <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn"><span class="btn-title"><?php echo $btn_text; ?> <i class="arrow flaticon-play-button-1"></i></span></a>
                </div>
            </div>

            <div class="row clearfix">
                <div class="column sel-column col-lg-2 col-md-4 col-sm-12">
                    <div class="inner">
                        <div class="sel-box">
                            <div class="check">
                                <input type="radio" name="sel-group" value="" id="sel-1" checked="">
                                <label for="sel-1"><span class="round"></span><span class="txt">Commercial</span></label>
                            </div>
                            <div class="check">
                                <input type="radio" name="sel-group" value="" id="sel-2">
                                <label for="sel-2"><span class="round"></span><span class="txt">Residential</span></label>
                            </div>
                            <div class="check">
                                <input type="radio" name="sel-group" value="" id="sel-3">
                                <label for="sel-3"><span class="round"></span><span class="txt">Industries</span></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column form-column col-lg-5 col-md-8 col-sm-12">
                    <div class="form-container">
                        <div class="title">
                            <h5><?php echo $form_title; ?></h5>
                        </div>
                        <div class="form-box">
                            <div class="text"><?php echo $form_text; ?></div>
                            <div class="appointment-form default-form">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <div class="field-inner">
                                            <input type="text" name="name" value="" placeholder="Your Name *" required>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <input type="text" name="phone" value="" placeholder="Phone" required>
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
                                            <input type="text" name="name" value="" placeholder="Address Line 1 ( Flat, Floor, Suite No & Street )" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="field-inner">
                                            <input type="text" name="name" value="" placeholder="Address Line 2 (City & Zipcode)" required>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <select class="custom-select-box" name="service">
                                                    <option>Minimum</option>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                    <option>05</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <div class="field-inner">
                                                <select class="custom-select-box" name="service">
                                                    <option>Maximum</option>
                                                    <option>21</option>
                                                    <option>22</option>
                                                    <option>23</option>
                                                    <option>24</option>
                                                    <option>55</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="field-inner">
                                            <textarea name="name" placeholder="Special Mention ..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="field-inner">
                                            <button type="submit" class="theme-btn btn-style-four alternate"><span class="btn-title">Get Appointment <i class="arrow flaticon-play-button-1"></i></span></button>
                                        </div>
                                    </div>

                                </form>
                                <div class="min-text"><?php echo $success_msg; ?></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="column calendar-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner">
                        <!--Calendar-->
                        <div class="datepicker"></div>

                        <div class="choose-time">
                            <div class="title"><span><?php echo $cal_title; ?></span></div>
                            <div class="time-select">
                                <ul class="clearfix">
                                    <li>
                                        <div class="check-two">
                                            <input type="radio" name="time-group" value="" id="time-1">
                                            <label for="time-1"><span class="txt">09.00 am</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="check-two">
                                            <input type="radio" name="time-group" value="" id="time-2">
                                            <label for="time-2"><span class="txt">09.00 am</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="check-two">
                                            <input type="radio" name="time-group" value="" id="time-3" checked="">
                                            <label for="time-3"><span class="txt">10.30 am</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="check-two">
                                            <input type="radio" name="time-group" value="" id="time-4">
                                            <label for="time-4"><span class="txt">12.00 pm</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="check-two">
                                            <input type="radio" name="time-group" value="" id="time-5">
                                            <label for="time-5"><span class="txt">02.00 pm</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="check-two">
                                            <input type="radio" name="time-group" value="" id="time-6">
                                            <label for="time-6"><span class="txt">05.00 pm</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="check-two">
                                            <input type="radio" name="time-group" value="" id="time-7">
                                            <label for="time-7"><span class="txt">07.00 pm</span></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
<?php }
