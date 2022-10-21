<?php

use App\Http\Controllers\HomeController;
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
