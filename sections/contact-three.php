<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>

/**
 * Render the contact-three section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_contact_three_html($section_data) {
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
                                <div class="subtitle"><?php echo $sec_subtitle; ?></div>
                                <h2><?php echo $sec_title; ?></h2>
                            </div>

                            <div class="address">
                                <h5>Main Office</h5>
                                <div class="text">PO Box 515381 Lander, Garden Street LA 90029 USA.</div>
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
                                                <li><a href="#">(+5) 678 90 12 345</a></li>
                                                <li><a href="#">service@landerteam.com</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!--Block-->
                                    <div class="info-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <div class="icon"><span class="flaticon-clock"></span></div>
                                            <h6>Working Hours</h6>
                                            <ul>
                                                <li>Mon-Friday: 09am to 07pm</li>
                                                <li>Sat: 10.00am to 04pm</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div> 

                <!--Text Col-->
                <div class="form-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="image-layer" style="background-image:url(images/background/contact-form-bg.jpg);"></div>
                    <div class="image-right"><img src="images/resource/contact-image.png" alt=""></div>
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
}
