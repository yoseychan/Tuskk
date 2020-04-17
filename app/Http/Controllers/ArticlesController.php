<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {

        return view('articles');
    }

    public function show($id)
    {

          $article = Article::where('id', $id)->with(['user', 'category', 'tags', 'comments' => function ($query) {
            $query->with(['user'])->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->first();


         return view("article", compact("article"));
    }

    public function forEdit($id)
    {
         $article = Article::where('id', $id)->with(['user', 'category', 'tags'])->first();

         return view("editarticle",  compact("article"));
    }





}
