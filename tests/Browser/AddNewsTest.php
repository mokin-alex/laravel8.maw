<?php

namespace Tests\Browser;

use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    use RefreshDatabase;

    /**
     * A Dusk test News add form.
     *
     * @return void
     */
    public function testSee()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSee('Добавление новости');
        });
    }

    /**
     * A Dusk test adding new Category.
     *
     * @return void
     */
    public function testAdding()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'Тестовый заголовок новости')
                ->type('text', 'Содержимое тестовой новости')
                ->select('category_id', 1)
                ->check('isPrivate')
                ->press('Добавить новость')
                ->assertSee('Новость добавлена!')
                ->assertRouteIs('admin.news.show', 1);
            //->assertPathIs('/admin/news/');
        });
    }
}
