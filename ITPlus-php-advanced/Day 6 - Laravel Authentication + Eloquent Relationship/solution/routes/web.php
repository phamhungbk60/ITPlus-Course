<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('posts', App\Http\Controllers\PostController::class);

//chỉ kiểm tra CRUD relationship, không cần giao diện
Route::get('/assign-info-to-user', function () {
    //thêm mới người dùng
    $user = User::create([
        'name' => 'camnh',
        'email' => 'nguyenhuucam91@gmail.com',
        'password' => Hash::make('123456') //sử dụng bcrypt() để hash chuỗi 123456
    ]);


//thêm userinfo gán với người dùng đó và đặt user_id trùng với id của user
    if ($user !== null) {
        //userInformation() là một hàm trong model User
        $user->userInformation()->create([
            'dob' => Carbon::now(),
            'phone_number' => '0348921193',
            'address' => 'Hanoi university'
        ]);
    }
});

//Giả định với user = 1, User $user ở dưới được gọi là Route model binding,
//lấy PK của user.
Route::get('/{user}/update-info-to-user', function (User $user) {
    $isUpdated = $user->update([
        'name' => 'camnh',
        'email' => 'nguyenhuucam93@gmail.com',
        'password' => Hash::make('123456') //sử dụng bcrypt() để hash chuỗi 123456
    ]);
    if ($isUpdated) {
        $user->userInformation()->update([
            'dob' => Carbon::now(),
            'phone_number' => '0348921199',
            'address' => 'Hanoi university'
        ]);
    }
});

//xem chi tiết 1 user nhất định
Route::get('/{user}/list-with-user-info', function (User $user) {
    //không dùng hàm userInformation() ở đây, nếu là hàm thì trả ra
    //eloquent relationship, còn nếu không dùng hàm thì trả về property
    return $user->userInformation->phone_number;
});

//xem tất ca user, cùng với thông tin user_info ứng với user đó
Route::get('/list-all-with-user-info', function () {
    //dùng with để sử dụng eager loading, vì thể cài thiện performance
    //userInformation là tên hàm relationship
    $users = User::with('userInformation')->get();
    return view('layouts.main', compact('users'));
});

Route::get('/{user}/delete-user-info-only', function (User $user) {
    return $user->userInformation()->delete();
});


Route::get('attach-to-pivot', function () {
    $post = Post::create([
        'title' => 'Sample title',
        'content' => 'Sample content'
    ]);

    $category = Category::create([
        'name' => 'sample name',
        'description' => 'Sample description'
    ]);
    if ($post !== null) {
        //array cuối là data được truyền thêm vào pivot table,
        //bao gôm mark và score
        $post->categories()->attach($category->id);
    }
});


Route::get('update-to-pivot/{post}', function (Post $post) {
    $category = Category::create([
        'name' => 'sample my name',
        'description' => 'Sample my description'
    ]);

    if ($post !== null) {
        //update pivot
        $post->categories()->update([
            'category_id' => $category->id
        ]);
    }
});

Route::get('get-all-with-pivot/{post}', function (Post $post) {
    // $postCategories = $post->categories;
    // // return view('layouts.main', compact('postCategories'));
    // return $postCategories;
    $postCategories = Post::with('categories')->get();
    return $postCategories;
});

Route::get('delete-in-pivot/{post}', function (Post $post) {
    //findOrFail() will return model or 404 if not found
    $category = Category::findOrFail(24);
    $post->categories()->detach($category->id);
});


Route::get('add-comment/{user}', function (User $user) {
    $user->comments()->create([
        'post_id' => 1,
        'content' => 'Comment for post 1'
    ]);
});


Route::get('update-comment/{user}', function (User $user) {
    $user->comments()->delete([
        'post_id' => 1,
        'content' => 'Comment for post 1 updated ver 2'
    ]);
});


Route::get('view-comment/{user}', function (User $user) {
    $userComment = $user->comments;
    return $userComment;
});


Route::get('view-comments', function () {
    $userComment = User::with('comments')->get();
    return $userComment;
});

//Route này đóng vai trò hiển thị form login ra cho người dùng điền thông tin vào
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
//Tiến hành Login
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
//Tạo route đăng xuất
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
//Tạo route để hiển thị form đăng kí cho người dùng nhập thông tin
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm']);
//Xử lí đăng kí người dùng
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/posts/{post}/assign-categories', [App\Http\Controllers\PostController::class, 'assignCategories']);

Route::post('/posts/{post}/assign-categories', [App\Http\Controllers\PostController::class, 'assignCategories']);

