@extends('layouts.app')
@section('meta')
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="When Great Minds Don’t Think Alike" />
    <meta property="og:description"        content="How much does culture influence creative thinking?" />
    <meta property="og:image"              content="{{ pare_url_file('') }}" />
@stop
@section('content')
    @include('components.slide')
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            <!-- single-product start -->
                            @if(isset($productHot))
                                @foreach($productHot as $pHot)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-product first-sale">
                                            <div class="product-img">
                                                @if($pHot->p_sale > 0)
                                                    <span class="p-img">{{ $pHot->p_sale }}%</span>
                                                @endif
                                                <a href="{{ route('get.detail.product',[$pHot->p_slug,$pHot->id]) }}">
                                                    <img class="primary-image"
                                                         src="{{ pare_url_file($pHot->p_avatar) }}" alt=""/>
                                                    <img class="secondary-image"
                                                         src="{{ pare_url_file($pHot->p_avatar) }}" alt=""/>
                                                </a>
                                                <div class="action-zoom">
                                                    <div class="add-to-cart">
                                                        <a href="{{ route('get.detail.product',[$pHot->p_slug,$pHot->id]) }}"
                                                           title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="action-buttons">
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" title="Add to Wishlist"><i
                                                                            class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                @if($pHot->p_number < 1)
                                                                    <a onclick="notiwarn()" title="Sản phẩm đã hết hàng"
                                                                       disabled="disable"><i class="icon-bag"></i></a>
                                                                @else
                                                                    <a onclick="notisuccess()"
                                                                       href="{{ route('add.shopping.cart', $pHot->id) }}"
                                                                       title="Thêm vào giỏ"><i class="icon-bag"></i></a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="quickviewbtn">
                                                            <a class="notify2" onclick="notify()"
                                                               title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    <span class="new-price">{{ number_format($pHot->p_price,0,',','.') }} đ</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">{{ $pHot->p_name }}</a></h2>
                                                <p>{{ $pHot->p_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    <div id="view_product"></div>
    <!-- latestpost area start -->
    <div class="latest-post-area">
        <div class="container">
            <div class="area-title">
                <h2>Bài viết mới</h2>
            </div>
            @if(isset($articleNews))
                <div class="row">
                    <div class="all-singlepost">
                        <!-- single latestpost start -->
                        @foreach($articleNews as $article)
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-post" style="margin-bottom: 40px">
                                    <div class="post-thumb">
                                        <a href="#">
                                            <img class="post-article"
                                                 src="{{ asset(pare_url_file($article->a_avatar)) }}"/>
                                        </a>
                                    </div>
                                    <div class="post-thumb-info">
                                        <div class="post-time">
                                            <a href="">{{ $article->a_name }}</a>
                                        </div>
                                        <div class="postexcerpt">
                                            <p class="para-article">{{ $article->a_description }}</p>
                                            <a href="#" class="read-more">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- single latestpost end -->
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- latestpost area end -->
    <!-- block category area start -->
    <div class="block-category">
        <div class="container">
            <div class="row">
                @if(isset($categoriesHome))
                    @foreach($categoriesHome as $categoryHome)
                    <div class="col-md-4">
                    <div class="block-title">
                        <h2>{{ $categoryHome->c_name }}</h2>
                    </div>
                    <!-- block carousel start -->
                        @if(isset($categoryHome->products))
                        <div class="block-carousel owl-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper">
                                <div class="owl-item" style="width: 420px;">
                                    <div class="block-content">
                                        <!-- block start -->
                                        @foreach($categoryHome->products as $product)
                                        <div class="single-block">
                                            <div class="block-image pull-left">
                                                <a href="product-details.html"><img src="{{ pare_url_file($product->p_avatar) }}" width="170px" height="170px" alt=""></a>
                                            </div>
                                            <div class="category-info">
                                                <h3><a href="product-details.html">{{ $product->p_name }}</a></h3>
                                                <p>{{ $product->_ }}..</p>
                                                <div class="cat-price">{{ number_format($product->p_price,0,',','.') }} <span class="old-price">{{ $product->p_price }}</span>
                                                </div>
                                                <div class="cat-rating">
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- block end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    <!-- block carousel end -->
                </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- block category area end -->
    <!-- testimonial area start -->
    <div id="facebookshare" class="fb-share-button" data-href="" data-layout="button_count" data-size="small">
        <a id="linkfacebook" target="_blank" href="" class="fb-xfbml-parse-ignore">Chia sẻ</a>
    </div>
@stop

@section('script')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });
            let routeRenderView = '{{ route('view.product') }}';
            check = false;
            $(document).on('scroll',function () {
                if ($(window).scrollTop() >= 1 && check === false) {
                    check = true;
                    let products = localStorage.getItem('products');
                    products = $.parseJSON(products);
                    if (products.length > 0){
                        $.ajax({
                            url: routeRenderView,
                            method  : "POST",
                            data    : { id: products},
                            success : function (result) {
                                $('#view_product').html('').append(result.data)
                            }
                        })
                    }
                }
            })
        })
    </script>
@stop