<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    //перечислены свойства, которые можно заполнять данными, полученными из Request
    protected $fillable = ['title', 'text', 'category_id', 'isPrivate'];

     /**Возвращает объект категории, к которой относится данная новость.
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    //название метода соответствует классу, с которым создаётся связь
    public function category()
    {
        //->belongsTo() свяжет внешний ключ category_id класса, в котором создаётся метод (News), с первичным ключом     класса,     указанного в    первом параметре (Category)
        return $this->belongsTo(Category::class, 'category_id' )->first();
    }
}
