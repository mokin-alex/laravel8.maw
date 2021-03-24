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
                ->orWhere('title', 'like', '%' . $search . '%')->get();//->paginate(10);
            return view('news.newsAll')->with('news', $news)->with('success', 'Результат поиска по фразе: '. $search);
    }

}
