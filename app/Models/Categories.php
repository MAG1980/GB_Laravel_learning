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
            'name' => 'the science'
        ],
        [
            'id' => '3',
            'name' => 'culture'
        ],
        [
            'id' => '4',
            'name' => 'art'
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
