@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">PHÂN LOẠI SẢN PHẨM / CẬP NHẬT</div>
<h2 class="text-center">CẬP NHẬT THÔNG TIN LOẠI SP</h1>

<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/saveUpdate_category/'.$category->ma_PL)}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:50px">
            <label>Tên phân loại</label>
            <input type="text" name="ten_PL" class="form-control" style="width:650px" value="{{$category->ten_PL}}">
            </div>
            <div class="form-group" style="margin-top:50px">
                <label>Chọn danh mục cha</label>
                <select class="form-control" name="parent_id" style="width:650px">
                  <option value="0">Chọn danh mục cha</option>
                  {!! $htmlOption !!}
                </select>
            </div>
            <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info" name="update_cate">
    </form>
</div>

@endsection
