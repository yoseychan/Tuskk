<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
       public function show($title)
    {
        $category = Category::where('title', $title)->with(['articles' => function ($query) {
            $query->with(['user', 'tags', 'comments',])->orderBy('created_at', 'desc');
        }])->first();
         return view("category", compact("category"));
    }
}
