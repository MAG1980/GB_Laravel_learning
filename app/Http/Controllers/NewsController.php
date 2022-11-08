<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;

class NewsController
{
    public function index(News $news):?string
    {
        $categories = Categories::getCategories();
        $news = $news->getNews();

        //Передаём данные в представление ('news' - переменная, $news - значение)
        return view('news.index')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    //Параметры строки запроса доступны передаются в параметры методов контроллера средствами фреймворка
    //При передаче нескольких параметров важен порядок их следования, а не имена переменных
    public function show($id, News $news):?string
    {
        $news = $news->getOneNews($id);
        $categories = Categories::getCategories();
        return view('news.show')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    public
    function selectByCategory(
        $name,
        News $news
    ) {
        $categories = Categories::getCategories();
        $news = $news->getNewsFilteredByCategory($name);

        switch (is_null($news)) {
            case true:
                //при отсутствии данных возвращаем редирект
                //редирект с помощью именованного маршрута
                return redirect()->route('404');
            default:
                return view('news.selectedCategory')
                    ->with('categories', $categories)
                    ->with('selectedCategoryName', $name)
                    ->with('news', $news);
        }
    }
}
