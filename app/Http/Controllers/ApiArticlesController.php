<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

    public function featured()
    {
        return Article::where('featured', '1')->with(['user', 'category', 'tags', 'comments' => function ($query) {
            $query->with(['user'])->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->limit(1)->first();
    }

    public function store(Request $request)
    {
        $request->merge(["user_id" => \Auth::user()->id]);
        Article::create($request->all());

    }

    public function update(Request $request, $id)
    {

            return Article::where('id', $id)->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'excerpt' => $request->input('excerpt'),
                'category_id' => $request->input('category_id'),
                'image' => $request->input('image'),
                'featured' => $request->input('featured'),
            ]);
    }

    public function delete($id)
    {
        return Article::destroy($id);
    }

     public function like(Request $request)
    {
        $article = Article::find($request->id);
        if ($article->likes()->where('user_id', \Auth::user()->id)->exists()) {
            $article->likes()->detach(\Auth::user()->id);
        } else {
            $article->likes()->attach(\Auth::user()->id);
        }
        return [
            'likes_count' => $article->likes_count,
            'if_i_liked' => $article->if_i_liked
        ];
    }

}
