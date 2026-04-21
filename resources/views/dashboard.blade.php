<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sinh Viên</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Class tạo hiệu ứng chữ đổ màu (Gradient Text) */
        .name-gradient {
            background: linear-gradient(45deg, #FF512F, #DD2476); /* Bạn có thể đổi mã màu ở đây */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.5rem;
            text-transform: uppercase;
        }

        .student-card {
            width: 100%;
            max-width: 450px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .avatar-img {
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="card student-card p-4 text-center">
            <h3 class="mb-4 text-secondary">Thông Tin Cá Nhân</h3>
            
            <div class="card-body p-0">
                @if(Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" alt="Avatar" width="110" height="110" class="avatar-img">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" alt="Avatar" width="110" class="avatar-img">
                @endif
                
                <div class="mt-3">
                    <span class="text-muted d-block" style="font-size: 0.9rem;">Họ và tên</span>
                    <strong class="name-gradient">{{ Auth::user()->name }}</strong>
                </div>
                
                <hr class="my-4">

                <div class="text-start px-3">
                    <p class="mb-2"><i class="text-primary me-2"></i><strong>Mã SV:</strong> {{ Auth::user()->student_id }}</p>
                    <p class="mb-3"><i class="text-danger me-2"></i><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>
                
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-warning w-100 rounded-pill fw-bold">
                        Đăng xuất
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>