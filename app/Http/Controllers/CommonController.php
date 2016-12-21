<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Statistic;
use App\Category;

class CommonController extends Controller
{
    public static function fetchIndexPageCommonData ($user)
    {
    	
    	$categories = Category::all();

    	$statistics = Statistic::statistics();

    	$archives = Article::archive($user);

    	$ranking = Article::ranking($user);

    	return compact('categories', 'statistics', 'archives', 'ranking');

    }
}
