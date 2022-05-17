<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\SendRegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        //Thêm mới người dùng thông qua các trường
        $user = User::create($request->input());
        //nếu như thêm mới thành công thì xem trang categories
        if ($user !== null) {
            //đặt người dùng authenticated là người dùng hiện tại
            Auth::login($user);
            //Gửi notification email tới người dùng
            $user->notify(new SendRegisterNotification());
            //điều hướng sang trang categories
            return redirect('categories');
        }
    }
}
