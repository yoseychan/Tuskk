<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
       public function index()
    {

//        $article = Article::with('user', 'category', 'comments', 'tags')->orderBy('created_at', 'desc')->get();
//// return view('home', compact('articles'));
        return view('home');
    }
}
