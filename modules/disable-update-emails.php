<?php
defined('ABSPATH') || exit;

if (!function_exists('aihio_core_module_enabled') || !aihio_core_module_enabled('disable-update-emails', true)) {
    return;
}

/**
 * Moduuli: Estä automaattisten päivitysten sähköpostit (ydin, lisäosat, teemat)
 */
add_filter('automatic_updates_send_debug_email', '__return_false');
add_filter('auto_core_update_send_email', '__return_false');
add_filter('auto_plugin_update_send_email', '__return_false');
add_filter('auto_theme_update_send_email', '__return_false');
