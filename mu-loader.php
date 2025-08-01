<?php
/**
 * Must-Use Loader for Aihio Digital – Core
 * Pakottaa pluginin latautumaan MU-tilassa, vaikka varsinainen päivityslogiikka on normaalissa lisäosassa.
 */
defined('WPMU_PLUGIN_DIR') || define('WPMU_PLUGIN_DIR', WP_CONTENT_DIR . '/mu-plugins');

$plugin_dir = WPMU_PLUGIN_DIR . '/aihio-digital-core';
$main_file  = $plugin_dir . '/aihio-digital-core.php';

if (file_exists($main_file)) {
    require_once $main_file;
} else {
    // Kehittäjähuomio: asenna plugin kansioon wp-content/mu-plugins/aihio-digital-core/
    error_log('[Aihio Digital – Core] Main file not found: ' . $main_file);
}
