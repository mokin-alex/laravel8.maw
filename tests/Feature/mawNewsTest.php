<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class mawNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testExportToJson()
    {
        $response = $this->get('/admin/download/news');
        $response->assertStatus(200);
        $response->assertHeader('Content-Disposition', 'attachment; filename = "news.json"');
    }

    public function testRedirectToRubric()
    {
        $response = $this->get('/news');
        $response->assertRedirect('/news/rubric');
    }


    public function testHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Агрегатор'); //
    }
    public function testAdmin()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Административная панель'); //
    }

    public function testRubric()
    {
        $response = $this->get('/news/rubric');

        $response->assertStatus(200);
        $response->assertSee('Авто'); //
    }
    public function testNewsOne()
    {
        $response = $this->get('/news/newsOne/1');

        $response->assertStatus(200);
        $response->assertSee('Путин');
    }

}
