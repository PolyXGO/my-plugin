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

class Mp_Main_Controller
{

	/**
	 * Main Application Controller
	 *
	 * @return Mp_Main_Controller
	 */
	public function __construct()
	{
		register_activation_hook(MP_PLUGIN_BASENAME, array($this, 'activation_hook'));

		// Activate hooks
		$this->activate_actions();
		$this->activate_filters();
	}

	/**
	 * Activation hook callback
	 *
	 * @return void
	 */
	public function activation_hook()
	{
		$this->init_folder();
		$this->init_secret_key();
	}

	/**
	 * Initializes language domain for the plugin
	 *
	 * @return void
	 */
	public function load_textdomain()
	{
		load_plugin_textdomain(MP_PLUGIN_SLUG, false, false);
	}

	/**
	 * Register listeners for actions
	 *
	 * @return void
	 */
	private function activate_actions()
	{
		// Init setting fields;
		MyPlugin_Settings_Controller::get_instance();

		// Init shortcodes;
		Mp_Shortcode::get_instance();

		// Init postmeta;
		Mp_PostMeta::get_instance();

		// Ajax
		add_action('admin_init', array($this, 'ajax'));

		// Setup storage folder
		add_action('admin_init', array($this, 'init_folder'));

		// Setup secret key
		add_action('admin_init', array($this, 'init_secret_key'));

		// Load text domain
		add_action('admin_init', array($this, 'load_textdomain'));

		// Admin header
		add_action('admin_head', array($this, 'admin_head'));

		// My Plugin loaded
		add_action('plugins_loaded', array($this, 'mp_loaded'), 10);

		//My Plugin in Admin
		//Gutenberg Block 
		add_action('enqueue_block_editor_assets',array($this,'register_gutenberg_blocks_scripts_and_styles'),5);

		if(Mp_Functions_Common::is_page(MP_PLUGIN_SLUG)){
			// ======== Bootstrap ======== /
			// Register admin
			add_action('admin_enqueue_scripts',array($this,'register_bootstrap_scripts_and_styles'),5);
			add_action('admin_enqueue_scripts',array($this,'enqueue_bootstrap_scripts_and_styles'),5);
			// ======== //Bootstrap ======== /

			// ======== SortableJS ======== /
			// Document: https://sortablejs.github.io/Sortable/
			// Register admin
			add_action('admin_enqueue_scripts',array($this,'register_sortablejs_scripts_and_styles'),5);
			add_action('admin_enqueue_scripts',array($this,'enqueue_sortablejs_scripts_and_styles'),5);
			// ======== //SortableJS ======== /

			// ======== SweetAlert2 ======== /
			// Register admin
			add_action('admin_enqueue_scripts',array($this,'register_sweetalert2_scripts_and_styles'),5);
			add_action('admin_enqueue_scripts',array($this,'enqueue_sweetalert2_scripts_and_styles'),5);
			// ======== //SweetAlert2 ======== /

			// ======== Select2 ======== /
			// Register admin
			add_action('admin_enqueue_scripts',array($this,'register_select2_scripts_and_styles'),5);
			add_action('admin_enqueue_scripts',array($this,'enqueue_select2_scripts_and_styles'),5);
			// ======== //Select2 ======== /

			// Register scripts and styles - admin
			add_action('admin_enqueue_scripts', array($this, 'register_scripts_and_styles'), 5);
			
			// Register scripts and styles - frontend
			add_action('wp_enqueue_scripts', array($this, 'register_scripts_and_styles'), 5);

			// Enqueue export scripts and styles
			add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts_and_styles'), 5);
		}
		//My Plugin in Front
		//TODO: check exist method => register related funtion,...
	}
	/**
	 * Register listeners for filters
	 *
	 * @return void
	 */
	private function activate_filters()
	{
		// Add links to plugin list page
		add_filter('plugin_row_meta', array($this, 'plugin_row_meta'), 10, 2);
	}

	/**
	 * My Plugin loaded
	 *
	 * @return void
	 */
	public function mp_loaded()
	{
		if (defined('MP_PLUGIN_SLUG')) {
			add_action('admin_menu', array($this, 'admin_menu'));
		}
		// Add "Check for updates" link to plugin list page
		add_filter('plugin_row_meta', 'Mp_Updater_Controller::plugin_row_meta', 10, 2);
	}

	/**
	 * Create storage folder with index.php and index.html files
	 *
	 * @return void
	 */
	public function init_folder()
	{
		$this->create_folder(MP_STORAGE_PATH);
	}

	/**
	 * Create secret key if they don't exist yet
	 *
	 * @return void
	 */
	public function init_secret_key()
	{
		if (!get_option(MP_SECRET_KEY)) {
			update_option(MP_SECRET_KEY, mp_generate_random_string(12));
		}
	}

	/**
	 * Create storage folder
	 *
	 * @param  string Path to folder
	 * @return void
	 */
	public function create_folder($path)
	{
		if (!Mp_Directory::create($path)) {
			return add_action('admin_notices', array($this, 'folder_path_notice'));
		}
	}
	public function folder_path_notice()
	{
		MyPluginTemplate::render('main/folder-path-notice');
	}

