<?php

namespace App\Models;

class Category
{
    private array $categories = [
       1 => [
           'id' => '1',
           'title' => 'Политика',
           'slug' => 'politika'

       ],
        2 => [
            'id' => '2',
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        3 => [
            'id' => '3',
            'title' => 'Кино',
            'slug' => 'kino'
        ],
        4 => [
            'id' => '4',
            'title' => 'Финансы',
            'slug' => 'finansy'
        ],
        5 => [
            'id' => '5',
            'title' => '"Звёзды"',
            'slug' => 'zvyozdy'
        ]
    ];

    public function getCategories(): array
    {
        return $this->categories;
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
        foreach ($this->categories as $category){
            if ($category['title'] === $title) {
                return $category['id'];
            }
        }
    }

    public function getCategoryIdBySlug($slug){
        $id = null;
        foreach($this->categories as $category){
            if ($category['slug'] === $slug){
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }
}
