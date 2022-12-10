<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Services\XMLParserService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

/**
 *
 */
class ParserController extends Controller
{
    /**
     * @var \string[][][]
     */
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

    /**Добавляет в БД свежие новости из зарегистрированных источников
     * @return void
     */
    public function index(XMLParserService $parserService)
    {
        $links = [
            'https://overclockers.ru/rss/all.rss',
            'https://lenta.ru/rss',
            'https://news.rambler.ru/rss/holiday/',
            'https://rssexport.rbc.ru/rbcnews/news/30/full.rss'
        ];

        foreach ($links as $link){
            $parserService->saveNews($link);
        }
        return redirect()->route('news.index');
    }
}
