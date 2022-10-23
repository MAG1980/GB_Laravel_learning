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

    //Параметры строки запроса доступны через параметры методов контроллера средствами фреймворка
    public function show($id)
    {
        $news = News::getOneNews($id);

        switch (is_null($news)) {
            case true:
                //при отсутствии данных возвращаем редирект
               return redirect()->action([HomeController::class, 'index']);
            default:
                return view('news.one')->with('news', $news);
        }

    }
}
