<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Get section instance fields
 * @return array
 **/
function mthan_get_section_instance_fields()
{
    $fields = [];
    $sections_path = get_template_directory() . '/incs/sections/';
    $style_map = mthan_get_section_style_map();
    $global_options = get_option(MTHAN_THEME_OPTIONS, []);

    if (is_dir($sections_path)) {
        $files = glob($sections_path . '*.php');
        if ($files) {
            foreach ($files as $file) {
                $slug = basename($file, '.php');
                $options_func = 'mthan_section_' . str_replace('-', '_', $slug) . '_options';
               
                if (function_exists($options_func)) {
                    $content_fields = $options_func();
                    $overrides = [];
                    
                    // 1. Add Section-Specific Style Selector if in map AND not provided by the section itself
                    if (isset($style_map[$slug]) && count($style_map[$slug]) > 1) {
                        $has_internal_style = false;
                        foreach($content_fields as $f) {
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
                            $overrides[] = [
                                'id'         => $slug . '_section_style',
                                'type'       => 'select',
                                'title'      => 'Style Variant',
                                'options'    => $style_options,
                                'default'    => '1',
                                'dependency' => ['section_template', '==', $slug],
                            ];
                        }
                    }

                    // 2. Process Section Content Fields
                    foreach($content_fields as $cf) {
                        $original_id = isset($cf['id']) ? $cf['id'] : '';
                        
                        // Populate default from global configuration if available
                        if ($original_id) {
                            $global_key = 'g_' . $slug . '_' . str_replace($slug . '_', '', $original_id);
                            if (isset($global_options[$global_key])) {
                                $cf['default'] = $global_options[$global_key];
                            }
                        }
                        
                        // Prefix Title
                        if (isset($cf['title'])) {
                            $cf['title'] = 'Override ' . $cf['title'];
                        }

                        // Prefix IDs (except universal ones)
                        if ($original_id && $original_id !== 'section_template') {
                             $cf['id'] = $slug . '_' . str_replace($slug . '_', '', $cf['id']);
                        }

                        // Recursively fix dependencies
                        if (isset($cf['dependency'])) {
                            $cf['dependency'] = mthan_prefix_dependency_ids($cf['dependency'], $slug);
                            // Also wrap in section_template dependency
                            $cf['dependency'] = [
                                ['section_template', '==', $slug],
                                $cf['dependency']
                            ];
                        } else {
                            $cf['dependency'] = ['section_template', '==', $slug];
                        }

                        $overrides[] = $cf;
                    }

                    // 3. Add Background & Padding Overrides
                    $bg_id = $slug . '_background';
                    $overrides[] = [
                        'id'         => $bg_id,
                        'type'       => 'background',
                        'title'      => 'Override Background Settings',
                        'dependency' => ['section_template', '==', $slug],
                        'default'    => isset($global_options['g_' . $bg_id]) ? $global_options['g_' . $bg_id] : [],
                    ];

                    $pad_id = $slug . '_padding';
                    $overrides[] = [
                        'id'         => $pad_id,
                        'type'       => 'spacing',
                        'title'      => 'Override Padding Settings',
                        'left'       => false,
                        'right'      => false,
                        'units'      => ['px', '%', 'em', 'rem'],
                        'dependency' => ['section_template', '==', $slug],
                        'default'    => isset($global_options['g_' . $pad_id]) ? $global_options['g_' . $pad_id] : [
                            'top'    => '120',
                            'bottom' => '120',
                            'unit'   => 'px',
                        ],
                    ];
                    
                    if (!empty($overrides)) {
                        foreach($overrides as $override_field) {
                            $fields[] = $override_field;
                        }
                    }
                }
            }
        }
    }

    $fields[] = [
        'id'      => 'section_id',
        'type'    => 'text',
        'title'   => 'Section ID',
        'desc'    => 'Optional ID for this section instance (useful for anchor links)',
    ];

    return $fields;
}

/**
 * Helper to recursively prefix IDs in CSF dependency arrays
 */
function mthan_prefix_dependency_ids($dependency, $slug)
{
    if (!is_array($dependency)) {
        return $dependency;
    }

    // Check if it's a simple condition array e.g. ['field', '==', 'val']
    if (count($dependency) === 3 && is_string($dependency[0]) && is_string($dependency[1])) {
        $id = $dependency[0];
        if ($id !== 'section_template' && strpos($id, $slug . '_') !== 0) {
            $dependency[0] = $slug . '_' . $id;
        }
        return $dependency;
    }

    // Otherwise recurse through nested dependencies
    foreach ($dependency as $key => $value) {
        if (is_array($value)) {
            $dependency[$key] = mthan_prefix_dependency_ids($value, $slug);
        }
    }

    return $dependency;
}