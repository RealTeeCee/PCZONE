@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">QUẢN LÍ SẢN PHẨM / TẠO MỚI</div>
<h2 class="text-center">TẠO SẢN PHẨM MỚI</h1>
<div class="container">
    <form action="{{URL::to('admin/save_product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                    <div class="form-group" style="margin-top:20px">
                    Tên sản phẩm
                    <input type="text" name="ten_SP" class="form-control" style="width:350px">
                    </div>

                    <div class="form-group">
                    Phân loại
                        <select name="category" class="form-control"style="width:200px">
                            <option value="">-----Choose-----</option>
                            @foreach($category as $key=>$cate)
                            <option value="{{$cate->ma_PL}}"> {{$cate->ten_PL}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" >
                    Thương hiệu
                        <select name="brand" class="form-control"style="width:200px">
                            <option value="">-----Choose-----</option>
                            @foreach($brand as $key=>$bra)
                            <option value="{{$bra->ma_TH}}"> {{$bra->ten_TH}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    Còn hàng
                        <select name="product_Instock" class="form-control"style="width:200px">
                            <option value="1">Còn hàng</option>
                            <option value="0">Hết hàng</option>
                        </select>
                    </div>
                    <div class="form-group" >
                    Số lượng
                    <input type="text" name="soluong_SP" class="form-control" style="width:350px">
                    </div>
                    <div class="form-group">
                   Sản phẩm Hot
                    <select  name="isHot" class="form-control"style="width:200px">
                        <option value="0">Bình thường</option>
                        <option value="1">Hot</option>
                    </select>
                </div>
                <div class="form-group">
                    Sản phẩm mới
                    <select  name="isNew" class="form-control"style="width:200px">
                        <option value="0">Cũ </option>
                        <option value="1">Mới</option>
                    </select>
                </div>
                <div class="form-group">
                    Hiển thị
                    <select  name="tinhtrang_SP" class="form-control"style="width:200px">
                        <option value="1">Hiển thị</option>
                        <option value="1">Ẩn bớt</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                Giá
                    <input type="text" name="gia_SP" class="form-control" style="width:350px">
                </div>
                <div class="form-group" >
                Liên kết ngoài
                    <input type="text" name="product_sku" class="form-control" style="width:350px">
                </div>
                Mô tả
                <div class="form-group">
                    <textarea   rows="5" cols="60" name="mota_SP"></textarea>
                </div>
                Mô tả ngắn
                <div class="form-group">
                    <textarea   rows="5" cols="60" name="sort_mota_SP"></textarea>
                </div>
                <div class="form-group">
                Hình ảnh
                    <input type="file" name="hinh_SP" class="form-control" style="width:350px">
                </div>
                <div class="form-group">
                Gallery ảnh
                    <input type="file" name="product_image_gallery" class="form-control" style="width:350px">
                </div>
            </div>
        </div>
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info btn-lg btn-block" name="create_product">
    </form>
</div>
@endsection
