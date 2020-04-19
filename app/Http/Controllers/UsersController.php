<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            if (Gate::allows('manage-users', Auth::user())) {
                $users = User::with(['role'])->get();
                return view('admin.users', compact('users'));
            }
            return abort('403');
        }
        return abort('403');
    }

    public function show($id)
    {
        $author = User::where('id', $id)->with(['articles' => function ($queryOne) {
            $queryOne->with(['category', 'comments' => function ($queryTwo) {
                $queryTwo->with(['user'])->orderBy('created_at', 'desc');
            }])->orderBy('created_at', 'desc');
        }])->first();

        return view("profile", compact("author"));
    }

        public function forEdit($id)
    {
         $user = User::where('id', $id)->first();

         return view("edituser",  compact("user"));
    }
}
