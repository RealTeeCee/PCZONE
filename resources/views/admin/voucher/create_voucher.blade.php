@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">PROMOTION / CREATE</div>
<h2 class="text-center">CREATE PROMOTION </h1>
        <?php
            $i = 1;
            $check_voucher = Session::get('check_voucher');
            if($check_voucher){
                echo '<script>alert("'.$check_voucher.'");</script>';
                Session::put('check_voucher', null);
            }
        ?>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/save_coupon')}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:30px">
            <label>Name</label>
            <input type="text" name="voucher_name" value="{{old('voucher_name')}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Code</label>
            <input type="text" name="voucher_code" value="{{old('voucher_code')}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Quantity</label>
            <input type="text" name="voucher_quantity" value="{{old('voucher_quantity')}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Options</label>
            <select name="voucher_options" class="form-control"style="width:650px">
                <option value="">-----Choose----</option>
                <option value="Percent">Percent</option>
                <option value="Cash">Cash</option>
            </select>
        </div>
        <div class="form-group" style="margin-top:20px">
            <label>Value</label>
            <input type="text" name="voucher_value" value="{{old('voucher_value')}}" class="form-control" style="width:650px">
        </div>
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info" name="create_cate">
    </form>
</div>
@endsection