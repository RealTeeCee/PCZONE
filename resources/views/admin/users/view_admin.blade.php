@extends('admin.admin_layout')
<style>
    img.logoo:hover {
    border: 0.2rem solid #fff;
    border-radius: 50%;
    box-shadow: 0 0 0.2rem #fff, 0 0 0.2rem #fff, 0 0 2rem #bc13fb, 0 0 0.8rem #bc13fe, 0 0 2.8rem #bc13fe, inset 0 0 1.3rem #bc13fe;
}
</style>
@section('admin-content')
<?php
                                $create = Session::get('create');
                                if($create){
                                    echo '<script>alert("'.$create.'")</script>';
                                    Session::put('create', null);
                                }
                                ?>
<h2 class="text-center">Thông Tin Admin</h1>
<p class="float-sm-right">
    <a class="btn btn-primary" href="{{ Route('create_admin') }}">Thêm nhân viên</a>
</p>
<div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Tên Admin</th>
            <th>Chức vụ</th>
            <th>Email </th>
            <th>Hình Admin</th>
            <th>Sđt Admin</th>
            <th>Địa chỉ</th>
            <th>Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
            $i = 1;
            $message = Session::get('message');
            if($message){
                echo '<script>alert("'.$message.'");</script>';
                Session::put('message', null);
            }
            ?>
            @foreach($users as $key=>$user)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$user->ten_AM}}</td>
                <td>{{$user->chucvu}}</td>
                <td>{{$user->email_AM}}</td>
                <td>@if($user->avarta_AM == null)
                    <img style="height:60px;width:60px" src="{{asset('images/user.png')}}" alt="">
                    @else
                    <img style="height:60px;width:60px" src="{{asset('images/'.$user->avarta_AM)}}" alt="">
                    @endif
                </td>
                <td>{{$user->sdt_AM}}</td>
                <td>{{$user->diachi_AM}}</td>
                <td>
                    @if(Session::get('boss_id') == 1)
                        @if($user->boss == 2 || $user->boss == 1)
                        <a href="http://zalo.me/g/qzzqos095" target="_blank" class="zalo"><img class="logoo" style="width:30px;height:30px" src="https://nocodebuilding.com/wp-content/uploads/2020/07/zl.png" alt="Chat Zalo"></a>
                        @elseif($user->boss == 3)
                        <a href="{{ Route ('admin_detail',['admin_id' =>$user->ma_AM])}}"><img class="logoo" style="width:30px;height:30px" src="{{asset('images/view.png')}}"></a>
                        <a href="{{URL::to('admin/delete_admin/'.$user->ma_AM)}}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete {{$user->ten_AM}}')"><img class="logoo" style="width:30px;height:30px" src="{{asset('images/trash.png')}}">
                        @endif
                    @elseif(Session::get('boss_id') == 2)
                        @if($user->boss == 1)
                        <a href="http://zalo.me/g/qzzqos095" target="_blank" class="zalo"><img class="logoo" style="width:30px;height:30px" src="https://nocodebuilding.com/wp-content/uploads/2020/07/zl.png" alt="Chat Zalo"></a>
                        @elseif($user->boss == 3)
                        <a href="{{ Route ('admin_detail',['admin_id' =>$user->ma_AM])}}"><img class="logoo" style="width:30px;height:30px" src="{{asset('images/view.png')}}"></a>
                        <a href="{{URL::to('admin/delete_admin/'.$user->ma_AM)}}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete {{$user->ten_AM}}')"><img class="logoo" style="width:30px;height:30px" src="{{asset('images/trash.png')}}">
                        @endif
                    @else
                         @if($user->boss == 3)
                            <a href="https://m.me/PCZoneGaming/" target="_blank">
                            <img class="logoo" style="width:30px;height:30px" src="https://nocodebuilding.com/wp-content/uploads/2020/07/fb.png" >
                            </a>
                        <a href="{{ Route ('admin_detail',['admin_id' =>$user->ma_AM])}}"><img class="logoo" style="width:30px;height:30px" src="{{asset('images/view.png')}}"></a>
                        @else
                            <img class="logoo" style="width:30px;height:30px" src="{{asset('images/stop.png')}}">
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>

  </div>

  {{-- {{ $user->links('vendor.custom_pagination') }} --}}
  @endsection
