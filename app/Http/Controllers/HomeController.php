<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //для работы с файлами необходимо подключить фасад Storage

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function login(){
        return view('login');
    }

    public function save(News $news){
        //получаем все новости из модели News, кодируем в JSON, записываем в файл 'news.json' диска 'local'
        Storage::disk('local')->put('news.json', json_encode($news->getNews(), JSON_UNESCAPED_UNICODE |
            JSON_PRETTY_PRINT));
        //В результате будет создан файл в каталоге /storage/public.
    }
}
