<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create(Request $request, Category $category)
    {
        if ($request->isMethod('post')) {
            //сохраняем полученные данные в сессию ("одноразовую")
            $request->flash();
            return redirect()->route('admin.create');
        }
        return view('admin.create')
            ->with('categories', $category->getCategories());
    }
}
