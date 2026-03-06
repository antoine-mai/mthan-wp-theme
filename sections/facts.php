<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the facts section instance.
 * @return array
 */
function mthan_section_facts_options()
{
    return array(
        array(
            'id'      => 'style',
            'type'    => 'select',
            'title'   => 'Style',
            'options' => array(
                '1' => 'Style 1 (With BG)',
                '2' => 'Style 2 (Full Width)',
            ),
            'default' => '1',
        ),
        array(
            'id'      => 'bg_image',
            'type'    => 'media',
            'library' => 'image',
            'preview' => false,
            'title'   => 'Background Image',
            'dependency' => array('style', '==', '1'),
            'default' => array('url' => get_template_directory_uri() . '/assets/images/background/image-6.jpg')
        ),
        array(
            'id'     => 'facts_repeater',
            'type'   => 'group',
            'title'  => 'Fact Blocks',
            'max'    => 4,
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title/Label',
                ),
                array(
                    'id'    => 'count',
                    'type'  => 'text',
                    'title' => 'Count (number)',
                ),
                array(
                    'id'    => 'suffix',
                    'type'  => 'text',
                    'title' => 'Suffix (e.g. k, +, %)',
                ),
                array(
                    'id'    => 'sub_text',
                    'type'  => 'text',
                    'title' => 'Subtext (Style 2 only)',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'text',
                    'title' => 'Icon Class',
                ),
            ),
            'default' => array(
                array('icon' => 'flaticon-park', 'count' => '2.5', 'suffix' => 'k', 'title' => 'Completed Projects', 'sub_text' => 'Professional Designers'),
                array('icon' => 'flaticon-gardener', 'count' => '108', 'suffix' => '', 'title' => 'Expert Landscapers', 'sub_text' => 'Ongoing in Company'),
                array('icon' => 'flaticon-medal', 'count' => '23', 'suffix' => '+', 'title' => 'Awards and Honors', 'sub_text' => 'Winning Landscapers'),
                array('icon' => 'flaticon-customer-review-1', 'count' => '99', 'suffix' => '%', 'title' => 'Satisfied Customers', 'sub_text' => 'Satisfied by Our Work'),
            ),
        ),
    );
}

/**
 * Render the facts section.
 */
function mthan_section_facts_html($section_data) {
    $slug = 'facts';
    $style = mthan_get_section_val($slug, $section_data, 'style', '1');
    
    if ($style === '2') {
        mthan_section_facts_html_2($section_data);
    } else {
        mthan_section_facts_html_1($section_data);
    }
}

/**
 * Style 1 Rendering (With BG)
 */
function mthan_section_facts_html_1($section_data) {
    $slug = 'facts';
    $bg_url = mthan_sec_img($slug, $section_data, 'bg_image', get_template_directory_uri() . '/assets/images/background/image-6.jpg');
    $repeater = mthan_get_section_val($slug, $section_data, 'repeater', array());
?>
<section class="facts-section">
    <div class="image-layer" style="background-image: url(<?php echo esc_url($bg_url); ?>);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <?php foreach($repeater as $item): 
                $icon   = isset($item['icon']) ? $item['icon'] : '';
                $count  = isset($item['count']) ? $item['count'] : '';
                $suffix = isset($item['suffix']) ? $item['suffix'] : '';
                $title  = isset($item['title']) ? $item['title'] : '';
            ?>
            <div class="fact-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner">
                    <?php if($icon): ?><div class="icon-box"><img src="<?php echo esc_url($icon); ?>" alt="icon"></div><?php endif; ?>
                    <div class="fact-count">
                        <div class="count-box">
                            <span class="count-text" data-stop="<?php echo esc_attr($count); ?>" data-speed="2000">0</span>
                            <?php if ($suffix): ?><sup><?php echo esc_html($suffix); ?></sup><?php endif; ?>
                        </div>
                    </div>
                    <h4><?php echo esc_html($title); ?></h4>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
}

/**
 * Style 2 Rendering (Full Width Blocks)
 */
function mthan_section_facts_html_2($section_data) {
    $slug = 'facts';
    $repeater = mthan_get_section_val($slug, $section_data, 'repeater', array());
?>
<section class="facts-two">
        <div class="outer-container">
            <div class="row clearfix">
                <?php foreach($repeater as $item): 
                    $icon     = isset($item['icon']) ? $item['icon'] : '';
                    $count    = isset($item['count']) ? $item['count'] : '';
                    $suffix   = isset($item['suffix']) ? $item['suffix'] : '';
                    $title    = isset($item['title']) ? $item['title'] : '';
                    $sub_text = isset($item['sub_text']) ? $item['sub_text'] : '';
                ?>
                <div class="fact-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner">
                        <?php if($icon): ?><div class="icon-box"><img src="<?php echo esc_url($icon); ?>" alt="icon"></div><?php endif; ?>
                        <div class="fact-count"><div class="count-box"><span class="count-text" data-stop="<?php echo esc_attr($count); ?>" data-speed="3000">0</span><?php echo esc_html($suffix); ?><span class="title"><?php echo esc_html($title); ?></span></div></div>
                        <div class="sub-text"><?php echo esc_html($sub_text); ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
}
