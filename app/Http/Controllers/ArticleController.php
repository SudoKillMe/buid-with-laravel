<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function edit (Request $request, Article $article)
    {
        return view('article.edit', compact('article'));
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
