<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class ApiRolesController extends Controller
{
    public function index()
    {
       return Role::all();
    }
}
