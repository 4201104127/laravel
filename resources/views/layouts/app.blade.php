<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta name="csrf-token" content="wU11tJy6hdoVqjpoShAZKqIAEQoGOpdbmFUyM5bT" />

    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/font-icon.css') }}">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/nivo-slider.css') }}" type="text/css" />

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preview.css') }}" type="text/css" media="screen" />
    @yield('meta')
</head>
<body class="home-one">
<style>

</style>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5d349add6d8083122839486d/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v3.3'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="697683027326608">
</div>
@if(get_data_user('web') && get_data_user('web','active') == 0)
    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Danger!</strong> Tài khoản của bạn chưa được xác thực. Vui lòng kiểm tra Email để kích hoạt!
    </div>
@endif
@include('components.header')

@yield('content')

@include('components.footer')

<script>
    function notiwarn() {
        $.notify("Sản phẩm đã hết", "warn");
    }
    function notisuccess() {
        $.notify("Thêm thành công", "success");
    }
    function notidanger() {
        $.notify("Không thành công", "danger");
    }
    function notiinfo() {
        $.notify("Thông tin", "info");
    }
    var url = "https://www.facebook.com/sharer/sharer.php?u=" + window.location.href + "&amp;src=sdkpreparse";
    document.getElementById("facebookshare").setAttribute("data-href",window.location.href);
    document.getElementById("linkfacebook").setAttribute("href", url);
</script>

<!-- jquery-1.11.3.min js
============================================ -->
<script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"></script>

<!-- bootstrap js
============================================ -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Nivo slider js
============================================ -->
<script src="{{ asset('js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/home.js') }}" type="text/javascript"></script>

<!-- owl.carousel.min js
============================================ -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>

<!-- price-slider js
============================================ -->
<script src="{{ asset('js/price-slider.js') }}"></script>

<!-- elevateZoom js
============================================ -->
<script src="{{ asset('js/jquery.elevateZoom-3.0.8.min.js') }}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{ asset('js/jquery.meanmenu.js') }}"></script>

<!-- wow js
============================================ -->
<script src="{{ asset('js/wow.js') }}"></script>

<!-- plugins js
============================================ -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/print.min.js') }}"></script>


<!-- main js
============================================ -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
<script src="{{ asset('js/notify.min.js') }}"></script>
<script src="{{ asset('js/notify.js') }}"></script>

@yield('script')

</body>
</html>