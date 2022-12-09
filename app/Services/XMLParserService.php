<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;
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

        foreach ($data['news'] as $news) {
            if (!$news['category']) {
                $categoryName = $data['title'];
            } else {
                $categoryName = $news['category'];
            }

            $category = Category::query()->firstOrCreate([
                'title' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);

            News::query()->firstOrCreate([
                    'title' => $news['title'],
                    'text' => $news['description'],
                    'isPrivate' => false,
                    'image_path' => $news['enclosure::url'] ? $news['enclosure::url']: env(DEFAULT_IMAGE_PATH),
                'category_id'=>$category->id,
            ]);
        }


        /*        //Время публикации последней новости, хранящейся в БД
                $latestPublicationTime = $this->getLatestNewsPublicationTime();
                dump($latestPublicationTime);
        //        dump($this->xmlSourcesParseResultToArray());

                foreach ($this->xmlSourcesParseResultToArray() as $item) {
                    //Время публикации проверяемой новости
                    $newsPublicationTime = Carbon::createFromTimeString($item['pubDate']);
                    //Время публикации самой свежей новости, хранящейся в БД
                    $newsLatestTime = Carbon::createFromTimeString($latestPublicationTime);
                    //Сравнение даты публикации новости с датой публикации самой свежей новости в БД
                    $newsIsFresh = $newsPublicationTime->gt($newsLatestTime);

                    if ($newsIsFresh) {
                        $this->addFreshNews($item);
                        dump($item);
                    }*/
    }


}
