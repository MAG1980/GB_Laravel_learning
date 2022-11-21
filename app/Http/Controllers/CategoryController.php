<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function show($slug)
   {
       $category=Category::query()->where('slug', $slug)->first();
       $news = News::query()->where('category_id', $category);
       return view('news.selectedCategory')
           ->with('news', $news);
   }
}
