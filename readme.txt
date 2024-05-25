=== My Plugin ===
Contributors: PolyXGO
Donate link: https://paypal.me/polyxgo
Tags: develop, plugin
Requires at least: 4.3
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 1.0.2

== Description ==

A sample template to support faster development of WordPress plugins.

= Features =

### My Plugin

* Providing you with an initial framework to build WordPress plugins faster.

== Changelog ==
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
