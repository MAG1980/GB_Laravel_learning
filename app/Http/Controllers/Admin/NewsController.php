<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function create(Request $request, Storage $storage, Category $category, News $news)
    {
        if ($request->isMethod('post')) {

            $allNews = $news->getNews();

         /* в архив с новостями добавляю новый элемент,
         который содержит данные, полученные из формы добавления новости*/
            $allNews[] = [
                "title" => $request->title,
                "text" => $request->text,
                "category_id" => (int) $request->category_id,
                "isPrivate" => isset($request->isPrivate)
            ];

            $lastId = array_key_last($allNews);
            $allNews[$lastId]['id'] = $lastId;

            //перезаписываю файл с новостями новыми данными
            $storage::disk('local')->put('news.json',
                json_encode($allNews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

            return redirect()->route('news.show', $lastId)
                ->with('success', "Новость успешно добавлена!");

            /*            //сохраняем полученные данные в сессию ("одноразовую")
                        $request->flash();*/

//            return redirect()->route('admin.create');
        }
        return view('admin.create')
            ->with('categories', $category->getCategories());
    }
}
