@extends('admin.admin_layout')
<style>
    img.logoo:hover {
        border: 0.2rem solid #fff;
        border-radius: 50%;
        box-shadow: 0 0 0.2rem #fff, 0 0 0.2rem #fff, 0 0 2rem #bc13fb, 0 0 0.8rem #bc13fe, 0 0 2.8rem #bc13fe, inset 0 0 1.3rem #bc13fe;
    }
</style>
@section('admin-content')
    <h2 class="text-center">Thông Tin Khách Hàng</h1>
        <div class="table-responsive" style="margin-top:50px; text-align:center">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên KH</th>
                        <th>Giới Tính</th>
                        <th>Email</th>
                        <th>Hình KH</th>
                        <th>Sđt KH</th>
                        <th>Địa chỉ</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $message = Session::get('message');
                    if ($message) {
                        echo '<script>alert("' . $message . '");</script>';
                        Session::put('message', null);
                    }
                    ?>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->ten_KH }}</td>
                            <td>{{ $user->gioitinh_KH }}</td>
                            <td>{{ $user->email_KH }}</td>
                            <td>
                                @if ($user->avarta_KH)
                                    <img style="height:60px;width:60px" src="{{ asset('images/' . $user->avarta_KH) }}"
                                        alt="">
                                @else
                                    <img style="height:60px;width:60px" src="{{ asset('images/user.png') }}" alt="">
                                @endif
                            </td>
                            <td>{{ $user->sdt_KH }}</td>
                            <td>{{ $user->diachi_KH }}</td>
                            <td>
                                @if (Session::get('boss_id') == 1)
                                    <a href="{{ URL::to('admin/delete_admin/' . $user->ma_KH) }}" class="active"
                                        ui-toggle-class=""
                                        onclick="return confirm('Do you wanna delete {{ $user->ten_KH }}')"><img
                                            class="logoo" style="width:30px;height:30px"
                                            src="{{ asset('images/trash.png') }}"></a>
                                @else
                                    <img class="logoo" style="width:30px;height:30px"
                                        src="{{ asset('images/stop.png') }}">
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        {{-- {{ $user->links('vendor.custom_pagination') }} --}}
    @endsection
