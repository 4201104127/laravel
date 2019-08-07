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
                            <li class="category3"><span>Bài viết</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-9">
                <h5>Bài viết</h5>
                @include('components.article')
            </div>
            <div class="col-sm-5 col-md-3">
                <h5>Bài viết nổi bật</h5>
                @include('components.hot_article')
            </div>
        </div>
    </div>
    <br>
@stop