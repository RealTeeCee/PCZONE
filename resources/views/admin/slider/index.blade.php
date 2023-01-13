@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">SLIDER / VIEW</div>
<h2 class="text-center">Danh Sách Slide</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
  <p class="float-right"><a href="{{route('slider.create')}}" class="btn btn-primary">Thêm Slide</a></p>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Sự Kiện</th>
            <th>Hình Ảnh</th>
            <th>Ngày Tạo Slide</th>
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
            @foreach($sliders as $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>{{$slider->sukien}}</td>
                <td><img src="{{asset('images/sliders/'.$slider->image)}}" alt="{{$slider->name}}" style="width:350px;height:100px"></td>
                <td>{{$slider->created_at}}</td>
                <td>
                    <a href="{{route('slider.edit',['id'=>$slider->id]) }}" class="active" ui-toggle-class="" ><i  style="font-size:25px" class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{ route('slider.destroy',['id'=>$slider->id]) }}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete {{$slider->sliders_name}}')"><i style="font-size:25px')"><i style="font-size:25px" class="fa fa-trash text-danger text"></i></a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>
  @endsection
