<?php
use App\Http\Controllers\Auth\SocialLoginController;
use Illuminate\Support\Facades\Auth;


Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware('auth')->name('dashboard');

// Route hiển thị giao diện đăng nhập
Route::get('/login', function () {
    return view('auth.login'); // Trỏ đúng vào tên file giao diện của bạn
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
// Route xử lý Social Login
Route::get('/auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('social.callback');