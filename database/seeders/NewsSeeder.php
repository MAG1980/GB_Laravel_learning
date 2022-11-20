<?php

namespace Database\Seeders;

use Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  DB::table('tableName')->insert(массив или массив массивов);
          Если передать один массив - то в таблицу будет добавлена одна строка и метод вернёт её id,
          если передать массив массивов, то будет добавлено число строк, равное количеству элементов внешнего массива.*/
        DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $data = [];

        //создаёт локализованный для русского языка экземпляр класса Faker.
        $faker = Faker\Factory::create('ru_Ru');
        //для создания массива новостей используем цикл
        for ($i = 0; $i < 150; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 30)),
                'text' => $faker->realText(rand(1000, 3000)),
                'isPrivate' => $faker->boolean(),
                'category_id' =>rand(1,5),
                'created_at'=>now()
            ];
        }
        return $data;
    }
}
