<?php defined('ABSPATH') or die('Cheatin\' uh?');
$bg = !empty($section_data['facts_bg_image']['url']) ? esc_url($section_data['facts_bg_image']['url']) : get_template_directory_uri() . '/images/background/image-6.jpg';
$defaults = array(
    1 => array('icon' => 'flaticon-park', 'count' => '2.5', 'suffix' => 'k', 'label' => 'Completed Projects'),
    2 => array('icon' => 'flaticon-gardener', 'count' => '108', 'suffix' => '', 'label' => 'Expert Landscapers'),
    3 => array('icon' => 'flaticon-medal', 'count' => '23', 'suffix' => '+', 'label' => 'Awards and Honors'),
    4 => array('icon' => 'flaticon-customer-review-1', 'count' => '99', 'suffix' => '%', 'label' => 'Satisfied Customers'),
);
?>
<section class="facts-section">
    <div class="image-layer" style="background-image: url(<?php echo $bg; ?>);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <?php for ($i = 1; $i <= 4; $i++) {
    $d = $defaults[$i];
    $icon = !empty($section_data["fact_{$i}_icon"]) ? $section_data["fact_{$i}_icon"] : $d['icon'];
    $count = !empty($section_data["fact_{$i}_count"]) ? $section_data["fact_{$i}_count"] : $d['count'];
    $suffix = isset($section_data["fact_{$i}_suffix"]) ? $section_data["fact_{$i}_suffix"] : $d['suffix'];
    $label = !empty($section_data["fact_{$i}_label"]) ? $section_data["fact_{$i}_label"] : $d['label'];
?>
            <div class="fact-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner">
                    <div class="icon-box"><span class="<?php echo esc_attr($icon); ?>"></span></div>
                    <div class="fact-count">
                        <div class="count-box">
                            <span class="count-text" data-stop="<?php echo esc_attr($count); ?>"
                                data-speed="2000">0</span>
                            <?php if ($suffix) { ?><sup>
                                <?php echo esc_html($suffix); ?>
                            </sup>
                            <?php
    }?>
                        </div>
                    </div>
                    <h4>
                        <?php echo esc_html($label); ?>
                    </h4>
                </div>
            </div>
            <?php
}?>
        </div>
    </div>
</section>