<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    const EXPIRE_TIME = 60 * 24 * 30;

    public function index (Request $request)
    {
        $name = $request->cookie('user');
        $user = User::where([
            'name'     => $name,
        ])->first();

        //$user = User::find($uid);
        return view('index', compact('user')); 
    }

    public function login (Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $user = User::where(['name' => $name, 'password' => $password])->first();

        if (!$user) {
            return "用户不存在";
        }
        // return response()->view('index', compact('user'))->cookie('user', $user['id'], self::EXPIRE_TIME);
        return redirect('/')->cookie('user', $name, 20); 
    }

    public function register (Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|unique:users|max:30',
            'password'   => 'required',
            'c-password' => 'confirmed:password',
        ]);
        $name = $request->input('name');
        $password = $request->input('password');

        $user = new User;
        $user->name = $name;
        $user->password = $password;

        $user->save();

        return redirect('/')->cookie('user', $name, 20);
    }

    public function logout ()
    {
        return redirect('/')->withCookie(cookie('user', '', -1));
    }
}
