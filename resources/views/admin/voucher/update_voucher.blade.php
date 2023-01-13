@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">PROMOTION / CREATE</div>
<h2 class="text-center">UPDATE PROMOTION</h1>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/saveUpdate_coupon/'.$voucher->voucher_id)}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:30px">
            <label>Name</label>
            <input type="text" name="voucher_name" value="{{$voucher->voucher_name}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Code</label>
            <input type="text" name="voucher_code" value="{{$voucher->voucher_code}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Quantity</label>
            <input type="text" name="voucher_quantity" value="{{$voucher->voucher_quantity}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Options</label>
            <select name="voucher_options" class="form-control"style="width:650px">
                @if($voucher->voucher_options == 'Percent')
                <option selected value="{{$voucher->voucher_options}}">{{$voucher->voucher_options}}</option>
                <option value="Cash">Cash</option>
                @else
                <option selected value="{{$voucher->voucher_options}}">{{$voucher->voucher_options}}</option>
                <option value="Percent">Percent</option>
                @endif
            </select>
        </div>
        <div class="form-group" style="margin-top:20px">
            <label>Value</label>
            <input type="text" name="voucher_value" value="{{$voucher->voucher_value}}" class="form-control" style="width:650px">
        </div>
        <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info" name="create_cate">
    </form>
</div>
@endsection