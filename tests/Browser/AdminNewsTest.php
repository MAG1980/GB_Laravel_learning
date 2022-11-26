<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testTestFormAddNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                //набрать текст в поле формы
                ->type('title', 1)
                //нажать на кнопку Добавить новость
                ->press('Добавить новость')
                //увидеть текст ошибки валидации
                ->assertSee('Количество символов в поле наименование должно быть не меньше 3');
        });
    }
}
