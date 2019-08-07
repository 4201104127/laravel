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
                            <li class="category3"><span>Quên mật khẩu</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="area-title">
                <h2>Quên mật khẩu</h2>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    @if(\Session::has('danger'))
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong> {{ \Session::get('danger') }}
                        </div>
                    @endif
                    <div class="customer-login my-account">
                        <form method="post" class="login" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đổi mật khẩu</h2>
                                <p class="form-row form-row-wide">
                                    <label for="password">Password <span class="required">* </span>
                                        @if($errors->has('password'))
                                            <span class="text-danger">
                                                {{$errors->first('password')}}
                                            </span>
                                        @endif
                                    </label>
                                    <input class="input-text" type="password" name="password" id="password">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">Nhập lại Password <span class="required">*</span>
                                        @if($errors->has('re_password'))
                                            <span class="text-danger">
                                                {{$errors->first('re_password')}}
                                            </span>
                                        @endif
                                    </label>
                                    <input class="input-text" type="password" name="re_password" id="re_password">
                                </p>

                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" value="Xác nhận">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
