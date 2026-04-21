# Họ tên: Nguyễn Tiến Đức Huy
# Mã sinh viên: 23810310127
# Lớp: D18CNPM2

# Hướng dẫn toàn tập: Tích hợp Đăng nhập Google & Facebook (Laravel Socialite)

Tài liệu này tổng hợp toàn bộ các bước và mã nguồn để xây dựng chức năng đăng nhập bằng mạng xã hội cho dự án Laravel.

---

## Bước 1: Cài đặt thư viện và Cấu hình môi trường

**1. Cài đặt Laravel Socialite:**
Chạy lệnh sau trong Terminal:
```bash
composer require laravel/socialite
```

**2. Cấu hình file .env**
```env
GOOGLE_CLIENT_ID=my_google_client_id
GOOGLE_CLIENT_SECRET=my_google_client_secret
GOOGLE_REDIRECT_URI="${APP_URL}/auth/google/callback"

FACEBOOK_CLIENT_ID=my_facebook_client_id
FACEBOOK_CLIENT_SECRET=my_facebook_client_secret
FACEBOOK_REDIRECT_URI="${APP_URL}/auth/facebook/callback"
```

**3. Khai báo dịch vụ trong config/services.php**
```php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],

'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => env('FACEBOOK_REDIRECT_URI'),
],
```

**4. Tạo Migration thêm cột vào bảng users:**
```bash
php artisan make:migration add_social_login_to_users_table --table=users
```

---

## 📸 Hình ảnh minh họa (Screenshots)

**1. Giao diện trang Đăng nhập**
![Giao diện đăng nhập](<img width="549" height="662" alt="Screenshot 2026-04-21 100328" src="https://github.com/user-attachments/assets/2ffdef2d-609e-43d6-a46a-1f1555872f4a" />
)

**2. Giao diện Dashboard Sinh viên**
![Giao diện Facebook]()
![Giao diện Google](<img width="1731" height="648" alt="Screenshot 2026-04-21 100432" src="https://github.com/user-attachments/assets/0d170ea0-4ade-4203-bcef-6a580f2a32ae" />
)

**3. Cấu hình URI trên Google Cloud**
*Đường dẫn callback đã thiết lập:* `http://localhost:8000/auth/google/callback`
![Cấu hình Google Cloud](<img width="1535" height="604" alt="Screenshot 2026-04-21 102702" src="https://github.com/user-attachments/assets/5b858fa1-c11e-4908-9087-737a9ec01ddf" />
)

**4. Cấu hình URI trên Meta Developers**
*Đường dẫn callback đã thiết lập:* `http://localhost:8000/auth/facebook/callback`
![Cấu hình Meta Developers](<img width="999" height="639" alt="Screenshot 2026-04-21 102718" src="https://github.com/user-attachments/assets/93325304-87cc-4eff-9313-34417527c92b" />
)
