<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index() {
        return view('news.newsAll')->with('news', News::getNews());
    }

    public function show($id) {
        return view('news.one')->with('news', News::getNewsById($id));
    }
}