	/**
	 * Add links to plugin list page
	 *
	 * @return array
	 */
	public function plugin_row_meta($links, $file)
	{
		if ($file === MP_PLUGIN_BASENAME) {
			$links[] = Mp_Template::get_content('main/contact-support');
			$links[] = Mp_Template::get_content('main/custom-links');
			$links[] = '<a href="'.PXG_DONATE.'" target="_blank" rel="nofollow" title="Donate" style="display: inline-flex; justify-content: center; align-items: center; position: relative; top: 4px;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-envelope-heart-fill" viewBox="0 0 18 18">
				<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555l-4.2 2.568-.051-.105c-.666-1.3-2.363-1.917-3.699-1.25-1.336-.667-3.033-.05-3.699 1.25l-.05.105zM11.584 8.91l-.073.139L16 11.8V4.697l-4.003 2.447c.027.562-.107 1.163-.413 1.767Zm-4.135 3.05c-1.048-.693-1.84-1.39-2.398-2.082L.19 12.856A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144L10.95 9.878c-.559.692-1.35 1.389-2.398 2.081L8 12.324l-.551-.365ZM4.416 8.91c-.306-.603-.44-1.204-.413-1.766L0 4.697v7.104l4.49-2.752z"/>
				<path d="M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
				</svg>Donate</a>';
		}

		return $links;
	}

	/**
	 * Register plugin menus
	 *
	 * @return void
	 */
	public function admin_menu()
	{
		$icon_svg = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-8-circle" viewBox="0 0 16 16">
		<path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-5.03 1.803c0 1.394-1.218 2.355-2.988 2.355-1.763 0-2.953-.955-2.953-2.344 0-1.271.95-1.851 1.647-2.003v-.065c-.621-.193-1.33-.738-1.33-1.781 0-1.225 1.09-2.121 2.66-2.121s2.654.896 2.654 2.12c0 1.061-.738 1.595-1.336 1.782v.065c.703.152 1.647.744 1.647 1.992Zm-4.347-3.71c0 .739.586 1.255 1.383 1.255s1.377-.516 1.377-1.254c0-.733-.58-1.23-1.377-1.23s-1.383.497-1.383 1.23Zm-.281 3.645c0 .838.72 1.412 1.664 1.412.943 0 1.658-.574 1.658-1.412 0-.843-.715-1.424-1.658-1.424-.944 0-1.664.58-1.664 1.424Z"/>
	  </svg>');
		$slug_admin_settings = 'my-plugin';
		// Thêm một menu item chính vào trang quản lý admin
		add_menu_page(
			MP_PLUGIN_NAME, // Tiêu đề trang menu
			MP_PLUGIN_NAME, // Tên menu hiển thị trên trang admin
			'manage_options', // Quyền truy cập cần thiết để xem menu
			$slug_admin_settings, // Slug của trang menu (url)
			'MyPlugin_Settings_Controller::index', //Use class 'MyPlugin_Settings_Controller::index' - Callback function để hiển thị nội dung trang menu
			$icon_svg, // Icon hiển thị bên cạnh menu (có thể sử dụng các lớp CSS hay URL ảnh)
			30 // Vị trí hiển thị của menu trong danh sách menu admin (giá trị số nguyên, thay đổi số này để thay đổi vị trí)
		);

		// Trường hợp tên plugin và slug cài đặt đầu tiên có nhãn khác nhau thì cần khai báo thêm 1 submenu_page callback hàm menu_page bên trên gọi.
		$slug_submenu_parent_admin_settings = $slug_admin_settings;
		add_submenu_page(
			$slug_admin_settings, // Slug của menu item chính
			'My Setting',
			'My Setting',
			'manage_options',
			$slug_submenu_parent_admin_settings, // Slug của trang trùng với slug menu
			'MyPlugin_Settings_Controller::index'
		);

		// Thêm một submenu item vào menu item chính
		$slug_submenu_admin_settings = $slug_admin_settings . '-submenu';
		add_submenu_page(
			$slug_admin_settings, // Slug của menu item chính
			'My Submenu', // Tiêu đề trang submenu
			'My Submenu', // Tên submenu hiển thị trên trang admin
			'manage_options', // Quyền truy cập cần thiết để xem submenu
			$slug_submenu_admin_settings, // Slug của trang submenu (url)
			'MyPlugin_Settings_Controller::sub_menu_settings_type' // Callback function để hiển thị nội dung trang submenu
		);
	}

