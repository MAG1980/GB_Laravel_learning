<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        //фасад Auth в данном методе гарантированно вернёт объект пользователя,
        //т.к. данный метод будет вызван из посредника, который проверил аутентификацию
        $user = Auth::user();
        return view('profile', ['user'=>$user]);
    }
}
