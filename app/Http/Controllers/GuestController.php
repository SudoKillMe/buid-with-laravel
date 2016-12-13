<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GuestController extends Controller
{
	const GUEST_NAME = 'techer';

    public function login () 
    {
    	$guest = User::where(['name' => self::GUEST_NAME])->first();
 
    	session(['guest' => $guest]);

    	return redirect('/');
    }
}
