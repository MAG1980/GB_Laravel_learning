<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Support\Carbon;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews(string $link)
    {
        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'news' => ['uses' => 'channel.item[title,link,guid,category,description,enclosure::url,pubDate]']
        ]);

        //Время публикации самой "свежей" новости по всем источникам во время последнего парсинга
        $tLatestNewsPublicationTime = NewsRepository::getLatestNewsPublicationTime();

        foreach ($data['news'] as $news) {
            //Проверяем новость на "свежесть"
            if (NewsRepository::newsIsFresh($news, $tLatestNewsPublicationTime)) {
                if (!$news['category']) {
                    $categoryTitle = $data['title'];
                } else {
                    $categoryTitle = $news['category'];
                }

                //Получаем объект категории новости
                $category = Category::getCategoryFromDB($categoryTitle);

                //Сохраняем новость в БД
                NewsRepository::addNewsToDb( $news, $category);
            }
        }
    }
}
