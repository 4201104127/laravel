<!Doctype html>
<head>
    <title>Admin</title>
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('theme_admin/css/admin-login.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('theme_admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>
</head>
<body>
    <div id="login-button">
        <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
    </div>
    <div id="container">
        <h1>Đăng nhập</h1>
        <span class="close-btn">
        <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></span>
        <form autocomplete="off" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Password" required>
            <span>
                <button type="submit" >Đăng nhập</button>
            </span>
            <span>
                <a id="forgotten">Quên mật khẩu?</a>
                <a id="register" class="pull-right">Đăng ký</a>
            </span>
        </form>
    </div>
    <div id="register-form">
        <h1>Đăng ký</h1>
        <span class="close-btn">
        <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></span>
        <form autocomplete="off" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="re-pass" placeholder="Re-Password" required>
            <span>
                <button type="submit" >Đăng ký</button>
            </span>
            <a id="login" class="pull-right">Đăng nhập</a>
        </form>
    </div>
    <div id="forgotten-container">
        <h1>Forgotten</h1>
        <span class="close-btn">
        <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></span>
        <form>
            <input type="email" name="forget-email" placeholder="E-mail" autocomplete="off" required>
            <a href="#">Lấy lại mật khẩu</a>
            <a id="return">Trở về đăng nhập</a>
        </form>
    </div>
    <script>
        $('#login-button').click(function () {
            $('#login-button').fadeOut(function () {
                $("#container").fadeIn();
            });
        });

        $('#forgotten').click(function () {
            $("#container").fadeOut(function () {
                $("#forgotten-container").fadeIn();
            });
        });

        $('#register').click(function () {
            $("#container").fadeOut(function () {
                $("#register-form").fadeIn();
            });
        });

        $('#login').click(function () {
            $("#register-form").fadeOut(function () {
                $("#container").fadeIn();
            });
        });

        $('#return').click(function () {
            $("#forgotten-container").fadeOut(function () {
                $("#container").fadeIn();
            });
        });

        $(".close-btn").click(function () {
            $("#container, #forgotten-container, #register-form").fadeOut(function () {
                $("#login-button").fadeIn();
            });
        });
    </script>
</body>
</Doctypehtml>