<?php
// General Settings
CSF::createSection($prefix, array(
    'id' => 'general_settings',
    'title' => 'General Settings',
    'icon' => 'fas fa-cogs',
    'fields' => array(
            array(
            'type' => 'content',
            'content' => '<div style="background: #fff; padding: 20px; border-left: 4px solid #0073aa; box-shadow: 0 1px 1px rgba(0,0,0,.04); margin-bottom: 20px;">
                            <h3 style="margin-top: 0;">Theme Updater</h3>
                            <p>Click the button below to pull the latest changes from the Git repository.</p>
                            <button type="button" id="mthan-git-pull-btn" class="button button-primary">Pull Latest Updates</button>
                            <div id="mthan-git-pull-log" style="margin-top: 15px; display: none; background: #23282d; color: #00ff00; padding: 15px; font-family: monospace; white-space: pre-wrap; max-height: 300px; overflow-y: auto;"></div>
                          </div>',
        ),
            array(
            'id' => 'logo',
            'type' => 'media',
            'title' => 'Site Logo',
        ),
            array(
            'id' => 'favicon',
            'type' => 'media',
            'title' => 'Favicon',
        ),
    )
));