<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            1 => [
                'id' => 1,
                'slug' => 'auto',
                'title' => 'Авто',
            ],
            2 => [
                'id' => 2,
                'slug' => 'business',
                'title' => 'Экономика',
            ],
            3 => [
                'id' => 3,
                'slug' => 'politics',
                'title' => 'Политика',
            ],
            4 => [
                'id' => 4,
                'slug' => 'sport',
                'title' => 'Спорт',
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
