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

class Mp_Updater{
    /**
	 * Add "Check for updates" link
	 *
	 * @param  array  $plugin_meta An array of the plugin's metadata, including the version, author, author URI, and plugin URI
	 * @param  string $plugin_file Path to the plugin file relative to the plugins directory
	 * @return array
	 */
	public static function plugin_row_meta( $plugin_meta, $plugin_file ) {
		$modal_index = 0;
		// Get current updates
		$updater = get_option( MP_UPDATER, array() );

		// Add link for each extension
		foreach ( Mp_Extensions::get() as $slug => $extension ) {
			$modal_index++;
			// Get plugin details
			if ( $plugin_file === $extension['basename'] ) {
				// Get updater URL
				$updater_url = add_query_arg( array( 'mp_check_for_updates' => 1, 'mp_nonce' => wp_create_nonce( 'mp_check_for_updates' ) ), network_admin_url( 'plugins.php' ) );

				// Check purchase ID
				if ( get_option( $extension['key'] ) ) {
					$plugin_meta[] = Mp_Template::get_content( 'updater/check', array( 'url' => $updater_url ) );
				} else {
					$plugin_meta[] = Mp_Template::get_content( 'updater/modal', array( 'url' => $updater_url, 'modal' => $modal_index ) );
				}
				// Check error message
				if ( isset( $updater[ $slug ]['error_message'] ) ) {
					$plugin_meta[] = Mp_Template::get_content( 'updater/error', array( 'message' => $updater[ $slug ]['error_message'] ) );
				}
			}
		}

		return $plugin_meta;
	}
}