<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

// kada imamo dve rute sa statickim i dinamickim parametrom, ova sa statickim mora biti iznad dinamicke 
//jer ce u suprotnom 'create' smatrati kao id posta u ovom slucaju

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create'])->name('createPost')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post');
Route::post('/posts', [PostController::class, 'store']);
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('create-comment');

// Route::middleware(['guest'])->group(function () {
//     Route::get('/login',[AuthController::class, 'getLoginForm'])->name('login');
//     Route::post('/login', [AuthController::class, 'login'])->name('loginForm'); 
//     Route::get('/register', [AuthController::class, 'getRegisterForm']);
//     Route::post('/register', [AuthController::class, 'register'])->name('register');
// });

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[AuthController::class, 'getLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('loginForm'); 
    Route::get('/register', [AuthController::class, 'getRegisterForm']);
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');