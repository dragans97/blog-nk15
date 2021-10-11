<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post');
Route::post('/posts', [PostController::class, 'store']);