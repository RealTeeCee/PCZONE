<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@extends('client.layouts.master')
@section('title')
    <title>Information</title>
@endsection
@section('css')
    <style>
        .products-wrapper .product-shortcode.style-1 {
            margin: 10 10 20 10;
        }
        ul.error {
    position: relative;
    left: -5px;
    bottom: -25px;
}
        li.error {
    font-size: 15px;
    color: #fff;
    text-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff, 0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;
}
        label.custom-file-label {
            left: 160px;
            color: whitesmoke;
            background: rebeccapurple;
            bottom: -8px;
        }

        button.btn.btn-outline-success.mt-3.mx-auto.d-block.w-50 {
            background: rebeccapurple;
            color: whitesmoke;
        }

        .chon-avarta {
            position: relative;
            left: -538px;
            bottom: 330px;
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
        <h1 class="text-center neon" style="font-size:30px;margin-top:50px">THÔNG TIN CHUNG</h1>
        <div class="tabs-block" style="margin-top:10px">
            <div class="tabulation-menu-wrapper text-center">
                <div class="tabulation-title simple-input">description</div>
                <ul class="tabulation-toggle">
                    <li><a class="tab-menu active">Thông tin cá nhân</a></li>
                    <li><a class="tab-menu">Đổi mật khẩu</a></li>
                    <li><a class="tab-menu">Lịch sử đặt hàng</a></li>
                </ul>
            </div>
            <div class="empty-space col-xs-b30 col-sm-b60"></div>

            <div class="tab-entry visible">
                <div class="row" style="display:block;margin-left:700px">
                    <form style=" position: relative;left: -105px;"
                        action="{{ URL::to('update_infor_user/' . $user->ma_KH) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên: </label>
                            <input type="text" style="width:300px" name="user_name" value="{{ $user->ten_KH }}"
                                class="form-control" placeholder="">
                            @error('name')
                            <div class="error_name" style="font-size:15px;  color: #fff;text-shadow:0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff,
                                            0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="text" readonly style="width:300px" name="user_email"
                                value="{{ $user->email_KH }}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ: </label>
                            <input type="text" style="width:300px" name="user_address" value="{{ $user->diachi_KH }}"
                                class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại: </label>
                            <input type="text" style="width:300px" name="user_phone" value="{{ $user->sdt_KH }}"
                                class="form-control" placeholder="">
                        </div>

                        <div class="form-check" style="position: relative">
                            <input class="form-check-input" type="checkbox" value="Nam" name="user_gender"
                                id="flexCheckDefault" onclick="onlyOne(this)" @if ($user->gioitinh_KH == 'Nam') checked @endif>
                            <label style="margin-top: 5px" class="form-check-label" for="flexCheckDefault">
                                Nam
                            </label>
                        </div>
                        <div class="form-check" id="bbb">
                            <input class="form-check-input" type="checkbox" value="Nữ" name="user_gender"
                                id="flexCheckChecked" onclick="onlyOne(this)"  @if ($user->gioitinh_KH == 'Nữ') checked @endif>
                            <label style="margin-top: 5px;" class="form-check-label" for="flexCheckChecked">
                                Nữ
                            </label>
                        </div>
                        <script>
                            function onlyOne(checkbox) {
                                var checkboxes = document.getElementsByName('user_gender')
                                checkboxes.forEach((item) => {
                                    if (item !== checkbox) item.checked = false
                                })
                            }
                        </script>

                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                        <div class="chon-avarta">
                            @if ($user->avarta_KH == null)
                                <img src="{{ asset('images/favicon.png') }}" style=" width: 150px;"
                                    class="mx-auto  d-block rounded-circle" width="30%"><br>
                            @else
                                <img src="{{ asset('images/' . $user->avarta_KH) }}"
                                    style="
                            width: 150px;"
                                    class="mx-auto  d-block rounded-circle" width="30%"><br>
                            @endif
                            @if ($errors->any())
                            <div class="row text-center">
                                <ul class="error">
                                    @foreach ($errors->all() as $error)
                                        <li class="error">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @else
                            <p style="text-align: center; color:darkgrey" class="mt-2 ">Định dạng:.JPEG, .PNG, .JPG</p>

                        @endif


                        </div>
                        <?php
                        $update_success = Session::get('update_success');
                        if ($update_success) {
                            echo '<script>alert("' . $update_success . '");</script>';
                            Session::put('update_success', null);
                        }
                        ?>
                    </form>
                    <form style="position: relative;
                    left: -655px;
                    bottom: 272px;"
                        method="POST" action="{{ url('update_image/' . $user->ma_KH) }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label btn" for="avatar">Chọn hình ảnh <input type="file"
                                        class="custom-file-input" id="avatar" name="avatar"></label>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-success mt-3 mx-auto d-block w-50">Lưu</button>

                    </form>
                </div>
                <div class="empty-space col-xs-b30 col-sm-b60"></div>
            </div>


            <div class="tab-entry">
                <form action="{{ URL::to('change_password/' . $user->ma_KH) }}" method="post">
                    <div class="row" style="display:block;margin-left:700px">
                        @csrf
                        <div class="form-group">
                            <label for="">Mật khẩu của bạn: </label>
                            <input type="password" style="width:300px" name="old_password" value=""
                                class="form-control" placeholder="">
                            <?php
                            $change_password = Session::get('change_password');
                            if ($change_password) {
                                echo '<script>alert("' . $change_password . '");</script>';
                                Session::put('change_password', null);
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu mới: </label>
                            <input type="password" style="width:300px" name="new_password" value=""
                                class="form-control" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="width: 299px;
                        left: 11px; position: relative;">Thay đổi</button>
                        <?php
                        $change_password_success = Session::get('change_password_success');
                        if ($change_password_success) {
                            // echo '<div style="color:green;font-size:15px">'.$change_password_success.'</div>';
                            echo '<script>alert("' . $change_password_success . '");</script>';
                            Session::put('change_password_success', null);
                        }
                        ?>
                    </div>
                </form>
                <div class="empty-space col-xs-b30 col-sm-b60"></div>
            </div>

            <div class="tab-entry">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-tripped">
                                <thead>
                                    <tr>
                                        <th>Mã hoá đơn</th>
                                        <th>Ngày</th>
                                        <th>Tình trạng</th>
                                        <th>Thanh toán</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $key => $invoice)
                                        <tr>
                                            <td>{{ $invoice->so_DH }}</td>
                                            <td>{{ $invoice->ngaytao }}</td>
                                            <td>
                                                @if ($invoice->trangthai == 'Chờ xử lý')
                                                    <span class="badge badge-default">{{ $invoice->trangthai }}</span>
                                                @elseif ($invoice->trangthai == 'Đang giao hàng')
                                                    <span class="badge badge-primary">{{ $invoice->trangthai }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ $invoice->trangthai }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($invoice->hinhthuc_TT == 'Paypal')
                                                    <img style="width:50px;height:50px"
                                                        src="{{ asset('images/icons/paypal.png') }}"alt="">
                                                @elseif($invoice->hinhthuc_TT == 'Momo')
                                                    <img style="width:30px;height:30px;margin-left:7%"
                                                        src="{{ asset('images/icons/momo_icons.jpeg') }}"alt="">
                                                @else
                                                    <img style="width:50px;height:50px"
                                                        src="{{ asset('images/icons/cash.png') }}"alt="">
                                                @endif
                                            </td>
                                            <td><a target="_blank"
                                                    class="btn btn-primary"href="{{ URL::to('view_invoice_user/' . $invoice->ma_DH) }}">In Hoá Đơn</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="empty-space col-xs-b30 col-sm-b60"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
