<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i <= 20; $i++) {
            $data[] = [
                'title' => $faker->realText(50),
                'text' => $faker->realText(500),
                'isPrivate' => $faker->boolean(20),
                'category_id' => random_int(1,4), //$faker->randomNumber(random_int(1, 4)),
                'created_at' => now(),
            ];
        }
        return $data;
    }
}
