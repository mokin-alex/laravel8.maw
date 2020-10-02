<?php

namespace App\Http\Controllers\Admin;

use App\Exports\{InvoicesExport};
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public static function index(){
        return view('admin.downloads');
    }

    public function newsToJson (){

        return response()->json(News::getNews())
            ->header('Content-Disposition', 'attachment; filename = "news.json"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function categoryToJson (){

        return response()->json(Category::getCategories())
            ->header('Content-Disposition', 'attachment; filename = "categories.json"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function newsToExcel()
    {
        $export = new InvoicesExport(News::getNews());
        return Excel::download($export, 'news.xlsx');
    }

    public function categoryToExcel()
    {
        $export = new InvoicesExport(Category::getCategories());
        return Excel::download($export, 'categories.xlsx');
    }
}
