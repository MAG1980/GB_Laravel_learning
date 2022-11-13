<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function show(News $news, $slug)
   {
       return view('news.selectedCategory')
           ->with('news', $news->getNewsByCategoryBySlug($slug));
   }
}
