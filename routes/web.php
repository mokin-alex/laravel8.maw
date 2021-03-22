<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ProfileController};
use App\Http\Controllers\Admin\{IndexController,ExportController, CrudCategoryController, CrudNewsController, CrudUserController, ParserController};
use App\Http\Controllers\News\{NewsController, CategoryController};

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
// maw homework 8

Route::get('/', [HomeController::class, 'index'])->name('index'); //обычный
Route::get('/home', [HomeController::class, 'index'])->name('home'); //бутстрап-тест
Route::view('/about', 'about')->name('about');
Route::view('/vue', 'vue')->name('vue'); //vue тест страница

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(
        function () {
            Route::get('/', [IndexController::class, 'index'])->name('index');

            Route::name('download.')
                ->prefix('download')
                ->group(
                    function () {
                        Route::get('/', [ExportController::class, 'index'])->name('index');
                        Route::get('/news', [ExportController::class, 'newsToJson'])->name('news.json');
                        Route::get('/categories', [ExportController::class, 'categoryToJson'])->name('categories.json');
                        Route::get('/newsxls', [ExportController::class, 'newsToExcel'])->name('news.xls');
                        Route::get('/categoriesxls', [ExportController::class, 'categoryToExcel'])->name('categories.xls');
                    });

            Route::resource('category', CrudCategoryController::class);
            Route::resource('news', CrudNewsController::class);
            Route::resource('user', CrudUserController::class);
            Route::get('/user/toggle/{user}', [CrudUserController::class, 'changeStatus'])->name('user.status');
            Route::get('parser', [ParserController::class, 'index'])->name('parser');
        }
    );

Route::name('news.')
    ->prefix('news')
    ->group(
        function () {

            Route::name('category.')
                ->group(
                    function () {
                        Route::get('/rubric', [CategoryController::class, 'index'])->name('index');
                        Route::get('/rubric/{slug}', [CategoryController::class, 'show'])->name('show');
                    });

            //Route::redirect('/', '/news/rubric'); //рубрики новостей
            Route::get('/', [NewsController::class, 'index'])->name('index'); //все новости подряд без рубрик
            Route::get('/newsOne/{news}', [NewsController::class, 'show'])->name('newsOne');
            Route::post('/search', [NewsController::class, 'search'])->name('search'); //поиск по новостям.
        }
    );

Auth::routes(); //маршрут есть, но в HomeController пока отключен конструктор из middleware

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
