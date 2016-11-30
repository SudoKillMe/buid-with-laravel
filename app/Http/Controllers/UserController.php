<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function index ()
    {
        // $users = User::all();
        // $articles = [];
        // foreach ($users as $user) {
        //     $articles[] = $user->articles;
        // }
        return view('index');
    }
}
