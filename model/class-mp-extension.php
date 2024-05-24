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

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cats cannot jump here' );
}

class Mp_Extensions {

	/**
	 * Get active extensions
	 *
	 * @return array
	 */
	public static function get() {
		$extensions = array();
        
		// Add My Plugin
		if ( defined( 'MP_PLUGIN_SLUG' ) ) {
			$extensions[ MP_PLUGIN_SLUG ] = array(
				'key'      => MP_PLUGIN_KEY,
				'title'    => MP_PLUGIN_NAME,
				'about'    => MP_PLUGIN_ABOUT,
				'check'    => MP_PLUGIN_CHECK,
				'basename' => MP_PLUGIN_BASENAME,
				'version'  => MP_VERSION,
				'requires' => '1.8',
				'slug'    => MP_PLUGIN_SLUG,
			);
		}

		return $extensions;
	}
}
