<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestInvokeController;
use App\Http\Controllers\Admin\IndexController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/

// [название контроллера, название экшена], где экшен - метод контроллера
Route::get('/', [HomeController::class, 'index']);

Route::get('/news', function () {
    return view('news');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/info', function () {
    return view('info');
});

Route::view('/test', 'info');

Route::redirect('redir', '/', 301);

//Чтобы устранить ошибку, нужно указать namespace для класса контроллера (use)
Route::get('/invoke', TestInvokeController::class);

Route::get('/admin', [IndexController::class, 'index']);


