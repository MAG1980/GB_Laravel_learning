<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsController
{
    public function index()
    {
        $categories = DB::table('categories')->get();

        /*Использовать метод select можно только в исключительных случаях,
        когда невозможно обойтись средствами конструктора запросов.
        $news = DB::select('SELECT * FROM `news` WHERE 1'); */
//        $news = DB::table('news')->get();
//        $news = News::all();
//      $news = News::where('isPrivate', false)->get();
        $news= News::query()->paginate(5);
        //Передаём данные в представление ('news' - переменная, $news - значение)
        return view('news.index')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    //Параметры строки запроса доступны передаются в параметры методов контроллера средствами фреймворка
    //При передаче нескольких параметров важен порядок их следования, а не имена переменных
    public function show(News $news)
    {
//        $news = $news->getOneNews($id);
//        $news = DB::table('news')->find($id);
//        dd($news);
        $categories = DB::table('categories')->get();
        return view('news.show')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    public function selectedCategory(
        $slug
    ) {
        $categories = DB::table('categories')->get();
//        $news = $news->getNewsByCategoryBySlug($slug);
        $selectedCategory = DB::table('categories')->where('slug', '=', $slug)->get()[0];
        $selectedCategoryId = $selectedCategory->id;

        $news = DB::table('news')->where('category_id', $selectedCategoryId)->get();

//        $categoryId = $category->getCategoryIdBySlug($slug);
//        $title = $categories[$categoryId]['title'];

        return view('news.selectedCategory')
            ->with('categories', $categories)
            ->with('selectedCategory', $selectedCategory)
            ->with('news', $news);

    }
}
