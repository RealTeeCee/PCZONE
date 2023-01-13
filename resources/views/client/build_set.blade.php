<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@extends('client.layouts.master')
@section('title')
    <title>Build Set</title>
@endsection
@section('css')
    <style>
        img.hinhanh {
    height: 120px;

}
        .ngang{
            color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;
                                vertical-align:middle;border-right: 1px solid #ddd;
        }
        .products-wrapper .product-shortcode.style-1 {
            margin: 10 10 20 10;
        }
        select.btn.select_compare {
    border: 2px solid;
    background: #7f7f89;
    color: #e7e1e1;
    text-shadow: 0 0 7px #fff, 0 0 10px #fff, 0 0 5px #fff, 0 0 5px #bc13fe, 0 0 5px #bc13fe, 0 0 5px #bc13fe, 0 0 5px #bc13fe, 0 0 5px #bc13fe;
    border-radius: 0.2rem;
    font-size: 20px;
}
select.btn.select_compare:hover {
    border: 0.2rem solid #fff;
    border-radius: 0.2rem;
    padding: 0.4em;
    box-shadow: 0 0 0.2rem #fff, 0 0 0.2rem #fff, 0 0 2rem #bc13fe, 0 0 0.8rem #bc13fe, 0 0 2.8rem #bc13fe, inset 0 0 1.3rem #bc13fe;
    background: radial-gradient(#39dfde, transparent);
}
        body {
            background-color: rgba(0, 0, 0, 0.5);
            background-image: url("{{ asset('client/img/background-product.jpg') }}");
            background-repeat: no-repeat;
            background-size: ;
        }

        .table>thead>tr>th {
            vertical-align: bottom;
            border-bottom: 0px;
        }
        .btn.build {
            position: relative;
            background-image: -webkit-linear-gradient(0deg,#1b5510 20%,#086506 40%, #224a2a 100%);
    left: 43%;
    bottom: 10px;
    width: 175px;
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
.btn.build:hover {
    border: 0.2rem solid #fff;
    border-radius: 0.2rem;
    padding: 0.4em;
    box-shadow: 0 0 0.2rem #fff, 0 0 0.2rem #fff, 0 0 2rem #bc13fe, 0 0 0.8rem #bc13fe, 0 0 2.8rem #bc13fe, inset 0 0 1.3rem #bc13fe;
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
        .text-center.neon{
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
            width: 2000px;
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
        span.badge.badge-primary {
            position: relative;
    top: 0px;
    height: 31px;
    vertical-align: middle;
    text-align: center;
    padding-top: 9px;
    background: rgb(36, 41, 201);
}
        span.badge.badge-default {
            position: relative;
    top: 0px;
    height: 31px;
    vertical-align: middle;
    text-align: center;
    padding-top: 9px;

    background: rgb(26, 180, 192);
}
        span.badge.badge-success {
            position: relative;
    top: 0px;
    height: 31px;
    vertical-align: middle;
    text-align: center;
    padding-top: 9px;
    background: rgb(32, 169, 46);
}

    </style>
@endsection
@section('content')
    <div class="header-empty-space"></div>
    <div class="container">
        <div class="empty-space col-xs-b15 col-sm-b30"></div>
        <div class="breadcrumbs">
            <a href="{{ route('client.home') }}">trang chủ</a>
            <a href="{{ URL::to('build') }}">build set</a>
        </div>
        <div class="text-center">
            <div class="simple-article size-3 grey uppercase col-xs-b5">Build Set</div>
            <div class="h2">Build Set PC Tuỳ Thích</div>
        </div>
        <div class="header-empty-space-2" style="height: 75px"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <table class="table table-tripped" width="100%">

                        <thead>
                            <th></th>
                            <th style="width: 100px; padding-right: 33px;text-align: center">Motherboard</th>
                            <th style="text-align: center">CPU</th>
                            <th style="text-align: center">Ram</th>
                            <th style="text-align: center">PSU</th>
                            <th style="text-align: center">Keyboard</th>
                            <th style="text-align: center">Mouse</th>
                            <th style="text-align: center">Headphone</th>
                            <th style="text-align: center">Storage</th>
                            <th style="text-align: center">VGA</th>
                            <th style="text-align: center;color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff, 0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">
                                Tổng Tiền</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ngang" style="vertical-align:middle">Hình Ảnh</td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p1->hinh_SP) }}" ></td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p2->hinh_SP) }}" ></td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p3->hinh_SP) }}" ></td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p4->hinh_SP) }}" ></td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p5->hinh_SP) }}" ></td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p6->hinh_SP) }}" ></td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p7->hinh_SP) }}" ></td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p8->hinh_SP) }}" ></td>
                                <td><img class="hinhanh" src="{{ asset('images/product/'.$p9->hinh_SP) }}" ></td>
                                <td rowspan="3" style="color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                 0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;
                                 vertical-align:middle;    border-left: 1px solid #ddd;">{{$total}}$</td>
                            </tr>
                            <tr>
                                <td class="ngang" style="vertical-align:middle">Thông Số</td>
                                <td>{{$p1->sort_mota_SP}}</td>
                                <td>{{$p2->sort_mota_SP}}</td>
                                <td>{{$p3->sort_mota_SP}}</td>
                                <td>{{$p4->sort_mota_SP}}</td>
                                <td>{{$p5->sort_mota_SP}}</td>
                                <td>{{$p6->sort_mota_SP}}</td>
                                <td>{{$p7->sort_mota_SP}}</td>
                                <td>{{$p8->sort_mota_SP}}</td>
                                <td>{{$p9->sort_mota_SP}}</td>
                            </tr>
                            <tr>
                                <td class="ngang" style="vertical-align:middle">Giá</td>
                                <td style="text-align: center">{{$p1->gia_SP}}$</td>
                                <td style="text-align: center">{{$p2->gia_SP}}$</td>
                                <td style="text-align: center">{{$p3->gia_SP}}$</td>
                                <td style="text-align: center">{{$p4->gia_SP}}$</td>
                                <td style="text-align: center">{{$p5->gia_SP}}$</td>
                                <td style="text-align: center">{{$p6->gia_SP}}$</td>
                                <td style="text-align: center">{{$p7->gia_SP}}$</td>
                                <td style="text-align: center">{{$p8->gia_SP}}$</td>
                                <td style="text-align: center">{{$p9->gia_SP}}$</td>
                            </tr>

                        </tbody>
                    </table>
                    <a class="btn build" href="{{ URL::to('build') }}">Tiếp tục build</a>


                </div>
            </div>
        </div>
        <div class="empty-space col-xs-b30 col-sm-b60"></div>
        </div>
@endsection
@section('js')
@endsection
