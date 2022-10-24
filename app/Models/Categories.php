<?php

namespace App\Models;

class Categories
{
    private static $categories = [
        [
            'id' => '1',
            'name' => 'Политика'

        ],
        [
            'id' => '2',
            'name' => 'Спорт'
        ],
        [
            'id' => '3',
            'name' => 'Кино'
        ],
        [
            'id' => '4',
            'name' => 'Финансы'
        ],
        [
            'id' => '5',
            'name' => '"Звёзды"'
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

    public static function getNameCategoryBy($id){
        foreach (static::$categories as $category){
            if ($category['id'] === $id) {
                return $category['name'];
            }
        }
    }
}
