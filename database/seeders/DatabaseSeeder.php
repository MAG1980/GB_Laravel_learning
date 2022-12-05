<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([      //засеет в БД одного пользователя с нужными параметрами, например Admin
            'name'=>'AGM',
            'email'=>'agm@mail.ru',
            'password'=>Hash::make('123'),
            'is_admin'=>true,
        ]);

        //вызов нужного seeder
//        $this->call(CategoriesSeeder::class);
//        $this->call(NewsSeeder::class);
        $this->call(UsersSeeder::class);

    }
}
