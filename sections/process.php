<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the process section instance.
 * @return array
 */
function mthan_section_process_options()
{
    return array(
        array(
            'id'      => 'style',
            'type'    => 'select',
            'title'   => 'Style',
            'options' => array(
                '1' => 'Style 1 (Image Blocks)',
                '2' => 'Style 2 (Icon Blocks)',
            ),
            'default' => '1',
        ),
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'how we work',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Our Simple Step Working Process',
        ),
        array(
            'id'    => 'header_text',
            'type'  => 'textarea',
            'title' => 'Header Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
        // Repeater for steps
        array(
            'id'     => 'process_repeater',
            'type'   => 'group',
            'title'  => 'Process Steps',
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'step_label',
                    'type'  => 'text',
                    'title' => 'Step Label (e.g. Step One or 01)',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'text',
                    'title' => 'Icon (flaticon class)',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Featured Image',
                    'dependency' => array('style', '==', '1'),
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Description',
                ),
            ),
        ),
    );
}

/**
 * Render the process section.
 */
function mthan_section_process_html($section_data) {
    $style = isset($section_data['style']) ? $section_data['style'] : '1';
    
    if ($style === '2') {
        mthan_section_process_html_2($section_data);
    } else {
        mthan_section_process_html_1($section_data);
    }
}

/**
 * Style 1 Rendering (Image Blocks)
 */
function mthan_section_process_html_1($section_data) {
    $sec_title    = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $sec_subtitle = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $header_text  = isset($section_data['header_text']) ? $section_data['header_text'] : '';
    $repeater     = isset($section_data['process_repeater']) ? $section_data['process_repeater'] : array();
?>
<section class="work-process">
        <div class="round-pattern-layer"></div>
        <div class="right-leaf"><img src="/wp-content/assets/images/resource/leaf-1.png" alt="" title=""></div>
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="left-col col-xl-6 col-lg-12 col-md-12">
                        <div class="sec-title alternate">
                            <div class="title-icon"><span class="icon"><img src="/wp-content/assets/images/icons/leaf-four.png" alt="" title=""></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                    <div class="right-col col-xl-6 col-lg-12 col-md-12">
                        <div class="text"><?php echo esc_html($header_text); ?></div>
                    </div>
                </div>
            </div>

            <div class="process">
                <div class="row clearfix">
                    <?php foreach($repeater as $item): 
                        $title = isset($item['title']) ? $item['title'] : '';
                        $step  = isset($item['step_label']) ? $item['step_label'] : '';
                        $icon  = isset($item['icon']) ? $item['icon'] : '';
                        $img   = isset($item['image']) ? $item['image'] : '';
                        $text  = isset($item['text']) ? $item['text'] : '';
                    ?>
                    <!--Process Block-->
                    <div class="process-block col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="" title="">
                                <div class="hover-box">
                                    <div class="hvr-content">
                                        <div class="text"><?php echo esc_html($text); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <div class="icon-box">
                                    <span class="<?php echo esc_attr($icon); ?>"></span>
                                </div>
                                <div class="step"><?php echo esc_html($step); ?></div>
                                <h5><?php echo esc_html($title); ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php
}

/**
 * Style 2 Rendering (Icon Blocks)
 */
function mthan_section_process_html_2($section_data) {
    $sec_title    = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $sec_subtitle = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $header_text  = isset($section_data['header_text']) ? $section_data['header_text'] : '';
    $repeater     = isset($section_data['process_repeater']) ? $section_data['process_repeater'] : array();
?>
<section class="work-process-two">
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="left-col col-xl-6 col-lg-12 col-md-12">
                        <div class="sec-title alternate">
                            <div class="title-icon"><span class="icon"><img src="/wp-content/assets/images/icons/leaf-four.png" alt="" title=""></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                    <div class="right-col col-xl-6 col-lg-12 col-md-12">
                        <div class="text"><?php echo esc_html($header_text); ?></div>
                    </div>
                </div>
            </div>

            <div class="process">
                <div class="row clearfix">
                    <?php foreach($repeater as $item): 
                        $title = isset($item['title']) ? $item['title'] : '';
                        $step  = isset($item['step_label']) ? $item['step_label'] : '';
                        $icon  = isset($item['icon']) ? $item['icon'] : '';
                        $text  = isset($item['text']) ? $item['text'] : '';
                    ?>
                    <!--Process Block-->
                    <div class="process-block-two col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon">
                                    <span class="<?php echo esc_attr($icon); ?>"></span>
                                </div>
                                <div class="count"><span class="number"><?php echo esc_html($step); ?></span></div>
                            </div>
                            <h5><?php echo esc_html($title); ?></h5>
                            <div class="text"><?php echo esc_html($text); ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php
}
