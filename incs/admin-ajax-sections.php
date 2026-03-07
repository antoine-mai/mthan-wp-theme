<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * AJAX Section Field Loading System
 */

/**
 * Callback function used by CSF to render the field container.
 */
function mthan_render_ajax_section_fields_container($field, $value, $unique) {
    echo '<div class="mthan-section-ajax-container" data-unique="' . esc_attr($unique) . '">';
    // Fields will be injected here via JS
    echo '</div>';
}

/**
 * AJAX handler to fetch field HTML.
 */
function mthan_ajax_load_section_fields() {
    check_ajax_referer('mthan_admin_nonce', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }

    $slug = sanitize_text_field($_POST['slug']);
    $unique = sanitize_text_field($_POST['unique']); // e.g., mthan_page_options[page_before_content][0]
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    
    if (empty($slug)) {
        wp_send_json_error('Missing slug');
    }

    $options_func = 'mthan_section_' . str_replace('-', '_', $slug) . '_options';
    
    if (!function_exists($options_func)) {
        wp_send_json_error('Section options function not found: ' . $options_func);
    }

    // Get current saved values if we have a post_id
    $current_values = [];
    if ($post_id) {
        // Extract group info from unique string
        // Format: mthan_page_options[page_before_content][0]
        if (preg_match('/^([^\[]+)\[([^\]]+)\]\[(\d+)\]/', $unique, $matches)) {
            $opt_key = $matches[1];
            $group_id = $matches[2];
            $index = $matches[3];
            
            $all_meta = get_post_meta($post_id, $opt_key, true);
            if (isset($all_meta[$group_id][$index])) {
                $current_values = $all_meta[$group_id][$index];
            }
        }
    }

    $fields = $options_func();
    $style_map = mthan_get_section_style_map();
    
    // Add Section-Specific Style Selector if in map AND not provided by the section itself
    if (isset($style_map[$slug]) && count($style_map[$slug]) > 1) {
        $has_internal_style = false;
        foreach($fields as $f) {
            if (isset($f['id']) && ($f['id'] === 'style' || $f['id'] === 'section_style')) {
                $has_internal_style = true;
                break;
            }
        }

        if (!$has_internal_style) {
            $style_options = [];
            for ($s = 1; $s <= count($style_map[$slug]); $s++) {
                $style_options[$s] = "Style {$s}";
            }
            array_unshift($fields, [
                'id'      => $slug . '_section_style',
                'type'    => 'select',
                'title'   => 'Style Variant',
                'options' => $style_options,
                'default' => '1',
            ]);
        }
    }

    ob_start();
    foreach ($fields as $field) {
        $original_id = isset($field['id']) ? $field['id'] : '';
        
        // Prefix IDs to avoid collisions within the same group item
        if ($original_id && $original_id !== 'section_template') {
            $field['id'] = $slug . '_' . str_replace($slug . '_', '', $field['id']);
        }

        // Recursively fix dependencies
        if (isset($field['dependency'])) {
            $field['dependency'] = mthan_prefix_dependency_ids($field['dependency'], $slug);
        }

        $val = isset($current_values[$field['id']]) ? $current_values[$field['id']] : null;

        // Render the field
        CSF::field($field, $val, $unique, 'field/group');
    }
    $html = ob_get_clean();

    wp_send_json_success(['html' => $html]);
}

/**
 * JS Logic for the AJAX Section Loader.
 */
function mthan_admin_ajax_section_loader_js() { ?>
<script>
(function ($) {
    
    function loadSectionFields($container, force = false) {
        var $item = $container.closest('.csf-cloneable-item');
        var $select = $item.find('select[name*="[section_template]"]');
        var slug = $select.val();
        var unique = $container.data('unique');
        var post_id = $('#post_ID').val();

        if (!slug) {
            $container.empty();
            return;
        }

        if (!force && $container.find('.csf-field').length) {
            return; // Already loaded
        }

        $container.html('<div class="csf-field"><div class="csf-title"><h4>Loading Section Fields...</h4></div></div>');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'mthan_load_section_fields',
                slug: slug,
                unique: unique,
                post_id: post_id,
                nonce: '<?php echo wp_create_nonce('mthan_admin_nonce'); ?>'
            },
            success: function (res) {
                if (res.success) {
                    $container.html(res.data.html);
                    // Re-init CSF scripts for the new fields
                    $container.csf_reload_script();
                } else {
                    $container.html('<div class="csf-field" style="color:red;">Error loading fields: ' + res.data + '</div>');
                }
            }
        });
    }

    // Trigger on change of template select
    $(document).on('change', 'select[name*="[section_template]"]', function () {
        var $container = $(this).closest('.csf-cloneable-item').find('.mthan-section-ajax-container');
        if ($container.length) {
            loadSectionFields($container, true);
        }
    });

    // Handle freshly added group items
    $(document).on('csf:group-added', function(e, $item) {
        // Update data-unique for the new item
        var $container = $item.find('.mthan-section-ajax-container');
        var name = $item.find('select[name*="[section_template]"]').attr('name');
        // Extract "mthan_page_options[page_before_content][index]"
        var unique = name.substring(0, name.lastIndexOf('['));
        $container.attr('data-unique', unique);
        $container.empty();
    });

    // Auto-load existing items on first reveal (CSF Accordion open)
    $(document).on('click', '.csf-cloneable-title', function() {
        var $item = $(this).closest('.csf-cloneable-item');
        var $container = $item.find('.mthan-section-ajax-container');
        if ($container.length) {
            loadSectionFields($container);
        }
    });

})(jQuery);
</script>
<style>
.mthan-section-ajax-container:empty { min-height: 20px; }
.mthan-section-ajax-container .csf-field:first-child { border-top: 1px dashed #ccc; margin-top: 15px; padding-top: 15px; }
</style>
<?php }
