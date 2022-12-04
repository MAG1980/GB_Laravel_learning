<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    private $newsSources = [
        'https://rssexport.rbc.ru/rbcnews/news/30/full.rss' => [
            /*          'title' => ['uses' => 'channel.item.title'],
                        'category' => ['uses' => 'channel.item.category'],
                        'text' => ['uses' => 'channel.item.description'],
                        'img' => ['uses' => 'channel.item.enclosure::url'],*/
            'news' => ['uses' => 'channel.item[title,category,description,enclosure::url,pubDate]']
        ],
        /*        'https://news.ru/rss/' => [
                    'title' => ['uses' => 'channel.item.title'],
                    'category' => ['uses' => 'channel.item.category'],
                    'text' => ['uses' => 'channel.item.description'],
                    'img' => ['uses' => 'channel.item.link'],
                ],*/
        'https://lenta.ru/rss' => [
            /*          'title' => ['uses' => 'channel.item.title'],
                        'category' => ['uses' => 'channel.item.category'],
                        'text' => ['uses' => 'channel.item.description'],
                        'img' => ['uses' => 'channel.item.enclosure::url'],*/
            'news' => ['uses' => 'channel.item[title,category,description,enclosure::url,pubDate]']
        ],

    ];

    public function index()
    {
        $result = [];
        foreach ($this->newsSources as $source => $fields) {
            $xml = XmlParser::load($source);

            $data = $xml->parse([
                ...$fields
            ]);
            $result = [...$result, ...$data['news']];
        }

        foreach ($result as $item) {
            $category = $this->getCategoryFromDB($item);

            $news = News::where('title', $item['description'])->firstOr(function () use ($item, $category) {
                return $newNews = News::create([
                    'title' => $item['title'],
                    'text' => $item['description'],
                    'category_id' => $category->id
                ]);
            });

        }
        dd($result);
    }

    private function getCategoryFromDB($news)
    {
        $categoryTitle = $news['category'];
        //Возвращает из БД объект категории, а если он не существует, то создаёт новую запись и возвращает её
        return $category = Category::firstOrCreate(
            ['title' => mb_strtolower($categoryTitle)],
            ['slug' => Str::slug($categoryTitle)],
        );
    }

}
