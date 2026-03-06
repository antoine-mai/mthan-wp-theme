<?php
define('WP_USE_THEMES', false);
require_once dirname(dirname(dirname(dirname(__DIR__)))) . '/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
WP_Filesystem();
global $wp_filesystem;

echo "Downloading...\n";
$zip_url = 'https://github.com/antoine-mai/mthan-wp-prunner/archive/refs/heads/main.zip'\;
$response = wp_remote_get($zip_url, ['timeout' => 300]);

if (is_wp_error($response)) {
    die('Download failed: ' . $response->get_error_message());
}

$zip_body = wp_remote_retrieve_body($response);
$temp_zip = wp_tempnam('mthan_update.zip');
$wp_filesystem->put_contents($temp_zip, $zip_body);

$extract_to = get_theme_root() . '/mthan_temp_update_dir/';
$wp_filesystem->delete($extract_to, true);

echo "Unzipping to $extract_to...\n";
$unzip_result = unzip_file($temp_zip, $extract_to);
if (is_wp_error($unzip_result)) {
    $wp_filesystem->delete($temp_zip);
    die('Unzip failed: ' . $unzip_result->get_error_message());
}

$source_dir = $extract_to . 'mthan-wp-prunner-main/';
if (!is_dir($source_dir)) {
    die('Source dir not found: ' . $source_dir);
}

echo "Copying from $source_dir to " . get_template_directory() . "\n";
$copy = copy_dir($source_dir, get_template_directory());

$wp_filesystem->delete($extract_to, true);
$wp_filesystem->delete($temp_zip);

if (is_wp_error($copy)) {
    die("Copy failed: " . $copy->get_error_message());
}
echo "Done!\n";
