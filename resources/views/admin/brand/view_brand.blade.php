@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">THƯƠNG HIỆU / DANH SÁCH THƯƠNG HIỆU</div>
<h2 class="text-center">VIEW BRAND</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
  <p class="float-right"><a href="{{route('create_brand')}}" class="btn btn-primary">Thêm thông tin thương hiệu</a></p>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Ten thương hiệu</th>
            <th>Liên kết ngoài</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
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
            @foreach($brand as $key=>$br)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$br->ten_TH}}</td>
                <td>{{$br->slug_TH}}</td>
                <td><span class="text-ellipsis">
                    <?php
                    if($br->tinhtrang_TH==1){ ?>
                    <a href="{{URL::to('admin/view_brand/unactive_brand/'.$br->ma_TH)}}"><span class="badge badge-success">Đang hiển thị</span></a>
                    <?php
                    }else{ ?>
                    <a href="{{URL::to('admin/view_brand/active_brand/'.$br->ma_TH)}}"><span class="badge badge-primary">Đã ẩn</span></a>
                  <?php  }
                    ?>
                  </span></td>
                <td>
                    <a href="{{URL::to('admin/update_brand/'.$br->ma_TH)}}" class="active" ui-toggle-class="" ><i  style="font-size:25px" class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{URL::to('admin/delete_brand/'.$br->ma_TH)}}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete {{$br->ten_TH}}')"><i style="font-size:25px')"><i style="font-size:25px" class="fa fa-trash text-danger text"></i></a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>
  @endsection
