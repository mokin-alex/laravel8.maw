<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, NewsController};
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
// maw homework 2

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');


Route::name('admin.')
    ->prefix('admin')
    ->group(
        function() {
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
            Route::get('/test2', [IndexController::class, 'test2'])->name('test2');
        }
    );

/*
Route::name('news.')
    ->prefix('news')
    ->group(
        function (){
            Route::get('/', [NewsController::class, 'index'])->name('news');
            Route::get('/newsOne/{id}', [NewsController::class, 'show'])->name('newsOne');
            Route::get('/category/{cat_id}',[NewsController::class, 'showByCategory'])->name('byCategory');
        }
    );*/

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/newsOne/{id}', [NewsController::class, 'show'])->name('newsOne');
Route::get('/news/category/{cat_id}',[NewsController::class, 'showByCategory'])->name('byCategory');

