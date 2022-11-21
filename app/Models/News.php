<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    //перечислены свойства, которые можно заполнять данными, полученными из Request
    protected $fillable = ['title', 'text', 'category_id', 'isPrivate'];
}
