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

class Mp_Functions_Common
{
    private static $instance = null;
    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    // Define common functions used throughout the plugin
    public function __construct()
    {
        //TODO:
    }
    public static function get_current_admin_page()
    {
        if (isset($_GET['page'])) {
            $page_value = sanitize_text_field($_GET['page']);
            return $page_value;
        }
        return '';
    }

    public static function is_page($page_check)
    {
        return self::is_contains($page_check, self::get_current_admin_page());
    }

    public function is_edit_page($currentUrl)
    {
        if (strpos($currentUrl, 'wp-admin/post.php') !== false) {
            $urlParams = parse_url($currentUrl, PHP_URL_QUERY);
            parse_str($urlParams, $params);
            if (isset($params['post']) && isset($params['action']) && $params['action'] === 'edit') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if the plugin is running on localhost.
     */
    public static function is_localhost()
    {
        return self::is_contains('localhost', home_url());
    }

    public static function is_contains($str_search_keywords, $str_content)
    {
        return stripos($str_content, $str_search_keywords) !== false;
    }

    public function getCurrentUrl()
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    /**
     * Function to display plugin information.
     */
    public static function my_plugin_information()
    {
        ob_start();
?>
        <div style="padding: 8px; background: #dbdbdb; border: 2px solid #ccc;">
            <?php
            echo '<div><strong>Plugin name:</strong> ' . MP_PLUGIN_NAME . '</div>';
            echo '<div><strong>Code:</strong> ' . MP_PLUGIN_CODE . '</div>';
            echo '<div><strong>Version:</strong> ' . MP_VERSION . '</div>';
            echo '<div><strong>Prefix:</strong> ' . MP_PLUGIN_PREFIX . '</div>';
            echo '<div><strong>Slug:</strong> ' . MP_PLUGIN_SLUG . '</div>'
            ?>
        </div>
<?php
        return ob_get_clean();
    }

    public static function TrackLogs($data)
    {
        echo '<div style="display: block; text-align: right; padding: 13px;">' . $data . '</div>';
    }
}
