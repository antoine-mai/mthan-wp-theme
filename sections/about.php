<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the about section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_about_html($section_data) { ?>
<?php 
    $sec_subtitle = !empty($section_data['about_subtitle']) ? $section_data['about_subtitle'] : 'About Us';
    $sec_title = !empty($section_data['about_title']) ? $section_data['about_title'] : 'Professional Gardener';
    $sec_text = !empty($section_data['about_text']) ? $section_data['about_text'] : 'Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.';
?>
<section class="about-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt=""
                                    title=""></span></div>
                        <div class="subtitle">About Us</div>
                        <h2>Professional Gardener</h2>
                    </div>
                    <div class="text">
                        <p class="bigger-text">Leader in landscaping, lawn care, and irrigation services in Los Angeles
                            since 2004.</p>
                        <p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                            born and we will give you a complete account of the system, and expound the actualy
                            teachings.</p>
                    </div>
                    <div class="quote-box">
                        <a href="https://www.youtube.com/watch?v=CB_rXABU8DI" class="vid-link lightbox-image">
                            <span class="image"><img src="images/resource/quote-thumb.jpg" alt="" title=""></span>
                            <span class="icon flaticon-play-button-1"></span>
                        </a>
                        <div class="quote">
                            <div class="quote-icon"><span></span></div>
                            <div class="quote-text">“Our Company has established a reputation as the leader in landscape
                                design.”</div>
                            <div class="info"><span class="name">Chris Stanley,</span> <span class="designation">Founder
                                    of Pruners</span></div>
                        </div>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="link-box">
                            <a href="about.html" class="theme-btn btn-style-four"><span class="btn-title">Read More <i
                                        class="arrow flaticon-play-button-1"></i></span></a>
                        </div>
                        <div class="signature"><img src="images/resource/signature-1.png" alt="" title=""></div>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image-box clearfix">
                        <figure class="image"><img src="images/resource/featured-image-1.jpg" alt="" title=""></figure>
                        <div class="anim-image"><img src="images/resource/anim-image-1.png" alt="" title=""></div>
                        <div class="caption">
                            <span class="icon flaticon-leaves"></span>
                            <span class="big-txt">2k</span>
                            <span class="txt">Projects <br>were completed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php function mthan_section_about_html_2($section_data) { ?>
<?php
    $sec_title    = isset($section_data['about_title']) ? $section_data['about_title'] : '';
    $sec_subtitle = isset($section_data['about_subtitle']) ? $section_data['about_subtitle'] : '';
?>
<section class="about-two">
        <div class="auto-container">
        	<div class="row clearfix">
                <!--Text Column-->
                <div class="text-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
                            <div class="subtitle"><?php echo $sec_subtitle; ?></div>
                            <h2><?php echo $sec_title; ?></h2>
                        </div>
                        <div class="text">
                            <p class="bigger-text">Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.</p> 
                            <p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.</p>
                        </div>
                        <div class="insured">
                            <div class="icon"><span class="flaticon-insurance"></span></div>
                            <h5>Fully Insured</h5>
                            <div class="text">Indignation and dislike men who are so that our garden therefore always holds in these matters too this stone has beguiled and occur demoralized.</div>
                        </div>
                        <div class="lower-box clearfix">
                            <div class="link-box">
                                <a href="about.html" class="theme-btn btn-style-three alternate"><span class="btn-title">Read More <i class="arrow flaticon-play-button-1"></i></span></a>
                            </div>
                            <div class="iso">
                                <div class="iso-icon"><span class="icon"><img src="images/icons/iso-icon.png" alt=""></span></div>
                                <div class="txt">Certified Company</div>
                                <div class="number">ISO 9001:2015</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/anim-image-3.png" alt="" title=""></figure>

                            <a href="https://www.youtube.com/watch?v=CB_rXABU8DI" class="vid-link lightbox-image">
                                <span class="image"><img src="images/resource/vid-thumb-1.jpg" alt="" title=""></span>
                                <span class="icon flaticon-play-button-1"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
function mthan_section_about_html_3($section_data) { ?>
<?php
    $sec_title    = isset($section_data['about_title']) ? $section_data['about_title'] : '';
    $sec_subtitle = isset($section_data['about_subtitle']) ? $section_data['about_subtitle'] : '';
?>
<section class="about-three">
        <div class="auto-container">
        	<div class="row clearfix">
                <!--Text Column-->
                <div class="text-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="title-icon">
                                <span class="icon">
                                    <img src="images/icons/leaf-two.png" alt="" title="">
                                </span>
                            </div>
                            <div class="subtitle"><?php echo $sec_subtitle; ?></div>
                            <h2><?php echo $sec_title; ?></h2>
                        </div>
                        <div class="text">
                            <p class="bigger-text">Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.</p> 
                            <p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.</p>
                        </div>
                        <div class="quote-box">
                            <a href="https://www.youtube.com/watch?v=CB_rXABU8DI" class="vid-link lightbox-image">
                                <span class="image"><img src="images/resource/vid-thumb-2.jpg" alt="" title=""></span>
                                <span class="icon flaticon-play-button-1"></span>
                            </a>
                            <div class="quote">
                                <div class="quote-icon"><span></span></div>
                                <div class="quote-text">“Our Company has established a reputation as the leader in landscape design.”</div>
                                <div class="info"><span class="name">Chris Stanley,</span> <span class="designation">Founder of Pruners</span></div>
                            </div>
                        </div>
                        <div class="lower-text">Our power of choice is untrammelled & when nothing prevents our being able to do what we like best, every pleasure.</div>
                        <div class="lower-box clearfix">
                            <div class="signature"><img src="images/resource/signature-1.png" alt="" title=""></div>
                            <div class="iso">
                                <div class="iso-icon"><span class="icon"><img src="images/icons/iso-icon.png" alt=""></span></div>
                                <div class="txt">Certified Company</div>
                                <div class="number">ISO 9001:2015</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="image-box clearfix">
                            <figure class="image"><img src="images/resource/featured-image-12.jpg" alt="" title=""></figure>
                            <div class="caption">
                                <span class="big-txt">16</span> 
                                <span class="txt">Years <br>of Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
