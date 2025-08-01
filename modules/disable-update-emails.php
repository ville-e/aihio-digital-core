<?php
defined('ABSPATH') || exit;
add_filter('automatic_updates_send_debug_email', '__return_false');
add_filter('auto_core_update_send_email', '__return_false');
add_filter('auto_plugin_update_send_email', '__return_false');
add_filter('auto_theme_update_send_email', '__return_false');
