<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Per-instance option fields for each section type.
 * Merged into every group repeater (layouts.php, page-metabox, post-metabox).
 * Fields use 'dependency' so they only show when the matching section_template is selected.
 */
function mthan_get_section_instance_fields()
{
    // Style map: sections with multiple styles
    $style_map = mthan_get_section_style_map();

    // Base sections that have a standard subtitle/title/description header
    $sections_with_header = array(
        'about-section',
        'blog-section',
        'call-to-action',
        'contact-section',
        'faqs-section',
        'gallery-section',
        'main-services',
        'pricing-section',
        'projects-section',
        'reviews-section',
        'service-request',
        'team-section',
        'testimonials-one',
        'what-we-do',
        'why-us',
        'work-process',
        'appoint-section',
        'areas-section',
        'awards-section',
        'mvg-history',
        'sponsors-section',
    );

    $fields = array();

    // ──────────────────────────────────────────────────────────────────
    // Style selector — only shown for sections that have variants
    // ──────────────────────────────────────────────────────────────────
    foreach ($style_map as $base_slug => $style_files) {
        $style_count = count($style_files);
        if ($style_count <= 1) {
            continue;
        }
        $options = array();
        for ($s = 1; $s <= $style_count; $s++) {
            $options[$s] = "Style {$s}";
        }
        $fields[] = array(
            'id' => 'section_style',
            'type' => 'select',
            'title' => 'Style Variant',
            'options' => $options,
            'default' => '1',
            'dependency' => array('section_template', '==', $base_slug),
        );
    }

    // ──────────────────────────────────────────────────────────────────
    // Common header fields (subtitle + title + description)
    // ──────────────────────────────────────────────────────────────────
    foreach ($sections_with_header as $slug) {
        $label = ucwords(str_replace('-', ' ', $slug));
        $fields[] = array('type' => 'subheading', 'content' => $label . ' Options', 'dependency' => array('section_template', '==', $slug));
        $fields[] = array('id' => "{$slug}_subtitle", 'type' => 'text', 'title' => 'Subtitle (small label)', 'dependency' => array('section_template', '==', $slug));
        $fields[] = array('id' => "{$slug}_title", 'type' => 'text', 'title' => 'Section Title (H2)', 'dependency' => array('section_template', '==', $slug));
        $fields[] = array('id' => "{$slug}_text", 'type' => 'textarea', 'title' => 'Description', 'dependency' => array('section_template', '==', $slug));
    }

    // ──────────────────────────────────────────────────────────────────
    // Banner Section (carousel slides)
    // ──────────────────────────────────────────────────────────────────
    $fields[] = array('type' => 'subheading', 'content' => 'Banner Section Options', 'dependency' => array('section_template', '==', 'banner-section'));
    for ($i = 1; $i <= 3; $i++) {
        $fields[] = array('id' => "banner_slide_{$i}_image", 'type' => 'media', 'library' => 'image', 'title' => "Slide {$i} – Background Image", 'dependency' => array('section_template', '==', 'banner-section'));
        $fields[] = array('id' => "banner_slide_{$i}_subtitle", 'type' => 'text', 'title' => "Slide {$i} – Subtitle", 'dependency' => array('section_template', '==', 'banner-section'));
        $fields[] = array('id' => "banner_slide_{$i}_title", 'type' => 'text', 'title' => "Slide {$i} – Title (H1)", 'dependency' => array('section_template', '==', 'banner-section'));
        $fields[] = array('id' => "banner_slide_{$i}_align", 'type' => 'select', 'title' => "Slide {$i} – Alignment", 'options' => array('left' => 'Left', 'right' => 'Right'), 'default' => ($i === 2 ? 'right' : 'left'), 'dependency' => array('section_template', '==', 'banner-section'));
        $fields[] = array('id' => "banner_slide_{$i}_btn1_text", 'type' => 'text', 'title' => "Slide {$i} – Button 1 Text", 'default' => 'Read More', 'dependency' => array('section_template', '==', 'banner-section'));
        $fields[] = array('id' => "banner_slide_{$i}_btn1_link", 'type' => 'text', 'title' => "Slide {$i} – Button 1 Link", 'default' => '#', 'dependency' => array('section_template', '==', 'banner-section'));
        $fields[] = array('id' => "banner_slide_{$i}_btn2_text", 'type' => 'text', 'title' => "Slide {$i} – Button 2 Text", 'default' => 'Contact Us', 'dependency' => array('section_template', '==', 'banner-section'));
        $fields[] = array('id' => "banner_slide_{$i}_btn2_link", 'type' => 'text', 'title' => "Slide {$i} – Button 2 Link", 'default' => '#', 'dependency' => array('section_template', '==', 'banner-section'));
    }

    // ──────────────────────────────────────────────────────────────────
    // Page Banner
    // ──────────────────────────────────────────────────────────────────
    $fields[] = array('type' => 'subheading', 'content' => 'Page Banner Options', 'dependency' => array('section_template', '==', 'page-banner'));
    $fields[] = array('id' => 'page_banner_image', 'type' => 'media', 'library' => 'image', 'title' => 'Background Image', 'dependency' => array('section_template', '==', 'page-banner'));
    $fields[] = array('id' => 'page_banner_title', 'type' => 'text', 'title' => 'Page Title (H1)', 'dependency' => array('section_template', '==', 'page-banner'));

    // ──────────────────────────────────────────────────────────────────
    // Call To Action
    // ──────────────────────────────────────────────────────────────────
    $fields[] = array('type' => 'subheading', 'content' => 'Call To Action Options', 'dependency' => array('section_template', '==', 'call-to-action'));
    $fields[] = array('id' => 'cta_heading', 'type' => 'text', 'title' => 'Heading', 'default' => 'Do you need tree care for your home?', 'dependency' => array('section_template', '==', 'call-to-action'));
    $fields[] = array('id' => 'cta_btn_text', 'type' => 'text', 'title' => 'Button Text', 'default' => 'Send Message', 'dependency' => array('section_template', '==', 'call-to-action'));
    $fields[] = array('id' => 'cta_btn_link', 'type' => 'text', 'title' => 'Button Link', 'default' => '#', 'dependency' => array('section_template', '==', 'call-to-action'));
    $fields[] = array('id' => 'cta_phone', 'type' => 'text', 'title' => 'Phone Number', 'default' => '+31 65 792 63 11', 'dependency' => array('section_template', '==', 'call-to-action'));

    // ──────────────────────────────────────────────────────────────────
    // Facts Section
    // ──────────────────────────────────────────────────────────────────
    $fields[] = array('type' => 'subheading', 'content' => 'Facts Section Options', 'dependency' => array('section_template', '==', 'facts-section'));
    $fields[] = array('id' => 'facts_bg_image', 'type' => 'media', 'library' => 'image', 'title' => 'Background Image', 'dependency' => array('section_template', '==', 'facts-section'));
    $fact_defaults = array(
        1 => array('icon' => 'flaticon-park', 'count' => '2.5', 'suffix' => 'k', 'label' => 'Completed Projects'),
        2 => array('icon' => 'flaticon-gardener', 'count' => '108', 'suffix' => '', 'label' => 'Expert Landscapers'),
        3 => array('icon' => 'flaticon-medal', 'count' => '23', 'suffix' => '+', 'label' => 'Awards and Honors'),
        4 => array('icon' => 'flaticon-customer-review-1', 'count' => '99', 'suffix' => '%', 'label' => 'Satisfied Customers'),
    );
    for ($i = 1; $i <= 4; $i++) {
        $d = $fact_defaults[$i];
        $fields[] = array('id' => "fact_{$i}_icon", 'type' => 'text', 'title' => "Fact {$i} – Icon Class", 'default' => $d['icon'], 'dependency' => array('section_template', '==', 'facts-section'));
        $fields[] = array('id' => "fact_{$i}_count", 'type' => 'text', 'title' => "Fact {$i} – Count Number", 'default' => $d['count'], 'dependency' => array('section_template', '==', 'facts-section'));
        $fields[] = array('id' => "fact_{$i}_suffix", 'type' => 'text', 'title' => "Fact {$i} – Suffix (k/+/%)", 'default' => $d['suffix'], 'dependency' => array('section_template', '==', 'facts-section'));
        $fields[] = array('id' => "fact_{$i}_label", 'type' => 'text', 'title' => "Fact {$i} – Label", 'default' => $d['label'], 'dependency' => array('section_template', '==', 'facts-section'));
    }

    // ──────────────────────────────────────────────────────────────────
    // Error Section
    // ──────────────────────────────────────────────────────────────────
    $fields[] = array('type' => 'subheading', 'content' => 'Error Section Options', 'dependency' => array('section_template', '==', 'error-section'));
    $fields[] = array('id' => 'error_title', 'type' => 'text', 'title' => 'Error Code (e.g. 404)', 'default' => '404', 'dependency' => array('section_template', '==', 'error-section'));
    $fields[] = array('id' => 'error_heading', 'type' => 'text', 'title' => 'Heading', 'default' => "Oops! That page can't be found", 'dependency' => array('section_template', '==', 'error-section'));
    $fields[] = array('id' => 'error_text', 'type' => 'textarea', 'title' => 'Description', 'dependency' => array('section_template', '==', 'error-section'));
    $fields[] = array('id' => 'error_btn_text', 'type' => 'text', 'title' => 'Button Text', 'default' => 'Back To Home', 'dependency' => array('section_template', '==', 'error-section'));
    $fields[] = array('id' => 'error_btn_link', 'type' => 'text', 'title' => 'Button Link', 'default' => '/', 'dependency' => array('section_template', '==', 'error-section'));

    // ──────────────────────────────────────────────────────────────────
    // Coming Soon
    // ──────────────────────────────────────────────────────────────────
    $fields[] = array('type' => 'subheading', 'content' => 'Coming Soon Options', 'dependency' => array('section_template', '==', 'coming-soon'));
    $fields[] = array('id' => 'coming_soon_title', 'type' => 'text', 'title' => 'Title', 'default' => 'Coming Soon', 'dependency' => array('section_template', '==', 'coming-soon'));
    $fields[] = array('id' => 'coming_soon_text', 'type' => 'textarea', 'title' => 'Description', 'dependency' => array('section_template', '==', 'coming-soon'));
    $fields[] = array('id' => 'coming_soon_date', 'type' => 'text', 'title' => 'Launch Date (YYYY/MM/DD)', 'dependency' => array('section_template', '==', 'coming-soon'));

    return $fields;
}