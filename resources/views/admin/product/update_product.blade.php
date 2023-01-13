@extends('admin.admin_layout')
@section('admin-content')

<h2 class="text-center">CẬP NHẬT THÔNG TIN CPU </h1>
<div class="container">
    <form action="{{URL::to('admin/save_update_product/'.$product->ma_SP)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    Tên sản phẩm
                    <input type="text" value="{{ $product->ten_SP }}" name="ten_SP" class="form-control" style="width:350px">
                </div>
                <div class="form-group">
                        Phân loại
                        <select name="category" class="form-control"style="width:200px">
                            @foreach($categories as $cate)
                            <option {{$product->ma_PL == $cate->ma_PL?'selected="selected"': ''}} value="{{$cate->ma_PL}}">{!! $cate->parent_id ==0? $cate->ten_PL : '&nbsp;&nbsp;&nbsp;&nbsp;'.$cate->ten_PL !!}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group" >
                    Thương hiệu
                    <select  name="brand" class="form-control"style="width:200px">
                        @foreach($brands as $key=>$brand)
                        @if($product->ma_SP == $brand->ma_TH)
                        <option selected value="{{$brand->ma_TH}}">{{$brand->ten_TH}}</option>
                        @else
                        <option value="{{$brand->ma_TH}}"> {{$brand->ten_TH}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                   Sản phẩm Hot
                    <select  name="isHot" class="form-control"style="width:200px">
                        <option value="0">Normal</option>
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
                    Còn hàng
                    <select  name="product_Instock" class="form-control"style="width:200px">
                        <option value="0">Còn hàng</option>
                        <option value="1">Hết hàng</option>
                    </select>
                </div>
                <div class="form-group" >
                    Số lượng
                    <input type="text" value="{{ $product->soluong_SP}}" name="soluong_SP" class="form-control" style="width:350px">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    Giá sản phẩm
                    <input type="text" value="{{ $product->gia_SP}}" name="gia_SP" class="form-control" style="width:350px">
                </div>
                <div class="form-group" >
                    Liên kết ngoài
                    <input type="text" value="{{ $product->product_sku}}" name="product_sku" class="form-control" style="width:350px">
                </div>

                Mô tả
                <div class="form-group">
                    <textarea   rows="5" cols="60" name="mota_SP">{{ $product->mota_SP}}</textarea>
                </div>
                Mô tả ngắn
                <div class="form-group">
                    <textarea   rows="5" cols="60" name="sort_mota_SP">{{ $product->sort_mota_SP}}</textarea>
                </div>
                <div class="form-group">
                    Hình ảnh
                    <img src="{{asset('images/product/'.$product->hinh_SP)}}" style="width:100px; height:100px" alt="">
                    <input type="file"  name="hinh_SP" class="form-control" style="width:350px">
                </div>
                <div class="form-group">
                    Gallery Ảnh
                    <img src="{{asset('images/product/'.$product->product_image_gallery)}}" style="width:100px; height:100px" alt="">
                    <input type="file"  name="product_image_gallery" class="form-control" style="width:350px">
                </div>

            </div>



        </div>

        <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info btn-lg btn-block" name="update">
    </form>
</div>
@endsection
