<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Categories;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Categories::getCategories();
        return view('categories.index')->with('categories', $categories);
    }

    public function selectBy($id)
    {
        $categories = Categories::getCategories();
        $selectedCategory = Categories::getOneCategory($id);

        switch (is_null($selectedCategory)) {
            case true:
                //при отсутствии данных возвращаем редирект
                //редирект с помощью именованного маршрута
                return redirect()->route('404');
            default:
                return view('categories.id')
                    ->with('selectedCategory', $selectedCategory)
                    ->with('categories', $categories);
        }
    }
}
