<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestInvokeController;
use App\Http\Controllers\Admin\IndexController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Category\IndexController as CategoryController;

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

// [название контроллера, название экшена], где экшен - метод контроллера
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('all');

//Параметры строки запроса доступны передаются в параметры методов контроллера средствами фреймворка
//->where позволяет применить регулярное выражение для валидации параметров запроса
        Route::get('/{id}', [NewsController::class, 'show'])
            ->where('id', '[0-9]+')
            ->name('one');
    });

Route::get('/post', function () {
    return view('post');
})->name('post');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin') //контроллер вложен в папку Admin (в данном случае использовать не обязательно, т.к. ns явно указан в use
    ->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [IndexController::class, 'test2'])->name('test2');

    });

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/404', function () {
    return view('beauty_404');
})->name('404');

Route::fallback(function () {
    return view('beauty_404');
});


//Примеры

Route::get('/welcome', function () {
    return view('welcome');
});

Route::view('/test', 'info');

Route::redirect('redir', '/', 301);

//Чтобы устранить ошибку, нужно указать namespace для класса контроллера (use)
Route::get('/invoke', TestInvokeController::class);


