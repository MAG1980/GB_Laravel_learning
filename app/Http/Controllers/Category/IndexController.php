<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories=Categories::getCategories();
        dd($categories);
        return view('categories.menu')->with($categories);
    }

    public function selected($id)
    {
        $category = Categories::getCategories($id);

        switch (is_null($category)) {
            case true:
                //при отсутствии данных возвращаем редирект
                //редирект с помощью именованного маршрута
                return redirect()->route('404');
            default:
                return view('categories.selected')->with('category', $category);
        }
    }
}
