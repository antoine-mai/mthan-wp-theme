<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . '/wp-load.php';
$_POST['action'] = 'mthan_git_update';
require_once ABSPATH . 'wp-admin/admin-ajax.php';
