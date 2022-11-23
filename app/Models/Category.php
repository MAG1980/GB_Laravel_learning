<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    /**Возвращает массив новостей категории, id которой получает с помощью ORM
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    //название метода соответствует классу, с которым создаётся связь
    public function news()
    {
        //->has_Many() свяжет внешний ключ (category_id) указанного класса (News) с первичным ключом класса (Category),   в котором   создаётся    метод.

        return $this->hasMany(News::class, 'category_id');
    }
}
