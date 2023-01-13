@extends('admin.admin_layout')
<style>ul.error {
    position: relative;
    left: -5px;
    bottom: -25px;
}
        li.error {
    font-size: 15px;
    color: #fff;
    text-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 2px #fff, 0 0 5px #ff0000, 0 0 5px #ff0000, 0 0 5px #920505, 0 0 5px #ef2525, 0 0 5px #ef2525;
}
.chon-avarta {
            position: relative;
            left: -538px;
            bottom: 330px;
        }
</style>
@section('admin-content')
    <div class="container">
        <h1 class="text-center neon" style="font-size:30px;margin-top:50px">Thông tin Admin</h1>
        <div class="space"></div>
        <div class="row" style="display:block;margin-left:700px">
            <form style=" position: relative;left: -105px;"
        action="{{ Route('update_infor_admin', $user->ma_AM) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Họ tên: </label>
                    <input type="text" style="width:300px" name="user_name" value="{{ $user->ten_AM }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Email: </label>
                    <input type="text" readonly style="width:300px" name="user_email"
                        value="{{ $user->email_AM }}" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ: </label>
                    <input type="text" style="width:300px" name="user_address" value="{{ $user->diachi_AM }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại: </label>
                    <input type="text" style="width:300px" name="user_phone" value="{{ $user->sdt_AM }}"
                        class="form-control" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Save profile</button>
                <div class="chon-avarta">
                    @if ($user->avarta_AM == null)
                        <img src="{{ asset('images/user.png') }}" style=" width: 150px;"
                            class="mx-auto  d-block rounded-circle" width="30%"><br>
                    @else
                        <img src="{{ asset('images/'.$user->avarta_AM) }}"
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
                method="POST" action="{{ Route('update_image',$user->ma_AM) }}" enctype="multipart/form-data">

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
    </div>
@endsection
