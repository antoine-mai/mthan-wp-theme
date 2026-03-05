<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>

/**
 * Render the what-we-do section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_what_we_do_html($section_data) {
<section class="what-we-do">
        <div class="tabs-box service-tabs">
            <div class="upper-box">
                <div class="pattern-layer"></div>

                <div class="auto-container">
                    <div class="sec-title">
                        <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
                        <div class="subtitle"><?php echo $sec_subtitle; ?></div>
                        <h2><?php echo $sec_title; ?></h2>
                    </div>

                    <div class="buttons">
                        <ul class="tab-buttons row clearfix">
                            <li class="tab-btn active-btn col" data-tab="#tab-1"><span class="hvr-seeds"></span><div class="icon-box"><span class="icon flaticon-hedge"></span><span class="icon hvr-icon flaticon-null-3"></span></div><div class="btn-title">Spring Cleanup</div><span class="arrow flaticon-right-1"></span></li>
                            <li class="tab-btn col" data-tab="#tab-2"><span class="hvr-seeds"></span><div class="icon-box"><span class="icon flaticon-digging-1"></span><span class="icon hvr-icon flaticon-digging"></span></div><div class="btn-title">Plants Plantintg</div><span class="arrow flaticon-right-1"></span></li>
                            <li class="tab-btn col" data-tab="#tab-3"><span class="hvr-seeds"></span><div class="icon-box"><span class="icon flaticon-sprinkler"></span><span class="icon hvr-icon flaticon-sprinkler-1"></span></div><div class="btn-title">Water Fountain</div><span class="arrow flaticon-right-1"></span></li>
                            <li class="tab-btn col" data-tab="#tab-4"><span class="hvr-seeds"></span><div class="icon-box"><span class="icon flaticon-painting"></span><span class="icon hvr-icon flaticon-painting-1"></span></div><div class="btn-title">Hard Scaping</div><span class="arrow flaticon-right-1"></span></li>
                            <li class="tab-btn col" data-tab="#tab-5"><span class="hvr-seeds"></span><div class="icon-box"><span class="icon flaticon-wheelbarrow"></span><span class="icon hvr-icon flaticon-wheelbarrow-1"></span></div><div class="btn-title">Garden Care</div><span class="arrow flaticon-right-1"></span></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="tabs-content">
                <!--Tab-->
                <div class="tab active-tab" id="tab-1">
                    <div class="row outer-container clearfix">
                        <!--Image Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="image-layer" style="background-image: url(images/background/image-1.jpg);"></div>
                            <div class="inner clearfix">
                                <div class="content">
                                    <div class="inner-box">
                                        <div class="icon-box"><span class="flaticon-leaves"></span></div>
                                        <h5>Let’s <br>Start Your Project</h5>
                                        <div class="text">Make an appointment & Start your project today.</div>
                                        <div class="link-box clearfix">
                                            <a href="appointment.html" class="theme-btn btn-style-one alt-hover"><span class="btn-title">Appointment <i class="arrow flaticon-play-button-1"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Text Column-->
                        <div class="text-column col-lg-6 col-md-12 col-sm-12">
                            <div class="big-icon"><span class="flaticon-null-3"></span></div>
                            <div class="inner">
                                <div class="content">
                                    <div class="s-title">
                                        <div class="icon"><span class="flaticon-null-3"></span></div>
                                        <div class="subtitle">know About</div>
                                        <h4>Spring Cleanup</h4>
                                    </div>
                                    <div class="text">We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...</div>

                                    <div class="b-box">
                                        <div class="image"><a href="#"><img src="images/resource/bro-thumb-1.jpg" alt=""></a></div>
                                        <div class="bro-title">Projects & Case Studies</div>
                                        <div class="bro-link"><a href="#" class="theme-btn">Download.pdf <i class="arrow flaticon-play-button-1"></i></a></div>
                                    </div>

                                    <div class="more-link">
                                        <a href="spring-service.html" class="theme-btn">More about service <i class="arrow flaticon-play-button-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tab-->
                <div class="tab" id="tab-2">
                    <div class="row outer-container clearfix">
                        <!--Image Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="image-layer" style="background-image: url(images/background/image-2.jpg);"></div>
                            <div class="inner clearfix">
                                <div class="content">
                                    <div class="inner-box">
                                        <div class="icon-box"><span class="flaticon-leaves"></span></div>
                                        <h5>Let’s <br>Start Your Project</h5>
                                        <div class="text">Make an appointment & Start your project today.</div>
                                        <div class="link-box clearfix">
                                            <a href="appointment.html" class="theme-btn btn-style-one alt-hover"><span class="btn-title">Appointment <i class="arrow flaticon-play-button-1"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Text Column-->
                        <div class="text-column col-lg-6 col-md-12 col-sm-12">
                            <div class="big-icon"><span class="flaticon-digging"></span></div>
                            <div class="inner">
                                <div class="content">
                                    <div class="s-title">
                                        <div class="icon"><span class="flaticon-digging"></span></div>
                                        <div class="subtitle">know About</div>
                                        <h4>Plants Plantintg</h4>
                                    </div>
                                    <div class="text">We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...</div>

                                    <div class="b-box">
                                        <div class="image"><a href="#"><img src="images/resource/bro-thumb-1.jpg" alt=""></a></div>
                                        <div class="bro-title">Projects & Case Studies</div>
                                        <div class="bro-link"><a href="#" class="theme-btn">Download.pdf <i class="arrow flaticon-play-button-1"></i></a></div>
                                    </div>

                                    <div class="more-link">
                                        <a href="landscape-service.html" class="theme-btn">More about service <i class="arrow flaticon-play-button-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tab-->
                <div class="tab" id="tab-3">
                    <div class="row outer-container clearfix">
                        <!--Image Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="image-layer" style="background-image: url(images/background/image-3.jpg);"></div>
                            <div class="inner clearfix">
                                <div class="content">
                                    <div class="inner-box">
                                        <div class="icon-box"><span class="flaticon-leaves"></span></div>
                                        <h5>Let’s <br>Start Your Project</h5>
                                        <div class="text">Make an appointment & Start your project today.</div>
                                        <div class="link-box clearfix">
                                            <a href="appointment.html" class="theme-btn btn-style-one alt-hover"><span class="btn-title">Appointment <i class="arrow flaticon-play-button-1"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Text Column-->
                        <div class="text-column col-lg-6 col-md-12 col-sm-12">
                            <div class="big-icon"><span class="flaticon-sprinkler-1"></span></div>
                            <div class="inner">
                                <div class="content">
                                    <div class="s-title">
                                        <div class="icon"><span class="flaticon-sprinkler-1"></span></div>
                                        <div class="subtitle">know About</div>
                                        <h4>Water Fountain</h4>
                                    </div>
                                    <div class="text">We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...</div>

                                    <div class="b-box">
                                        <div class="image"><a href="#"><img src="images/resource/bro-thumb-1.jpg" alt=""></a></div>
                                        <div class="bro-title">Projects & Case Studies</div>
                                        <div class="bro-link"><a href="#" class="theme-btn">Download.pdf <i class="arrow flaticon-play-button-1"></i></a></div>
                                    </div>

                                    <div class="more-link">
                                        <a href="water-service.html" class="theme-btn">More about service <i class="arrow flaticon-play-button-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tab-->
                <div class="tab" id="tab-4">
                    <div class="row outer-container clearfix">
                        <!--Image Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="image-layer" style="background-image: url(images/background/image-4.jpg);"></div>
                            <div class="inner clearfix">
                                <div class="content">
                                    <div class="inner-box">
                                        <div class="icon-box"><span class="flaticon-leaves"></span></div>
                                        <h5>Let’s <br>Start Your Project</h5>
                                        <div class="text">Make an appointment & Start your project today.</div>
                                        <div class="link-box clearfix">
                                            <a href="appointment.html" class="theme-btn btn-style-one alt-hover"><span class="btn-title">Appointment <i class="arrow flaticon-play-button-1"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Text Column-->
                        <div class="text-column col-lg-6 col-md-12 col-sm-12">
                            <div class="big-icon"><span class="flaticon-painting-1"></span></div>
                            <div class="inner">
                                <div class="content">
                                    <div class="s-title">
                                        <div class="icon"><span class="flaticon-painting-1"></span></div>
                                        <div class="subtitle">know About</div>
                                        <h4>Hard Scaping</h4>
                                    </div>
                                    <div class="text">We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...</div>

                                    <div class="b-box">
                                        <div class="image"><a href="#"><img src="images/resource/bro-thumb-1.jpg" alt=""></a></div>
                                        <div class="bro-title">Projects & Case Studies</div>
                                        <div class="bro-link"><a href="#" class="theme-btn">Download.pdf <i class="arrow flaticon-play-button-1"></i></a></div>
                                    </div>

                                    <div class="more-link">
                                        <a href="hardscaping-service.html" class="theme-btn">More about service <i class="arrow flaticon-play-button-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tab-->
                <div class="tab" id="tab-5">
                    <div class="row outer-container clearfix">
                        <!--Image Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="image-layer" style="background-image: url(images/background/image-5.jpg);"></div>
                            <div class="inner clearfix">
                                <div class="content">
                                    <div class="inner-box">
                                        <div class="icon-box"><span class="flaticon-leaves"></span></div>
                                        <h5>Let’s <br>Start Your Project</h5>
                                        <div class="text">Make an appointment & Start your project today.</div>
                                        <div class="link-box clearfix">
                                            <a href="appointment.html" class="theme-btn btn-style-one alt-hover"><span class="btn-title">Appointment <i class="arrow flaticon-play-button-1"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Text Column-->
                        <div class="text-column col-lg-6 col-md-12 col-sm-12">
                            <div class="big-icon"><span class="flaticon-wheelbarrow-1"></span></div>
                            <div class="inner">
                                <div class="content">
                                    <div class="s-title">
                                        <div class="icon"><span class="flaticon-wheelbarrow-1"></span></div>
                                        <div class="subtitle">know About</div>
                                        <h4>Garden Care</h4>
                                    </div>
                                    <div class="text">We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...</div>

                                    <div class="b-box">
                                        <div class="image"><a href="#"><img src="images/resource/bro-thumb-1.jpg" alt=""></a></div>
                                        <div class="bro-title">Projects & Case Studies</div>
                                        <div class="bro-link"><a href="#" class="theme-btn">Download.pdf <i class="arrow flaticon-play-button-1"></i></a></div>
                                    </div>

                                    <div class="more-link">
                                        <a href="garden-service.html" class="theme-btn">More about service <i class="arrow flaticon-play-button-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
}
