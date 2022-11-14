<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_home_page_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_news_page_returns_a_successful_response()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_on_the_news_page_is_visible_title()
    {
        $response = $this->get('/news');

        $response->assertSeeText("Новости");
    }

    public function test_on_the_finance_news_page_is_visible_title()
    {
        $response = $this->get('/news/category/finansy');

        $response->assertSeeText("Новости категории Финансы");
    }

    public function test_on_the_finance_news_page_is_visible()
    {
        $response = $this->get('/news');
//        dd($response);

//        $response->assertViewHas();
    }
}
