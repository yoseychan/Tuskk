<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 10)->create()->each(function ($article) {

            $article->tags()->attach(rand(1, 9));
            $article->tags()->attach(rand(10, 19));
            $article->tags()->attach(rand(20, 30));

        });
    }
}
