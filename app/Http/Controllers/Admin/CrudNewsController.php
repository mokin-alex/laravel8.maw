<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;

class CrudNewsController extends Controller
{
        public function create(Request $request) {

            if ($request->isMethod('post')) {
                $url = null;
                $newExemplar = $request->except('_token');
                if ($request->file('image')){
                  $path = Facades\Storage::putFile('public', $request->file('image'));
                  $url = Facades\Storage::url($path);
                }
                $newExemplar['image'] = $url;
                //dd($newExemplar);
                $id=DB::table('news')->insertGetId($newExemplar);
                return redirect()->route('news.newsOne', $id)->with('success', 'Новость добавлена!');
            }

            return view('admin.addNews')->with('categories', Category::getCategories());
        }
}
