<?php

namespace App\Models;

class Categories
{
    private static $categories = [
        [
            'id' => '1',
            'name' => 'Politic'

        ],
        [
            'id' => '2',
            'name' => 'Sport'
        ],
        [
            'id' => '3',
            'name' => 'Movie'
        ],
        [
            'id' => '4',
            'name' => 'Finance'
        ],
        [
            'id' => '5',
            'name' => '"Stars"'
        ]
    ];

    public static function getCategories(): array
    {
        return static::$categories;
    }

    public static function getOneCategory($name): ?array
    {
        foreach (static::getCategories() as $category) {
            if ($category['name'] === $name) {
                return $category;
            }
        }
        return null;
    }

    public static function getCategoryIdBy($name){
        foreach (static::$categories as $category){
            if ($category['name'] === $name) {
                return $category['id'];
            }
        }
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
