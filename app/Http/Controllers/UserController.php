<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{

    const EXPIRE_TIME = 60 * 24 * 30;

    public function loginPage (Request $request)
    {
        return view('auth.login');
    }

    public function registerPage (Request $request)
    {
        return view('auth.register');
    }

    public function login (Request $request)
    {
        $user = User::where(['name' => $request->input('name')])->first();

        if ($user && Hash::check($request->input('password'), $user['password'])) {

            session(['user' => $user]);
            return redirect('/');
        }

        if (!$user) {
            return back()
                ->withInput(['name' => $request->input('name')])
                ->withErrors(['name_error' => '用户名不存在']);
        }

        return back()
            ->withInput(['name' => $request->input('name')])
            ->withErrors(['pass_error' => '密码错误']);
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

    public function logout (Request $request)
    {
        $request->session()->forget('user');
        return redirect('/');
    }

    
}
