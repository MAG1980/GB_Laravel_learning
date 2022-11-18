<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class NewsController
{
    public function index(Category $category)
    {
        $categories = $category->getCategories();

        /*Использовать метод select можно только в исключительных случаях,
        когда невозможно обойтись средствами конструктора запросов.
        $news = DB::select('SELECT * FROM `news` WHERE 1'); */
        $news = DB::table('news')->get();

        //Передаём данные в представление ('news' - переменная, $news - значение)
        return view('news.index')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    //Параметры строки запроса доступны передаются в параметры методов контроллера средствами фреймворка
    //При передаче нескольких параметров важен порядок их следования, а не имена переменных
    public function show($id, Category $category)
    {
//        $news = $news->getOneNews($id);
        $news = DB::table('news')->find($id);
//        dd($news);
        $categories = $category->getCategories();
        return view('news.show')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    public function selectedCategory(
        $slug,
        News $news,
        Category $category
    ) {
        $categories = $category->getCategories();
        $news = $news->getNewsByCategoryBySlug($slug);
        $categoryId = $category->getCategoryIdBySlug($slug);
        $title = $categories[$categoryId]['title'];

        return view('news.selectedCategory')
            ->with('categories', $categories)
            ->with('selectedCategoryTitle', $title)
            ->with('news', $news);

    }
}
