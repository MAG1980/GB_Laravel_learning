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
        return view('admin.index')
            ->with('news', $news);
    }

    public function create(Request $request, Category $category)
    {
        //В соответствии с паттерном AR создаём объект модели News, а не принимаем его в качестве параметра
        $news = new News();

        if ($request->isMethod('post')) {
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

            /*//            слишком многословно
                        $news->title = $request->title;
                        $news->text = $request->text;
                        $news->category_id = (int) $request->category_id;
                        $news->isPrivate = isset($request->isPrivate);*/

            /*            $data = [
                            "title" => $request->title,
                            "text" => $request->text,
                            "category_id" => (int) $request->category_id,
                            "isPrivate" => isset($request->isPrivate)
                        ];*/

/*            //Вношу данные в БД и получаю id последней записи
            $newsId = DB::table('news')->insertGetId($data);*/

            //перенаправление на страницу последней добавленной новости
            return redirect()->route('news.show', $newsId)
                ->with('success', "Новость успешно добавлена!");

        }
        return view('admin.create')
            ->with([
                'news' => $news,
                'categories' => $category->query()->get()
            ]);
    }

    public function store(News $news)
    {

    }

    public function edit(News $news, Category $category)
    {
        return view('admin.create')
            ->with([
                'news' => $news,
                'categories' => $category->query()->get()
            ]);
    }

    public function update(Request $request, News $news)
    {
        //получение всех данных объекта класса Request
        $data = $request->all();
        //заполнение только тех полей экземпляра класса News, которые перечислены в его свойстве fillable
        $news->fill($data);
        //Сохранение строки в БД
        $news->save();

        return redirect()->route('admin.index')
            ->with('success', "Новость изменена успешно");
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect('admin.index')
            ->with('success', 'Новость удалена успешно!');
    }
}
