<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddCategoryTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSee()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->assertSee('Добавление новой рубрики');
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
            $browser->visit('/admin/category/create')
                ->type('title', 'Тестовая')
                ->type('slug', 'testrubric')
                ->press('Добавить рубрику')
                ->assertSee('Рубрика добавлена успешно!')
                ->assertRouteIs('admin.category.index');
                //->assertPathIs('/admin/category');
        });
    }

}
