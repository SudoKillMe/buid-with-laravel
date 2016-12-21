<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
use App\User;

class FavoriteController extends Controller
{
	public function __construct ()
	{
		$this->middleware('userauth', ['only' => ['store', 'destroy']]);
	}

    public function index (Request $request)
    {
    	return view('article.index', $this->fetchIndexPageData());
    }

    public function fetchIndexPageData ()
    {
    	$user = User::currentUser();

    	$favorites = Favorite::all();

    	$common = CommonController::fetchIndexPageCommonData($user);

    	$active = 'favorites';

    	return compact('favorites', 'active') + $common;
    }

    public function store (Request $request)
    {
    	$user = User::currentUser();

    	$favorite = new Favorite;

    	$favorite->name = $request->input('fav-name');
    	$favorite->url = $request->input('fav-url');
    	$favorite->remark = $request->input('fav-remark');
    	$favorite->user_id = $user['id'];

    	$favorite->save();

    	return redirect('/favorites');

    }

    public function destroy (Request $request, $favorite_id)
    {
    	$favorite = Favorite::find($favorite_id);

    	$favorite->delete();

    	return redirect('/favorites');
    }
}
