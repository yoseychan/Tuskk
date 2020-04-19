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
        Article::create([
            'title' => 'This is a featured post!',
            'body' => 'Cupcake ipsum dolor. Sit amet I love gummi bears sesame snaps brownie. Oat cake cookie liquorice cake chupa chups wafer fruitcake caramels. Pudding fruitcake soufflé bonbon fruitcake donut fruitcake lemon drops bear claw. Toffee cake cupcake dessert brownie. Sweet roll candy I love I love cake tootsie roll powder jelly beans powder. Powder cupcake tootsie roll fruitcake brownie tart tootsie roll. Icing croissant pastry. Candy canes marshmallow I love cupcake chocolate topping fruitcake croissant. Chocolate macaroon apple pie sweet. Macaroon I love muffin cheesecake toffee chocolate. Marzipan I love icing sweet tart brownie.',
            'excerpt' => 'This is one of the most exciting articles ever made!! Are you interested in what secrets it reveals?',
            'featured' => '1',
            'image' => 'https://images.unsplash.com/photo-1494972688394-4cc796f9e4c5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
            'user_id' => '2',
            'category_id' => '1'
            ]);


        factory(Article::class, 10)->create();
    }
}
