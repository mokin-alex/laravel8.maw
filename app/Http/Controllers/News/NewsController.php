<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        //return view('news.newsAll')->with('news', News::all());
        return view('news.newsAll')->with('news', News::query()->orderByDesc('id')->paginate(10));
    }

    public function show(News $news)
    {
        return view('news.one')->with('news', $news);
    }

    public function search(Request $request)
    {
            $search = $request->get('search');
            $news = News::query()->where('text', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')->paginate(10);
            //dd($news);
            return view('news.newsAll')->with('news', $news)->with('message', 'Результат поиска по фразе: '. $search);
    }

}
