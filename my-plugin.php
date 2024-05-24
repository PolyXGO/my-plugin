<?php

/**
 * Plugin Name: My Plugin
 * Description: A sample template to support faster development of WordPress plugins.
 * Version: 1.0.1
 * Author: PolyXGO
 * Author URI: https://polyxgo.vn
 * Donate link: https://paypal.me/polyxgo
 * Requires at least: 4.1
 * Tested up to: 6.5.3
 * Text Domain: my-plugin
 * Domain Path: /languages
 * Network: True
 * 
 * Copyright (C) 2023 POLYXGO
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ██████╗  ██████╗ ██╗  ██╗   ██╗██╗  ██╗ ██████╗  ██████╗ 
 * ██╔══██╗██╔═══██╗██║  ╚██╗ ██╔╝╚██╗██╔╝██╔════╝ ██╔═══██╗
 * ██████╔╝██║   ██║██║   ╚████╔╝  ╚███╔╝ ██║  ███╗██║   ██║
 * ██╔═══╝ ██║   ██║██║    ╚██╔╝   ██╔██╗ ██║   ██║██║   ██║
 * ██║     ╚██████╔╝███████╗██║   ██╔╝ ██╗╚██████╔╝╚██████╔╝
 * ╚═╝      ╚═════╝ ╚══════╝╚═╝   ╚═╝  ╚═╝ ╚═════╝  ╚═════╝ 
 */

if (!defined('ABSPATH')) {
	die('Cats cannot jump here');
}

// Check SSL Mode
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && ($_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
	$_SERVER['HTTPS'] = 'on';
}
/**
 * Please remove when deploying the plugin.
 */
define('PXG_DONATE', ' https://paypal.me/polyxgo');

/**
 * Contact support link
 */
define('MP_PLUGIN_SUPPORT_LINK', ' https://polyxgo.vn');

/**
 * Plugin Path
 */
define('MP_PATH', dirname(__FILE__));

/**
 * Plugin version
 */
define('MP_VERSION', '1.0.1');

/**
 * Plugin Basename
 */
define('MP_PLUGIN_BASENAME', basename(MP_PATH) . '/' . basename(__FILE__));

// Include loader
require_once MP_PATH . DIRECTORY_SEPARATOR . 'loader.php';

// =========================================================================
// All app initialization is done in Mp_Main_Controller __constructor
// =========================================================================
$main_controller = new Mp_Main_Controller();
