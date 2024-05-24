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
 * Class containing a list of sample code that can be used during the development of plugins and themes. Delete this class file if not used.
 */
class Mp_SampleCode {
// #region sample functions integrating features on plugins
    public static function sample_code_call_openai(){
        // Test connect OpenAI
        // OpenAI API_KEY
        $api_key = 'OPENAI_API_KEY';

        $url = 'https://api.openai.com/v1/completions';
        echo $url;
        $data = array(
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => 'Create sample code connect OpenAI API',
            'max_tokens' => 1000/* Max token */
        );
        $json_data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: ' . 'Bearer ' . $api_key
        ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo 'Lỗi cURL: ' . curl_error($ch);
        } else {
            $result = json_decode($response, true);
            echo '<pre>'.$result['choices'][0]['text'].'</pre>';
        }
        curl_close($ch);
    }
    // #endregion sample functions integrating features on plugins
}