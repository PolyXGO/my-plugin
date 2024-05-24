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

class Mp_PostMeta
{
    private static $instance = null;
    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function __construct()
    {
        /**
         * Add custom field cho sản phẩm Downloadable. Ví dụ thông tin mật khẩu tập tin .zip.
         * Thông tin này đồng thời cũng sẽ hiển thị cạnh nút download cho file đặt mua.
         */
        add_action('woocommerce_product_options_downloads', array($this,  'myplugin_password_field_downloadable_file_field'));
        add_action('woocommerce_process_product_meta', array($this, 'myplugin_password_field_downloadable_file_field_save'));

        add_filter('woocommerce_account_downloads_column_download-product', array($this, 'display_product_image_on_account_downloads'));
        //add_filter('woocommerce_account_downloads_column_download-file', array($this, 'display_product_file_password_on_account_downloads'));
    }

    public function display_product_image_on_account_downloads($download)
    {
        if (!is_wc_endpoint_url('downloads')) return;

        if ($download['product_id'] > 0) {
            $product = wc_get_product($download['product_id']);
            $image   = $product->get_image(array(50, 50));

            if ($download['product_url']) {
                echo $image . ' <a href="' . esc_url($download['product_url']) . '">' . esc_html($download['product_name']) . '</a>';
            } else {
                echo $image .' '. esc_html($download['product_name']);
            }

            $file_password = get_post_meta($download['product_id'], 'file_password', true);
            if (!empty($file_password)) {
                echo '<div>File Password: ' . $file_password.'</div>';
            }
        }
    }

    public function display_product_file_password_on_account_downloads($download)
    {
        if (!is_wc_endpoint_url('downloads')) return;

        if ($download['product_id'] > 0) {
            $product = wc_get_product($download['product_id']);
            //var_dump($download);
            //Passwords
            /*if ($download['file']['name']) {
                echo '<div>' . $download['file']['name'] . 'password</div>';
            }*/
        }
    }

    public function myplugin_password_field_downloadable_file_field()
    {
        echo '<div class="options_group">';
        woocommerce_wp_text_input(
            array(
                'id'          => 'file_password',
                'label'       => __('File Password', MP_PLUGIN_CODE),
                'placeholder' => __('Enter file password', MP_PLUGIN_CODE),
                'desc_tip'    => 'true',
                'description' => __('This is a password field used for extracting files.', MP_PLUGIN_CODE),
            )
        );
        echo '</div>';
    }

    public function myplugin_password_field_downloadable_file_field_save($post_id)
    {
        $custom_file_info = sanitize_text_field($_POST['file_password']);
        update_post_meta($post_id, 'file_password', $custom_file_info);
    }
}
