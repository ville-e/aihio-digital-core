<?php
/**
 * Plugin Name: Aihio Digital – Core
 * Plugin URI:  https://github.com/ville-e/aihio-digital-core
 * Description: Aihio Digitalin perustoiminnot (modulaarinen). Päivittyy GitHub-releasesta.
 * Version: 1.0.0
 * Author: Aihio Digital
 * Author URI: https://aihio.fi
 * Text Domain: aihio-digital-core
 */

defined('ABSPATH') || exit;

// Plugin Update Checker
require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$aihio_puc = PucFactory::buildUpdateChecker(
    'https://github.com/ville-e/aihio-digital-core/', 
    __FILE__,
    'aihio-digital-core'
);

if (method_exists($aihio_puc->getVcsApi(), 'enableReleaseAssets')) {
    $aihio_puc->getVcsApi()->enableReleaseAssets();
}

// Moduulit
$modules = [
    'disable-update-emails.php',
];

foreach ($modules as $m) {
    $path = __DIR__ . '/modules/' . $m;
    if (file_exists($path)) {
        require_once $path;
    }
}
