<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController};
use App\Http\Controllers\Admin\{IndexController,ExportController, CrudCategoryController, CrudNewsController};
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
// maw homework 6

Route::get('/', [HomeController::class, 'index'])->name('index'); //обычный
Route::get('/home', [HomeController::class, 'home'])->name('home'); //бутстрап-тест
//Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::view('/about', 'about')->name('about');
Route::view('/vue', 'vue')->name('vue'); //vue тест страница

Route::name('admin.')
    ->prefix('admin')
    ->group(
        function () {
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::match(['get','post'], '/addrubric', [CrudCategoryController::class, 'create'])->name('addCategory');
            Route::match(['get','post'], '/addnews', [CrudNewsController::class, 'create'])->name('addNews');

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
