<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ApiArticlesController extends Controller
{
    public function index()
    {

        return Article::with(['user', 'category', 'tags', 'comments' => function ($query) {
            $query->with(['user'])->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->get();

    }

    public function show($id)
    {
         return Article::where('id', $id)->with(['user', 'category', 'tags', 'comments' => function ($query) {
            $query->with(['user'])->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->first();



    }
    public function latest()
    {

        return Article::with(['user', 'category', 'tags', 'comments' => function ($query) {
            $query->with(['user'])->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->limit(3)->get();

    }



}
