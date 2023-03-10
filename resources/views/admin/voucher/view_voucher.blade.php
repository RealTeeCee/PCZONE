@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">PROMOTION / VIEW</div>
<h2 class="text-center">VIEW PROMOTION</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
  <p class="float-right"><a href="{{URL::to('admin/create_coupon')}}" class="btn btn-primary">Add coupon</a></p>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Code</th>
            <th>Quantity</th>
            <th>Options</th>
            <th>Value</th>
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
            @foreach($vouchers as $key=>$voucher)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$voucher->voucher_name}}</td>
                <td>{{$voucher->voucher_code}}</td>
                <td>{{$voucher->voucher_quantity}}</td>
                <td>{{$voucher->voucher_options}}</td>
                @if($voucher->voucher_options == 'Percent')
                <td>{{$voucher->voucher_value}}%</td>
                @else
                <td>${{$voucher->voucher_value}}</td>
                @endif
                <td>{{$voucher->created_at}}</td>
                <td>
                    <a href="{{URL::to('admin/update_coupon/'.$voucher->voucher_id)}}" class="active" ui-toggle-class="" ><i  style="font-size:25px" class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{URL::to('admin/delete_coupon/'.$voucher->voucher_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete {{$voucher->voucher_code}}')"><i style="font-size:25px')"><i style="font-size:25px" class="fa fa-trash text-danger text"></i></a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>
  @endsection