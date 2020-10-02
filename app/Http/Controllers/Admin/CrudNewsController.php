<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CrudNewsController extends Controller
{
        public function create(Request $request) {

            if ($request->isMethod('post')) {
                $isAdded = $request->except('_token');
                if (News::setExemplar($isAdded)) {
                    $current_category=Category::getCategoryById($isAdded['category_id']);
                    return redirect()->route('news.category.show', $current_category['slug']);
                } else {
                    $request->flash();
                    return redirect()->route('admin.addNews');
                }
            }
            return view('admin.addNews')->with('categories', Category::getCategories());
        }
}
