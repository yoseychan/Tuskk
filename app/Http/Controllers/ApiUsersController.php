<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApiUsersController extends Controller
{
    public function index()
    {
        return User::where('role_id', 2)->get();
    }

    public function delete($id)
    {
        if (Auth::user()) {
            if (Gate::allows('manage-users', Auth::user())) {
                return User::destroy($id);
            }
        }
    }

    public function update(Request $request, $id)
    {
        return User::where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),

        ]);
    }


}
