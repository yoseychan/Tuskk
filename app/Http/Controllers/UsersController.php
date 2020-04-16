<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with(['role'])->get();
        return view('admin.users', compact('users'));
    }

     public function show($id)
    {
       $author = User::where('id', $id)->with(['articles' => function ($queryOne) {
            $queryOne->with(['category', 'tags', 'comments' => function ($queryTwo) {
                $queryTwo->with(['user'])->orderBy('created_at', 'desc');
            }]);
        }])->orderBy('created_at', 'desc')->first();

         return view("profile", compact("author"));
    }
}
