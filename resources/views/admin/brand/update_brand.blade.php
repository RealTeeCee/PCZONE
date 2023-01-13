@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">THƯƠNG HIỆU / CẬP NHẬT</div>
<h2 class="text-center">CẬP NHẬT THƯƠNG HIỆU</h1>

<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/saveUpdate_brand/'.$brand->ma_TH)}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:50px">
            <label>Name</label>
            <input type="text" name="ten_TH" class="form-control" style="width:650px" value="{{$brand->ten_TH}}">
            </div>
            <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info" name="update_cate">
    </form>
</div>

@endsection
