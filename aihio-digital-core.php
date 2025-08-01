<?php
/**
 * Plugin Name: Aihio Digital – Core
 * Plugin URI:  https://github.com/YOURNAME/aihio-digital-core
 * Description: Aihio Digitalin perustoiminnot (modulaarinen). Päivittyy GitHubista.
 * Version: 1.0.0
 * Author: Aihio Digital
 * Author URI: https://aihio.fi
 * Text Domain: aihio-digital-core
 */

defined('ABSPATH') || exit;

require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$aihio_puc = PucFactory::buildUpdateChecker(
    'https://github.com/YOURNAME/aihio-digital-core/',
    __FILE__,
    'aihio-digital-core'
);

// (Valinnainen) käytä main-branchia kehityspäivityksiin:
$aihio_puc->setBranch('main');

// Suosi Release Asset -pakettia, jos liität oman ZIPin julkaisuun:
if (method_exists($aihio_puc->getVcsApi(), 'enableReleaseAssets')) {
    $aihio_puc->getVcsApi()->enableReleaseAssets();
}

// Moduulit
$modules = ['disable-update-emails.php'];
foreach ($modules as $m) {
    $p = __DIR__ . '/modules/' . $m;
    if (file_exists($p)) require_once $p;
}

