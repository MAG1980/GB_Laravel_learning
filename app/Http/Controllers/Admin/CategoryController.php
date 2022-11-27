<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
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

    public function create()
    {
        $category = new Category();
        return view('admin.category.create')
            ->with('category', $category);
    }

    public function store(Request $request, Category $category)
    {
        //заполняю fillable-поля объекта данными, полученными из формы
        $category->fill($request->all());
        $category->slug = Str::slug($category->title);
        $category->save();

        //перенаправление на страницу категорий
        return redirect()->route('admin.category.index')
            ->with('categories', Category::all()->sortDesc())
            ->with('success', "Категория успешно добавлена!");
    }

    public function edit(Category $category)
    {
        return view('admin.category.create')
            ->with(
                'category', $category);
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
//        $category->fill($request->all());
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
