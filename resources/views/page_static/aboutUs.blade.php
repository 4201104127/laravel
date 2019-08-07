@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Về chúng tôi</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <p>{{ isset($page) ? $page->ps_name : 'Đang cập nhật...' }}</p>
                    <p>{!! isset($page) ? $page->ps_content : 'Đang cập nhật...' !!}</p>
                </div>
            </div>
        </div>
    </div>
@stop