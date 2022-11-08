<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Categories;

class IndexController extends Controller
{
    public function index(Categories $categories)
    {
//        dd($categories);
        return view('categories.index')->with('categories', $categories->getCategories());
    }

    public function selectBy($slug, Categories $cat)
    {
        dd($slug);
        $categories = $cat->getCategories();
        $selectedCategory = $cat->getOneCategory($slug);
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
