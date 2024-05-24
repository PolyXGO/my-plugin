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

/**
 * Generate random string
 *
 * @param  integer $length              String length
 * @param  boolean $mixed_chars         Whether to include mixed characters
 * @param  boolean $special_chars       Whether to include special characters
 * @param  boolean $extra_special_chars Whether to include extra special characters
 * @return string
 */
function mp_generate_random_string( $length = 12, $mixed_chars = true, $special_chars = false, $extra_special_chars = false ) {
	$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
	if ( $mixed_chars ) {
		$chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	}

	if ( $special_chars ) {
		$chars .= '!@#$%^&*()';
	}

	if ( $extra_special_chars ) {
		$chars .= '-_ []{}<>~`+=,.;:/?|';
	}

	$str = '';
	for ( $i = 0; $i < $length; $i++ ) {
		$str .= substr( $chars, wp_rand( 0, strlen( $chars ) - 1 ), 1 );
	}

	return $str;
}