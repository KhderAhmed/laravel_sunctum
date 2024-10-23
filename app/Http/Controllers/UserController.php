<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        return view("users", [
            'users' => User::paginate(5),
        ]);
        # code...
    }
    public function autocomplete(Request $request)
    {
        return User::query()->where("name", "LIKe", "%{$request->search}%")->take(5)->get();
        # code...
    }
}
