@extends('client.layouts.master')
@section('title')
    <title>Home</title>
@endsection
@section('css')
    <style>
        #filter-new-product-home {
            display: flex;
            justify-content: space-between;
        }

        .title-underline span:before {
            width: 0px
        }

        .title-underline span {
            width: 1423px;
            border: 0.2rem solid #fff;
            border-radius: 2rem;
            padding: 0.4em;
            box-shadow: 0 0 .2rem #fff,
                0 0 .2rem #fff,
                0 0 2rem #bc13fe,
                0 0 0.8rem #bc13fe,
                0 0 2.8rem #bc13fe,
                inset 0 0 1.3rem #bc13fe;
            left: -141;
            bottom: 11;
        }

        .product-shortcode.style-1.big {
            padding: 20
        }
    </style>
@endsection

@section('content')
    <div class="header-empty-space"></div>

    <div class="content-margins grey">
        <div class="slider-wrapper">
            <div class="swiper-button-prev visible-lg"></div>
            <div class="swiper-button-next visible-lg"></div>
            <div class="swiper-container" data-parallax="1" data-auto-height="1" id="haha">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide"
                            style="background-image: url({{ asset('images/sliders/' . $slider->image) }});">


                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-6">
                                        <div class="cell-view simple-banner-height">
                                            <div class="col-xs-b35 col-sm-b70"></div>
                                            <div data-swiper-parallax-x="-600">
                                                <div class="simple-article light transparent size-3"></div>
                                                <div class="col-xs-b5"></div>
                                            </div>

                                            <div data-swiper-parallax-x="-300">
                                                <div class="buttons-wrapper">

                                                </div>
                                            </div>
                                            <div class="col-xs-b35 col-sm-b70"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-product-preview align-left">
                                    <div class="product-preview-shortcode light">

                                        <div class="sidebar valign-middle" data-swiper-parallax-x="-300">

                                        </div>
                                    </div>
                                </div>
                                <div class="empty-space col-xs-b80 col-sm-b0"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination swiper-pagination-white hidden-lg"></div>
            </div>
        </div>

        <div class="row nopadding">
            <div class="col-sm-6">
                <div class="banner-shortcode style-3 wide"
                    style="background-image: url(client/img/falcon-banner1.jpg);border-radius: 2rem;
                    padding: 0.4em;margin:10px;
                    box-shadow: 0 0 .2rem #fff,
                              0 0 .2rem #fff,
                              0 0 2rem #bc13fe,
                              0 0 0.8rem #bc13fe,
                              0 0 2.8rem #bc13fe,
                              inset 0 0 1.3rem #bc13fe; ">
                    <div class="valign-middle-cell">
                        <div class="valign-middle-content">
                            <div class="simple-article size-3 light transparent uppercase col-xs-b5"></div>
                            <h3 class="h3 light"></h3>
                            <div class="simple-article size-4 light transparent col-xs-b30"></div>
                            <a style="position: relative;
                            top: 33px;
                        }" class="button size-2 style-1" href="{{ URL::to('about') }}">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="client/img/icon-1.png" alt=""></span>
                                    <span class="text">Tìm hiểu thêm</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="banner-shortcode style-3 wide"
                    style="background-image: url(client/img/falcon-banner2.jpg);border-radius: 2rem;
                    padding: 0.4em;margin:10px;
                    box-shadow: 0 0 .2rem #fff,
                              0 0 .2rem #fff,
                              0 0 2rem #bc13fe,
                              0 0 0.8rem #bc13fe,
                              0 0 2.8rem #bc13fe,
                              inset 0 0 1.3rem #bc13fe; ">
                    <div class="valign-middle-cell">
                        <div class="valign-middle-content">
                            <div class="simple-article size-3 light transparent uppercase col-xs-b5"> Bộ Sưu tập Street</div>
                            <h3 class="h3 light"
                                style="color: #fff;
                                text-shadow:
                                  0 0 7px #fff,
                                  0 0 10px #fff,
                                  0 0 21px #fff,
                                  0 0 42px #bc13fe,
                                  0 0 82px #bc13fe,
                                  0 0 92px #bc13fe,
                                  0 0 102px #bc13fe,
                                  0 0 151px #bc13fe;">
                                “noise is not a problem”</h3>
                            <div class="simple-article size-4 light transparent col-xs-b30"></div>
                            <a class="button size-2 style-1" href="{{ URL::to('about') }}">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="client/img/icon-1.png" alt=""></span>
                                    <span class="text">Tìm hiểu thêm</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-empty-space"></div>
        <div class="container">
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">Máy Nguyên bộ PCZONE</div>
                <div class="h2">PC Full Option dành cho bạn</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>
        <div class="slider-wrapper">
            <div class="swiper-button-prev visible-lg"></div>
            <div class="swiper-button-next visible-lg"></div>
            <div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="2"
                data-lt-slides="3" data-slides-per-view="4">
                <div class="swiper-wrapper" style="height: 700px; margin-bottom:100px">
                    @foreach ($hotProducts as $product)
                        <div class="swiper-slide">
                            <div class="product-shortcode style-1 big">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{ $product->ma_SP }}"
                                        class="cart_product_id_{{ $product->ma_SP }}">
                                    <input type="hidden" value="{{ $product->ten_SP }}"
                                        class="cart_product_name_{{ $product->ma_SP }}">
                                    <input type="hidden" value="{{ $product->hinh_SP }}"
                                        class="cart_product_image_{{ $product->ma_SP }}">
                                    <input type="hidden" value="{{ $product->gia_SP }}"
                                        class="cart_product_price_{{ $product->ma_SP }}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{ $product->ma_SP }}">
                                    <div class="preview">
                                        <img src="{{ asset('images/product/' . $product->hinh_SP) }}"
                                            alt="{{ $product->ten_SP }}">
                                        <div class="preview-buttons valign-middle">
                                            <div class="valign-middle-content">
                                                <a class="button size-2 style-2"
                                                    href="{{ route('client.product_detail', ['product_id' => $product->ma_SP]) }}">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="client/img/icon-1.png"
                                                                alt=""></span>
                                                        <span class="text">Tìm hiểu thêm</span>
                                                    </span>
                                                </a>
                                                @if (Session::get('user_id') == true)
                                                    <a class="button size-2 style-3 add_to_cart"
                                                        data-id="{{ $product->ma_SP }}" name="add-to-cart">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img
                                                                    src="{{ asset('client/img/icon-3.png') }}"alt=""></span>
                                                            <span class="text">Thêm vào giỏ hàng</span>
                                                        </span>
                                                    </a>
                                                @else
                                                    <a class="button size-2 style-3" href="{{ URL::to('login') }}">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img
                                                                    src="{{ asset('client/img/icon-3.png') }}"alt=""></span>
                                                            <span class="text">Thêm vào giỏ hàng</span>
                                                        </span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title">
                                        <div class="simple-article size-1 color col-xs-b5"><a href="#">Kiểu mẫu mới</a></div>
                                        <div class="h6 animate-to-green"><a href="#">hipster beat hr</a></div>
                                    </div>
                                    <div class="description">
                                        <div class="simple-article text size-2">{!! $product->sort_mota_SP !!}</div>
                                        <div class="icons">

                                            <a class="entry open-popup" data-rel="3"
                                                data-id="{{ $product->ma_SP }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                            <button data-id="{{ $product->ma_SP }}"
                                                name="add_wish_list_{{ $product->ma_SP }}" class=" entry add_wish_list">
                                                @include('client.components.in_wish_list')
                                            </button>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="simple-article size-4"><span
                                                class="dark">${{ $product->gia_SP }}.00</span></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination relative-pagination visible-xs visible-sm"></div>
            </div>
        </div>
        <div class="header-empty-space"></div>
        <div class="container">
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">Linh kiện PCZONE</div>
                <div class="h2">Linh Kiện Dành Cho bạn</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="text-center">
                <ul id="filter-new-product-home">
                    <li><button class="button-filter btn btn-info" value="All">ALL</button></li>
                    <li><button class="button-filter btn" value="Ram">RAM</button></li>
                    <li><button class="button-filter btn" value="Cpu">CPU</button></li>
                    <li><button class="button-filter btn" value="Vga">VGA</button></li>
                    <li><button class="button-filter btn" value="Psu">PSU</button></li>
                    <li><button class="button-filter btn" value="Headphone">HEADPHONE</button></li>
                    <li><button class="button-filter btn" value="Motherboard">MOTHERBOARD</button></li>
                    <li><button class="button-filter btn" value="Storage">STORAGE</button></li>
                    <li><button class="button-filter btn" value="Mouse">MOUSE</button></li>
                    <li><button class="button-filter btn" value="Keyboard">KEYBOARD</button></li>
                </ul>
            </div>
        </div>
        <div class="empty-space col-xs-b30 col-sm-b60"></div>
        <div class="slider-wrapper">
            <div class="swiper-button-prev visible-lg"></div>
            <div class="swiper-button-next visible-lg"></div>
            <div class="swiper-container" id="swiper-container" data-slides-per-view="5">
                <div class="swiper-wrapper" id="filter-home" style="height: 700px; margin-bottom:100px">
                    @foreach ($newProducts as $product)
                        <div class="swiper-slide swiper-slide-{{ $product->component }}">
                            <div class="product-shortcode style-1 big">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{ $product->ma_SP }}"
                                        class="cart_product_id_{{ $product->ma_SP }}">
                                    <input type="hidden" value="{{ $product->ten_SP }}"
                                        class="cart_product_name_{{ $product->ma_SP }}">
                                    <input type="hidden" value="{{ $product->hinh_SP }}"
                                        class="cart_product_image_{{ $product->ma_SP }}">
                                    <input type="hidden" value="{{ $product->gia_SP }}"
                                        class="cart_product_price_{{ $product->ma_SP }}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{ $product->ma_SP }}">
                                    <div class="preview">
                                        <img src="{{ asset('images/product/' . $product->hinh_SP) }}"
                                            alt="{{ $product->ten_SP }}">
                                        <div class="preview-buttons valign-middle">
                                            <div class="valign-middle-content">
                                                <a class="button size-2 style-2"
                                                    href="{{ route('client.product_detail', ['product_id' => $product->ma_SP]) }}">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="client/img/icon-1.png"
                                                                alt=""></span>
                                                        <span class="text">Tìm hiểu thêm</span>
                                                    </span>
                                                </a>
                                                @if (Session::get('user_id') == true)
                                                    <a class="button size-2 style-3 add_to_cart"
                                                        data-id="{{ $product->ma_SP }}" name="add-to-cart">

                                                        <span class="button-wrapper">
                                                            <span class="icon"><img
                                                                    src="{{ asset('client/img/icon-3.png') }}"alt=""></span>
                                                            <span class="text">Thêm vào giỏ hàng</span>
                                                        </span>

                                                    </a>
                                                @else
                                                    <a class="button size-2 style-3" href="{{ URL::to('login') }}">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img
                                                                    src="{{ asset('client/img/icon-3.png') }}"alt=""></span>
                                                            <span class="text">Thêm vào giỏ hàng</span>
                                                        </span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title">
                                        <div class="simple-article size-1 color col-xs-b5"><a>Kiểu mẫu mới</a></div>
                                        <div class="h6 animate-to-green"><a>hipster beat hr</a></div>
                                    </div>
                                    <div class="description">
                                        <div class="simple-article text size-2">{!! $product->sort_mota_SP !!}</div>
                                        <div class="icons">

                                            <a class="entry open-popup" data-rel="3"
                                                data-id="{{ $product->ma_SP }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                            <button data-id="{{ $product->ma_SP }}"
                                                name="add_wish_list_{{ $product->ma_SP }}" class=" entry add_wish_list">
                                                @include('client.components.in_wish_list')
                                            </button>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="simple-article size-4"><span
                                                class="dark">${{ $product->gia_SP }}.00</span></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination relative-pagination visible-xs visible-sm"></div>
            </div>
        </div>
        <?php
        $message_coupon = Session::get('message_coupon');
        if ($message_coupon) {
            echo '<script>alert("' . $message_coupon . '");</script>';
            Session::put('message_coupon', null);
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <div class="cell-view simple-banner-height-edit text-center">
                        <div class="empty-space col-sm-b35"></div>
                        <div class="simple-article grey uppercase size-5 col-xs-b5"><span class="color">Offer đặc biệt</span></div>
                        <h3 class="h3 col-xs-b15">offers mới Mỗi tuần <span class="color">+</span> Hệ thống discount
                            <span class="color">+</span> Giá rẻ</h3>
                        <div class="simple-article size-3 col-xs-b25 col-sm-b50">Mọi điều tốt đẹp sẽ đến khi bạn mua hàng tại PCZONE<br>Từ những món quà lớn đến những lời cảm ơn nho nhỏ và một khoản quyên góp từ thiện cho mỗi lần mua hàng.</div>
                        <div class="single-line-form">
                            <form action="{{ URL::to('get_coupon') }}" method="post">
                                @csrf
                                <input class="simple-input" type="text" name="user_mail"
                                    placeholder="Nhập Email của bạn">
                                <div class="button size-2 style-3">
                                    <span class="button-wrapper">
                                        <button type="submit"><span class="icon"><img src="client/img/icon-4.png"
                                                    alt=""></span></button>
                                        <span class="text">Gửi</span>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="empty-space col-xs-b35"></div>
                    </div>
                </div>
            </div>
            <div class="row-background left hidden-xs">
                <img src="client/img/PC_DEP.png" alt="" />
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var swiper = new Swiper('#haha', {
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            slidesPerView: 'auto',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        var swiper2 = new Swiper('.swiper-container', {

            slidesPerView: 'auto',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        $(document).ready(function() {
            $('.button-filter').click(function() {
                var component = $(this).val();
                if (component == 'All') {
                    $('.button-filter').removeClass('btn-info');
                    $(this).addClass('btn-info');
                    $('#filter-home .swiper-slide').show();
                } else {
                    $('.button-filter').removeClass('btn-info');
                    $(this).addClass('btn-info');
                    $('#filter-home .swiper-slide').hide();
                    $('#filter-home .swiper-slide-' + component).show();
                }
            });
        });
    </script>
@endsection
