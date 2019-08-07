<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        if ($request->name) $products->where('p_name','like','%'.$request->name.'%');
        if ($request->cate) $products->where('p_category_id', 'like',$request->cate);
        $products = $products->orderByDesc('id')->paginate(3);
        $categoies = $this->getCategories();
        $viewData = [
            'products' => $products,
            'categories' => $categoies
        ];
        return view('admin::product.index', $viewData);
    }

    public function insertorupdate($requestProduct, $id='')
    {
        $product = new Product();
        if ($id) $product = Product::find($id);

        $product->p_name            = $requestProduct->p_name;
        $product->p_slug            = str_slug($requestProduct->p_name);
        $product->p_category_id     = $requestProduct->p_category_id;
        $product->p_price           = $requestProduct->p_price;
        $product->p_sale            = $requestProduct->p_sale;
        $product->p_content         = $requestProduct->p_content;
        $product->p_description     = $requestProduct->p_description;
        $product->p_number          = $requestProduct->p_number;
        $product->p_title_seo       = $requestProduct->p_title_seo ? $requestProduct->p_title_seo : $requestProduct->p_name;
        $product->p_description_seo = $requestProduct->p_description_seo ? $requestProduct->p_description_seo : $requestProduct->p_name;
        if ($requestProduct->hasFile('avatar'))
        {
            $file = upload_image('avatar');
            if (isset($file['name']))
            {
                $product->p_avatar = $file['name'];
            }
        }
        $product->save();
    }

    public function create()
    {
    	$categories = $this->getCategories();
        return view('admin::product.create', compact('categories'));
    }

    public function store(RequestProduct $requestProduct)
    {
        $this->insertorupdate($requestProduct);
        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = $this->getCategories();
        return view('admin::product.update', compact('product', 'categories'));
    }

    public function update(RequestProduct $requestProduct,$id)
    {
        $this->insertorupdate($requestProduct,$id);
        return redirect()->back();
    }

    public function getCategories()
    {
    	return Category::all();
    }

    public function action(Request $request,$action,$id)
    {
        if ($action)
        {
            $product = Product::find($id);
            switch ($action)
            {
                case 'delete':
                    $product->delete();
                    break;
                case 'active':
                    $product->p_active =  $product->p_active ? 0 : 1;
                    $product->save();
                    break;
                case 'hot':
                    $product->p_hot = $product->p_hot ? 0 : 1;
                    $product->save();
                    break;
            }
        }
        return redirect()->back();
    }
}
