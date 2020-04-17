<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class ApiCommentsController extends Controller
{

   public function store(Request $request) {
        $request->merge(["user_id"=> \Auth::user()->id,'name'=> \Auth::user()->name]);
        $comment = Comment::create($request->all());

        return Comment::where('id', $comment->id)->with(['user'])->first();

    }

    public function delete($id)
    {
        return Comment::destroy($id);
    }
}
