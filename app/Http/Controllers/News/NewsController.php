<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function index()
    {
        $news = DB::table('news')->get();
        return view('news.newsAll')->with('news', $news);

    }

    public function show($id)
    {
        $news = DB::table('news')->find($id);
        return view('news.one')->with('news', $news);
    }

    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $search = $request->get('search');
            $news = DB::table('news')->where('text', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')->get();
            return view('news.newsAll')->with('news', $news);
        }
    }

}
