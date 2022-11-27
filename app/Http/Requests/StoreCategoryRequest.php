<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            case 'PATCH':
            case 'PUT':
            {
                return [
                    //правила для input name="title"
                    //обязательное, мин. длина - 5 симв., макс. - 25 симв.
                    'title' => 'required|min:5|max:25|unique:categories',
                ];
            }
            default:
                break;
        }
    }
}
