# Hướng dẫn cài đặt

## Download về

Sau khi chạy `git clone <project_này>` vào trong thư mục `htdocs` thì sử dụng command `cd C:\xampp\htdocs\<project>` để chọc vào project


## Chạy project

Khi clone về thì thư mục `vendor` và `.env` sẽ không thấy do nằm trong file `.gitignore` . Để startup project này thì chạy `composer install` trong thư mục chứa project và chạy `cp .env.example .env` để tiến hành copy `.env.example` thành `.env` . Sau đó dựa theo cấu hình của xampp, sẽ chỉnh lại các thông số `.env` như đã học trên lớp (nhớ tạo database `laravel_blog` trước khi migrate database)

Cuối cùng chạy command `php artisan key:generate` để tạo `APP_KEY` trong `.env` trong Laravel

Sau đó mở trình duyệt và chạy `localhost/<project>/public` là được
