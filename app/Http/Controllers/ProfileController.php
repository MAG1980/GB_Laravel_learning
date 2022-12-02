<?php

namespace App\Http\Controllers;

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
                return redirect()->route('updateProfile')->withErrors($errors);
            }

            //Сохраняем данные пользователя в БД
            $user->save();
            return redirect()->route('updateProfile')->with('success', 'Профиль успешно изменён!');
        }

        return view('profile', ['user' => $user]);
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
                'newPassword' => 'string|min:3|confirmed',
                //для использования правила confirmed, нужно, чтобы во входных данных было соответствующее поле
                // name_confirmation
                'newPassword_confirmation' => 'string|min:3'
            ];
//        TODO В шаблоне вывести ошибку об ошибке подтверждения пароля с помощью @errors('nwwPassword_confirmation')
    }

    //требуется для русификации сообщений об ошибках валидации
    protected function attributeNames()
    {
        return
        [
            'password_confirmation' => 'Новый пароль',
            'newPassword' =>'Новый пароль',
            'newPassword_confirmation'=>'Подтверждение нового пароля'
        ];
    }
}
