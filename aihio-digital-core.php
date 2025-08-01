<?php
/**
 * Plugin Name: Aihio Digital – Core
 * Plugin URI:  https://github.com/ville_e/aihio-digital-core
 * Description: Aihio Digitalin perustoiminnot WordPress-sivustoille (modulaarinen).
 * Version: 1.0.0
 * Author: Aihio Digital
 * Author URI: https://aihiodigital.fi
 * Text Domain: aihio-digital-core
 */

defined('ABSPATH') || exit;

// --- Lataa Plugin Update Checker (PUC) ---
require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$aihio_puc = PucFactory::buildUpdateChecker(
    'https://github.com/YOURNAME/aihio-digital-core/',
    __FILE__,
    'aihio-digital-core'
);

// Private repo? Aseta token wp-configiin: define('AIHIO_GITHUB_TOKEN', 'ghp_xxx');
if (defined('AIHIO_GITHUB_TOKEN') && AIHIO_GITHUB_TOKEN) {
    $aihio_puc->setAuthentication(AIHIO_GITHUB_TOKEN);
}

// --- Modulien lataus ---
// Voit myöhemmin lisätä tänne lisää moduuleja (tiedosto per ominaisuus).
$modules = [
    'disable-update-emails.php',
    // 'hardening-security.php',
    // 'cleanup-head.php',
    // 'acf-defaults.php',
];

foreach ($modules as $module) {
    $path = __DIR__ . '/modules/' . $module;
    if (file_exists($path)) {
        require_once $path;
    }
}

/**
 * Yksinkertainen suodatin, jolla voi ottaa moduuleja pois päältä sivustokohtaisesti.
 * Esim. teeman functions.php: add_filter('aihio_core_enable_module_disable-update-emails', '__return_false');
 */
function aihio_core_module_enabled($module_slug, $default = true) {
    return apply_filters("aihio_core_enable_module_{$module_slug}", $default);
}
