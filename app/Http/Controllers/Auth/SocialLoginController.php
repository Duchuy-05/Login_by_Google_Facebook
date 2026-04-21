<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialLoginController extends Controller
{
    // Chuyển hướng người dùng sang Google/Facebook
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Xử lý callback trả về
    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            
            // Tìm user đã tồn tại dựa trên provider_id hoặc email
            $user = User::where('provider_id', $socialUser->getId())
                        ->orWhere('email', $socialUser->getEmail())
                        ->first();

            if (!$user) {
                // Tạo mới nếu chưa tồn tại
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'avatar' => $socialUser->getAvatar(),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    // student_id có thể được cập nhật sau bởi người dùng
                    'student_id' => 'Chưa cập nhật', 
                    'password' => null, // Không cần password cho social login
                ]);
            } else {
                // Cập nhật provider info nếu user đăng nhập bằng email trước đó
                $user->update([
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                ]);
            }

            Auth::login($user);
            return redirect('/dashboard');

        } catch (Exception $e) {
            // Xử lý lỗi (từ chối quyền, token lỗi...)
            return redirect('/login')->with('error', 'Đăng nhập bằng ' . ucfirst($provider) . ' thất bại. Vui lòng thử lại.');
        }
    }
}
