<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $archives = $this->archive();

        return view('article.index', compact('articles', 'categories', 'archives'));
    }

    public function create ()
    {
        $categories = Category::all();

        return view('article.edit', compact('categories'));
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
        $categories = Category::all();

        if (!$article)  return view('errors.404');

        return view('article.edit', compact('article', 'categories'));
    }

    public function update (Request $request, $id)
    {
        $user = User::currentUser();

        $article = Article::find($id);

        if(!$article)  return view('errors.404');

        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_id = $user['id'];
        $article->category_id = $request->input('category');

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
        $article->category_id = $request->input('category');

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

        $archives = $this->archive();

        return view('article.index', compact('articles', 'categories', 'archives'));
    }

    //根据日期分组，获取每月的文章数量
    public function archive ()
    {
        $user = User::currentUser();

        $archives = Article::where(['user_id' => $user['id']])
                ->select(DB::raw('DATE_FORMAT(updated_at, "%Y年-%m月") as d'), DB::raw('COUNT(*) as c'))
                ->groupBy(DB::raw('DATE_FORMAT(updated_at, "%Y年-%m月")'))
                ->get();

        return $archives;
    }

}
