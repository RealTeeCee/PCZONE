@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">THƯƠNG HIỆU / THÊM MỚI</div>
<h2 class="text-center">THÊM THƯƠNG HIỆU MỚI</h1>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/save_brand')}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:50px">
        <label>Tên Thương hiệu</label>
        <input type="text" name="ten_TH" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:20px">
            <label for="">Trạng thái</label>
            <select name="tinhtrang_TH" class="form-control"style="width:650px">
                <option value="0"> Hiển thị</option>
                <option value="1">Ẩn bớt</option>
            </select>
        </div>
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info" name="create_brand">
    </form>
</div>
@endsection
