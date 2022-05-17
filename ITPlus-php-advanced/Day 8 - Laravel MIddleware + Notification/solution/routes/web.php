<?php

use App\Http\Controllers\UserInformationController;
use App\Mail\SendAnotherSampleMail;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});


//tạo ra 7 method cơ bản CRUD

//Áp dụng middleware để check quyền cho tất cả các routes /categories
//Nếu có từ 2 middleware trở lên, viết vào trong array
//auth middleware là mặc định của Laravel
Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
    //Tạo route để xem thông tin người dùng
    Route::get('/user-profile', [UserInformationController::class, 'show']);

    //Tạo route để lưu thông tin ngươi dùng vào CSDL
    Route::put('/user-profile', [UserInformationController::class, 'update']);


    Route::group([], function () {
        Route::resource('categories', App\Http\Controllers\CategoryController::class);
        Route::resource('roles', App\Http\Controllers\RoleController::class);

        Route::get('/roles/{role}/assign-to-people', [App\Http\Controllers\RoleController::class, 'showAssignToPeopleForm']);
        Route::put('/roles/{role}/assign-to-people', [App\Http\Controllers\RoleController::class, 'assignToPeople']);
    });

    Route::resource('posts', App\Http\Controllers\PostController::class);
});



//Route này đóng vai trò hiển thị form login ra cho người dùng điền thông tin vào
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
//Tiến hành Login
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->middleware('guest');
//Tạo route đăng xuất
//Tạo route để hiển thị form đăng kí cho người dùng nhập thông tin
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm']);
//Xử lí đăng kí người dùng
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/posts/{post}/assign-categories', [App\Http\Controllers\PostController::class, 'assignCategories']);

Route::post('/posts/{post}/assign-categories', [App\Http\Controllers\PostController::class, 'assignCategories']);
