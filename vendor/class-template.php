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
 * Define EOL for CLI and Web
 */
if (!defined('PXG_EOL')) {
	define('PXG_EOL', php_sapi_name() === 'cli' ? PHP_EOL : '<br />');
}

class MyPluginTemplate
{
	/**
	 * Path to template files
	 *
	 * @var string|null
	 */
	public static $templatesPath = null;

	/**
	 * Template file to output
	 * @var string|null
	 */
	public static $template = null;

	/**
	 * Outputs the passed string if is in debug mode
	 *
	 * @param string $str Debug string to output
	 *
	 * @return void
	 */
	public static function debug($str)
	{
		/**
		 * if debug flag is on, output the string
		 */
		if (defined('MP_TEMPLATE_DEBUG') && MP_TEMPLATE_DEBUG) {
			echo $str;
		}
	}

	/**
	 * Retrieves templatesPath from MP_TEMPLATES_PATH constant
	 *
	 * @throws Exception If MP_TEMPLATES_PATH is not defined
	 *
	 * @return string|null Templates path
	 */
	public static function getTemplatesPathFromConstant()
	{
		self::debug(
			'Calling getTemplatesPathFromConstant' . PXG_EOL
		);
		if (defined('MP_TEMPLATES_PATH')) {
			return realpath(MP_TEMPLATES_PATH) . DIRECTORY_SEPARATOR;
		}
		return null;
	}

	/**
	 * Setter for template
	 *
	 * @param string $template Template file
	 *
	 * @throws Exception If template file is not found
	 *
	 * @return null
	 */
	public static function setTemplate($template, $path = false)
	{
		self::debug(
			'Calling setTemplate with' . PXG_EOL .
			'$template = ' . $template . PXG_EOL .
			'type of $template is ' . gettype($template) . PXG_EOL
		);

		if ($path) {
			$template = realpath($path) . DIRECTORY_SEPARATOR . $template;
		} else {
			$template = self::getTemplatesPathFromConstant() . $template;
		}

		$template = realpath($template . '.php');
		/**
		 * Check if passed template exist
		 */
		if (self::templateExists($template)) {
			self::$template = $template;
		} else {
			throw new Exception;
		}
	}

	/**
	 * Checks if template exists by using file_exists
	 *
	 * @param string $template Template file
	 *
	 * @return boolean
	 */
	public static function templateExists($template)
	{
		self::debug(
			'Calling templateExists with ' . PXG_EOL .
			'$template = ' . $template . PXG_EOL .
			'type of $template is ' . gettype($template) . PXG_EOL
		);
		return (!is_dir($template) && is_readable($template));
	}

	/**
	 * Renders a passed template
	 *
	 * @param string $template Template name
	 * @param array  $args     Variables to pass to the template file
	 *
	 * @return string Contents of the template
	 */
	public static function render($template, $args=array(), $path = false)
	{
		self::debug(
			'Calling render with' .
			'$template = ' . $template . PXG_EOL .
			'type of $template is ' . gettype($template) . PXG_EOL .
			'$args = ' . print_r($args, true) . PXG_EOL .
			'type of $args is ' . gettype($args) . PXG_EOL
		);
		self::setTemplate($template, $path);
		/**
		 * Extracting passed aguments
		 */
		extract($args);
		ob_start();
		/**
		 * Including the view
		 */
		include self::$template;

		return ob_get_flush();
	}

	/**
	 * Returns the content of a passed template
	 *
	 * @param string $template Template name
	 * @param array  $args     Variables to pass to the template file
	 *
	 * @return string Contents of the template
	 */
	public static function getTemplateContent($template, $args=array(), $path = false)
	{
		self::debug(
			'Calling render with' .
			'$template = ' . $template . PXG_EOL .
			'type of $template is ' . gettype($template) . PXG_EOL .
			'$args = ' . print_r($args, true) . PXG_EOL .
			'type of $args is ' . gettype($args) . PXG_EOL
		);
		self::setTemplate($template, $path);
		/**
		 * Extracting passed aguments
		 */
		extract($args);
		ob_start();
		/**
		 * Including the view
		 */
		include self::$template;

		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}