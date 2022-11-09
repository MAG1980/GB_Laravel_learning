<?php

namespace App\Models;

class Category
{
    private array $categories = [
       1 => [
           'id' => '1',
           'name' => 'Политика',
           'slug' => 'politika'

       ],
        2 => [
            'id' => '2',
            'name' => 'Спорт',
            'slug' => 'sport'
        ],
        3 => [
            'id' => '3',
            'name' => 'Кино',
            'slug' => 'kino'
        ],
        4 => [
            'id' => '4',
            'name' => 'Финансы',
            'slug' => 'finansy'
        ],
        5 => [
            'id' => '5',
            'name' => '"Звёзды"',
            'slug' => 'zvyozdy'
        ]
    ];

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getOneCategory($name): ?array
    {
        foreach ($this->getCategories() as $category) {
            if ($category['name'] === $name) {
                return $category;
            }
        }
        return null;
    }

    public function getCategoryIdBy($name){
        foreach ($this->categories as $category){
            if ($category['name'] === $name) {
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

    public function getRouteKeyName()
    {
        return 'name';
    }
}
