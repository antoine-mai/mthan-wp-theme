<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the faqs section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_faqs_html($section_data) { 
    $slug = 'faqs';
    $sec_title     = mthan_get_section_val($slug, $section_data, 'sec_title', 'Common Questions');
    $sec_subtitle  = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'Have some questions?');
    $faqs_repeater = mthan_get_section_val($slug, $section_data, 'repeater', array());
    
    $side_title    = mthan_get_section_val($slug, $section_data, 'side_title', 'Do You Have Questions?');
    $side_text     = mthan_get_section_val($slug, $section_data, 'side_text', 'Ask your questions to our expert team and get answers asap.');
?>
<section class="faqs-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="left-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="title-icon"><span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-two.png" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                        <?php if(!empty($faqs_repeater)): ?>
                        <ul class="accordion-box clearfix">
                            <?php foreach($faqs_repeater as $index => $faq): 
                                $question = isset($faq['question']) ? $faq['question'] : '';
                                $answer   = isset($faq['answer']) ? $faq['answer'] : '';
                                $active_cls = ($index === 0) ? 'active-block' : '';
                                $btn_cls    = ($index === 0) ? 'active' : '';
                            ?>
                            <li class="accordion block <?php echo $active_cls; ?>">
                                <div class="acc-btn <?php echo $btn_cls; ?>"><div class="arrow"><span class="flaticon-play-button-1"></span></div> <?php echo esc_html($question); ?></div>
                                <div class="acc-content <?php echo $btn_cls; ?>" style="<?php echo ($index === 0) ? 'display: block;' : ''; ?>">
                                    <div class="content">
                                        <div class="text"><?php echo wp_kses_post($answer); ?></div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner">
                        <h5><?php echo esc_html($side_title); ?></h5>
                        <div class="text"><?php echo esc_html($side_text); ?></div>
                        <div class="faq-form default-form">
                            <form method="post" action="contact.html">
                                <div class="form-group">
                                    <div class="field-inner">
                                        <input type="text" name="name" value="" placeholder="Your Name *" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-inner">
                                        <input type="email" name="name" value="" placeholder="Email Address *" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-inner">
                                        <textarea name="message" placeholder="Your Question ..." required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-inner">
                                        <button type="submit" class="theme-btn btn-style-three alternate"><span class="btn-title">Submit Now <i class="arrow flaticon-play-button-1"></i></span></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="info"><span>*</span> Mail id not published.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
