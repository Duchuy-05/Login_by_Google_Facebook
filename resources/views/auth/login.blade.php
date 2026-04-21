<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-card h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Hiển thị lỗi nếu có */
        .alert {
            padding: 10px;
            background-color: #ffdddd;
            color: #d8000c;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* Form đăng nhập cơ bản */
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background-color: #555;
        }

        /* Dòng chữ "Hoặc đăng nhập với" */
        .divider {
            margin: 25px 0;
            display: flex;
            align-items: center;
            color: #888;
            font-size: 14px;
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .divider::before { margin-right: 10px; }
        .divider::after { margin-left: 10px; }

        /* Nút đăng nhập mạng xã hội */
        .social-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            transition: opacity 0.3s;
        }

        .btn-social:hover {
            opacity: 0.9;
        }

        .btn-social i {
            font-size: 18px;
            margin-right: 10px;
        }

        .btn-google {
            background-color: #fff;
            color: #757575;
            border: 1px solid #ddd;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .btn-google:hover {
            background-color: #fcfcfc;
            opacity: 1;
        }

        .btn-facebook {
            background-color: #1877F2; /* Màu xanh chuẩn của Facebook */
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Đăng Nhập</h2>

    @if(session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
    @endif

    <form action="#" method="POST">
        @csrf
        <div class="form-group">
            <input type="email" name="email" placeholder="Email của bạn" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Mật khẩu" required>
        </div>
        <button type="submit" class="btn-login">Đăng nhập</button>
    </form>

    <div class="divider">Hoặc tiếp tục với</div>

    <div class="social-buttons">
        <a href="{{ route('social.redirect', 'google') }}" class="btn-social btn-google">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" style="width: 20px; margin-right: 10px;">
            Đăng nhập với Google
        </a>

        <a href="{{ route('social.redirect', 'facebook') }}" class="btn-social btn-facebook">
            <i class="fa-brands fa-facebook-f"></i>
            Đăng nhập với Facebook
        </a>
    </div>
</div>

</body>
</html>