<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the faqs section instance.
 * @return array
 */
function mthan_section_faqs_options()
{
    return array(
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Have some questions?',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Common Questions',
        ),
        array(
            'id'     => 'faqs_repeater',
            'type'   => 'group',
            'title'  => 'FAQs List',
            'fields' => array(
                array(
                    'id'    => 'question',
                    'type'  => 'text',
                    'title' => 'Question',
                ),
                array(
                    'id'    => 'answer',
                    'type'  => 'textarea',
                    'title' => 'Answer',
                ),
            ),
            'default' => array(
                array(
                    'question' => 'What Makes us Better than Other Lawncare Companies?',
                    'answer'   => 'Must explain to you how all this mistaken idea denouncing pleasure praising pain born and we will give you a complete account of the system.',
                ),
                array(
                    'question' => 'What Happens During the Consultation?',
                    'answer'   => 'Must explain to you how all this mistaken idea denouncing pleasure praising pain born and we will give you a complete account of the system.',
                ),
            ),
        ),
        // Sidebar Fields
        array(
            'id'    => 'side_title',
            'type'  => 'text',
            'title' => 'Sidebar Title',
            'default' => 'Do You Have Questions?',
        ),
        array(
            'id'    => 'side_text',
            'type'  => 'textarea',
            'title' => 'Sidebar Text',
            'default' => 'Ask your questions to our expert team and get answers asap.',
        ),
    );
}

/**
 * Render the faqs section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_faqs_html($section_data) { 
    $sec_title     = isset($section_data['sec_title']) ? $section_data['sec_title'] : 'Common Questions';
    $sec_subtitle  = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Have some questions?';
    $faqs_repeater = isset($section_data['faqs_repeater']) ? $section_data['faqs_repeater'] : array();
    
    $side_title    = isset($section_data['side_title']) ? $section_data['side_title'] : 'Do You Have Questions?';
    $side_text     = isset($section_data['side_text']) ? $section_data['side_text'] : 'Ask your questions to our expert team and get answers asap.';
?>
<section class="faqs-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="left-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="title-icon"><span class="icon"><img src="/wp-content/assets/images/icons/leaf-two.png" alt="" title=""></span></div>
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
