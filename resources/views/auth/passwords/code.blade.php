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
                    @if(\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ \Session::get('success') }}
                        </div>
                    @endif
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
                                <p class="form-row form-row-wide">
                                    <label for="username">Nhập mã <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="code" id="code" value="" required
                                           oninvalid="this.setCustomValidity('Nhập mã')" oninput="this.setCustomValidity('')">
                                </p>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" value="Kiểm tra">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
