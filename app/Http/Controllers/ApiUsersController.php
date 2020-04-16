<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiUsersController extends Controller
{
    public function index()
    {
        return User::where('role_id', 2)->get();
    }


}
