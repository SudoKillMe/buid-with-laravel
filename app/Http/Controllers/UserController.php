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

            session(['user' => $user, 'login' => 1]);
            //dd($request->session());
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
            // 'c-password' => 'confirmed:password',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->password = $request->input('password');

        $user->save();

        session(['user' => $user, 'login' => 1]);
        return redirect('/');

    }

    public function logout (Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }


}
