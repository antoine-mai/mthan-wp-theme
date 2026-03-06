<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Sections Settings
$section_fields = array();
$sections_path = get_template_directory() . '/sections/';

if (is_dir($sections_path)) {
    $files = glob($sections_path . '*.php');
    if ($files) {
        foreach ($files as $file) {
            $filename = basename($file, '.php');
            $section_fields[] = array(
                'id' => 'enable_section_' . str_replace('-', '_', $filename),
                'type' => 'switcher',
                'title' => 'Enable ' . ucwords(str_replace('-', ' ', $filename)) . ' Section',
                'default' => true,
            );
        }
    }
}

CSF::createSection(MTHAN_THEME_OPTIONS, array(
    'id' => 'sections_toggle',
    'title' => 'Sections Toggle',
    'icon' => 'fas fa-toggle-on',
    'fields' => empty($section_fields) ? array(
            array(
            'type' => 'content',
            'content' => 'No sections found in the /sections/ directory.',
        )
    ) : $section_fields
));