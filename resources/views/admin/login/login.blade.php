<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="shortcut icon" href="{{ asset('favicon/favicon1.png') }}" />
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{asset('plugins/fontawesome/js/all.min.js')}}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{asset('/css/portal.css')}}">
    <style>
        .col-12.col-md-7.col-lg-6.auth-main-col.text-center.p-5 {
    background-image: -webkit-linear-gradient(180deg,#09100e 0%,#4e51dd 40%, #180101 100%);
}
.app-btn-primary {
    background-image: -webkit-linear-gradient(270deg,#2eff00 0%,#09683b 40%, #24f900 100%);
    color: #fff;
    text-shadow: 0 0 7px #fff, 0 0 10px #fff, 0 0 21px #fff, 0 0 42px #bc13fe, 0 0 82px #bc13fe, 0 0 92px #bc13fe, 0 0 102px #bc13fe, 0 0 151px #bc13fe;
}
h2.auth-heading.text-center.mb-5 {
    color: #fff;
    text-shadow: 0 0 7px #fff, 0 0 10px #fff, 0 0 21px #fff, 0 0 42px #bc13fe, 0 0 82px #bc13fe, 0 0 92px #bc13fe, 0 0 102px #bc13fe, 0 0 151px #bc13fe;
}
    </style>
</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img style="    width: 180px;
                        height: 60px;" class="logo-icon me-2" src="{{asset('favicon/pczone.jpg')}}" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Đăng Nhập Admin PCZone</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="post" action="{{URL::to('admin/checkLogin')}}">
							@csrf
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="admin_email" type="email" class="form-control signin-email" placeholder="Email address">
                                @error('admin_email')
                            <div style="font-size:15px; color:red">{{$message }}</div>@enderror
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="admin_password" type="password" class="form-control signin-password" placeholder="Password">
                                @error('admin_password')
                                <div style="font-size:15px; color:red">{{$message }}</div>@enderror
							</div><!--//form-group-->


							<?php
                                    $message = Session::get('message');
                                    if($message){
                                        echo '<div style="font-size:15px; color:red">'.$message.'</div>';
										Session::put('message',null);
                                    }
                               ?>
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
					</div><!--//auth-form-container-->
			    </div><!--//auth-body-->
		    </div><!--//flex-column-->
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder" style="background:url('{{asset('images/banner-login.jpg')}}') no-repeat center center;">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->

    </div><!--//row-->


</body>
</html>

