<?php

/**
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

/**
 * Plugin debug active. Default is false
 */
define('MP_DEBUG', false);
define('MP_TEMPLATE_DEBUG', false);

/**
 * Plugin slug: my-plugin 
 */
define('MP_PLUGIN_SLUG', 'my-plugin');

/**
 * Plugin prefix: my_plugin_
 */
define('MP_PLUGIN_PREFIX', 'my_plugin_');

/**
 * Plugin code: myplugin => Use for language.
 */
define('MP_PLUGIN_CODE', 'myplugin');

/**
 * Plugin name (title): My Plugin
 */
define('MP_PLUGIN_NAME', 'My Plugin');

/**
 * Plugin URL
 */
define('MP_URL', plugins_url('', MP_PLUGIN_BASENAME));

/**
 * Plugin Storage URL
 */
define('MP_STORAGE_URL', plugins_url('storage', MP_PLUGIN_BASENAME));

/**
 * Plugin about url
 */
if (!defined('MP_PLUGIN_ABOUT')) {
	define('MP_PLUGIN_ABOUT', 'https://polyxgo.com/my-plugin');
}

/**
 * Plugin storage path
 */
define('MP_STORAGE_PATH', MP_PATH . DIRECTORY_SEPARATOR . 'storage');

/**
 * Plugin View folder path
 */
define('MP_TEMPLATES_PATH', MP_PATH . DIRECTORY_SEPARATOR . 'view');

/**
 * Plugin url check license
 */
if (!defined('MP_PLUGIN_CHECK')) {
	define('MP_PLUGIN_CHECK', 'https://redirect.polyxgo.com/v1/check/my-plugin-extension');
}

/**
 * Plugin key check license
 */
if (!defined('MP_PLUGIN_KEY')) {
	define('MP_PLUGIN_KEY', 'mp_plugin_key');
}

/**
 * Plugin config key: update, secret;
 */
define('MP_UPDATER', 'mp_updater');
define('MP_SECRET_KEY', 'mp_secret_key');
