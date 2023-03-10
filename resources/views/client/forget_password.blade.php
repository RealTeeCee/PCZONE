
@extends('client.layouts.master')
@section('title')
    <title>Forget password</title>
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
    .products-wrapper .product-shortcode.style-1{
             margin: 10 10 20 10 ;
        }
        body{background-image: url("{{asset('client/img/background-product.jpg')}}");background-repeat: no-repeat;background-size:; }
        .simple-article h4, .h4{
            color: #fff;
  text-shadow:
    0 0 7px #fff,
    0 0 10px #fff,
    0 0 21px #fff,
    0 0 42px #bc13fe,
    0 0 82px #bc13fe,
    0 0 92px #bc13fe,
    0 0 102px #bc13fe,
    0 0 151px #bc13fe;
        }
        .container{
            background-color: #00000094
        }
</style>
@endsection
@section('content')
@if(session('error') != null)
    <script>
        alert('{{session('error')}}');
    </script>
@endif
<div class="container" >
    <div class="row">
        <div class="col-lg-12" >
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100" style="dislay:flex;justify-content:center" >
                        <form class="login100-form validate-form" method="post" action="{{URL::to('send_mail_forget')}}">
                            @csrf
                            <span class="login100-form-title">
                                FORGET PASSWORD
                            </span>
                            <span style="color:green;font-size:15px">*Enter your email to get new password</span>
                            <div class="wrap-input100 validate-input" >
                                <input class="input100" type="text" value="{{old('user_email')}}" name="user_email" placeholder="Email">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">
                                    Send
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
{{-- <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
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
