<?php

namespace Database\Seeders;

use Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
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
        DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $data = [];
        $faker = Faker\Factory::create('ru_Ru');
/*        for ($i = 1; $i < 6; $i++) {
            $data[]=
                [
                    'id'=>$i,
                    'title' =>$faker->realText(rand(10,30)),
                    'slug'=>$faker->realText(rand(10,10)),
                    'created_at'=>now()
                ];

        }*/
        $data=
            [
                ['id'=>1,
                'title' =>'политика',
                'slug'=>Str::slug('политика'),
                'created_at'=>now()
                ],
                ['id'=>2,
                    'title' =>'финансы',
                    'slug'=>Str::slug('финансы'),
                    'created_at'=>now()
                ],
                ['id'=>3,
                    'title' =>'искусство',
                    'slug'=>Str::slug('искусство'),
                    'created_at'=>now()
                ],
                ['id'=>4,
                    'title' =>'здоровье',
                    'slug'=>Str::slug('здоровье'),
                    'created_at'=>now()
                ],
                ['id'=>5,
                    'title' =>'спорт',
                    'slug'=>Str::slug('спорт'),
                    'created_at'=>now()
                ],
            ];
        return $data;
    }
}
