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
                            <li class="category3"><span>Liên hệ</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us-area">
                        <!-- google-map-area start -->
                        <div class="google-map-area">
                            <!--  Map Section -->
                        </div>
                        <!-- google-map-area end -->
                        <!-- contact us form start -->
                        <div class="contact-us-form">
                            <div class="sec-heading-area">
                                <h2>Thông tin liên hệ</h2>
                            </div>
                            <div class="contact-form">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="form-top">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-10">
                                            <label>Tiêu đề <sup>*</sup></label>
                                            <input type="text" class="form-control" name="co_title" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-10">
                                            <label>Tên đầy đủ <sup>*</sup></label>
                                            <input type="text" class="form-control" name="co_name" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Email <sup>*</sup></label>
                                            <input type="email" class="form-control" name="co_email" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Số điện thoại <sup>*</sup></label>
                                            <input type="text" class="form-control" name="co_phone" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Phản hồi <sup>*</sup></label>
                                            <textarea class="yourmessage" name="co_content" required></textarea>
                                        </div>
                                        <div class="submit-form form-group col-sm-12 col-lg-10 submit-review">
                                            <button type="submit" class="add-tag-btn">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- contact us form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop