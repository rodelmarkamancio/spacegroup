<?php

use Illuminate\Database\Seeder;
use \App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'user_id' => '1',
                'category_name' => 'Kawasaki Ninja',
                'category_slug' => 'kawasaki-ninja'
            ]
        );

        Category::create(
            [
                'user_id' => '1',
                'category_name' => 'World SBK',
                'category_slug' => 'world-sbk'
            ]
        );
    }
}
