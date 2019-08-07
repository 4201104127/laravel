@extends('layouts.app')
@section('content')
    <!-- breadcrumbs area start -->
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
                            <li class=""><span>{{ $cateProduct->c_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
                                <h2>Lọc điều kiện</h2>
                            </div>
                        </aside>

                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Khoảng giá</h6>
                            </div>
                            <ul>
                                <li><a href="{{ request()->fullUrlWithQuery(['price'=>1]) }}"> Dưới 1tr </a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['price'=>2]) }}"> 1.000.000 - 3.000.000 đ </a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['price'=>3]) }}"> 3.000.000 - 5.000.000 đ </a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['price'=>4]) }}"> 5.000.000 - 7.000.000 đ </a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['price'=>5]) }}"> 7.000.000 - 10.000.000 đ </a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['price'=>6]) }}"> lớn hơn 10.000.000 đ </a></li>
                            </ul>
                        </aside>

                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
                                <h2>Tags</h2>
                            </div>
                            <div class="exp-tags">
                                <div class="tags">
                                    <a href="#">Nokia</a>
                                    <a href="#">Iphone</a>
                                    <a href="#">Giá rẻ</a>
                                    <a href="#">hàng cũ</a>
                                    <a href="#">Đồ cũ</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-xs-12 nopadding-left ">
                                <form class="tree-most" id="form_order" method="get">
                                    <div class="orderby-wrapper pull-right">
                                        <label style="margin-top: 4px"><b>Sắp xếp : </b></label>
                                        <select name="orderby" class="orderby">
                                            <option  value="" selected="selected"> -- Lựa chọn -- </option>
                                            <option  value="">Mặc định</option>
                                            <option {{ Request::get('orderby') == "desc" ? "selected='selected'" : "" }} value="desc">Mới nhất</option>
                                            <option {{ Request::get('orderby') == "asc" ? "selected='selected'" : "" }} value="asc">Cũ nhất</option>
                                            <option {{ Request::get('orderby') == "price_up" ? "selected='selected'" : "" }} value="price_up">Giá tăng dần</option>
                                            <option {{ Request::get('orderby') == "price_down" ? "selected='selected'" : "" }} value="price_down">Giá giảm dần</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab first-sale">
                                    @foreach($product as $pro)
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="two-product">
                                            <!-- single-product start -->
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="{{ route('get.detail.product',[$pro->p_slug,$pro->id]) }}">
                                                        <img class="primary-image" src="{{ asset(pare_url_file($pro->p_avatar)) }}" alt="" />
                                                        <img class="secondary-image" src="{{ asset(pare_url_file($pro->p_avatar)) }}" alt="" />
                                                    </a>
                                                    <div class="action-zoom">
                                                        <div class="add-to-cart">
                                                            <a href="{{ route('get.detail.product',[$pro->p_slug,$pro->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <div class="add-to-wishlist">
                                                                    <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="compare-button">
                                                                    <a href="http://laravel.codethue.net/shopping/add/2" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="quickviewbtn">
                                                                <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($pro->p_price,0,',','.') }}đ</span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="{{ route('get.detail.product',[$pro->p_slug,$pro->id]) }}">{{ $pro->p_name }}</a></h2>
                                                    <p>{{ $pro->p_description }}</p>
                                                </div>
                                            </div>
                                            <!-- single-product end -->
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- list view -->
                        <!-- shop toolbar start -->
                        <div class="shop-content-bottom">
                            <div class="shop-toolbar btn-tlbr">
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <div class="pages">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop toolbar end -->
                    </div>
                </div>
                <!-- right sidebar end -->
            </div>
        </div>
    </div>
    <!-- shop-with-sidebar end -->
    <!-- Brand Logo Area Start -->

@stop
@section('script')
    <script>
        $(function () {
            $(".orderby").change(function () {
                $("#form_order").submit();
            })
        })
    </script>
@stop