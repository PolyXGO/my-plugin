=== My Plugin ===
Contributors: PolyXGO
Donate link: https://paypal.me/polyxgo
Tags: develop, plugin
Requires at least: 4.3
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 1.0.2

============================================================================
=                                 Description                              =
============================================================================
### My Plugin

Cung cấp cho bạn một khung mẫu ban đầu để xây dựng các plugin WordPress nhanh hơn.
Lưu ý: trong các mục template code mình sẽ cập nhật dần và hầu hết đều là code cơ bản, cấu trúc. Mọi người điều chỉnh lại cấu trúc các tập tin commands/template/... trước khi dùng để đáp ứng nhu cầu riêng biệt.

Providing you with an initial framework to build WordPress plugins faster.
Note: In the template code sections, I will update gradually, and most of them will be basic code and structure. Please adjust the structure of the files in `commands/template/...` before use to meet specific needs.

============================================================================
=                                 Required                                 =
============================================================================
==== Vietnamese ====
Nếu không sử dụng được commands thử cài đặt lại autoload.
Tạo tập tin my-plugin/commands/composer.json với nội dung.
{
  "autoload": {
      "psr-4": {
          "Commands\\Action\\": "action/"
      }
  }
}
Terminal tại thư mục commands> `composer dump-autoload`.
Cấp quyền thực thi cho file poly Terminal> `chmod +x poly` (nếu cần)

==== English ====
If the commands are not working, try reinstalling autoload.
Create a file my-plugin/commands/composer.json with the content.
{
  "autoload": {
      "psr-4": {
          "Commands\\Action\\": "action/"
      }
  }
}
In the terminal, navigate to the commands directory and run: composer dump-autoload.
Grant execute permission to the poly file if necessary: chmod +x poly.

============================================================================
=                                 Features                                 =
============================================================================
==== Vietnamese ====
Các lệnh my-plugin commands hỗ trợ
`php poly make:class MyClassName -to /path_folder`: tạo class MyClassName theo template/class-template.php vào thư mục /path_folder.
Ví dụ: tạo class tên OpenAI vào thư mục model: `php poly make:class OpenAI -to /model`.

`php poly make:folder MyFolderName -to /path_folder`: tạo class MyFolderName vào thư mục /path_folder.
Ví dụ: tạo thư mục tên thank_you vào thư mục view: `php poly make:folder thank_you -to /view`.

==== English ====
The my-plugin commands support the following:

`php poly make:class MyClassName -to /path_folder`: creates a class named MyClassName based on template/class-template.php in the directory /path_folder.
Example: create a class named OpenAI in the model directory: `php poly make:class OpenAI -to /model`.

`php poly make:folder MyFolderName -to /path_folder`: creates a folder named MyFolderName in the directory /path_folder.
Example: create a folder named thank_you in the view directory: `php poly make:folder thank_you -to /view`.

============================================================================
=                                   Changelog                              =
============================================================================
= 1.0.3 (May 26, 2024) =

==== Vietnamese ====
* Tích hợp tệp lệnh hỗ trợ tạo tập tin, class, folder theo cấu trúc trong commands/template.
* `php poly make:class MyClassName -to /path_folder`: tạo class MyClassName theo template/class-template.php vào thư mục /path_folder
* `php poly make:folder MyFolderName -to /path_folder`: tạo class MyFolderName vào thư mục /path_folder

==== English ====
* Integrate the command file to support creating files, classes, and folders based on the structure in `commands/template`.
* `php poly make:class MyClassName -to /path_folder`: creates a class named MyClassName based on template/class-template.php in the directory /path_folder.
* `php poly make:folder MyFolderName -to /path_folder`: creates a folder named MyFolderName in the directory /path_folder.

============================================================================
= 1.0.2 (May 25, 2024) =

==== Vietnamese ====
 * Tính năng hỗ trợ tạo nhanh các template code.
 * Mở Terminal tại thư mục plugin và sử dụng các lệnh phù hợp để tạo tập tin.
 * Tạo class trong thư mục my-plugin/model dùng lệnh `php execute/run-poly.php MyClassName` trong đó MyClassName là tên class bạn cần tạo.
 * Lưu ý: khi hoàn tất tính năng plugin trước khi deploy, bàn giao bạn cần xóa thư mục my-plugin/execute và tập tin, code không cần thiết đi nhé!

==== English ====
 * Feature to quickly generate code templates.
 * Open Terminal in the plugin directory and use the appropriate commands to create the file.
 * Create a class in the my-plugin/model directory using the command `php execute/run-poly.php MyClassName`, where MyClassName is the name of the class you need to create.
 * Note: Before deploying and handing over the plugin, please remove the my-plugin/execute directory and any unnecessary files and code.
============================================================================

= 1.0.1 (May 24, 2024) =

* Integrated with Bootstrap version 5.3.3

============================================================================
See changelog.txt for older changelog
