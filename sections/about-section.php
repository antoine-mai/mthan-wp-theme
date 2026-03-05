<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the about-section section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_about_section_html($section_data) {
$sec_subtitle = !empty($section_data['about-section_subtitle']) ? $section_data['about-section_subtitle'] : 'About Us';
$sec_title = !empty($section_data['about-section_title']) ? $section_data['about-section_title'] : 'Professional Gardener';
$sec_text = !empty($section_data['about-section_text']) ? $section_data['about-section_text'] : 'Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.';
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
}
