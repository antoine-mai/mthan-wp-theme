<?php
/**
 * Template Name: Contact Page
 */
defined('ABSPATH') || exit;

get_header();

// 1. Page Banner
if (function_exists('mthan_section_page_banner_html')) {
    mthan_section_page_banner_html(array(
        'page_banner_title' => 'Contact',
        'page_banner_breadcrumb_title' => 'Contact'
    ));
}

// 2. Contact Section Style 3
if (function_exists('mthan_section_contact_html_3')) {
    mthan_section_contact_html_3(array(
        'contact_sec_subtitle' => 'Get In Touch',
        'contact_sec_title' => 'Here to Help You',
        'contact_main_office_text' => 'PO Box 515381 Lander, Garden Street LA 90029 USA.',
        'contact_working_hours' => "Mon-Friday: 09am to 07pm\nSat: 10.00am to 04pm",
        'contact_form_bg_image' => array('url' => get_template_directory_uri() . '/assets/images/background/contact-form-bg.jpg'),
        'contact_right_person_image' => array('url' => get_template_directory_uri() . '/assets/images/resource/contact-image.png'),
    ));
}

// 3. Map Section
if (function_exists('mthan_section_map_html')) {
    mthan_section_map_html(array(
        'map_src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77179.27405929092!2d144.96587780970705!3d-37.8497500129152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d34379057b1%3A0xf0456760532d450!2sQueen%20Victoria%20Market!5e0!3m2!1sen!2s!4v1602054031836!5m2!1sen!2s'
    ));
}

// 4. CTA Section Style 1
if (function_exists('mthan_section_cta_html')) {
    mthan_section_cta_html(array(
        'cta_style' => '1',
        'cta_heading' => 'Do you need tree care for your home?',
        'cta_btn_text' => 'Send Message',
        'cta_phone' => '+31 65 792 63 11'
    ));
}

get_footer();
