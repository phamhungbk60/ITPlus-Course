<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', ['email' => '']);
    }

    public function login(LoginRequest $request)
    {
        $email =  $request->input('email');
        $password = $request->input('password');
        //remember me
        $isRememberMeOptionChecked = $request->input('remember-me') == 'on' ? true : false;
        //Kiểm tra trong bảng user xem có $email trùng với email đã nhập
        //và password trùng với password đã nhập hay không, nếu đúng thì điều hướng
        //sang trang /categories

        //Update: Thêm remember_me làm tham số thứ 2 trong attempt
        if (Auth::attempt(['email' => $email, 'password' => $password], $isRememberMeOptionChecked)) {
            //prevent session fixation
            $request->session()->regenerate();
            return redirect('categories');
        }

        //Nếu không đúng thì ghi thông báo đăng nhập thất bại, sử dụng session 1 lần ==> flash
        $request->session()->flash('error', 'Đăng nhập thất bại');
        return view('auth.login', ['email' => $email]);
    }

    public function logout()
    {
        //Sử dụng hàm Auth::logout để đăng xuất ra ngoài
        Auth::logout();
        //Nếu đăng xuât thành công thì sẽ điều hướng về trang login
        return redirect('login');
    }
}
