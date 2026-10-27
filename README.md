Book Management – Laravel MVC

Giới thiệu

Dự án xây dựng hệ thống quản lý sách sử dụng Laravel 13, PHP và MySQL. Hệ thống hỗ trợ quản lý thông tin sách thông qua giao diện web.

Yêu cầu

PHP: 8.5.12 (phiên bản môi trường đang sử dụng; cần kiểm tra tính tương thích với Laravel 13)

Composer: Kiểm tra bằng lệnh composer --version

MySQL: Phiên bản đi kèm XAMPP hoặc phiên bản tương thích với dự án

Framework: Laravel 13

Môi trường phát triển: XAMPP, Visual Studio Code

Cài đặt

Cài đặt thư viện
composer install

Cấu hình môi trường
Sao chép .env.example thành .env:
Copy-Item .env.example .env

Cấu hình cơ sở dữ liệu
Mở file .env và cấu hình thông tin kết nối MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quan-ly-sach
DB_USERNAME=root
DB_PASSWORD=

Tạo cơ sở dữ liệu quan-ly-sach trong MySQL trước khi chạy ứng dụng.

 Tạo khóa ứng dụng
php artisan key:generate

 Khởi tạo cơ sở dữ liệu
php artisan migrate


 Chạy ứng dụng
php artisan serve

Mở trình duyệt tại địa chỉ:
http://127.0.0.1:8000

Chức năng
Xem danh sách sách.
Xem chi tiết sách.
Thêm sách mới.
Chỉnh sửa thông tin sách.
Xóa sách.

Công nghệ sử dụng
Laravel 13.
PHP.
MySQL.
HTML, CSS, JavaScript.
Blade Template.
Git và GitHub.

Thành viên
Lương Thị Xuân Thu(Nhóm trưởng): chức năng xóa sách và kiểm thử
La Lan Chi: thiết kế cơ sở dữ liệu, kiểm thử
Võ Thành Đạt: Thiết kế giao diện và thêm, sửa sách,kiểm thử
Nguyễn Đoàn Nhật Khánh: thiết kế giao diện chức năng xem sách và kiểm thử
Huỳnh Hữu Hào: cấu hình Laravel và kết nối MySQL

