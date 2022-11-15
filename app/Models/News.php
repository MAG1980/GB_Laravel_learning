<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class News
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getNews(): array
    {
//        return $this->news;

        //читаю данные из файла в формате JSON
        $newsJSON = Storage::disk('local')->get('news.json');

        //возвращаю преобразованные из строки в ассоциативный массив данные (параметр true)
        return json_decode($newsJSON, true);
    }

    public function getOneNews($id): ?array
    {
/*       Временно использовал для сохранения данных из класса в файл
        $data = json_encode($this->getNews(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        dump($data);
        Storage::disk('local')->put('news.json', $data);*/

        if (array_key_exists($id, $this->getNews())) {
            return $this->getNews()[$id];
        }
        return null;
    }

    public function getNewsFilteredByCategory($name, Category $category): ?array
    {
        $id = $category->getCategoryIdBy($name);
        $filteredNews = array_filter($this->getNews(), function ($news) use ($id) {
            return $news['category_id'] === $id;
        });
        return $filteredNews;
    }

    public function getNewsByCategoryBySlug($slug): array
    {
        //array_search()
        $id = $this->category->getCategoryIdBySlug($slug);
        return array_filter($this->getNews(), function ($news) use ($id) {
            return $news['category_id'] === $id;
        });

    }
}
