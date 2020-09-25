<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //Основной Новостной контроллер
    public function index() {
        return view('news.news')->with('rubric', News::getCategory());
    }

    public function show($id) {
        return view('news.newsOne')->with('news', News::getNewsId($id));
    }

    public function showByCategory($cat_id) {
        //return view('news.newsByCategory')->with('news', News::getNewsByCategory($cat_id));
        //Пусть будет и список новостей и наименование рубрики на русском:
        return view('news.newsByCategory',['news' => News::getNewsByCategory($cat_id), 'rubric' => News::getCategoryText($cat_id)]);
    }

}
