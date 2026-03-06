<?php defined('ABSPATH') || exit;
/**
 * functions.php — loader only.
 * All function definitions live in incs/ and sections/.
 */

// Theme options prefix — single source of truth
define('MTHAN_THEME_OPTIONS', 'mthan_theme_options');

// ── Core framework ─────────────────────────────────────────────────
require_once get_template_directory() . '/incs/codestar/autoload.php';

// ── Theme helpers ──────────────────────────────────────────────────
require_once get_template_directory() . '/incs/section-helpers.php';
require_once get_template_directory() . '/incs/theme-setup.php';
require_once get_template_directory() . '/incs/admin-helpers.php';
require_once get_template_directory() . '/incs/custom-post-type.php';

// ── Section files (all function-based, safe to require early) ──────
// Must load before theme-options.php so mthan_section_*_options()
// functions exist when section-instance-fields.php runs.
foreach (glob(get_template_directory() . '/sections/*.php') as $file) {
    require_once $file;
}

// ── Theme Options (loads admin/layouts.php → section-instance-fields.php) ──
require_once get_template_directory() . '/incs/theme-options.php';