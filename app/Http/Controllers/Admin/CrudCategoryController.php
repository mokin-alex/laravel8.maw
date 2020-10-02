<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrudCategoryController extends Controller
{
    //
    public function create(Request $request)
    {

        if ($request->isMethod('post')) {
            $isAdded = $request->except('_token');
            if (Category::setExemplar($isAdded)) {
                return redirect()->route('news.');
            } else {
                $request->flash();
                return redirect()->route('admin.addCategory');
            }
        }
        return view('admin.addRubric');
    }

}
