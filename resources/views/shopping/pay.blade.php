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
                            <li class="home">
                                <a href="{{ route('get.list.shopping.cart') }}">Giỏ hàng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Thanh toán</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="area-title area-title-header">
                <h2>Tiến hành thanh toán</h2>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="product-cart">
            <div class="container">
                <div class="row">
                    <div class="checkout-content">
                        <div class="col-md-8 check-out-blok">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a><span></span>KIỂM TRA GIỎ HÀNG</a>
                                        </h4>
                                    </div>
                                    <div id="checkoutMethod" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
                                        <div class="content-info">
                                            <div class="panel-body">
                                                <?php $stt = 1 ?>
                                                @foreach($products as $product)
                                                <div class="form-group">
                                                    <div class="col-sm-1 col-xs-1">
                                                        <p>{{ $stt++ }}</p>
                                                    </div>
                                                    <div class="col-sm-2 col-xs-2">
                                                        <img src="{{ pare_url_file($product->options->avatar) }}" width="100px" height="100px" />
                                                    </div>
                                                    <div class="col-sm-5 col-xs-5">
                                                        <div class="col-xs-12">{{ $product->name }}</div>
                                                        <div class="col-xs-12"><small>Số lượng: <span>{{ $product->qty }}</span></small></div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <b><p><span>{{ number_format($product->price,0,',','.') }}</span>đ</p></b>
                                                    </div>
                                                    <div class="col-sm-1 col-xs-1">
                                                        <a class="fa fa-times"></a>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="form-group"><hr></div>
                                                @endforeach
                                                <div class="pull-right">
                                                    <b><p style="font-size: 16px">Tổng tiền: {{ Cart::subtotal(0,',','.') }}đ</p></b>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span>
                                    <a href="{{ route('online.pay.form') }}" class="checkPageBtn pull-right">Thanh toán VNPAY</a>
                                    <a href="{{ route('paypal.form') }}" class="checkPageBtn pull-right" style="margin-right: 10px;">Thanh toán PAYPAL</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <form class="" method="post" action="">
                        @csrf
                        <div class="col-md-4 category-checkout">
                            <h5>Thông tin thanh toán</h5>
                            <ul>
                                <li>Tên khách hàng *</li>
                                <li>
                                    <input class="form-control" type="text" name="name" value="{{ get_data_user('web','name') }}">
                                </li>
                                <li>Email *</li>
                                <li>
                                    <input class="form-control" type="email" name="email" value="{{ get_data_user('web','email') }}">
                                </li>
                                <li>Số điện thoại *</li>
                                <li>
                                    <input class="form-control" type="text" name="phone" value="{{ get_data_user('web', 'phone') }}">
                                </li>
                                <li>Địa chỉ *</li>
                                <li>
                                    <input class="form-control" type="text" name="address">
                                </li>
                                <li>
                                    <span><a href="{{ route('get.list.shopping.cart') }}" class="checkPageBtn pull-left">Quay lại giỏ hàng</a></span>
                                    <span><button type="submit" class="checkPageBtn pull-right">Thanh toán</button></span>
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="clearfix"><br></div>

                <!-- div.info-section -->
            </div>
            <!-- Checkout Container -->
            <div class="clearfix"></div>
        </div><!-- product-cart -->
    </div>
@stop