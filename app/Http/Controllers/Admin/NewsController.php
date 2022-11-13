<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function create(Request $request, Category $category)
    {
        if ($request->isMethod('post')) {

            //TODO прочитать все новости из файла, добавить новую в конце, сохранить файл
            //$arr[] = ; array_key_last() - получить ключ последнего элемента массива (для редиректа на него)
            //return redirect()->route('');

   /*         TODO учесть, что при получении данных из формы при снятом checkbox "isPrivate" свойство 'isPrivate' в
             массиве будет отсутствовать (обработать эту ситуацию вручную)*/

/*            //сохраняем полученные данные в сессию ("одноразовую")
            $request->flash();*/

//            $data =
            //запись данных на диск 'database' в файл 'news.json'
//            Storage::disk('database')->put('news.json', $data);

            return redirect()->route('admin.create');
        }
        return view('admin.create')
            ->with('categories', $category->getCategories());
    }
}
