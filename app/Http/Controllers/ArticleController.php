<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListArticle()
    {
        $articles = Article::where('a_active', Article::STATUS_PUBLIC)->simplePaginate(3);
        $articlesHot = Article::where('a_hot',Article::HOT)->simplePaginate(2);
        return view('article.index', compact('articles', 'articlesHot'));
    }

    public function getDetailArticle(Request $request, $slug, $id)
    {
        $arrayUrl = (preg_split('/(-)/i', $request->segment(2)));
        $id = array_pop($arrayUrl);
        if ($id)
        {
            $articles = Article::simplePaginate(3);
            $articleDetail = Article::find($id);
            $viewData = [
                'articles'          => $articles,
                'articleDetail'     => $articleDetail
            ];
            return view('article.detail', $viewData);
        }
        return redirect()->back();
    }
}
