<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@extends('client.layouts.master')
@section('title')
    <title>Build</title>
@endsection
@section('css')
    <style>
        .col-12.error {
    position: relative;
    left: 468px;
}
        .products-wrapper .product-shortcode.style-1 {
            margin: 10 10 20 10;
        }

        select.btn.select_compare {
            border: 2px solid;
            background: radial-gradient(#39dfde, transparent);
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

        .btn.build {
            position: relative;
            background-image: -webkit-linear-gradient(0deg, #da000b 20%, #ff0000 40%, #801212 100%);
            left: 42%;
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

        .text-center.neon {
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
            <a href="{{ route('client.home') }}">Trang chủ</a>
            <a href="{{ URL::to('build') }}">build</a>
        </div>
        <div class="text-center">
            <div class="simple-article size-3 grey uppercase col-xs-b5">Build</div>
            <div class="h2">Build PC tuỳ thích</div>
        </div>
        <div class="header-empty-space-2" style="height: 75px"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <table class="table table-tripped">
                        <form action="{{ URL::to('build_set') }}" method="post">
                            @csrf
                            <thead>
                                <tr>
                                    <th style="width: 150px"><select class="btn select_compare" data-depend=""
                                            name="motherboard">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'Motherboard')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                    <th style="width: 95px"><select class="btn select_compare" data-depend=""
                                            name="cpu">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'CPU')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                    <th style="width: 95px"><select class="btn select_compare" data-depend=""
                                            name="ram">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'Ram')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                    <th style="width: 95px"><select class="btn select_compare" data-depend=""
                                            name="psu">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'PSU')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                    <th style="width: 135px"><select class="btn select_compare" data-depend=""
                                            name="keyboard">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'Keyboard')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                    <th style="width: 95px"><select class="btn select_compare" data-depend=""
                                            name="mouse">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'Mouse')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                    <th style="width: 140px"><select class="btn select_compare" data-depend=""
                                            name="headphone">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'Headphone')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                    <th style="width: 135px"><select class="btn select_compare" data-depend=""
                                            name="storage">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'Storage')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                    <th style="width: 95px"><select class="btn select_compare" data-depend=""
                                            name="vga">
                                            @foreach ($products as $p)
                                                @if ($p->component == 'VGA')
                                                    <option class="nhoxiu" selected disabled>{{ $p->component }}</option>
                                                    <option class="select_compare_'.$comp->ma_SP.'" id="selected">
                                                        {{ $p->ten_SP }}</option>
                                                @endif
                                            @endforeach
                                        </select></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                    </table>
                    <button type="submit" class="btn build">Build</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 error">
                    @error('motherboard')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                    @error('cpu')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                    @error('ram')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                    @error('psu')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                    @error('keyboard')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                    @error('mouse')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                    @error('headphone')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                    @error('storage')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                    @error('vga')
                                            <div style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                                             @enderror
                </div>
            </div>
        </div>
        <div class="empty-space col-xs-b30 col-sm-b60"></div>
    </div>
@endsection
@section('js')
@endsection
