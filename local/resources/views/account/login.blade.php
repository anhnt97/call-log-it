<!DOCTYPE html>
{{--
Template Name: Laravel Project
Version: 2.11.97
Author: TSH97
Website: https://www.facebook.com/transachhai97
Contact: transachhai97@gmail.com
 --}}
<html lang="en">
{{-- BEGIN HEAD --}}
<head>
    <meta charset="utf-8" />
    <title>Đăng nhập</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    @include('theme.sub.style')
    {{-- BEGIN PAGE LEVEL STYLES --}}
    <link href="{{asset('/assets/pages-custom/css/login-4.css')}}" rel="stylesheet" type="text/css" />
    {{-- END PAGE LEVEL STYLES --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
</head>
{{-- END HEAD --}}
<body class="login">
    {{-- BEGIN LOGO --}}
    <div class="logo">
    </div>
    {{-- END LOGO --}}
    <div class="content">
        {{-- BEGIN LOGIN FORM --}}
        <form class="login-form" action="{{ route('login') }}" method="post">
            {{csrf_field()}}
            <h3 class="form-title">Đăng nhập vào hệ thống</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Vui lòng nhập email và mật khẩu </span>
            </div>
            @if(session('success'))
                <h3 class="text-danger">{{session('success')}}</h3>
            @endif
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Tên đăng nhập</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
                </div>
            </div>
            <div class="form-actions">
                <label class="rememberme mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1" /> Nhớ tài khoản
                    <span></span>
                </label>
                <button type="submit" class="btn green pull-right"> Đăng nhập </button>
            </div>

            <div class="forget-password">
                <h4>Quên mật khẩu ?</h4>
                <p> Hãy
                    <a href="javascript:;" id="forget-password"> chọn </a> để khôi phục mật khẩu
                </p>
            </div>
        </form>
        {{-- END LOGIN FORM --}}
        {{-- BEGIN FORGOT PASSWORD FORM --}}
        <form class="forget-form" action="{{ route('password.email') }}" method="post">
            {{csrf_field()}}
            <h3>Quên mật khẩu ?</h3>
            <p> Nhập địa chỉ email của bạn trước khi khôi phục mật khẩu </p>

            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn red btn-outline">Trở về </button>
                <button type="submit" class="btn green pull-right"> Gửi yêu cầu </button>
            </div>
        </form>
        {{-- END FORGOT PASSWORD FORM --}}
    </div>

    {{-- BEGIN COPYRIGHT --}}
    <div class="copyright"> 2017 &copy; Call-Log-IT --- H2ATeam </div>
    {{-- END COPYRIGHT --}}

    {{-- BEGIN SCRIPTS --}}
    @include('theme.sub.script')

    <script src="{{asset('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('/assets/pages-custom/scripts/login-4.js')}}" type="text/javascript"></script>
    {{-- END SCRIPT --}}
</body>
</html>