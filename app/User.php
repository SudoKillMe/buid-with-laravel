<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

	const DEFAULT_USER = 'techer';

    public function articles ()
    {
        return $this->hasMany('App\Article');
    }

    public function favorites ()
    {
        return $this->hasMany('App\Favorite');
    }

    public static function currentUser ()
    {
    	return session('login') 
    		? User::find(session('user')['id'])
    		: User::where(['name' => self::DEFAULT_USER])->first();
    }
}
