<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    //
    public static function index(){
        return view('admin.downloads');
    }

    public static function newsToJson (){

        return response()->json(News::getNews())
            ->header('Content-Disposition', 'attachment; filename = "news.json"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public static function categoryToJson (){

        return response()->json(Category::getCategories())
            ->header('Content-Disposition', 'attachment; filename = "categories.json"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}
