<?php

namespace App\Models;

class Categories
{
    private static $categories = [
        '1' =>
            [
                'id' => '1',
                'name' => 'Политика'
            ],
        "2" =>
            [
                'id' => '2',
                'name' => 'Спорт'
            ],
        "3" =>
            [
                'id' => '3',
                'name' => 'Кино'
            ],
        "4" =>
            [
                'id' => '4',
                'name' => 'Финансы'
            ],
        "5" =>
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
        return self::$categories[$id];
    }

    public static function getNameCategoryBy($id)
    {
        return self::$categories[$id]['name'];
    }
}
