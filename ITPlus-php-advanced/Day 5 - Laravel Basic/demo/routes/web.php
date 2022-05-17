<?php

use App\Http\Controllers\QueueController;
use Illuminate\Support\Facades\Route;

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
    return view('layouts.main');
});

//tạo ra 7 method cơ bản CRUD
Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::get('/queue/index', [QueueController::class, 'index']);
