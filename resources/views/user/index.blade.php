@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Tài khoản</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
                                <h2>Thanh công cụ</h2>
                            </div>
                        </aside>
                        <aside class="sidebar-content">
                            <ul>
                                <li style="border-bottom: 3px solid #f3f3f3; padding: 8px 0px;"><a href=""><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp; Thông tin tài khoản </a></li>
                                <li style="border-bottom: 3px solid #f3f3f3; padding: 8px 0px;"><a href=""><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp; Đổi thông tin </a></li>
                                <li style="border-bottom: 3px solid #f3f3f3; padding: 8px 0px;"><a href=""><i class="fa fa-bell"></i>&nbsp;&nbsp; Thông báo của tôi </a></li>
                                <li style="border-bottom: 3px solid #f3f3f3; padding: 8px 0px;"><a href=""><i class="fa fa-sticky-note"></i>&nbsp;&nbsp;&nbsp; Quản lý đơn hàng </a></li>
                                <li style="border-bottom: 3px solid #f3f3f3; padding: 8px 0px;"><a href=""><i class="fa fa-heart"></i>&nbsp;&nbsp;&nbsp; Sản phẩm yêu thích </a></li>
                                <li style="border-bottom: 3px solid #f3f3f3; padding: 8px 0px;"><a href=""><i class="fa fa-comment"></i>&nbsp;&nbsp;&nbsp; Nhận xét </a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 text-left">
                    Hello
                </div>
            </div>
        </div>
    </div>
@stop