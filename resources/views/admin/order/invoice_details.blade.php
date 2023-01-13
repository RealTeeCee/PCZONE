@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">INVOICES / DETAILS</div>
<h2 class="text-center">INFORMATION SHIPPING</h1>

<div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Shipping name</th>
            <th>Shipping phone</th>
            <th>Shipping email</th>
            <th>Shiping address</th>
            <th>Shipping note</th>
            <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $i = 1;
            ?>

            @foreach($invoices as $key=>$invoice)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$invoice->shipping->ten_KH}}</td>
                <td>{{$invoice->shipping->sdt_KH}}</td>
                <td>{{$invoice->shipping->email_KH}}</td>
                <td>{{$invoice->shipping->diachi_GH}}</td>
                <td>{{$invoice->shipping->ghichu}}</td>
                <td>{{$invoice->shipping->ngaybatdau_GH}}</td>
            </tr>
            @endforeach

      </tbody>
    </table>
  </div>
  <h2 class="text-center">INVOICE DETAILS</h1>
  <div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $i = 1;
            $total = 0;
            ?>
            @foreach($invoice_details as $key=>$in_de)
            @php
            $total += $in_de->soluong_CT *$in_de->tongsotien_CT;
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{$in_de->ten_SP}}</td>
                <td><img style="width:50px;heigh:50px" src="{{asset('images/product/'.$in_de->hinh_SP)}}" alt=""></td>
                <td>{{$in_de->soluong_CT}}</td>
                <td>${{$in_de->tongsotien_CT}}</td>
                <td>${{$in_de->tongsotien_CT * $in_de->soluong_CT}}</td>
            </tr>
            @endforeach
            <tr>
              <td>Shipping: </td>
              <td><td><td><td><td>Free Shipping</td></td></td></td></td>
          </tr>
          <tr>
            <td>Tax: </td>
            <td><td><td><td><td>8%</td></td></td></td></td>
          </tr>

          @if($coupon == '')
          @php
          $tax = $total * 8/100;
          $after_total =  $total + $tax;
          @endphp
          <tr>
            <td>Coupon: </td>
            <td><td><td><td><td>{{$coupon}}</td></td></td></td></td>
          </tr>
          @else
            @if($coupon->voucher_options == 'Percent')
            @php
            $tax = $total * 8/100;
            $total_tax =  $total + $tax;
            $coupon_total =  $total_tax * $coupon->voucher_value/100;
            $after_total = $total_tax - $coupon_total;
            @endphp
            <tr>
              <td>Coupon: </td>
              <td><td><td><td><td>{{$coupon->voucher_code}} - {{$coupon->voucher_value}}%</td></td></td></td></td>
            </tr>
            @else
            @php
            $tax = $total * 8/100;
            $total_tax =  $total + $tax ;
            $after_total =  $total_tax - $coupon->voucher_value;
            @endphp
            <tr>
              <td>Coupon: </td>
              <td><td><td><td><td>{{$coupon->voucher_code}} - {{$coupon->voucher_value}}$</td></td></td></td></td>
            </tr>
            @endif
          @endif
            <tr>
                <td>Total order: </td>
                <td><td><td><td><td>${{$after_total}}</td></td></td></td></td>
            </tr>
      </tbody>
    </table>

  </div>
  <a target="_blank" class="btn btn-primary"href="{{URL::to('admin/print_invoice/'.$invoice_id)}}">Print PDF</a>
  @endsection
