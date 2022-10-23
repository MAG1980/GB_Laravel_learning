<?php

namespace App\Http\Controllers;

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

        switch (is_null($news)) {
            case true:
                //при отсутствии данных возвращаем редирект
                //редирект с помощью именованного маршрута
               return redirect()->route('404');
            default:
                return view('news.one')->with('news', $news);
        }

    }
}
