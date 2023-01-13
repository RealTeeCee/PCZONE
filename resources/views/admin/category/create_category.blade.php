@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">PHÂN LOẠI SẢN PHẨM / TẠO MỚI </div>
<h2 class="text-center">THÊM PHÂN LOẠI SẢN PHẨM</h1>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/save_category')}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:50px">
        <label>Tên loại sản phẩm</label>
        <input type="text" name="ten_PL" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:50px">
            <label>Chọn danh mục cha</label>
            <select class="form-control" name="parent_id" style="width:650px">
              <option value="0">Chọn danh mục cha</option>
              {!! $htmlOption !!}
            </select>
        </div>
        <div class="form-group" style="margin-top:20px">
            <label for="">Trạng thái</label>
            <select name="trinhtrang_PL" class="form-control"style="width:650px">
                <option value="1">Đang hiển thị</option>
                <option value="0">Đã ẩn</option>
            </select>
        </div>
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info" name="create_cate">
    </form>
</div>
@endsection
