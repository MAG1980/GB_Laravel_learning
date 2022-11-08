<?php

namespace App\Models;

class Categories
{
    private $categories = [
        'politic' =>
            [
                'id' => '1',
                'name' => 'Политика',
                'slug' => 'politic'
            ],
        "sport" =>
            [
                'id' => '2',
                'name' => 'Спорт',
                'slug' => 'sport'
            ],
        "movie" =>
            [
                'id' => '3',
                'name' => 'Кино',
                'slug' => 'movie'
            ],
        "finance" =>
            [
                'id' => '4',
                'name' => 'Финансы',
                'slug' => 'finance'
            ],
        "stars" =>
            [
                'id' => '5',
                'name' => '"Звёзды"',
                'slug' => 'stars'
            ]
    ];

    public function getCategories()
    {
//        dump($this->categories);
        return $this->categories;
    }

    public function getOneCategory($slug): ?array
    {
        return $this->categories[$slug];
    }

    public function getNameCategoryBy($slug)
    {
//        dd($slug);
        return $this->categories[$slug]['name'];
    }

    public function getCategoryIdBy($slug)
    {
        return $this->categories[$slug]['id'];
    }
}
