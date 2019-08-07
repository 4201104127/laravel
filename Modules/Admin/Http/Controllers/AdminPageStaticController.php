<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\PageStatic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminPageStaticController extends Controller
{
    public function index()
    {
        $pages = PageStatic::all();
        return view('admin::page_static.index',compact('pages'));
    }

    public function create()
    {
        return view('admin::page_static.create');
    }

    public function store(Request $request)
    {
        $this->createOrupdate($request);
        return redirect()->back()->with("success","Thêm thành công");
    }

    public function edit($id)
    {
        $page = PageStatic::find($id);
        return view('admin::page_static.update',compact('page'));
    }

    public function update(Request $request)
    {
        $this->createOrupdate($request);
        return redirect()->back()->with("success","Sửa thành công");
    }

    public function createOrupdate($request, $id='')
    {
        $page = new PageStatic();
        if ($id) $page = PageStatic::find($id);
        $page->ps_name      = $request->ps_name;
        $page->ps_content   = $request->ps_content;
        $page->ps_type      = $request->ps_type;
        $page->save();
    }
}
