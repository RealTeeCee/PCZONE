               <style>
                .dropdown-menu>li>a {
                    padding: 0;
                    font-weight: bolder;
                    color: #fff;
                }
                ul.dropdown-menu {
                    background-image: -webkit-linear-gradient(180deg,#050621 0%,#2c2fc1 40%, #060823 100%);
    color: #fff;
    text-shadow: 0 0 7px #fff, 0 0 10px #fff, 0 0 21px #fff, 0 0 42px #bc13fe, 0 0 82px #bc13fe, 0 0 92px #bc13fe, 0 0 102px #bc13fe, 0 0 151px #bc13fe;
    top: 83%;
    border: 0.1rem solid #fff;
    border-radius: 0.5rem;
    box-shadow: 0 0 0.2rem #fff, 0 0 0.2rem #fff, 0 0 2rem #bc13fe, 0 0 0.8rem #bc13fe, 0 0 2.8rem #bc13fe, inset 0 0 1.3rem #bc13fe;
}
               </style>

               <!-- HEADER -->
                <header>
                    <div class="header-top">
                        <div class="content-margins">
                            <div class="row">
                                <div class="col-md-5 hidden-xs hidden-sm">
                                    <div class="entry"><b>liên hệ:</b> <a href="#">+84 (283) 123 456 789</a>
                                    </div>
                                    <div class="entry"><b>email:</b> <a href="#">office@pczone.vn</a></div>
                                </div>
                                <div class="col-md-7 col-md-text-right">
                                    <div class="entry">
                                        <?php
                                        $user_name = Session::get('user_name');
                                        ?>
                                        @if ($user_name)
                                            <a class="fa-user-edit" href="{{ URL::to('information_user') }}">
                                                @if ($user->avarta_KH == null)
                                                    <i class="fa fa-user"></i>
                                                @else
                                                    <img class="rounded-circle"
                                                        style="width: 40px; height: 40px; position: absolute;left: -30px;bottom: 14px;"
                                                        src="{{ asset('images/' . $user->avarta_KH) }}"
                                                        alt="">
                                                @endif
                                            </a> <a href="{{ URL::to('information_user') }}"> {{ $user_name }}</a>
                                            <a style="margin-left:10px " href="{{ URL::to('log-out') }}">Đăng xuất</a>
                                        @else
                                            <a href="{{ URL::to('login') }}"><b>Đặng nhập</b></a>&nbsp; Hoặc &nbsp;<a
                                                href="{{ URL::to('login') }}"><b>Đăng ký</b></a>
                                        @endif

                                    </div>

                                    <div class="entry language">
                                        <div class="title"><b>Vn</b></div>
                                    </div>
                                    @php
                                        $total = 0;
                                        $sum_quantity = 0;
                                    @endphp
                                    <div class="entry hidden-xs hidden-sm"><a href="{{ route('client.wish_list') }}"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></div>
                                    <div class="entry hidden-xs hidden-sm cart">
                                        <a href="{{ URL::to('show_cart') }}">
                                            <b class="hidden-xs">Giỏ hàng</b>
                                            <span class="cart-icon">
                                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                @if (Session::get('cart') == true)
                                                    @foreach (Session::get('cart') as $key => $cart)
                                                        @php
                                                            $sum_quantity += $cart['product_qty'];
                                                        @endphp
                                                    @endforeach
                                                    <span class="cart-label">{{ $sum_quantity }}</span>
                                                @else
                                                    <span class="cart-label">0</span>
                                                @endif
                                            </span>
                                        </a>

                                        <div class="cart-toggle hidden-xs hidden-sm">
                                            <div class="cart-overflow">
                                                @if (Session::get('cart') == true)
                                                    @foreach (Session::get('cart') as $key => $cart)
                                                        @php

                                                            $subtotal = $cart['product_qty'] * $cart['product_price'];
                                                            $total += $subtotal;
                                                        @endphp
                                                        <div class="cart-entry clearfix">
                                                            <a class="cart-entry-thumbnail" href="#"><img
                                                                    style="width: 50px;height:50px"src="{{ asset('images/product/' . $cart['product_image']) }}"
                                                                    alt="" /></a>
                                                            <div class="cart-entry-description">
                                                                <table>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="h6">
                                                                                {{ $cart['product_name'] }}</div>
                                                                            <div class="simple-article size-1">SỐ LƯỢNG:
                                                                                {{ $cart['product_qty'] }}</div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="simple-article size-3 grey">$
                                                                                {{ $cart['product_price'] }}</div>
                                                                            <div class="simple-article size-1">TỔNG: $
                                                                                {{ $cart['product_price'] * $cart['product_qty'] }}
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a class="cart_quantity_delete"
                                                                                href="{{ URL::to('del_product/' . $cart['session_id']) }}"
                                                                                onclick="return confirm('Are you sure you want to delete')"><i
                                                                                    class="fa fa-times"></i></a>
                                                            </div>
                                                            </td>
                                                            </tr>
                                                            </table>
                                                        </div>
                                            </div>
                                            @endforeach
                                            <div class="empty-space col-xs-b40"></div>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="cell-view empty-space col-xs-b50">
                                                        <div class="simple-article size-5 grey">TỔNG <span
                                                                class="color">${{ $total }}</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 text-right">
                                                    <a class="button size-2 style-3" href="{{ URL::to('checkout') }}">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img
                                                                    src="{{ asset('client/img/icon-4.png') }}"alt=""></span>
                                                            <span class="text">Thanh toán</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center"
                                                style="font-size:20px;background-color:black;border: -0.8rem;border-radius: 0.2rem;">
                                                Giỏ hàng trống</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="hamburger-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom">
                        <div class="content-margins">
                            <div class="row">
                                <div class="col-xs-3 col-sm-3" style="">
                                    <a id="logo"
                                        style="width: auto;cursor:url(client/img/drag-edit2.png) 32 32, ew-resize;"
                                        href="{{ URL::to('/') }}"><img style="height:200px;width:200px;"
                                            src="{{ asset('favicon/pczone.jpg') }}"alt="" /></a>
                                </div>
                                <div class="col-xs-9 col-sm-9 text-right">
                                    <div class="nav-wrapper">
                                        <div class="nav-close-layer"></div>
                                        <nav>
                                            <ul>
                                                <li class="">
                                                    <a href="{{ route('client.home') }}">Trang Chủ</a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('client.about') }}">Về Chúng Tôi</a>
                                                </li>
                                                {{-- <li class="megamenu-wrapper dropdown">
                                                    <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">

                                                        <li class="dropdown-item"><a href="{{ route('client.products')}}">products</a></li>
                                                </li> --}}
                                                <li><a class="dropdown">Sản phẩm</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-item"><a href="{{ route('client.products')}}">Linh kiện</a></li>
                                                        <li class="dropdown-item"><a href="{{ route('client.products_2')}}">máy nguyên bộ</a></li>
                                                    </ul>
                                                </li>
                                                <li class="megamenu-wrapper">
                                                    <a href="{{ URL::to('checkout') }}">Thanh toán</a>
                                                </li>
                                                <li><a href="{{ route('client.contact') }}">Liên hệ & phản hồi</a></li>
                                                <li class="">
                                                    <a href="{{ route('client.faq') }}">Tư vấn Q & A</a>
                                                </li>
                                                <li class="click">
                                                    <a href="{{ route('client.build') }}">Build Máy</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="header-bottom-icon toggle-search"><i style="top:10px"
                                            class="fa fa-search" aria-hidden="true" id="header-bottom-icon"></i>
                                    </div>
                                    <div class="header-bottom-icon visible-rd"><i class="fa fa-heart-o"
                                            aria-hidden="true"></i></div>
                                    <div class="header-bottom-icon visible-rd">
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                        <span class="cart-label">5</span>
                                    </div>
                                </div>
                            </div>
                            <div class="header-search-wrapper">
                                <div class="header-search-content"
                                    style="background:rgba(255, 255, 255, 0.8); color:black">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">


                                                <div class="search-submit">
                                                    <i style="top:15px; margin-right: 15px;" class="fa fa-search"
                                                        aria-hidden="true"></i>
                                                    <input type="submit" />
                                                </div>
                                                <input class="simple-input style-1" id="search" type="text"
                                                    value="" placeholder="Enter keyword" />
                                                {{ csrf_field() }}
                                            </div>

                                        </div>
                                        <div class="row" style="margin-left:; margin-top:10px; padding-right:100px"
                                            id="search_value">

                                        </div>
                                    </div>
                                    <div style="background-color:rgb(240, 82, 82)" class="button-close"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {

                        $('#search').keyup(function() { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                            var query = $(this).val(); //lấy gía trị ng dùng gõ
                            if (query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                            {
                                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                $.ajax({
                                    url: "{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                    method: "POST", // phương thức gửi dữ liệu.
                                    data: {
                                        query: query,
                                        _token: _token
                                    },
                                    success: function(data) { //dữ liệu nhận về
                                        $('#search_value').html(
                                        data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                                    }
                                });
                            } else {
                                var output = '';
                                $('#search_value').html(output);
                            }
                        });
                    });
                </script>
