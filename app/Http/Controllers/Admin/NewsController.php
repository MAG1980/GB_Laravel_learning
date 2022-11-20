<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function create(Request $request, Storage $storage, Category $category, News $news)
    {
        if ($request->isMethod('post')) {
//            Получаю данные из формы
            $data = [
                "title" => $request->title,
                "text" => $request->text,
                "category_id" => (int) $request->category_id,
                "isPrivate" => isset($request->isPrivate)
            ];

            //Вношу данные в БД и получаю id последней записи
            $newsId = DB::table('news')->insertGetId($data);

            //перенаправление на страницу последней добавленной новости
            return redirect()->route('news.show', $newsId)
                ->with('success', "Новость успешно добавлена!");

        }
        return view('admin.create')
            ->with('categories', DB::table('categories')->get());
    }
}
