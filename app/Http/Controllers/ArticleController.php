<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\User;
use App\Statistic;
use App\Category;


class ArticleController extends Controller
{

    public function __construct ()
    {
        $this->middleware('userauth', ['only' => ['create', 'edit', 'destroy', 'update', 'store']]);
        $this->middleware('statistics');
    }

    /*-------------------------------------------------*/
    public function index (Request $request)
    {

        return view('article.index', $this->fetchIndexPageData());

    }

    public function category (Request $request, $id)
    {

        return view('article.index', $this->fetchIndexPageData($id));

    }

    public function archive ($archive_id)
    {

        return view('article.index', $this->fetchIndexPageData(0, $archive_id));

    }

    //get index page data
    public function fetchIndexPageData ($category_id = 0, $archive_id = 0)
    {
        $user = User::currentUser();

        $articles = $category_id || $archive_id 
                ? ($category_id
                    ? Article::getCurrentArticlesByCategory($user, $category_id)
                    : Article::getCurrentArticlesByArchive($user, $archive_id))
                : Article::getCurrentArticles($user);

        $common = CommonController::fetchIndexPageCommonData($user);

        $active = 'articles';

        return compact('articles', 'active', 'category_id', 'archive_id') + $common;

    }
     /*-------------------------------------------------*/


     /*-------------------------------------------------*/
    public function create (Request $request, $type = 1)
    {

        $data = $this->fetchEditPageData();

        return $type == 1
                ? view('article.editor', $data)
                : view('article.markdown', $data);

    }

    public function edit (Request $request, $type = 1, $article_id)
    {

        $data = $this->fetchEditPageData($article_id);

        if ( !$data['article'] ) return view('errors.404');

        return $type == 1
                ? view('article.editor', $data)
                : view('article.markdown', $data);

    }

    public function fetchEditPageData ($article_id = 0)
    {
        $categories = Category::all();

        $article = $article_id
                ? Article::find($article_id)
                : null;

        return compact('article', 'categories');
    }
     /*-------------------------------------------------*/


    /*-------------------------------------------------*/
    public function show (Request $request, $id)
    {
        $data = $this->fetchShowPageData($id);

        return view('article.detail', $data);
    }


    public function update (Request $request, $type = 1, $id)
    {
        $this->saveArticle($request, $type, $id);

        $data = $this->fetchShowPageData($id);

        return view('article.detail', $data);
    }

    public function store (Request $request, $type = 1)
    {
        $article_id = $this->saveArticle($request, $type);

        $data = $this->fetchShowPageData($article_id);

        return view('article.detail', $data);

    }

    public function saveArticle($request, $type = 1, $id = 0)
    {

        $this->validate($request, [
            'title'       => 'required|max:100',
            'content'   => 'required',
        ]);

        $user = User::currentUser();

        $article = $id
                ? Article::find($id)
                : new Article;

        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->category_id = $request->input('category');
        $article->user_id = $user['id'];
        $article->type = $type;

        $article->save();

        return $article->id;
    }

    public function fetchShowPageData ($article_id)
    {
        $article = Article::find($article_id);

        if (!$article) return view('errors.404');

        $article->view_count = $article->view_count + 1;
        $article->save();

        return compact('article');
    }
     /*-------------------------------------------------*/

    public function destroy (Request $request, $id)
    {
        $article = Article::find($id);

        $article->delete();

        return view('article.index', $this->fetchIndexPageData());
    }

    // public function rank ($user)
    // {
    //     $ranking = $user->articles()
    //             ->orderBy('view_count', 'desc')
    //             ->get();

    //     return $ranking;
    // }

    //根据日期分组，获取每月的文章数量
    // public function archives ($user)
    // {
    //     // $user = User::currentUser();

    //     $archives = Article::where('user_id', $user['id'])
    //             ->select(
    //                 DB::raw('DATE_FORMAT(created_at, "%Y年-%m月") as d'),
    //                 DB::raw('COUNT(*) as c')
    //             )->groupBy(
    //                 DB::raw('DATE_FORMAT(created_at, "%Y年-%m月")')
    //             )->get();

    //     return $archives;
    // }
    //{16-12: 12, }
    public function apiArchives ()
    {
        $user = User::currentUser();

        $where_arr = [];

        for ($i = 0; $i < 6; $i++) {
            $now = new \DateTime;
            $where_arr[] = $now->modify("-$i month")->format('Y-m');
        }
        //dd($where_arr);
        //select month(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) as m0, month(DATE_SUB(CURDATE(), INTERVAL 2 MONTH)) as m1, month(DATE_SUB(CURDATE(), INTERVAL 3 MONTH)) as m3, month(DATE_SUB(CURDATE(), INTERVAL 4 MONTH)) as m4, count(*) as c from articles group by month(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) , month(DATE_SUB(CURDATE(), INTERVAL 2 MONTH)) , month(DATE_SUB(CURDATE(), INTERVAL 3 MONTH)) , month(DATE_SUB(CURDATE(), INTERVAL 4 MONTH)) ;
        // select month(updated_at) as m1, count(*) as c from articles group by month(updated_at);
        $archives = Article::where('user_id', $user['id'])
                ->select(
                    DB::raw('DATE_FORMAT(created_at, "%Y-%m") as d'),
                    DB::raw('COUNT(*) as c')
                )->groupBy(
                    DB::raw('DATE_FORMAT(created_at, "%Y-%m")')
                )->orderBy('d', 'desc')
                ->get()->toArray();

        $result = [];

        foreach($where_arr as $k => $v) {
            foreach($archives as $archive) {
                if ($archive['d'] == $v) {
                    $result[$v] = $archive['c'];
                }
            }
            if (empty($result[$v])) {
                $result[$v] = 0;
            }

        }
        return $result;

    }


}
