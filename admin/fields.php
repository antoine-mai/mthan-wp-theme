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
        }
        else {
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
    // Process Section — delegates to mthan_section_process_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_process_options() as $process_field) {
        $process_field['dependency'] = array('section_template', '==', 'process');
        $fields[] = $process_field;
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
    foreach (mthan_section_faqs_options() as $faq_field) {
        $faq_field['dependency'] = array('section_template', '==', 'faqs');
        $fields[] = $faq_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Facts Section — delegates to mthan_section_facts_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_facts_options() as $facts_field) {
        $facts_field['dependency'] = array('section_template', '==', 'facts');
        $fields[] = $facts_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // MVG History Section — delegates to mthan_section_mvg_history_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_mvg_history_options() as $mvg_field) {
        $mvg_field['dependency'] = array('section_template', '==', 'mvg-history');
        $fields[] = $mvg_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Product Details — delegates to mthan_section_product_details_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_product_details_options() as $product_details_field) {
        $product_details_field['dependency'] = array('section_template', '==', 'product-details');
        $fields[] = $product_details_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Projects Section — delegates to mthan_section_projects_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_projects_options() as $projects_field) {
        $projects_field['dependency'] = array('section_template', '==', 'projects');
        $fields[] = $projects_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Project Details — delegates to mthan_section_project_details_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_project_details_options() as $project_details_field) {
        $project_details_field['dependency'] = array('section_template', '==', 'project-details');
        $fields[] = $project_details_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Project Feedback — delegates to mthan_section_project_feedback_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_project_feedback_options() as $project_feedback_field) {
        $project_feedback_field['dependency'] = array('section_template', '==', 'project-feedback');
        $fields[] = $project_feedback_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Project Outline — delegates to mthan_section_project_outline_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_project_outline_options() as $project_outline_field) {
        $project_outline_field['dependency'] = array('section_template', '==', 'project-outline');
        $fields[] = $project_outline_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Related Project — delegates to mthan_section_related_project_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_related_project_options() as $related_project_field) {
        $related_project_field['dependency'] = array('section_template', '==', 'related-project');
        $fields[] = $related_project_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Page Banner
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_page_banner_options() as $pb_field) {
        $pb_field['dependency'] = array('section_template', '==', 'page-banner');
        $fields[] = $pb_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Call To Action
    // ──────────────────────────────────────────────────────────────────
    $fields[] = array('type' => 'subheading', 'content' => 'Call To Action Options', 'dependency' => array('section_template', '==', 'call-to-action'));
    $fields[] = array('id' => 'cta_heading', 'type' => 'text', 'title' => 'Heading', 'default' => 'Do you need tree care for your home?', 'dependency' => array('section_template', '==', 'call-to-action'));
    $fields[] = array('id' => 'cta_btn_text', 'type' => 'text', 'title' => 'Button Text', 'default' => 'Send Message', 'dependency' => array('section_template', '==', 'call-to-action'));
    $fields[] = array('id' => 'cta_btn_link', 'type' => 'text', 'title' => 'Button Link', 'default' => '#', 'dependency' => array('section_template', '==', 'call-to-action'));
    $fields[] = array('id' => 'cta_phone', 'type' => 'text', 'title' => 'Phone Number', 'default' => '+31 65 792 63 11', 'dependency' => array('section_template', '==', 'call-to-action'));

    // ──────────────────────────────────────────────────────────────────
    // Map Section — delegates to mthan_section_map_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_map_options() as $map_field) {
        $map_field['dependency'] = array('section_template', '==', 'map');
        $fields[] = $map_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Error Section — delegates to mthan_section_error_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_error_options() as $error_field) {
        $error_field['dependency'] = array('section_template', '==', 'error');
        $fields[] = $error_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // Coming Soon — delegates to mthan_section_coming_soon_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_coming_soon_options() as $cs_field) {
        $cs_field['dependency'] = array('section_template', '==', 'coming-soon');
        $fields[] = $cs_field;
    }

    // ──────────────────────────────────────────────────────────────────
    // My Account — delegates to mthan_section_myaccount_options()
    // ──────────────────────────────────────────────────────────────────
    foreach (mthan_section_myaccount_options() as $myaccount_field) {
        $myaccount_field['dependency'] = array('section_template', '==', 'myaccount');
        $fields[] = $myaccount_field;
    }

    return $fields;
}