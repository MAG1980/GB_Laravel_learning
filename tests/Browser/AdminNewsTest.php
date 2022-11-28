<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

//Чтобы перед тестами в новую базу данных выполнялись миграции

class AdminNewsTest extends DuskTestCase
{

    //Чтобы перед тестами в новую базу данных выполнялись миграции
//    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddNewsFailValidate()
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

    public function testFormAddNewsSuccessValidate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                //набрать текст в поле формы
                ->type('title', 111)
                ->select('category_id', 1)
                ->type('text', 'Текст новости')
                //нажать на кнопку Добавить новость
                ->press('Добавить новость')
                //увидеть текст успешной валидации
                ->assertSee('Новость успешно добавлена!');
        });
    }

    public function testFormDeleteNewsSuccessValidate()
    {
        $this->browse(function (Browser $browser) {
            //Нажать на кнопку и дождаться перезагрузки страницы
            $browser->visit('/admin/news')
                ->press('Удалить новость')
                ->assertSee('Новость удалена успешно!');
        });
    }
}
