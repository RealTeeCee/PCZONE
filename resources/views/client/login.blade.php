
@extends('client.layouts.master')
@section('title')
    <title>Login</title>
@endsection
@section('css')
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<!--===============================================================================================-->
<style>
body{background-color: rgba(0, 0, 0, 0.5);background-image: url("{{asset('client/img/background-product-3.jpg')}}");background-repeat: no-repeat;background-size:; }
.input100{
    color: #b1b5bc;
}
</style>

@endsection
@section('content')
@if(session('error') != null)
    <script>
        alert('{{session('error')}}');
    </script>
@endif

<div class="container">
    <div class="row">
        <div class="col-lg-6" >
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100" id="hihi">
                        <?php
                                    $sendmail = Session::get('sendmail');
                                    if($sendmail){
                                        echo '<script>alert("'.$sendmail.'")</script>';
                                        Session::put('sendmail',null);
                                    }
                               ?>
                        <form class="login100-form validate-form" method="post" action="{{URL::to('checkLogin')}}">
                            @csrf
                            <span class="login100-form-title">
                                ĐĂNG NHẬP
                            </span>
                            <div class="wrap-input100 validate-input" >
                                <input class="input100" type="text" value="{{old('user_email')}}" name="user_email" placeholder="Email">

                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" name="user_password" placeholder="Mất khẩu">

                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <?php
                                    $message = Session::get('message');
                                    if($message){
                                        echo '<div style="font-size:15px; color:red">'.$message.'</div>';
                                        Session::put('message', null);
                                    }
                               ?>
                               <?php
                               $register = Session::get('register');
                               if($register){
                                   echo '<script>alert("'.$register.'")</script>';
                                   Session::put('register', null);
                               }
                          ?>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">
                                    ĐĂNG NHẬP
                                </button>
                            </div>
                            <div class="text-center p-t-12">
                                <span class="txt1">
                                    QUÊN
                                </span>
                                <a class="txt2" href="{{URL::to('forget_password')}}">
                                    TÊN ĐĂNG NHẬP / MẬT KHẨU?
                                </a>
                            </div>
                            <div class="popup-or">
                                <span>or</span>
                            </div>
                            <div class="row m5">
                                <div class="col-sm-6 col-xs-b10 col-sm-b0">
                                    <a class="button facebook-button size-2 style-4 block" href="{{URL::to('login-facebook')}}">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}" alt="" /></span>
                                            <span class="text">facebook</span>
                                        </span>
                                    </a>
                                </div>

                                <div class="col-sm-6">
                                    <a class="button google-button size-2 style-4 block" href="{{URL::to('login-google')}}">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}" alt="" /></span>
                                            <span class="text">google+</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <form class="login100-form validate-form" method="post" action="{{ URL::to('register')}}">
                            @csrf
                            <span class="login100-form-title">
                                ĐĂNG KÝ
                            </span>
                            <div class="wrap-input100 validate-input" >
                                <input class="input100" value="{{ old('user_name') }}" type="text" name="user_name" placeholder="Tên">
                                @error('user_name')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" >
                                <input class="input100" type="text" value="{{ old('user_email') }}" name="user_email" placeholder="Email">
                                @error('user_email')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" >
                                <input class="input100" type="text" value="{{ old('user_phone') }}" name="user_phone" placeholder="Số điện thoại">
                                @error('user_phone')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" value="{{ old('user_address') }}" name="user_address" placeholder="Địa chỉ">
                                @error('user_address')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" id="password" value="{{ old('user_password') }}" name="user_password" placeholder="Mật khẩu">
                                @error('user_password')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" >
                                <input class="input100" type="password" id="confirm_passowrd" name="user_repeat_password" placeholder="Xác nhận mật khẩu">
                                @error('user_repeat_password')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">
                                    ĐĂNG KÝ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('js')

<!--===============================================================================================-->
{{-- <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></>
<!--===============================================================================================-->
	<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script> --}}
<!--===============================================================================================-->
	<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	{{-- <script src="{{asset('js/main.js')}}"></script> --}}
@endsection
