@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">INVOICES / VIEW</div>
<h2 class="text-center">VIEW INVOICES</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Code</th>
            <th>Customer</th>
            <th>Shipping name</th>
            <th>Quantity</th>
            <th>Coupon code</th>
            <th>Total</th>
            <th>Status</th>
            <th>Payment</th>
            <th>Date</th>
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

            @foreach($invoices as $key=>$invoice)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$invoice->so_DH}}</td>
                <td>{{$invoice->user->ten_KH}}</td>
                <td>{{$invoice->shipping->ten_GH}}</td>
                <td>{{$invoice->soluong}}</td>
                <td>{{$invoice->magiamgia}}</td>
                <td>${{$invoice->tongtien}}</td>
                <td>
                  @if($invoice->trangthai == 'Hoàn thành')
                 <span class="badge badge-success">{{$invoice->trangthai}}</span>
                  @elseif($invoice->trangthai == 'Chờ xử lý')
                  <a href="{{URL::to('admin/change_status_invoice/'.$invoice->ma_DH)}}"><span class="badge badge-primary">{{$invoice->trangthai}}</span></a>
                  @elseif($invoice->trangthai == 'Đang giao hàng')
                  <a href="{{URL::to('admin/change_status_invoice1/'.$invoice->ma_DH)}}"><span class="badge badge-primary">{{$invoice->trangthai}}</span></a>
                  @endif

                </td>
                <td>
                  @if($invoice->hinhthuc_TT == 'Paypal')
                  <i style="color:orange;font-size:30px" class="fa-brands fa-cc-paypal"></i>
                  @elseif($invoice->hinhthuc_TT == 'Momo')
                  <img style="width:30px;height:30px;margin-bottom:-10px" src="{{ asset('images/icons/momo_icons.jpeg')}}"alt="">
                  @else
                  <i style="color:green;font-size:30px" class="fa-solid fa-money-bill-1-wave"></i>
                  @endif
                </td>
                <td>{{$invoice->ngaytao}}</td>
                <td><a href="{{URL::to('admin/invoice_details/'.$invoice->ma_DH)}}"><i style="font-size:25px" class="fa fa-clipboard"></i></a></td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{ $invoices->links('vendor.custom_pagination') }}
  </div>
  @endsection
