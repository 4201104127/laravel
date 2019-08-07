@extends('layouts.app')
@section('meta')
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="When Great Minds Don’t Think Alike" />
    <meta property="og:description"        content="How much does culture influence creative thinking?" />
    <meta property="og:image"              content="{{ pare_url_file($productDetail->p_image) }}" />
@stop
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
                            <li class="home">
                                <a href="">{{ $productDetail->category->c_name }}</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $productDetail->p_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-area" id="content_product" data-id="{{ $productDetail->id }}">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <div style="height:450px;width:450px;" class="zoomWrapper">
                                    <img id="zoom1" src="{{ asset(pare_url_file($productDetail->p_avatar)) }}" alt="big-1" style="position: absolute;">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h1 class="product-name"><a href="#">{{ $productDetail->p_name }}</a></h1>
                                <div class="rating-price">
                                    <div class="pro-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <a><i class="fa fa-star fa-lg"></i></a>
                                        @endfor
                                        <a href="#rating"><i>({{$productDetail->p_total_rating}} đánh giá)</i></a>
                                    </div>
                                    <div class="price-boxes">
                                        <span class="new-price">{{ number_format($productDetail->p_price,0,',','.') }}đ</span>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p>{{ $productDetail->p_description }}</p>
                                </div>
                                <p class="availability in-stock">Availability: <span>In stock</span></p>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Số lượng:</label>
                                            <input type="text" name="qty" id="qty" maxlength="12" value="1"
                                                   class="input-text qty">
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">Add to cart</a>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" data-toggle="tooltip" title=""
                                                   data-original-title="Add to Wishlist"><i class="fa fa-star"></i></a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="#" data-toggle="tooltip" title=""
                                                   data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <a href="#"><img src="" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab"><b>Chi tiết sản phẩm</b></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                <p>{{ $productDetail->p_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab" id="rating">
                    <ul class="details-tab">
                        <li><a href="" data-toggle="tab"><b>Đánh giá ({{$productDetail->p_total_rating}})</b></a></li>
                    </ul>
                    <div class="col-xs-12 col-md-6" style="padding: 0px;">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-xs-12 col-md-4 text-center">
                                    <?php $avetotal = 0;
                                        if ($productDetail->p_total_rating)
                                        {
                                            $avetotal = round($productDetail->p_total_number / $productDetail->p_total_rating,1);
                                        }
                                    ?>
                                    <h1 class="rating-num">{{$avetotal}}</h1>
                                    <div class="">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="pro-rating"><a class="fa fa-star"></a></span>
                                        @endfor
                                    </div>
                                    <div class="rating-user">
                                        <span class="glyphicon glyphicon-user"></span> {{$productDetail->p_total_rating}} đánh giá
                                    </div>
                                    <div class="">
                                        <a class="js_rating_action btn btn-default btn-xs">Gửi đánh giá</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8" style="padding: 0px; margin-top: 10px;">
                                    @foreach($arrayRatings as $key => $value)
                                        <?php round($ave = ($value['total'] / $productDetail->p_total_rating)*100)?>
                                    <div class="clearfix">
                                        <div class="col-xs-2 col-md-2 text-center">
                                            <span class="pro-rating"><a class="fa fa-star"></a></span> {{$key}}
                                        </div>
                                        <div class="col-xs-8 col-md-8" style="margin-top: 2px;">
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: {{$ave}}%; background: #777">
                                                    <span class="sr-only">{{$ave}}%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-md-2" style="padding: 0px">({{$value['total']}})</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(get_data_user('web') !== '')
                <div class="col-xs-12 col-md-12 list_start list_start_hidden">
                    <span><b>Đánh giá:&nbsp;</b></span>
                    @for($i = 1; $i <= 5; $i++)
                        <span class="pointer-hand">
                            <a><i class="fa fa-star" data-key="{{$i}}"></i></a>
                        </span>
                    @endfor
                    <span class="list_text" id="list_text">Nhập đánh giá</span>
                    <input type="hidden" value="" class="number_rating">
                    <div class="form-group clearfix" style="padding-top: 15px;">
                        <textarea class="form-control" id="ra_content" style="background: whitesmoke" required="Nhập đánh giá"></textarea>
                        <a href="{{ route('post.rating.product',$productDetail->id) }}" class="checkPageBtn pull-right js_rating_product" style="margin-top: 8px; text-transform: none; height: 27px; font-family: Arial; line-height: 27px">Gửi</a>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="col-xs-12 col-md-12 list_start list_start_hidden" style="padding-bottom: 15px; padding-top: 15px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px">
                        <i style="padding-top: 5px">Bạn chưa đăng nhập...</i>
                        <i><a href="{{ route('get.register') }}" style="color: black"> Đăng ký </a> hoặc <a href="{{ route('get.login') }}" style="color: black">Đăng nhập</a></i>
                    </div>
                </div>
            @endif
            @if(isset($ratings))
            <div class="single-product-tab">
                @foreach($ratings as $rating)
                <div class="col-xs-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding: 7px 15px;">
                            <img class="img-rounded" width="20px" height="20px" style="display: inline-block" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                            <span class="text-muted">&nbsp; {{ $rating->user->name }} &nbsp;</span>
                            <span style="color: #777">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star {{ $i <= $rating->ra_number ? 'rating_active' : '' }}" data-key="{{$i}}"></i>
                                @endfor
                            </span>
                            <span class="text-muted pull-right">{{ time_elapsed_string($rating->created_at) }}</span>
                        </div>
                        <div class="panel-body">
                            <p>{{ $rating->ra_content }}</p>
                            @if($rating->ra_user_id == get_data_user('web'))
                                <a class="btn btn-xs btn-default pull-right"><i class="fa fa-remove"></i>&nbsp;Xóa</a>
                            @endif
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <br>
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $(function () {
            let listStart = $(".list_start .fa");
            let listStart0 = $(".list_start .fa");
            listRatingText = {
                1 : 'Không thích',
                2 : 'Tạm được',
                3 : 'Bình thường',
                4 : 'Tốt',
                5 : 'Rất tốt',
            };
            listStart0.mouseover(function () {
                let $this = $(this);
                let number = $this.attr('data-key');
                $.each(listStart, function (key, value) {
                    if (key + 1 <= number)
                    {
                        $(this).addClass('pro-ratinga')
                    }
                });
            });
            listStart0.mouseleave(function () {
                if (listStart0.hasClass('pro-ratinga'))
                {
                    listStart0.removeClass('pro-ratinga')
                }
            });
            listStart.click(function () {
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active');
                $(".number_rating").val(number);
                $.each(listStart, function (key, value) {
                   if (key + 1 <= number)
                   {
                       $(this).addClass('rating_active')
                   }
                });
                $(".list_text").text('').text(listRatingText[$this.attr('data-key')]).show();
            });
            $(".js_rating_action").click(function (event) {
                event.preventDefault();
                if ($(".list_start").hasClass('list_start_hidden'))
                {
                    $(".list_start").slideToggle().addClass('active').removeClass('list_start_hidden')
                }
                else
                {
                    $(".list_start").slideToggle().addClass('list_start_hidden').removeClass('active');
                }
            });
            $(".js_rating_product").click(function (event) {
                event.preventDefault();
                let content = $("#ra_content").val();
                let number = $(".number_rating").val();
                if(!content || !number)
                {
                    $.notify("Bạn chưa nhập đánh giá","warn");
                }
                let url = $(this).attr('href');
                if (content && number)
                {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            ra_number: number,
                            ra_content: content,
                        }
                    }).done(function (result) {
                        if (result.code == 1)
                        {
                            alert("Cảm ơn bạn đã đánh giá!");
                            location.reload();
                        }
                        else if (result.code == 0)
                        {
                            $.notify("Ban đã đánh giá sản phẩm này","info");
                        }
                    });
                }
            });

            let idProduct = $("#content_product").attr('data-id');
            let products = localStorage.getItem('products');
            if (products == null)
            {
                arrayProduct = new Array();
                arrayProduct.push(idProduct);
                localStorage.setItem('products',JSON.stringify(arrayProduct));
            }
            else
            {
                products = $.parseJSON(products);
                if (products.indexOf(idProduct) == -1)
                {
                    products.push(idProduct);
                    localStorage.setItem('products',JSON.stringify(products))
                }
            }
        });
    </script>
    <script>
        $("a[href*='#']").click(function(e) {
            e.preventDefault();
            var position = $($(this).attr("href")).offset().top;
            $("body, html").animate({
                scrollTop: position
            } /* speed */ );
        });
    </script>
@stop