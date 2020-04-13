<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ApiCategoriesController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function show($title)
    {
        return Category::where('title', $title)->with(['articles' => function ($query) {
            $query->with(['user', 'tags', 'comments',])->orderBy('created_at', 'desc');
        }])->first();
    }
}
