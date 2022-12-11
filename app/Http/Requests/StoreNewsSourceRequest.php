<?php

namespace App\Http\Requests;

use App\Models\NewsSource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewsSourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_admin;
//        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        dump($this->id);
        switch($this->method()){
            case 'POST':
            case 'PATCH':
            case 'PUT':
            return [
                'title'=>['required', 'min:3', 'max:15', Rule::unique('news_sources')->ignore($this->id)],
                'link'=>'required|min:7|max:75|unique:news_sources,link,'.$this->id,
            ];
            default:
                break;
        }
    }
}
