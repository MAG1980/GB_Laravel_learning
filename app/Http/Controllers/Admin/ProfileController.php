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
        if ($request->isMethod('post')){
            //последний параметр служит для русификации названия поля в ошибках валидации
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());
        }
        return view('profile', ['user'=>$user]);
    }

    protected function validateRules()
    {
        return
        [
            'name'=>'required|string|max:15',
            'email'=>'required|email|unique:users,email,'.Auth::id(),
            'password'=>'required',
            'newPassword'=>'required|string|min:3'
        ];
    }

    //требуется для русификации сообщений об ошибках валидации
    protected function attributeNames()
    {
        return
        [
            'newPassword'=>'Новый пароль'
        ];
    }
}
