<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class ArticleController extends Controller
{
    public function edit (Request $request, Article $article)
    {
        $name = $request->cookie('user');
        
        $user = User::where([
            'name'     => $name,
        ])->first();
        return view('article.edit', compact('article', 'user'));
    }

    public function save (Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        $article = new Article;
        $article->title = $title;
        $article->content = $content;
    }

    public function update (Request $request, Article $article)
    {
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();
        return redirect('/');
        return view('index', compact('article'));
    }
}
