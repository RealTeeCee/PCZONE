@extends('client.layouts.master')
@section('title')
    <title>Checkout</title>
@endsection
@section('css')
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.5);
            background-image: url("{{ asset('client/img/background-product.jpg') }}");
            background-repeat: no-repeat;
            background-size: ;
        }
        .simple-article h4,
        .h4 {
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

        .container,
        .col-md-6 {
            background-color: #00000094
        }
        .col-md-6 {
            background-color: rgba(0, 0, 0, 0.5)
        }
    </style>
@endsection
@section('content')

    <div class="header-empty-space"></div>

    <div class="container">
        <div class="empty-space col-xs-b15 col-sm-b30"></div>
        <div class="breadcrumbs">
            <a href="{{ route('client.home') }}">trang chủ</a>
            <a href="{{ URL::to('checkout') }}">thanh toán</a>
        </div>
        <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
        <div class="text-center">
            <div class="simple-article size-3 grey uppercase col-xs-b5">thánh toàn</div>
            <div class="h2">Kiểm tra đơn và phương thức thanh toán</div>
            <div class="title-underline center"><span></span></div>
        </div>
    </div>

    <div class="empty-space col-xs-b35 col-md-b70"></div>

    <div class="container">
        <div class="row">
            @if (Session::get('cart') == true)
                <div class="col-md-6 col-xs-b50 col-md-b0">
                    @php
                        $khachhang = App\Models\Users::where('ma_KH', session('user_id'))->first();
                    @endphp
                    <form>
                        @csrf
                        <h4 class="h4 col-xs-b25">Chi tiết hoá đơn</h4>
                        <input class="simple-input shipping_name" type="text" name="shipping_name"
                            placeholder="Tên của bạn" value="{{ $khachhang->ten_KH }}" />
                        <div class="empty-space col-xs-b20"></div>
                        <input class="simple-input shipping_email" type="text" name="shipping_email"
                            placeholder="Địa chỉ email" value="{{ $khachhang->email_KH }}" />
                        <div class="empty-space col-xs-b20"></div>
                        <input class="simple-input shipping_phone" type="text" name="shipping_phone"
                            placeholder="Số điện thoại" value="{{ $khachhang->sdt_KH }}" />
                        <div class="empty-space col-xs-b20"></div>
                        <input class="simple-input shipping_address" type="text" name="shipping_address"
                            placeholder="Địa chỉ giao hàng" value="{{ $khachhang->diachi_KH }}" />
                        <div class="empty-space col-xs-b20"></div>
                        <textarea class="simple-input shipping_note" name="shipping_note" placeholder="Để lại lời nhắn cho chúng tôi?"></textarea>
                </div>
                <div class="col-md-6">
                    <h4 class="h4 col-xs-b25">Đơn của bạn</h4>
                    @php
                        $total = 0;
                    @endphp
                    @foreach (Session::get('cart') as $key => $cart)
                        @php

                            $subtotal = $cart['product_qty'] * $cart['product_price'];
                            $total += $subtotal;
                        @endphp

                        <div class="cart-entry clearfix">
                            <a class="cart-entry-thumbnail" href="#"><img style="width: 100px;height:100px"
                                    src="{{ asset('images/product/' . $cart['product_image']) }}" alt=""></a>
                            <div class="cart-entry-description">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="h6"><a href="#">{{ $cart['product_name'] }}</a></div>
                                                <div class="simple-article size-1">Số lượng: {{ $cart['product_qty'] }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="simple-article size-3 grey">${{ $cart['product_price'] }}</div>
                                                <div class="simple-article size-1">Tổng: ${{ $subtotal }}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                Đơn phụ
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">${{ $total }}</div>
                            </div>
                        </div>
                    </div>
                    @php
                        Session::put('total', $total);
                    @endphp
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                Hình thức thanh toán
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">Giao hàng miễn phí</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                Thuế
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">8%</div>
                            </div>
                        </div>
                    </div>
                    @php
                        $coupon_code = Session::get('coupon');
                    @endphp
                    @if ($coupon_code)
                        @foreach ($coupon_code as $key => $coupon)
                            @if ($coupon['coupon_options'] == 'Percent')
                                <div class="order-details-entry simple-article size-3 grey uppercase">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            coupon
                                        </div>
                                        <div class="col-xs-6 col-xs-text-right">
                                            <div class="color">{{ $coupon['coupon_code'] }} -
                                                {{ $coupon['coupon_number'] }}% </div>
                                        </div>
                                        @php
                                            $tax = ($total * 8) / 100;
                                            $total_after_tax = $total + $tax;
                                            $coupon_cash = ($total_after_tax * $coupon['coupon_number']) / 100;
                                            $after_total = $total_after_tax - $coupon_cash;
                                            Session::put('coupon_code', $coupon['coupon_code']);
                                        @endphp
                                    </div>
                                </div>
                            @else
                                <div class="order-details-entry simple-article size-3 grey uppercase">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            coupon
                                        </div>
                                        <div class="col-xs-6 col-xs-text-right">
                                            <div class="color">{{ $coupon['coupon_code'] }} -
                                                {{ $coupon['coupon_number'] }}$</div>
                                        </div>
                                        @php
                                            $tax = ($total * 8) / 100;
                                            $total_after_tax = $total + $tax;
                                            $after_total = $total_after_tax - $coupon['coupon_number'];
                                            Session::put('coupon_code', $coupon['coupon_code']);
                                        @endphp
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        @php
                            $tax = ($total * 8) / 100;
                            $after_total = $total + $tax;
                            Session::put('coupon_code', '');
                        @endphp
                        <div class="order-details-entry simple-article size-3 grey uppercase">
                            <div class="row">
                                <div class="col-xs-6">
                                    coupon
                                </div>
                                <div class="col-xs-6 col-xs-text-right">
                                    <div class="color"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                Tổng đơn
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">${{ $after_total }}</div>
                                @php
                                    Session::put('after_total', $after_total);
                                @endphp
                            </div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b30"></div>


                    <div class="button block size-2 style-3">
                        <span class="button-wrapper">
                            <button type="button" class="send_order" name="send_order"><span class="icon"><img
                                        src="{{ asset('client/img/icon-4.png') }}"alt=""></span></button>
                            <span class="text">Thanh toán tiền mặt</span>
                        </span>
                    </div>
                    </form>
                    <div class="popup-or">
                        <span>Hay</span>
                    </div>
                    <div class="button block size-2 style-3">
                        <span class="button-wrapper">
                            <span class="icon"><a href="{{ route('processTransaction') }}"><img
                                        src="{{ asset('client/img/icon-4.png') }}"alt=""></a></span>
                            <span class="text"><img style="width:30px;height:30px;margin-bottom:-10px"
                                    src="{{ asset('images/icons/icons8-paypal-64.png') }}"alt="">Paypal</span>
                        </span>
                    </div>
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        {{ \Session::forget('error') }}
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        {{ \Session::forget('success') }}
                    @endif
                    <div class="empty-space col-xs-b30"></div>
                    <form action="{{ URL::to('momo_payment') }}" method="post">
                        @csrf
                        <input type="hidden" name="total" value="{{ Session::get('after_total') }}">
                        <div class="button block size-2 style-3">
                            <span class="button-wrapper">
                                <button type="submit" name="payUrl"><span class="icon"><img
                                            src="{{ asset('client/img/icon-4.png') }}"alt=""></span></button>
                                <span class="text"><img style="width:30px;height:30px;margin-bottom:-10px"
                                        src="{{ asset('images/icons/momo_icons.jpeg') }}"alt="">momo</span>
                            </span>
                        </div>
                    </form>
                    <div class="empty-space col-xs-b30"></div>
                    <form action="{{ URL::to('momo_payment') }}" method="post">
                        @csrf
                        <input type="hidden" name="total" value="{{ Session::get('after_total') }}">
                        <div class="button block size-2 style-3">
                            <span class="button-wrapper">
                                <button type="submit" name="payUrl"><span class="icon"><img
                                            src="{{ asset('client/img/icon-4.png') }}"alt=""></span></button>
                                <span class="text"><img style="width:30px;height:30px;margin-bottom:-10px"
                                        src="{{ asset('images/icons/vnpay.jpg') }}"alt="">VNPay</span>
                            </span>
                        </div>
                    </form>
                </div>

        </div>
    @else
        <div class="col-lg-12 text-center" style="font-size:50px;color: #fff;
        text-shadow:
          0 0 7px #fff,
          0 0 10px #fff,
          0 0 21px #fff,
          0 0 42px #bc13fe,
          0 0 82px #bc13fe,
          0 0 92px #bc13fe,
          0 0 102px #bc13fe,
          0 0 151px #bc13fe;">GIỎ HÀNG TRỐNG</div>
        @endif
    </div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>
@endsection

@section('js')
    <!-- masonry -->
    <script src="js/isotope.pkgd.min.js"></script>
    <script>
        $(window).load(function() {
            var $container = $('.grid').isotope({
                itemSelector: '.grid-item',
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        });
    </script>
@endsection
