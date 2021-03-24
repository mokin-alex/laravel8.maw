<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\News;
use PHPUnit\Framework\TestCase;

class mawModelsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testNews()
    {
        $this->assertIsArray(News::getNews());
        $this->assertArrayHasKey('title', News::getNewsById('1'));
    }

    public function testCategory()
    {
        $this->assertIsArray(Category::getCategories());
        $this->assertIsString(Category::getCategoryNameBySlug('sport'), 'Спорт');
    }
}
