<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NewsRepository
{
    /**
     * @return mixed|string время публикации самой свежей новости, хранящейся в БД
     */
    public static function getLatestNewsPublicationTime()
    {
        return DB::table('news')->orderBy('publication_date',
                'desc')->first()->publication_date ?? 'Mon, 05 Dec 2022 00:00:00 +0300';
    }

    public static function newsIsFresh($news, $tLatestNewsPublicationTime)
    {
        //Время публикации самой свежей новости, хранящейся в БД
        $newsLatestTime = Carbon::createFromTimeString($tLatestNewsPublicationTime);
        //Время публикации проверяемой новости
        $newsPublicationTime = Carbon::createFromTimeString($news['pubDate']);
        //Сравнение даты публикации новости с датой публикации самой свежей новости в БД
        $newsIsFresh = $newsPublicationTime->gt($newsLatestTime);
        return $newsIsFresh;
    }

    /**
     * @param $news  - массив данных одной новости
     * @return void
     */
    public static function addNewsToDb($news, Category $category)
    {
        $newNews = News::create([
            'title' => $news['title'],
            'text' => $news['description'],
            'category_id' => $category->id,
            'image_path' => $news['enclosure::url'] ?? env('DEFAULT_IMAGE_PATH'),
            'publication_date' => Carbon::createFromTimeString($news['pubDate']),
        ]);
    }
}
