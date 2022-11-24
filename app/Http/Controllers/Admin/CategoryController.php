<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortDesc();

        return view('admin.category.index')->with('categories', $categories);
    }

    public function create(Request $request)
    {
        $category = new Category();
        if ($request->isMethod('post')) {
            //заполняю fillable-поля объекта данными, полученными из формы
            $category->fill($request->all());
            $category->slug = Str::slug($category->title);
            $category->save();

            //перенаправление на страницу категорий
            return redirect()->route('admin.category.index')
                ->with('categories', Category::all()->sortDesc())
                ->with('success', "Категория успешно добавлена!");
        }
        return view('admin.category.create')
            ->with('category', $category);
    }

    public function store(Category $category)
    {

    }

    public function edit(Category $category)
    {
        return view('admin.category.create')
            ->with(
                'category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.category.index')
            ->with('success', 'Категория изменена успешно!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')
            ->with('success', 'Категория удалена успешно!');
    }
}
