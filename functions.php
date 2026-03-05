<?php defined('ABSPATH') || exit;
/**
 * functions.php — loader only.
 * All function definitions live in incs/.
 */

// ── Core framework ─────────────────────────────────────────────────
require_once get_template_directory() . '/incs/codestar/autoload.php';

// ── Theme helpers ──────────────────────────────────────────────────
require_once get_template_directory() . '/incs/section-helpers.php';
require_once get_template_directory() . '/incs/theme-setup.php';
require_once get_template_directory() . '/incs/admin-helpers.php';

// ── Section files (must load before theme-options; section-instance-fields.php
//    calls mthan_section_*_options() which are defined in these files) ──────
foreach (glob(get_template_directory() . '/sections/*.php') as $file) {
    require_once $file;
}

// ── Theme Options (loads admin/layouts.php → section-instance-fields.php) ──
require_once get_template_directory() . '/incs/theme-options.php';