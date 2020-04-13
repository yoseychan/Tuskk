<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title' => 'gaming']);
        Category::create(['title' => 'events']);
        Category::create(['title' => 'esports']);

    }
}
