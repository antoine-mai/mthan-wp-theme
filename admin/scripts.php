<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
CSF::createSection(MTHAN_THEME_OPTIONS, array(
    'id' => 'custom_scripts_settings',
    'title' => 'Custom Scripts',
    'icon' => 'fas fa-code',
    'fields' => array(
        array(
            'id' => 'header_scripts',
            'type' => 'code_editor',
            'title' => 'Header Scripts',
            'desc' => 'These scripts will be printed in the &lt;head&gt; section.',
            'settings' => array(
                'theme' => 'dracula',
                'mode' => 'htmlmixed',
            ),
        ),
        array(
            'id' => 'body_scripts',
            'type' => 'code_editor',
            'title' => 'After Body Scripts',
            'desc' => 'These scripts will be printed just after the opening &lt;body&gt; tag.',
            'settings' => array(
                'theme' => 'dracula',
                'mode' => 'htmlmixed',
            ),
        ),
        array(
            'id' => 'footer_scripts',
            'type' => 'code_editor',
            'title' => 'Footer Scripts',
            'desc' => 'These scripts will be printed before the closing &lt;/body&gt; tag.',
            'settings' => array(
                'theme' => 'dracula',
                'mode' => 'htmlmixed',
            ),
        ),
    )
));
