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
        'work-process',
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
    // Banner Section — delegates to mthan_section_banners_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_banners_options() as $banner_field) {
        $banner_field['dependency'] = array('section_template', '==', 'banners');
        $fields[] = $banner_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // About Section — delegates to mthan_section_about_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_about_options() as $about_field) {
        // Dependencies for fields explicitly bound to their style variant inside about.php
        // but they still need to be bound to the base 'about' template to show up
        // CSF supports multiple dependencies by pushing it to a nested structure, but
        // for simplicity, CSF wraps them in the accordion group or we can append it:
        if (isset($about_field['dependency'])) {
            // Already has a dependency (like style == 1), we make it an AND dependency
            // But CSF 'dependency' format is ('id', '==', 'val')
            // Multiple dependencies: array( array('id1','==','val1'), array('id2','==','val2') )
            $about_field['dependency'] = array(
                array('section_template', '==', 'about'),
                $about_field['dependency']
            );
        } else {
            $about_field['dependency'] = array('section_template', '==', 'about');
        }
        $fields[] = $about_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Appointment Section — delegates to mthan_section_appoint_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_appoint_options() as $appoint_field) {
        $appoint_field['dependency'] = array('section_template', '==', 'appoint');
        $fields[] = $appoint_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Areas Section — delegates to mthan_section_areas_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_areas_options() as $areas_field) {
        $areas_field['dependency'] = array('section_template', '==', 'areas');
        $fields[] = $areas_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Awards Section — delegates to mthan_section_awards_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_awards_options() as $awards_field) {
        $awards_field['dependency'] = array('section_template', '==', 'awards');
        $fields[] = $awards_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Blog Section — delegates to mthan_section_blog_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_blog_options() as $blog_field) {
        $blog_field['dependency'] = array('section_template', '==', 'blog');
        $fields[] = $blog_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // CTA Section — delegates to mthan_section_cta_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_cta_options() as $cta_field) {
        $cta_field['dependency'] = array('section_template', '==', 'cta');
        $fields[] = $cta_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Cart Section — delegates to mthan_section_cart_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_cart_options() as $cart_field) {
        $cart_field['dependency'] = array('section_template', '==', 'cart');
        $fields[] = $cart_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Checkout Section — delegates to mthan_section_checkout_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_checkout_options() as $checkout_field) {
        $checkout_field['dependency'] = array('section_template', '==', 'checkout');
        $fields[] = $checkout_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Contact Section — delegates to mthan_section_contact_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_contact_options() as $contact_field) {
        $contact_field['dependency'] = array('section_template', '==', 'contact');
        $fields[] = $contact_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // FAQs Section — delegates to mthan_section_faqs_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_faqs_options() as $faqs_field) {
        $faqs_field['dependency'] = array('section_template', '==', 'faqs');
        $fields[] = $faqs_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Gallery Section — delegates to mthan_section_gallery_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_gallery_options() as $gallery_field) {
        $gallery_field['dependency'] = array('section_template', '==', 'gallery');
        $fields[] = $gallery_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Services Section — delegates to mthan_section_services_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_services_options() as $services_field) {
        $services_field['dependency'] = array('section_template', '==', 'services');
        $fields[] = $services_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Pricing Section — delegates to mthan_section_pricing_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_pricing_options() as $pricing_field) {
        $pricing_field['dependency'] = array('section_template', '==', 'pricing');
        $fields[] = $pricing_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Projects Section — delegates to mthan_section_projects_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_projects_options() as $projects_field) {
        $projects_field['dependency'] = array('section_template', '==', 'projects');
        $fields[] = $projects_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Reviews Section — delegates to mthan_section_reviews_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_reviews_options() as $reviews_field) {
        $reviews_field['dependency'] = array('section_template', '==', 'reviews');
        $fields[] = $reviews_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Request Section — delegates to mthan_section_request_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_request_options() as $request_field) {
        $request_field['dependency'] = array('section_template', '==', 'request');
        $fields[] = $request_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Sponsors Section — delegates to mthan_section_sponsors_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_sponsors_options() as $sponsors_field) {
        $sponsors_field['dependency'] = array('section_template', '==', 'sponsors');
        $fields[] = $sponsors_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Team Section — delegates to mthan_section_team_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_team_options() as $team_field) {
        $team_field['dependency'] = array('section_template', '==', 'team');
        $fields[] = $team_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Testimonials Section — delegates to mthan_section_testimonials_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_testimonials_options() as $testimonials_field) {
        $testimonials_field['dependency'] = array('section_template', '==', 'testimonials');
        $fields[] = $testimonials_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // What We Do Section — delegates to mthan_section_what_we_do_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_what_we_do_options() as $wwd_field) {
        $wwd_field['dependency'] = array('section_template', '==', 'what-we-do');
        $fields[] = $wwd_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Why Us Section — delegates to mthan_section_why_us_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_why_us_options() as $why_us_field) {
        $why_us_field['dependency'] = array('section_template', '==', 'why-us');
        $fields[] = $why_us_field;
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