	/**
	 * Register scripts and styles
	 *
	 * @return void
	 */
	public function register_scripts_and_styles()
	{
		//======== wp_enqueue_style mp_style call: css/style.css + .etc *.css by mp_style;
		wp_register_style('mp_style', Mp_Template::asset_link('css/style.css'));
		//======== wp_enqueue_style mp_style call: css/style.css + .etc *.css by mp_style;

		//======== Library JS ========//

		//======== Library JS ========//

		//======== wp_enqueue_script mp_settings call: js/util.js + js/settings.js + .etc *.js by mp_settings;
		wp_register_script('mp_util',Mp_Template::asset_link('js/util.js'), array('jquery'),false,'footer');

		wp_register_script('mp_settings', Mp_Template::asset_link('js/settings.js'), array('mp_util'),false,'footer');
		//======== wp_enqueue_script mp_settings call: js/util.js + js/settings.js + .etc *.js by mp_settings;

		//======== Use in client by mp_locale.title, mp_locale. description;
		wp_localize_script(
			'mp_settings', //Script register before;
			'mp_locale', //Variable call in javascript;
			array(
				'title'                      => __('Value of title', MP_PLUGIN_SLUG),
				'description'                 => __('Value of description', MP_PLUGIN_SLUG),
			)
		);
		//======== Use in client by mp_locale.title, mp_locale. description;
	}

	/**
	 * Enqueue scripts and styles for Export Controller
	 *
	 * @param  string $hook Hook suffix
	 * @return void
	 */
	public function enqueue_scripts_and_styles($hook)
	{
		/*if ( stripos( 'toplevel_page_mp_export', $hook ) === false ) {
			return;
		}*/

		// Includes style $handle by...
		wp_enqueue_style('mp_style');

		// Include script $handle by...
		wp_enqueue_script('mp_settings');
	}
	public function register_gutenberg_blocks_scripts_and_styles() {
		wp_register_script('block_scripts',
			Mp_Template::asset_link('js/gutenberg-blocks/custom-block.js'),
			array('wp-blocks', 'wp-element', 'wp-components'),false,'footer');
		
		wp_enqueue_script('block_scripts');
	  }
	public function register_bootstrap_scripts_and_styles()
	{
		$boostrap_version = '5.3.3';
		wp_register_style('bootstrap_style', Mp_Template::asset_link("css/bootstrap/$boostrap_version/bootstrap.min.css"));

		// Draggle Modal
		wp_register_script('jqueryui_script',Mp_Template::asset_link('js/jquery/ui-1.13.2/jquery-ui.min.js'), array('jquery'),false,'footer');
		wp_register_script('bootstrap_script',Mp_Template::asset_link("js/bootstrap/$boostrap_version/bootstrap.bundle.min.js"), array('jquery'),false,'footer');
	}
	public function enqueue_bootstrap_scripts_and_styles($hook)
	{
		// Includes style $handle by...
		wp_enqueue_style('bootstrap_style');
		// Include script $handle by...
		wp_enqueue_script('jqueryui_script');
		wp_enqueue_script('bootstrap_script');
	}

	public function register_sweetalert2_scripts_and_styles()
	{
		wp_register_style('sweetalert2_style', Mp_Template::asset_link('css/sweetalert2/11.7.31/sweetalert2.min.css'));
		wp_register_script('sweetalert2_script',Mp_Template::asset_link('js/sweetalert2/11.7.31/sweetalert2.min.js'), array('jquery'),false,'footer');
	}
	public function enqueue_sweetalert2_scripts_and_styles($hook)
	{
		// Includes style $handle by...
		wp_enqueue_style('sweetalert2_style');
		// Include script $handle by...
		wp_enqueue_script('sweetalert2_script');
	}
	
	public function register_select2_scripts_and_styles()
	{
		wp_register_style('select2_style', Mp_Template::asset_link('css/select2/4.1.0/select2.min.css'));
		wp_register_script('select2_script',Mp_Template::asset_link('js/select2/4.1.0/select2.min.js'), array('jquery'),false,'footer');
	}
	public function enqueue_select2_scripts_and_styles($hook)
	{
		// Includes style $handle by...
		wp_enqueue_style('select2_style');
		// Include script $handle by...
		wp_enqueue_script('select2_script');
	}

	public function register_sortablejs_scripts_and_styles()
	{
		wp_register_script('sortable_script',Mp_Template::asset_link('js/sortable/1.15.0/sortable.min.js'), array('jquery'),false,'footer');
	}
	public function enqueue_sortablejs_scripts_and_styles($hook)
	{
		// Include script $handle by...
		wp_enqueue_script('sortable_script');
	}



	/**
	 * Outputs head tags
	 *
	 * @return void
	 */
	public function admin_head()
	{
		global $wp_version;
		// Admin header
		MyPluginTemplate::render('main/admin-head', array('version' => $wp_version));
	}

	/**
	 * Register initial ajax router
	 *
	 * @return void
	 */
	public function ajax()
	{
		// Add actions router
		//$this->ajax_add_actions_router('Mp_ClassName_Controller','static_function_name',false);

		// Update actions
		if (current_user_can('update_plugins')) {
			//add_action( 'wp_ajax_mp_updater', 'Mp_Updater_Controller::updater' );
		}
	}

	public function ajax_add_actions_router($class_name, $function_name, $is_private = true)
	{
		// Public actions
		add_action('wp_ajax_nopriv_' . $function_name, $class_name . '::' . $function_name);

		// Private actions
		if ($is_private == false) {
			add_action('wp_ajax_' . $function_name, $class_name . '::' . $function_name);
		}
	}
}
