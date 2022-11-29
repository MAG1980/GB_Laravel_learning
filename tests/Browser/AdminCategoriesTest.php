<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminCategoriesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddCategoryFailValidate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category')
                ->assertSee('СRUD категории')
                ->clickLink('Добавить категорию')
                ->waitForLocation('/admin/category/create')
                ->type('title', 'test')
                ->press('Добавить категорию')
                ->assertSee('Количество символов в поле наименование должно быть не меньше 5.');
        });
    }

    public function testFormAddCategorySuccessValidate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->type('title', 'Valid category title')
                ->press('Добавить категорию')
                ->assertSee('Категория успешно добавлена!');
        });
    }

    public function testFormDeleteCategory()
    {
        $this->browse(function (Browser $browser) {
            //Нажать на кнопку и дождаться перезагрузки страницы
            $browser->visit('/admin/category')
                ->assertSee('СRUD категории')
                ->press('Удалить категорию')
                ->assertSee('Категория удалена успешно!');
        });
    }
}
