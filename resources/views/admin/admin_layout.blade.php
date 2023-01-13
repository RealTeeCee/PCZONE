<!DOCTYPE html>
<html lang="en">
<head>
    <title>PCZone</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon1.png') }}" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<link rel="apple-touch-icon" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- FontAwesome JS-->
    <script defer src="{{asset('plugins/fontawesome/js/all.min.js')}}"></script>
    <!-- App CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link id="theme-style" rel="stylesheet" href="{{asset('/css/portal.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style type="text/css">
		.my-active span{
			background-color: #5cb85c !important;
			color: white !important;
			border-color: #5cb85c !important;
		}
        ul#menu-accordion {
    background: #ffcbe424;
}
ul.dropdown-menu.show {
    background-image: -webkit-linear-gradient(180deg,#09100e 0%,#4e51dd 40%, #180101 100%);
}
.dropdown-menu .dropdown-item:hover, .dropdown-menu .dropdown-item:focus {
    background-image: -webkit-linear-gradient(180deg,#09100e 0%,#4e51dd 40%, #180101 100%);

    color: #fff;
    text-shadow: 0 0 7px #fff, 0 0 10px #fff, 0 0 21px #fff, 0 0 42px #bc13fe, 0 0 82px #bc13fe, 0 0 92px #bc13fe, 0 0 102px #bc13fe, 0 0 151px #bc13fe;
    border: 0.2rem solid #fff;
    border-radius: 0.5rem;
    box-shadow: 0 0 0.2rem #fff, 0 0 0.2rem #fff, 0 0 2rem #bc13fe, 0 0 0.8rem #bc13fe, 0 0 2.8rem #bc13fe, inset 0 0 1.3rem #bc13fe;

}
.rounded-circle {
    border-radius: 50%!important;
}
	</style>
</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
	        <div class="container-fluid py-2">
		        <div class="app-header-content">
		            <div class="row justify-content-between align-items-center">

				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fas fa-search"></i>
			        </div><!--//col-->
		            <div class="app-utilities col-auto">
			            <div class="app-utility-item app-user-dropdown dropdown">
							<?php
								$admin_name = Session::get('admin_name');
								echo $admin_name;
							?>
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                @php
                                    $avarta = Session::get('admin_avarta');
                                @endphp
                                @if($avarta)
                                <img class="rounded-circle" src="{{asset('images/'.$avarta)}}" alt="user profile">
                                @else
                                <img class="rounded-circle" src="{{asset('images/user.png')}}" alt="user profile">
                                @endif
                            </a>

				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="{{URL::to('admin/logout')}}">Đăng Xuất</a></li>
								<li><a class="dropdown-item" href="{{URL::to('admin/information_admin')}}">Thay đổi thông tin</a></li>
							</ul>
			            </div><!--//app-user-dropdown-->
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel">
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="{{URL::to('admin/')}}"><img class="logo-icon me-2" style="height:60px;width:200px;" src="{{ asset('favicon/pczone.jpg')}}" alt="logo"><span class="logo-text"></span></a>

		        </div><!--//app-branding-->
                <div class="space"></div>
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                        @if(Session::get('boss_id')==1)
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="{{URL::to('admin/')}}">
						        <span class="nav-icon"><img src="{{asset('images/icons/dashboard.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Thống Kê Doanh Thu</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
                        @else
                        <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="{{URL::to('admin/')}}">
						        <span class="nav-icon"><img src="{{asset('images/icons/calendar.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Lịch Làm Nhân Viên</span>
					        </a><!--//nav-link-->
					    </li><!--/
                        @endif
                        @if(Session::get('boss_id')==1)
						<li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon"><img src="{{asset('images/icons/brand.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Quản Lý Thương Hiệu</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/create_brand')}}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt=""> Tạo Thương Hiệu</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/view_brand')}}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt=""> DS Thương Hiệu</a></li>
								</ul>
					        </div>

					    </li><!--//nav-item-->
                        @else
                        @endif
                        @if(Session::get('boss_id')==3)
					    <li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon"><img src="{{asset('images/icons/product.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Quản Lý Sản Phẩm</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/create_product')}}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt=""> Tạo Sản Phẩm</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/view_product')}}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt=""> DS Sản Phẩm</a></li>
						        </ul>
					        </div>
					    </li><!--//nav-item-->
                        @else
                        @endif
                        @if(Session::get('boss_id')==3)
						<li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-9" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon"><img style="width:30px;height:30px" src="{{asset('images/icons/coupon.png')}}"/>
						         </span>
		                         <span class="nav-link-text">Quản Lý Coupon</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-9" class="collapse submenu submenu-9" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/create_coupon')}}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt=""> Tạo Coupon</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/view_coupon')}}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt=""> DS Coupon</a></li>
						        </ul>
					        </div>
					    </li><!--//nav-item-->
                        @else
                        @endif
                        @if(Session::get('boss_id')==3)
						<li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-8" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon"><img src="{{asset('images/icons/slide.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Quản Lý Slide</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-8" class="collapse submenu submenu-8" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="{{ route('slider.index') }}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt="">DS Slide</a></li>
						        </ul>
					        </div>

					    </li><!--//nav-item-->
                        @else
                        @endif
						<li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-4" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon"><img src="{{asset('images/icons/user.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Quản lý Tài khoản</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-4" class="collapse submenu submenu-4" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/view_admin')}}">
                                        <img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"
                                        style="width:10px;height:10px" alt=""> Tài Khoản Admin</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/view_user')}}">
                                        <img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"
                                        style="width:10px;height:10px" alt=""> Tài Khoản Khách Hàng</a></li>
						        </ul>
					        </div>
					    </li><!--//nav-item-->
                        @if(Session::get('boss_id')==3)
						<li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon"><img src="{{asset('images/icons/invoice.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Quản Lý Đơn Hàng</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-5" class="collapse submenu submenu-5" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/view_order')}}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt=""> DS Đơn Hàng</a></li>
						        </ul>
					        </div>
					    </li><!--//nav-item-->
                        @else
                        @endif
                        @if(Session::get('boss_id')==3)
						<li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-7" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon"><img src="{{asset('images/icons/contact.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Phản Hồi</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-7" class="collapse submenu submenu-7" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="{{URL::to('admin/view_contact')}}"><img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"  style="width:10px;height:10px" alt=""> DS Phản Hồi</a></li>
						        </ul>
					        </div>
					    </li><!--//nav-item-->
                        @else
                        @endif
                        @if(Session::get('boss_id')==3)
						<li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-19" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon"><img src="{{asset('images/icons/faq.png')}}" style="width:30px;height:30px" alt="">
						         </span>
		                         <span class="nav-link-text">Quản lý FAQ</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-19" class="collapse submenu submenu-4" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="{{Route('view_FAQ')}}">
                                        <img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"
                                        style="width:10px;height:10px" alt="">Danh sách FAQ</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="{{Route('create_FAQ')}}">
                                        <img src="{{asset('images/icons/icons8-geometric-circle-dot-shape-with-ring-pattern-24.png')}}"
                                        style="width:10px;height:10px" alt="">Tạo mới FAQ</a></li>
						        </ul>
					        </div>
					    </li><!--//nav-ite
                            @else
                            @endif


				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
               @yield('admin-content')
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" type="text/javascript"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script src="{{asset('plugins/popper.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Charts JS -->
    {{-- <script src="{{asset('plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('js/index-charts.js')}}"></script>  --}}
    <!-- Page Specific JS -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

</body>
</html>

