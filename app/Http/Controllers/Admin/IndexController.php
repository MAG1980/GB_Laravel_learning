<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //скачивание браузером файла user3.jpg из папки public сервера на локальный диск
    public function test1(){
        return response()->download('user3.jpg');
    }

    //скачивание браузером всех новостей на локальный диск в файл news.txt
    public function test2(News $news){
        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
