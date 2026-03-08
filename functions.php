<?php defined('ABSPATH') || exit;
/**
 * functions.php — loader only.
 */

// Prefixes
define('MTHAN_THEME_OPTIONS', 'mthan_theme_options');
define('MTHAN_PAGE_OPTIONS', 'mthan_page_options');

// ── Core framework ─────────────────────────────────────────────────
require_once get_template_directory() . '/incs/codestar/autoload.php';

// ── Required Files (loaded manually to control order) ──────────────
require_once get_template_directory() . '/incs/sections.php';
require_once get_template_directory() . '/incs/custom-post-types.php';
require_once get_template_directory() . '/incs/woocommerce-hooks.php';

// ── Autoload /incs/ directory ──────────────────────────────────────
$mthan_autoload_incs = function($dir) use (&$mthan_autoload_incs) {
    if (!is_dir($dir)) return;

    $dir_name   = basename($dir);
    $registered = function_exists('mthan_get_sections') ? array_keys(mthan_get_sections()) : [];

    foreach (glob($dir . '/*.php') as $file) {
        $name = basename($file, '.php');

        // Skip manually loaded or specific files
        if (in_array($name, ['theme-options', 'page-options', 'sections'])) {
            continue;
        }

        // Only load section-specific files if they are registered
        if (($dir_name === 'options' || $dir_name === 'output') && !in_array($name, $registered)) {
            continue;
        }

        require_once $file;
    }

    foreach (glob($dir . '/*', GLOB_ONLYDIR) as $subdir) {
        $sub_name = basename($subdir);
        if (in_array($sub_name, ['codestar'])) {
            continue;
        }
        $mthan_autoload_incs($subdir);
    }
};

$mthan_autoload_incs(get_template_directory() . '/incs');

// ── Theme Options ──
require_once get_template_directory() . '/incs/theme-options.php';

// ──────────────────────────────────────────────────────────────────
// Core Hook Bindings ───────────────────────────────────────────────
// ──────────────────────────────────────────────────────────────────

add_action('after_setup_theme', 'mthan_setup');
add_action('wp_enqueue_scripts', 'mthan_enqueue_assets');
add_action('wp_head', 'mthan_wp_head_scripts');
add_action('wp_body_open', 'mthan_wp_body_open_scripts');
add_action('wp_footer', 'mthan_wp_footer_scripts', 999);

// AJAX and Admin Helpers
add_action('wp_ajax_mthan_git_update', 'mthan_ajax_git_update');
add_action('admin_footer', 'mthan_admin_git_update_js');