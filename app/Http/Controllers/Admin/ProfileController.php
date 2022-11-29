<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        //фасад Auth в данном методе гарантированно вернёт объект пользователя,
        //т.к. данный метод будет вызван из посредника, который проверил аутентификацию
        $user = Auth::user();
        $errors = [];
        //валидация в контроллере
        //в методе validate(Request, [правило валидации], [сообщение об ошибках], [перевод названий полей формы]
        if ($request->isMethod('post')) {
            //последний параметр служит для русификации названия поля в ошибках валидации
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());

            //Согласно паттерну AR, перед внесением информации о пользователе в БД нужно сверить пароль, а точнее hash
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    //хэшируем пароль перед внесением в БД
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);

            } else {
                $errors['password'][] = 'Введён неправильный пароль';
                return redirect()->route('admin.updateProfile')->withErrors($errors);
            }

            //Сохраняем данные пользователя в БД
            $user->save();
            return redirect()->route('admin.updateProfile')->with('success', 'Профиль успешно изменён!');
        }

        return view('admin.profile', ['user' => $user]);
    }

    /** Возвращает правила валидации
     * @return string[]
     */
    protected function validateRules()
    {
        return
            [
                'name' => 'required|string|max:15',
                //unique:users,email - проверка вводимого email на отсутствие б столбце email таблицы users
                //чтобы при проверке уникальности текущий email не попал в бан по уникальности, добавим .Auth::id()
                'email' => 'required|email|unique:users,email,'.Auth::id(),
                'password' => 'required',
                'newPassword' => 'required|string|min:3'
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
