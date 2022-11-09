<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController
{
    public function index(News $news, Category $category):?string
    {
        $categories = $category->getCategories();
        $news = $news->getNews();

        //Передаём данные в представление ('news' - переменная, $news - значение)
        return view('news.index')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    //Параметры строки запроса доступны передаются в параметры методов контроллера средствами фреймворка
    //При передаче нескольких параметров важен порядок их следования, а не имена переменных
    public function show($id, News $news, Category $category)
    {
        $news = $news->getOneNews($id);
        $categories = $category->getCategories();
        return view('news.show')
            ->with('categories', $categories)
            ->with('news', $news);
    }

    public
    function selectByCategory(
        $name,
        News $news,
        Category $category
    ) {
        $categories = $category->getCategories();
        $news = $news->getNewsFilteredByCategory($name, $category);

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
