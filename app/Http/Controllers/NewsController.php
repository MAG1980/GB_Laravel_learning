<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;

class NewsController
{
    public function index()
    {
        $news = News::getNews();

        //Передаём данные в представление ('news' - переменная, $news - значение)
        return view('news.all')->with('news', $news);
    }

    //Параметры строки запроса доступны передаются в параметры методов контроллера средствами фреймворка
    //При передаче нескольких параметров важен порядок их следования, а не имена переменных
    public function show($id)
    {
        $news = News::getOneNews($id);
        $categories = Categories::getCategories();
        switch (is_null($news)) {
            case true:
                //при отсутствии данных возвращаем редирект
                //редирект с помощью именованного маршрута
               return redirect()->route('404');
            default:
                return view('news.one')
                    ->with('categories', $categories)
                    ->with('news', $news);
        }
    }

    public function selectByCategory($id)
    {
        $categories = Categories::getCategories();
        $selectedCategoryName = Categories::getNameCategoryBy($id);
        $news = News::getNewsFilteredByCategory($id);

        switch (is_null($news)) {
            case true:
                //при отсутствии данных возвращаем редирект
                //редирект с помощью именованного маршрута
                return redirect()->route('404');
            default:
                return view('news.selectedCategory')
                    ->with('categories', $categories)
                    ->with('selectedCategoryName', $selectedCategoryName)
                    ->with('news', $news);
        }
    }
}
