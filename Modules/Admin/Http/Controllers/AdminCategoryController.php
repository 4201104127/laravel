<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;

class AdminCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::select('id','c_name','c_title_seo','c_active','c_home')->get();
        $viewData = [
            'categories' => $categories
        ];
        return view('admin::category.index', $viewData);
    }

    public function insertorupdate(RequestCategory $requestCategory, $id='')
    {
        $code = 1;
        try
        {
            $category = new Category();   
            if ($id)
            {
                $category = Category::find($id);
            }     
            $category->c_name            = $requestCategory->name;
            $category->c_slug            = str_slug($requestCategory->name);
            $category->c_icon            = str_slug($requestCategory->icon);
            $category->c_title_seo       = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->name;
            $category->c_description_seo = $requestCategory->c_description_seo;
            $category->save();
        }
        catch (\Exception $exception)
        {
            $code = 0;
            Log::error("[Error insertorupdate]".$exception->getMessage());
        }
    }

    public function create()
    {
        return view('admin::category.create');
    }

    public function store(RequestCategory $requestCategory)
    {
        $this->insertorupdate($requestCategory);
        return redirect()->back()->with('success','Thêm thành công');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::category.update',compact('category'));
    }

    public function update(RequestCategory $requestCategory, $id)
    {
        $alert = 'success';
        $text = 'Sửa thành công';
        $this->insertorupdate($requestCategory,$id);
        return redirect()->back()->with($alert, $text);
    }

    public function action(Request $request,$action,$id)
    {
        if ($action)
        {
            $category = Category::find($id);
            switch ($action)
            {
                case 'delete':
                    $alert = 'success';
                    $text = 'Xóa thành công';
                    $category->delete();
                    break;
                case 'home':
                    $alert = 'success';
                    $text = 'Cập nhật thành công';
                    $category->c_home = $category->c_home ? 0 : 1;
                    $category->save();
                    break;
                case 'status':
                    $alert = 'success';
                    $text = 'Cập nhật thành công';
                    $category->c_active = $category->c_active ? 0 : 1;
                    $category->save();
                    break;
            }
        } 
        return redirect()->back()->with($alert, $text);
    }
}
