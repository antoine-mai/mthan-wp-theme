<?php defined('ABSPATH') or die('Cheatin\' uh?');

// $section_data is set by mthan_include_section_items() — per-instance options
// banner_slides is a CSF group repeater: array of slide items
$raw_slides = !empty($section_data['banner_slides']) ? $section_data['banner_slides'] : array();

$slides = array();
foreach ($raw_slides as $s) {
    $img = !empty($s['image']['url']) ? $s['image']['url'] : '';
    $title = !empty($s['title']) ? $s['title'] : '';
    if (!$img && !$title) {
        continue;
    }
    // btn link: CSF select stores a page ID → resolve to URL
    $btn1_id = !empty($s['btn1_link']) ? $s['btn1_link'] : '';
    $btn2_id = !empty($s['btn2_link']) ? $s['btn2_link'] : '';
    $slides[] = array(
        'img' => $img,
        'subtitle' => !empty($s['subtitle']) ? $s['subtitle'] : '',
        'title' => $title,
        'align' => !empty($s['align']) ? $s['align'] : 'left',
        'btn1_text' => !empty($s['btn1_text']) ? $s['btn1_text'] : '',
        'btn1_link' => $btn1_id ? get_permalink((int) $btn1_id) : '#',
        'btn2_text' => !empty($s['btn2_text']) ? $s['btn2_text'] : '',
        'btn2_link' => $btn2_id ? get_permalink((int) $btn2_id) : '#',
    );
}

// Fallback to default slides if none configured
if (empty($slides)) {
    $base = get_template_directory_uri() . '/assets/images/main-slider/';
    $slides = array(
            array('img' => $base . '4.jpg', 'subtitle' => 'High Quality &amp; Affordable Price', 'title' => 'Unique Designs', 'align' => 'left', 'btn1_text' => 'Read More', 'btn1_link' => '#', 'btn2_text' => 'Contact Us', 'btn2_link' => '#'),
            array('img' => $base . '5.jpg', 'subtitle' => 'Adding Perfection to Your Lawn', 'title' => 'Lawn Stylist', 'align' => 'right', 'btn1_text' => 'Read More', 'btn1_link' => '#', 'btn2_text' => 'Services', 'btn2_link' => '#'),
            array('img' => $base . '3.jpg', 'subtitle' => 'Solutions for Your Green Edge', 'title' => 'Build and Care', 'align' => 'left', 'btn1_text' => 'Read More', 'btn1_link' => '#', 'btn2_text' => 'Services', 'btn2_link' => '#'),
    );
}
?>
<section class="banner-section banner-two">
    <div class="banner-carousel owl-theme owl-carousel">
        <?php foreach ($slides as $slide) { $alignment_class = ($slide['align'] === 'right') ? ' right-aligned' : ''; ?>
        <div class="slide-item">
            <div class="image-layer" style="background-image: url(<?php echo esc_url($slide['img']); ?>);"></div>
            <div class="auto-container">
                <div class="content-box<?php echo $alignment_class; ?>">
                    <div class="content clearfix">
                        <div class="inner">
                            <?php if ($slide['subtitle']) { ?>
                            <div class="subtitle">
                                <?php echo esc_html($slide['subtitle']); ?>
                            </div>
                            <?php } ?>
                            <?php if ($slide['title']) { ?>
                            <h1>
                                <?php echo esc_html($slide['title']); ?>
                            </h1>
                            <?php } ?>
                            <div class="link-box clearfix">
                                <?php if ($slide['btn1_text']) { ?>
                                <a href="<?php echo esc_url($slide['btn1_link']); ?>" class="theme-btn btn-style-one">
                                    <span class="btn-title">
                                        <?php echo esc_html($slide['btn1_text']); ?> <i
                                            class="arrow flaticon-play-button-1"></i>
                                    </span>
                                </a>
                                <?php } ?>
                                <?php if ($slide['btn2_text']) { ?>
                                <a href="<?php echo esc_url($slide['btn2_link']); ?>" class="theme-btn btn-style-three">
                                    <span class="btn-title">
                                        <?php echo esc_html($slide['btn2_text']); ?> <i
                                            class="arrow flaticon-play-button-1"></i>
                                    </span>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>