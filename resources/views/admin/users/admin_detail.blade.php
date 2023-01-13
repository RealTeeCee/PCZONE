@extends('admin.admin_layout')
<style>
    img.logoo:hover {
    border: 0.2rem solid #fff;
    border-radius: 50%;
    box-shadow: 0 0 0.2rem #fff, 0 0 0.2rem #fff, 0 0 2rem #bc13fb, 0 0 0.8rem #bc13fe, 0 0 2.8rem #bc13fe, inset 0 0 1.3rem #bc13fe;
}
</style>
@section('admin-content')
<h2 class="text-center">Thông Tin Admin</h1>
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
            @foreach($admin as $ad)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$ad->ten_AM}}</td>
                <td>{{$ad->chucvu}}</td>
                <td>{{$ad->email_AM}}</td>
                <td>@if($ad->avarta_AM == null)
                    <img style="height:60px;width:60px" src="{{asset('images/user.png')}}" alt="">
                    @else
                    <img style="height:60px;width:60px" src="{{asset('images/'.$ad->avarta_AM)}}" alt="">
                    @endif
                </td>
                <td>{{$ad->sdt_AM}}</td>
                <td>{{$ad->diachi_AM}}</td>
                <td>
                   <a href="{{URL::to('admin/view_admin')}}" class="btn btn-primary">Trở về</a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>

  </div>

  {{-- {{ $user->links('vendor.custom_pagination') }} --}}
  @endsection
