<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        if ($id = array_pop($url))
        {
            $product = Product::where([
                'p_category_id' => $id,
                'p_active' => Product::STATUS_PUBLIC
            ]);

            if ($request->price)
            {
                $price = $request->price;
                switch ($price)
                {
                    case '1':
                        $product->where('p_price','<',1000000);
                        break;
                    case '2':
                        $product->whereBetween('p_price',[1000000,3000000]);
                        break;
                    case '3':
                        $product->whereBetween('p_price',[3000000,5000000]);
                        break;
                    case '4':
                        $product->whereBetween('p_price',[5000000,7000000]);
                        break;
                    case '5':
                        $product->whereBetween('p_price',[7000000,10000000]);
                        break;
                    case '6':
                        $product->where('p_price','>',10000000);
                        break;
                }
            }
            if ($request->orderby)
            {
                $orderby = $request->orderby;
                switch ($orderby)
                {
                    case 'desc':
                        $product = $product->orderBy('id','DESC');
                        break;
                    case 'asc':
                        $product = $product->orderBy('id','ASC');
                        break;
                    case 'price_up':
                        $product = $product->orderBy('p_price','ASC');
                        break;
                    case 'price_down':
                        $product = $product->orderBy('p_price','DESC');
                        break;
                    default:
                        $product = $product->orderBy('id','DESC')->paginate(6);
                        break;
                }
            }
            $product = $product->orderBy('id','DESC')->paginate(6);
            $cateProduct = Category::find($id);

            $viewData = [
                'product' => $product,
                'cateProduct' => $cateProduct,
            ];
            return view('product.index', $viewData);
        }
        return redirect('/');
    }
}
