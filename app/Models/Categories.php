<?php

namespace App\Models;

class Categories
{
    private static $categories = [
        [
            'id' => '1',
            'name' => 'politics'

        ],
        [
            'id' => '2',
            'name' => 'sport'
        ],
        [
            'id' => '3',
            'name' => 'movie'
        ],
        [
            'id' => '4',
            'name' => 'finance'
        ],
        [
            'id' => '5',
            'name' => 'stars'
        ]
    ];

    public static function getCategories(): array
    {
        return static::$categories;
    }

    public static function getOneCategory($id): ?array
    {
        foreach (static::getCategories() as $category) {
            if ($category['id'] === $id) {
                return $category;
            }
        }
        return null;
    }
}
