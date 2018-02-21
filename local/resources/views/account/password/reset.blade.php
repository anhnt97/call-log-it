{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
    <title>Thay đổi mật khẩu</title>
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
        <form class="login-form" action="{{ route('password.request') }}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="token" value="{{ $token }}">
            <h3 class="form-title">Thay đổi mật khẩu</h3>
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
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" value="{{old('email')}}" name="email" />
                </div>
                @if(count($errors) > 0)
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
                </div>
                    @if(count($errors) > 0)
                        <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Nhập lại mật khẩu</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password_confirmation" />
                </div>
                @if(count($errors) > 0)
                    <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                @endif
            </div>
            <div class="form-actions">
                <button type="submit" class="btn green pull-right"> Đăng nhập </button>
            </div>
        </form>
        {{-- END LOGIN FORM --}}
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