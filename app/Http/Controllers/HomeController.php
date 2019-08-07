<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ShoppingCartController;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $productHot = Product::where([
            'p_hot' => Product::HOT_ON,
            'p_active' => Product::STATUS_PUBLIC
        ])->limit(6)->get();

        $articleNews = Article::orderBy('id','DESC')->limit(6)->get();
        $categoriesHome = Category::with('products')
            ->where('c_home',Category::HOME)->limit(3)->get();
        $viewData = [
            'productHot'    => $productHot,
            'articleNews'   => $articleNews,
            'categoriesHome'    => $categoriesHome
        ];
        return view('home.index', $viewData);
    }

    public function renderViewProduct(Request $request)
    {
        if ($request->ajax())
        {
            $listId = $request->id;
            $products = Product::whereIn('id', $listId)->limit(4)->get();
            $html = view('components.view_product', compact('products'))->render();
            return response()->json(['data' => $html] );
        }
    }
}
