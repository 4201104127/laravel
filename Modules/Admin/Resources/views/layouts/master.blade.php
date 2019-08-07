<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="frontend/image/favicon.ico">
        <link href="{{ asset('css/bootstrap.min.css') }}">
        <title>Admin</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('theme_admin/css/font-awesome.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <span><a class="navbar-brand">Admin</a><a class="navbar-brand" href="{{route('admin.logout')}}">Log out!</a></span>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="{{ \Request::route()->getName() == 'admin.home' ? 'active' : '' }}"><a href="{{ route('admin.home') }}">Trang tổng</a></li>
                        <li class="{{ (\Request::route()->getName() == 'admin.get.list.category' or \Request::route()->getName() == 'admin.get.create.category' or \Request::route()->getName() == 'admin.get.edit.category') ? 'active' : '' }}"><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
                        <li class="{{ (\Request::route()->getName() == 'admin.get.list.product' or \Request::route()->getName() == 'admin.get.create.product' or \Request::route()->getName() == 'admin.get.edit.product') ? 'active' : '' }}"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
                        <li class="{{ \Request::route()->getName() == 'admin.get.list.rating' ? 'active' : '' }}"><a href="{{ route('admin.get.list.rating') }}">Đánh giá</a></li>
                        <li class="{{ (\Request::route()->getName() == 'admin.get.list.article' or \Request::route()->getName() == 'admin.get.create.article' or \Request::route()->getName() == 'admin.get.edit.article') ? 'active' : '' }}"><a href="{{ route('admin.get.list.article') }}">Bài viết</a></li>
                        <li class="{{ \Request::route()->getName() == 'admin.get.list.transaction' ? 'active' : '' }}"><a href="{{ route('admin.get.list.transaction') }}">Đơn hàng</a></li>
                        <li class="{{ \Request::route()->getName() == 'admin.get.list.user' ? 'active' : '' }}"><a href="{{ route('admin.get.list.user') }}">Thành viên</a></li>
                        <li class="{{ (\Request::route()->getName() == 'admin.get.list.page_static' or \Request::route()->getName() == 'admin.get.create.page_static' or \Request::route()->getName() == 'admin.get.edit.page_static') ? 'active' : '' }}"><a href="{{ route('admin.get.list.page_static') }}">Page static</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @if(\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ \Session::get('success') }}
                        </div>
                    @endif
                    @if(\Session::has('danger'))
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Danger!</strong> {{ \Session::get('danger') }}
                        </div>
                    @endif
                    @if(\Session::has('warn'))
                        <div class="alert alert-warning alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong> {{ \Session::get('warn') }}
                        </div>
                    @endif
                    @if(\Session::has('info'))
                        <div class="alert alert-info alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Info!</strong> {{ \Session::get('info') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{ asset('theme_admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('theme_admin/js/rating.js') }}"></script>
        <script src="{{ asset('theme_admin/js/highcharts.js') }}"></script>
        <script src="{{ asset('theme_admin/js/data.js') }}"></script>
        <script src="{{ asset('theme_admin/js/drilldown.js') }}"></script>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output_img');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
    @yield('script')
    </body>
</html>