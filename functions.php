<?php defined('ABSPATH') || exit;
/**
 * functions.php — loader only.
 * All function definitions live in incs/ and sections/.
 */

// Theme options prefix — single source of truth
define('MTHAN_THEME_OPTIONS', 'mthan_theme_options');
define('MTHAN_PAGE_OPTIONS', 'mthan_page_options');
define('MTHAN_MENU_OPTIONS', 'mthan_menu_options');

// ── Core framework ─────────────────────────────────────────────────
require_once get_template_directory() . '/incs/codestar/autoload.php';

// ── Autoload /incs/ directory ──────────────────────────────────────
$mthan_autoload_incs = function($dir) use (&$mthan_autoload_incs) {
    if (!is_dir($dir)) return;

    // Load all PHP files in the current directory
    foreach (glob($dir . '/*.php') as $file) {
        // Skip theme-options.php, we need to load it last
        if (basename($file) === 'theme-options.php') {
            continue;
        }
        require_once $file;
    }

    // Recursively load subdirectories (except codestar framework)
    foreach (glob($dir . '/*', GLOB_ONLYDIR) as $subdir) {
        if (basename($subdir) === 'codestar') {
            continue;
        }
        $mthan_autoload_incs($subdir);
    }
};

$mthan_autoload_incs(get_template_directory() . '/incs');

// ── Theme Options (loads admin/layouts.php → section-instance-fields.php) ──
require_once get_template_directory() . '/incs/theme-options.php';

// ──────────────────────────────────────────────────────────────────
// Core Hook Bindings
// ──────────────────────────────────────────────────────────────────

// From incs/admin-helpers.php
add_action('admin_footer', 'mthan_admin_section_autofill_js');
add_action('wp_ajax_mthan_git_update', 'mthan_ajax_git_update');
add_action('admin_footer', 'mthan_admin_git_update_js');

// From incs/theme-setup.php
add_action('after_setup_theme', 'mthan_setup');
add_action('wp_enqueue_scripts', 'mthan_enqueue_assets');
add_action('wp_head', 'mthan_wp_head_scripts');
add_action('wp_body_open', 'mthan_wp_body_open_scripts');
add_action('wp_footer', 'mthan_wp_footer_scripts', 999);

// AJAX Section Field Loader (incs/admin-ajax-sections.php)
add_action('wp_ajax_mthan_load_section_fields', 'mthan_ajax_load_section_fields');
add_action('admin_footer', 'mthan_admin_ajax_section_loader_js');