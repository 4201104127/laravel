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
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="area-title">
                <h2>Giỏ hàng</h2>
            </div>
        </div>
    </div>
    <!-- Shopping Table Container -->
    <div class="cart-area-start" style="margin-top: 10px;">
        <div class="container">
            <!-- Shopping Cart Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="cart-table">
                            <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 1 ?>
                            @foreach($products as $key => $product)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td><img src="{{ pare_url_file($product->options->avatar) }}" alt="img.jpg" width="100px" height="100px"></td>
                                <td><h6>{{ $product->name }}</h6></td>
                                <td><div class="cart-price">{{ number_format($product->price,0,',','.') }}đ</div></td>
                                <td><input type="number" placeholder="{{ $product->qty }}" min="0" max="{{ $product->options->number }}"></td>
                                <td><div class="cart-subtotal">{{ number_format($product->qty * $product->price,0,',','.') }}đ</div></td>
                                <td><a href="{{ route('delete.product.shopping.cart',$key) }}"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="actions-crt" colspan="7">
                                    <div class="">
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="{{ route('home') }}">Tiếp tục mua hàng</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="">Cập nhật giỏ hàng</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="{{ route('destroy.shopping.cart') }}">Xóa giỏ hàng</a></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Table -->
            <!-- Shopping Totals -->
            <div class="shipping coupon cart-totals pull-right" style="margin-top: -20px;">
                <ul>
                    <li class="cartSubT">Tổng cộng:    <span>{{ Cart::subtotal(0,',','.') }}đ</span></li>
                    <li class="cartSubT">Thành tiền:    <span>{{ Cart::subtotal(0,',','.') }}đ</span></li>
                </ul>
                <a class="proceedbtn" href="{{ route('get.form.pay') }}">TIẾN HÀNG THANH TOÁN</a>
                <div class="multiCheckout">
                    <a href="#">Checkout with Multiple Addresses</a>
                </div>
            </div>
            <!-- Shopping Totals -->
        </div>
    </div>
    <!-- Shopping Table Container -->

@stop