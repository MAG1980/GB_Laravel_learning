<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsController
{
    public function index()
    {
        $categories = Category::all();
//        $categories = DB::table('categories')->get();

        $news = News::query()->paginate(5);
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
        $categories = Category::all();
        return view('news.show')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    public function selectedCategory(
        $slug
    ) {
        $categories = Category::all();

        $selectedCategory = Category::where('slug',  $slug)->first();
        /*        $selectedCategory = DB::table('categories')->where('slug', '=', $slug)->first();*/
        $selectedCategoryId = $selectedCategory->id;

        $news = $selectedCategory->news()->get();
//        $news = DB::table('news')->where('category_id', $selectedCategoryId)->get();

        return view('news.selectedCategory')
            ->with('categories', $categories)
            ->with('selectedCategory', $selectedCategory)
            ->with('news', $news);

    }
}
