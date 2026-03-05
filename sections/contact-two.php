<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>

/**
 * Render the contact-two section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_contact_two_html($section_data) {
<section class="contact-two">
        <div class="pattern-layer"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Map Column-->
                <div class="map-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="title">
                            <h2><?php echo $sec_title; ?></h2>
                        </div>
                        <div class="map-outer">
                            <div class="map-box">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77179.27405929092!2d144.96587780970705!3d-37.8497500129152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d34379057b1%3A0xf0456760532d450!2sQueen%20Victoria%20Market!5e0!3m2!1sen!2s!4v1602054031836!5m2!1sen!2s"  allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                            <div class="info-box">
                                <ul class="info clearfix">
                                    <li>
                                        <span class="icon flaticon-internet"></span>
                                        <div class="text">53 Garden Street <br>Los Anegles 90029 USA</div></li>
                                    <li>
                                        <span class="icon flaticon-message-1"></span>
                                        <div class="text"><a href="tel:(+5)6789012345">(+5) 678 90 12 345</a><br><a href="mailto:service@Prunersteam.com">service@Prunersteam.com</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Text Column-->
                <div class="form-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="form-outer">
                            <div class="title-box"><h4>Make an Appointment</h4></div>
                            <div class="form-box">
                                <div class="text">Fill out the form below and then Set a Day and Time that works best for you!.</div>
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
}
