<?php

/** Vietnamese
 * Tính năng hỗ trợ tạo nhanh các template code.
 * Mở Terminal tại thư mục plugin và sử dụng các lệnh phù hợp để tạo tập tin.
 * Tạo class trong thư mục my-plugin/model dùng lệnh `php execute/run-poly.php MyClassName` trong đó MyClassName là tên class bạn cần tạo.
 * Lưu ý: khi hoàn tất tính năng plugin trước khi deploy, bàn giao bạn cần xóa thưy mục my-plugin/execute và tập tin, code không cần thiết đi nhé!
 * 
 * ============================================================================
 * Feature to quickly generate code templates.
 * Open Terminal in the plugin directory and use the appropriate commands to create the file.
 * Create a class in the my-plugin/model directory using the command `php execute/run-poly.php MyClassName`, where MyClassName is the name of the class you need to create.
 * Note: Before deploying and handing over the plugin, please remove the my-plugin/execute directory and any unnecessary files and code.
 */

require_once('create_class.php');

if ($argc > 1) {
    $class_name = $argv[1];
    create_template_class_blank($class_name);
} else {
    echo "Usage: php run-poly.php <ClassName>\n";
}
