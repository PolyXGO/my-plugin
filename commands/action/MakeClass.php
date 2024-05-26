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

namespace Commands\Action;

/**
 * Plugin class prefix: MP_
 */
define('MP_PLUGIN_CLASS_PREFIX', 'MP');

class MakeClass
{
    public function handle($args)
    {
        $className = $args[0] ?? null;
        $toIndex = array_search('-to', $args);
        $directory = $args[$toIndex + 1] ?? null;

        if (!$className || !$directory) {
            echo "Usage: php poly make:class <ClassName> -to <Directory>\n";
            return;
        }

        $basePath = dirname(__DIR__, 2);
        $fullDirectoryPath = $basePath . '/' . trim($directory, '/');

        if (!is_dir($fullDirectoryPath)) {
            mkdir($fullDirectoryPath, 0777, true);
        }

        $templatePath = __DIR__ . '/../template/class-template.php';
        if (!file_exists($templatePath)) {
            echo "Template file not found: $templatePath\n";
            return;
        }

        $templateContent = file_get_contents($templatePath);

        $classContent = str_replace(['Mp_MyClassName'], [MP_PLUGIN_CLASS_PREFIX . '_' . $className], $templateContent);

        $file_name = 'class-' . strtolower(MP_PLUGIN_CLASS_PREFIX) . '-' . strtolower($className);
        $filePath = rtrim($fullDirectoryPath, '/') . '/' . $file_name . '.php';
        file_put_contents($filePath, $classContent);
        echo "Class $className created successfully in $fullDirectoryPath.\n";
    }
}
