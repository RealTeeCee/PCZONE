@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">PHÂN LOẠI SẢN PHẨM / XEM DANH SÁCH</div>
<h2 class="text-center">DANH SÁCH PHÂN LOẠI SẢN PHẨM</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
  <p class="float-right"><a href="{{route('create_category')}}" class="btn btn-primary">Add Category</a></p>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Tên phân loại</th>
            <th>Parent_id</th>
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
            @foreach($category as $key=>$cate)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$cate->ten_PL}}</td>
                <td>{{$cate->parent_id}}</td>
                <td><span class="text-ellipsis">
                    <?php
                    if($cate->trinhtrang_PL==1){ ?>
                    <a href="{{URL::to('admin/view_category/unactive_category/'.$cate->ma_PL)}}"><span class="badge badge-success">Đang hiển thị</span></a>
                    <?php
                    }else{ ?>
                    <a href="{{URL::to('admin/view_category/active_category/'.$cate->ma_PL)}}"><span class="badge badge-primary">Đã ẩn</span></a>
                  <?php  }
                    ?>
                  </span></td>
                <td>
                    <a href="{{URL::to('admin/update_category/'.$cate->ma_PL)}}" class="active" ui-toggle-class="" ><i  style="font-size:25px" class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{URL::to('admin/delete_category/'.$cate->ma_PL)}}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete {{$cate->ten_PL}}')"><i style="font-size:25px')"><i style="font-size:25px" class="fa fa-trash text-danger text"></i></a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>
  @endsection
