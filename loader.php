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
//TODO: loop folder and include auto file;

// Include all the files that you want to load in here

class MyPluginLoader
{
	/**
	 * Main Application Controller
	 *
	 * @return MyPluginLoader
	 */
	public function __construct()
	{
		// Load *.PHP
		$this->require_files();
	}
	public function require_files()
	{

		// Require PHP files in the root folder
		$file_names = ['define', 'functions'];
		foreach ($file_names as $file_name) {
			require_once MP_PATH . DIRECTORY_SEPARATOR . $file_name . '.php';
		}

		// Require all PHP files in the MVC folder
		$folders = ['vendor','library', 'controller', 'model']; //Exludes folder view;
		foreach ($folders as $folder) {
			$path = MP_PATH . '/' . $folder;
			$this->require_folder_recursive($path);
		}
	}
	public function require_folder_recursive($path)
	{
		$files = glob($path . '/*.php');
		foreach ($files as $file) {
			require_once $file;
		}

		// Get all folder
		$dirs = glob($path . '/*', GLOB_ONLYDIR);
		foreach ($dirs as $dir) {
			// Require files;
			$this->require_folder_recursive($dir);
		}
	}
}
new MyPluginLoader();
