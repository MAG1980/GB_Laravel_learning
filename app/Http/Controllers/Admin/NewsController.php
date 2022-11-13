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

            $allNews = $news->getNews($storage);
            $lastIdString = strval((int)array_key_last($allNews) + 1);

            //получаю данные из формы добавления свежей новости
            $freshNews = $request->except(['_token']);
            $freshNews['id'] = $lastIdString;

            if (array_key_exists('isPrivate', $freshNews)) {
                $freshNews['isPrivate'] = true;
            } else {
                $freshNews['isPrivate'] = false;
            }

            $allNews[$lastIdString] = $freshNews;

            $storage::disk('local')->put('news.json', json_encode($allNews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

            return redirect()->route('news.show', $lastIdString);

            /*            //сохраняем полученные данные в сессию ("одноразовую")
                        $request->flash();*/

//            return redirect()->route('admin.create');
        }
        return view('admin.create')
            ->with('categories', $category->getCategories());
    }
}
