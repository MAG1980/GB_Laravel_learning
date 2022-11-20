<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;

class Category
{

   /* public function getCategories(): array
    {
        $categories = Storage::disk('local')->get('categories.json');

        //параметр true преобразует объект в ассоциативный массив
        return json_decode($categories, true) ;
    }

    public function getOneCategory($title): ?array
    {
        foreach ($this->getCategories() as $category) {
            if ($category['title'] === $title) {
                return $category;
            }
        }
        return null;
    }

    public function getCategoryIdBy($title){
        foreach ($this->getCategories() as $category){
            if ($category['title'] === $title) {
                return $category['id'];
            }
        }
    }

    public function getCategoryIdBySlug($slug){
        $id = null;
        foreach($this->getCategories() as $category){
            if ($category['slug'] === $slug){
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }*/
}
