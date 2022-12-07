<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Routing\Route;
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
    public function index()
    {
        //Время публикации последней новости, хранящейся в БД
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
            }
        }

        return redirect()->route('news.index');
    }

    /**
     * @param $news - массив данных одной новости
     * @return Category
     */
    private function getCategoryFromDB($news):Category
    {
        $categoryTitle = $news['category'];
        //Возвращает из БД объект категории, а если он не существует, то создаёт новую запись и возвращает её
        return $category = Category::firstOrCreate(
            ['title' => mb_strtolower($categoryTitle)],
            ['slug' => Str::slug($categoryTitle)],
        );
    }

    /**
     * @return mixed|string время публикации самой свежей новости, хранящейся в БД
     */
    private function getLatestNewsPublicationTime()
    {
        return DB::table('news')->orderBy('publication_date',
                'desc')->first()->publication_date ?? 'Mon, 05 Dec 2022 00:00:00 +0300';
    }

    /**
     * @param $item - массив данных одной новости
     * @return void
     */
    private function addFreshNews($item)
    {
        $category = $this->getCategoryFromDB($item);
//        dump($category);
        $newNews = News::create([
            'title' => $item['title'],
            'text' => $item['description'],
            'category_id' => $category->id,
            'image_path' => $item['enclosure::url'] ?? '/storage/img/default.jpg',
            'publication_date' => Carbon::createFromTimeString($item['pubDate']),
        ]);
    }

    /**Парсит источники новостей в формате xml
     * @return array массив новостей
     */
    private function xmlSourcesParseResultToArray():array
    {
        $xmlParsingResult = [];
        foreach ($this->newsSources as $source => $fields) {
            $xml = XmlParser::load($source);

            $data = $xml->parse([
                ...$fields
            ]);
            $xmlParsingResult = [...$xmlParsingResult, ...$data['news']];
        }
        return $xmlParsingResult;
    }
}
