<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class CrudNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crudNews')->with('news', News::query()->orderByDesc('id')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.withNews')->with('news', new News())->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = null;
        //$this->validate($request, News::rules(), [], News::attributeNames());

        if ($request->file('image')){
            $path = Facades\Storage::putFile('public', $request->file('image'));
            $url = Facades\Storage::url($path);
        }

        $news = new News();
        $news->fill($request->except('_token'));
        $news->image = $url;
        $news->save();
        return redirect()->route('admin.news.show', $news)->with('success', 'Новость добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.one')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.withNews')->with('news', $news)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $url = $news->image; //сохраним старое значение фото

        //TODO ВАЛИДАЦИЯ!
        //$this->validate($request, News::rules(), [], News::attributeNames());

        if ($request->file('image')){ //если было добавлено новое фото
            $path = Facades\Storage::putFile('public', $request->file('image'));
            $url = Facades\Storage::url($path);
        }

        $news->fill($request->except('_token')); //заполним поля из запроса
        $news->isPrivate = ($request->isPrivate) ?? 0; //если в запросе стала неприватной новость - сбросим в false
        $news->image = $url;
        $news->save();
        return redirect()->route('admin.news.show', $news)->with('success', 'Новость изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
    }
}
