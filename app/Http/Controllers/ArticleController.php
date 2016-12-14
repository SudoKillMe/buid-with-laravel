<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Category;

class ArticleController extends Controller
{

    public function __construct () 
    {
        $this->middleware('userauth', ['only' => ['create', 'edit', 'delete', 'update', 'store']]);
    }

    public function index (Request $request)
    {
        $user = User::currentUser();
        
        $articles = $user->articles;

        $categories = Category::all();

        return view('article.index', compact('articles', 'categories'));
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
        $user = User::currentUser();

        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_id = $user['id'];

        $article->save();

        return redirect()->action('ArticleController@show', compact('article'));

    }
    
    public function category (Request $request, $id)
    {
        $user = User::currentUser();

        $category = Category::find($id);
        $categories = Category::all();

        if (!$category) return view('errors.404');

        $articles = $category->articles()->where('user_id', $user['id'])->get();


        return view('article.index', compact('articles', 'categories'));
    }

}
