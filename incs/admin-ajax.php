<?php defined('ABSPATH') || exit;

/**
 * AJAX Handler for loading section fields on-demand.
 * This reduces the initial DOM size by not rendering all 34+ sections at once.
 */

function mthan_ajax_load_section_fields() {
    check_ajax_referer('mthan_admin_nonce', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }

    $slug = sanitize_text_field($_POST['slug']);
    $unique = sanitize_text_field($_POST['unique']); // e.g., mthan_page_options[page_before_content][0]
    
    if (empty($slug)) {
        wp_send_json_error('Missing slug');
    }

    $options_func = 'mthan_section_' . str_replace('-', '_', $slug) . '_options';
    
    if (!function_exists($options_func)) {
        wp_send_json_error('Section options function not found: ' . $options_func);
    }

    $fields = $options_func();
    
    // We need to prefix the IDs just like we did in fields.php, 
    // but now we only do it for ONE section.
    
    ob_start();
    foreach ($fields as $field) {
        $original_id = isset($field['id']) ? $field['id'] : '';
        
        // Prefix IDs to avoid collisions within the same group item
        if ($original_id && $original_id !== 'section_template') {
            $field['id'] = $slug . '_' . str_replace($slug . '_', '', $field['id']);
        }

        // Render the field using CSF's internal engine
        // The $unique here should be the full path to the group item, e.g. mthan_page_options[page_before_content][0]
        // CSF::field will then append [field_id] to it.
        CSF::field($field, '', $unique, 'field/group');
    }
    $html = ob_get_clean();

    wp_send_json_success(['html' => $html]);
}
add_action('wp_ajax_mthan_load_section_fields', 'mthan_ajax_load_section_fields');
