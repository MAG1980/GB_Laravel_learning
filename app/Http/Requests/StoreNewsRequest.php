<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Category $category)
    {
        //получаем название таблицы БД, соответствующее модели Category
        $tableNameCategory = $category->getTable();
    /*    return [
            //правила для input name="title"
            //обязательное, мин. длина - 3 симв., макс. - 20 симв.
            'title' => 'required|min:3|max:20',
            'text' => 'required|min:3',
            //поле может быть пустым, поэтому подходит правило sometimes, 1 - допустимое значение.
            'isPrivate' => 'sometimes|in:1',
            //обязательное, должен присутствовать в столбце id таблицы $tableNameCategory
            'category_id' => "required|exists:{$tableNameCategory},id"
        ];*/
        switch ($this->method()) {
            case 'POST':
            case 'PATCH':
            {
                return [
                    //правила для input name="title"
                    //обязательное, мин. длина - 3 симв., макс. - 20 симв.
                    'title' => 'required|min:3|max:20',
                    'text' => 'required|min:3',
                    //поле может быть пустым, поэтому подходит правило sometimes, 1 - допустимое значение.
                    'isPrivate' => 'sometimes|in:1',
                    //обязательное, должен присутствовать в столбце id таблицы $tableNameCategory
                    'category_id' => "required|exists:{$tableNameCategory},id"
                ];
            }
            default:
                break;
        }
    }
}
