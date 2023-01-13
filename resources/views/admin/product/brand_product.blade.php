@extends('admin.admin_layout')
@section('admin-content')
<h2 class="text-center">DANH SÁCH SẢN PHẨM</h1>
    <div class="button" style="display: flex;justify-content: end;">
        <div class="right" style="display: flex;">
            <div class="dropdown" style="padding-right: 50px;">
                <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Phân loại
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{URL::to('admin/view_product')}}">Tất cả</a>
                  @foreach($category as $key=>$cate)
                  <a class="dropdown-item" href="{{URL::to('admin/view_product_cate/'.$cate->category_name)}}">{{$cate->ten_PL}}</a>
                  @endforeach
                </div>
        </div>
        <div class="dropdown" style="padding-right: 50px;">
            <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Thương hiệu
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{URL::to('admin/view_product')}}">Tất cả</a>
              @foreach($brand as $key=>$bra)
              <a class="dropdown-item" href="{{URL::to('admin/view_product_brand/'.$bra->brand_id)}}">{{$bra->ten_TH}}</a>
              @endforeach
            </div>
        </div>
        </div>
    </div>
<div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
      <thead>
      <tr>
      <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình Ảnh</th>
            <th>Bst ảnh</th>
            <th>Phân loại</th>
            <th>Thương hiệu</th>
            <th>isHot</th>
            <th>isNew</th>
            <th>Còn hàng</th>
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
            @foreach($product as $key=>$pro)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$pro->ten_SP}}</td>
                <td><img src="{{asset('images/product/'.$pro->hinh_SP)}}" alt="{{$pro->ten_SP}}" style="width:100;height:100px"></td>
                <td>{{$pro->category->ten_PL}}</td>
                <td>{{$pro->brand->ma_TH}}</td>
                <td>{{$pro->gia_SP}}</td>

                <td>
                    @if($pro->product_isHot == 0)
                        Normal
                    @else
                        Hot
                    @endif
                </td>
                <td>
                    @if($pro->product_isNew == 0)
                        Old
                    @else
                        New
                    @endif
                </td>
                <td>
                    @if($pro->product_inStock == 0)
                        Instock
                    @else
                        Outstock
                    @endif
                </td>
                <td><span class="text-ellipsis">
                    <?php
                    if($pro->tinhtrang_SP==1){ ?>
                    <a href="{{URL::to('admin/view_product/unactive_product/'.$pro->ma_SP)}}"><span class="badge badge-success">Đang hiển thị </span></a>
                    <?php
                    }else{ ?>
                    <a href="{{URL::to('admin/view_product/active_product/'.$pro->ma_SP)}}"><span class="badge badge-primary">Đã ẩn </span></a>
                  <?php  }
                    ?>
                  </span></td>
                <td >
                  <a href="{{URL::to('admin/product_details/'.$pro->ma_SP)}}" class="active" ui-toggle-class="" ><i style="font-size:25px" class="fa-solid fa-eye"></i></a>
                    <a href="{{URL::to('admin/edit_product/'.$pro->ma_SP)}}" class="active" ui-toggle-class="" ><i  style="font-size:25px" class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{URL::to('admin/delete_product/'.$pro->ma_SP)}}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete {{$pro->ten_SP}}')"><i style="font-size:25px')"><i style="font-size:25px" class="fa fa-trash text-danger text"></i></a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{ $product->links('vendor.custom_pagination') }}
  </div>
  @endsection
