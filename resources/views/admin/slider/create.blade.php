@extends('admin.admin_layout')
@section('admin-content')
<style>
    .btn.btn-info.2{

    }
</style>
<h2 class="text-center">Thêm Slide </h1>
<div class="container" style="margin-left: 300px">
    <?php
    if(!empty($message)){
                echo '<script>alert("'.$message.'");</script>';
        }
            ?>
    <form style="position: relative;
    left: 124px;" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="ten">Tên</label>
            <input type="text"  name="name" class="form-control" style="width:350px">
            <input type="hidden"  name="_method" value="POST" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            <label for="image" class="ten">Hình Ảnh</label>
            <input type="file"  name="image" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            <label for="event" class="event">Sự Kiện</label>
            <input type="text"  name="product_id" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            <p>Mô tả</p>
            <textarea   rows="3" cols="50" name="description"></textarea>
        </div>

        <input style="width:150px"  type="submit" value="Tạo mới" class="btn btn-success" name="create">

    </form>
    <a style="position: relative;
    top: -38px;
    left: 290px;
    width: 150px;" class="btn btn-secondary" href="{{ route('slider.index') }}" >Trở về</a>
</div>
@endsection
