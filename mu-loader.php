<?php
// Laita tämä tiedosto suoraan wp-content/mu-plugins -kansioon.
$main = WPMU_PLUGIN_DIR . '/aihio-digital-core/aihio-digital-core.php';
if (file_exists($main)) require_once $main;
