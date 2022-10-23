<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function test1(){
        return "<h1>Test1</h1>";
    }

    public function test2(){
        return "<h1>Test2</h1>";
    }
}
