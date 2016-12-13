<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;


class ArticleController extends Controller
{

    public function __construct () 
    {
        $this->middleware('userauth', ['only' => ['create', 'edit', 'delete']]);
        // $this->middleware('guestauth');
    }

    public function index (Request $request)
    {
        $user = session('user')
        $articles = Article::all();

        return view('article.index', compact('articles'));
    }

    public function create () 
    {
        return view('article.edit');
    }

    public function show (Request $request, $id) 
    {
        $article = Article::find($id);
        
        if (!$article)  return view('errors.404');

        $article->view_count = $article->view_count + 1;
        $article->save();

        return view('article.detail', compact('article'));
    }

    public function edit (Request $request, $id)
    {
        $article = Article::find($id);
        $article->content = $article->content;
        if (!$article)  return view('errors.404');
        
        return view('article.edit', compact('article'));
    }

    public function update (Request $request, Article $article)
    {   
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        
        $article->save();

        return redirect()->action('ArticleController@show', compact('article'));
    }

    public function store (Request $request)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        $article->save();

        return redirect()->action('ArticleController@show', compact('article'));

    }
    
    public function save (Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        $article = new Article;
        $article->title = $title;
        $article->content = $content;
    }

}
