<?php

namespace App\Http\Controllers\News;

use App\Models\{Category, News};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index() {
        return view('news.categories', [
            'categories' => Category::all()
        ]);
    }

    public function show($slug) {
        return view('news.byCategory', [
            'news' => News::getNewsByCategorySlug($slug),
            'category' => Category::getCategoryNameBySlug($slug)
        ]);
    }
}
