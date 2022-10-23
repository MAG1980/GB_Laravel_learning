<?php

namespace App\Models;

class News
{
    private static $news = [
        [
            'id' => '1',
            'title' => 'Новость 1',
            'text' => 'Текстовое содержимое новости 1'
        ],
        [
            'id' => '2',
            'title' => 'Новость 2',
            'text' => 'Текстовое содержимое новости 2'
        ]
    ];

    public static function getNews(): array
    {
        return static::$news;
    }

    public static function getOneNews($id): ?array
    {
        foreach (static::getNews() as $news) {
            if ($news['id'] === $id) {
                return $news;
            }
        }
        return null;
    }
}
