<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{

    public function user () 
    {
        return $this->belongsTo('App\User');
    }

    public function category ()
    {
    	return $this->belongsTo('App\Category');
    }

    public static function getCurrentArticles ($user) 
    {
    	return $user->articles;
    }

    public static function getCurrentArticlesByCategory ($user, $category)
    {
    	return $user->articles()
    			->where('category', $category)
    			->get();
    }

    public static function getCurrentArticlesByArchive ($user, $archive)
    {
    	return $user->articles()
    			->where(
    				DB::raw('DATE_FORMAT(updated_at, "%Y年-%m月")'),
    				$archive
    			)->get();
    }

    public static function archive ($user)
    {
    	return $user->articles()
    			->select(
    				DB::raw('DATE_FORMAT(created_at, "%Y年-%m月") as d'),
    				DB::raw('COUNT(*) as c')
    			)->groupBy(
    				DB::raw('DATE_FORMAT(created_at, "%Y年-%m月")')
    			)->get();
    }

    public static function ranking ($user) 
    {
    	return $user->articles()
    			->orderBy('view_count', 'DESC')
    			->get();
    }

}
