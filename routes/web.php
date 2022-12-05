<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use \App\Http\Controllers\SocialiteLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestInvokeController;
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

// [название контроллера, название экшена], где экшен - метод контроллера
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/login', [HomeController::class, 'login'])->name('login');

Route::get('/save', [HomeController::class, 'save'])->name('save');

Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile');

Route::get('/auth/redirect/vk', [SocialiteLoginController::class, 'vkLogin'])->name('vkLogin')->middleware('guest');

Route::get('/auth/vk/response',  [SocialiteLoginController::class, 'vkResponse'])->name('vkResponse')->middleware('guest');

// вывод страницы, к которой подключен Vue
Route::view('/vue', 'vue')->name('vue');

//Параметры строки запроса доступны передаются в параметры методов контроллера средствами фреймворка
//->where позволяет применить регулярное выражение для валидации параметров запроса
//Имя роута должно совпадать с именем шаблона или метода (StyleGuide)

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');

        Route::get('/{news}', [NewsController::class, 'show'])
            ->where('id', '[0-9]+')
            ->name('show');

        Route::name('category.')
            ->group(function () {
                Route::get('/category/{slug}', [NewsController::class, 'selectedCategory'])
                    ->name('selectedCategory');
            });
    });

Route::name('admin.')
    ->prefix('admin')
    //используется для аутентификации, с последующей авторизацией пользователей для всех маршрутов зоны admin
    //middleware будут выполняться в той последовательности, в которой они перечислены в массиве.
    ->middleware(['auth', 'is_admin'])
//    ->middleware('is_admin')
    ->group(function () {
        Route::get('/parser',[AdminParserController::class, 'index'])->name('parser');
        //заменяет собой маршруты для всех методов CRUD
        Route::resource('news', AdminNewsController::class)->except(['show']);
        /*          //CRUD
                Route::get('/', [AdminNewsController::class, 'index'])->name('index');
                Route::match(['post', 'get'], '/create', [AdminNewsController::class, 'create'])->name('create');
                //открывает форму редактирования новости
                Route::get('/edit/{news}', [AdminNewsController::class, 'edit'])->name('edit');
                //сохраняет изменённую новость в БД
                Route::patch('/edit/{news}', [AdminNewsController::class, 'update'])->name('update');
                //удаляет новость из БД
                Route::delete('/destroy/{news}', [AdminNewsController::class, 'destroy'])->name('destroy');*/

        //заменяет собой маршруты для всех методов CRUD
        Route::resource('category', AdminCategoryController::class)->except(['show']);
        /*        //CRUD
                Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
                Route::match(['post', 'get'], '/create', [AdminCategoryController::class, 'create'])->name('create');
                //открывает форму редактирования новости
                Route::get('/edit/{category}', [AdminCategoryController::class, 'edit'])->name('edit');
                //сохраняет изменённую новость в БД
                Route::patch('/edit/{category}', [AdminCategoryController::class, 'update'])->name('update');
                //удаляет новость из БД
                Route::delete('/destroy/{category}', [AdminCategoryController::class, 'destroy'])->name('destroy');*/

        Route::resource('users', AdminUsersController::class);
        Route::name('users.')
            ->group(function () {
/*                Route::get('/users', [AdminUsersController::class, 'index'])->name('index');
                Route::match(['get', 'post'], '/users/create', [AdminUsersController::class, 'create'])
                    ->name('create');
                Route::post('/users', [AdminUsersController::class, 'store'])->name('store');
                //Передаёт данные пользователя в форму редактирования
                Route::get('/users/edit/{user}', [AdminUsersController::class, 'edit'])->name('edit');
                //Сохраняет обновлённые данные в БД
                Route::patch('/users/edit/{user}', [AdminUsersController::class, 'update'])->name('update');
                Route::delete('/users/destroy/{user}', [AdminUsersController::class, 'destroy'])
                    ->name('destroy');*/
                Route::patch('/users/toggleAdminRights/{user}', [AdminUsersController::class, 'toggleAdminRights'])
                    ->name('toggleAdminRights');
            });

        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
    });

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

//автоматически генерирует все запросы, необходимые для работы с аутентификацией, в том числе для сброса пароля
Auth::routes();
//Если маршруты для сброса пароля не нужны, можно создать остальные вручную
/*
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
