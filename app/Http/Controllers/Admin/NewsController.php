<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(5);
        return view('admin.news.index')
            ->with('news', $news);
    }

    public function create(Request $request)
    {
        //В соответствии с паттерном AR создаём объект модели News, а не принимаем его в качестве параметра
        $news = new News();
        return view('admin.news.create')
            ->with([
                'news' => $news,
                'categories' => Category::all()
            ]);
    }

    public function store(Request $request, News $news)
    {
            //            Получаю данные из формы через Request, а затем, используя ORM, сохраняем их в экземпляре класса News
            /*            этот блок команд сохраняет в модель только те данные из класса Request, которые перечислены в свойстве
                         fillable модели News*/
            //получение всех данных объекта класса Request
            $data = $request->all();
            //заполнение только тех полей экземпляра класса News, которые перечислены в его свойстве fillable
            $news->fill($data);
            //Сохранение строки в БД
            $news->save();
            //Получаю id последней записи
            $newsId = $news->id;

            //перенаправление на страницу последней добавленной новости
            return redirect()->route('news.show', $newsId)
                ->with('success', "Новость успешно добавлена!");
    }

    public function edit(News $news)
    {
        return view('admin.news.create')
            ->with([
                'news' => $news,
                'categories' => Category::all()
            ]);
    }

    public function update(Request $request, News $news)
    {
        //получение всех данных объекта класса Request
        $data = $request->all();
        //заполнение только тех полей экземпляра класса News, которые перечислены в его свойстве fillable
        $news->fill($data);
        $news->isPrivate = isset($request->isPrivate);
        //Сохранение строки в БД
        $news->save();

        return redirect()->route('admin.news.index')
            ->with('success', "Новость изменена успешно!");
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', 'Новость удалена успешно!');
    }
}
