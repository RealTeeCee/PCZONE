@extends('client.layouts.master')
@section('title')
    <title>Thanks</title>
@endsection
@section('css')
    <style>
        .products-wrapper .product-shortcode.style-1 {
            margin: 10 10 20 10;
        }

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

        .container {
            background-color: #00000094
        }

        .form-check,
        .form-group label {
            color: rgb(120, 120, 120);
        }

        .table th,
        td {
            color: rgb(120, 120, 120);
        }

        form {
            left: -250;
        }

        button.btn.btn-primary {


            width: 301px;
        }


    </style>
@endsection
@section('content')
<div class="container">
<div class="header-empty-space"></div>

<div style="display:flex;justify-content:center"><img style="width:200px;height:200px"src="{{asset('images/icons/icons8-cart-64.png')}}" alt=""></div>
<h1 class="text-center" style="font-size:50px; color: #fff;
text-shadow:
  0 0 7px #fff,
  0 0 10px #fff,
  0 0 21px #fff,
  0 0 42px #bc13fe,
  0 0 82px #bc13fe,
  0 0 92px #bc13fe,
  0 0 102px #bc13fe,
  0 0 151px #bc13fe;">CẢM ƠN QUÝ KHÁCH ĐÃ MUA HÀNG CỦA PCZONE!<img style="width:100px;height:100px;margin-bottom:-24px"src="{{asset('images/icons/icons8-check-64.png')}}" alt=""></h1>
<div class="buttons-wrapper" style="display:flex;justify-content:center;margin-top:20px">
    <a class="button size-2 style-2" href="{{route('client.home')}}"">
        <span class="button-wrapper">
            <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}"alt=""></span>
            <span class="text">Trở về trang chủ</span>
        </span>
    </a>
</div>
</div>
<div class="header-empty-space"></div>
@endsection
