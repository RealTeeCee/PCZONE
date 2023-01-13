<?php

namespace App\Http\Controllers\client;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Invoice;
use App\Models\Coupon;
use App\Models\InvoiceDetails;
use App\Models\Shipping;
session_start();
class UserController extends Controller
{
    public function wish_list() {
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $products = DB::table('wish_list')->join('san_pham', 'wish_list.ma_SP', '=', 'san_pham.ma_SP')->where('ma_KH', session('user_id'))->paginate(9);
        $total = count(DB::table('wish_list')->join('san_pham', 'wish_list.ma_SP', '=', 'san_pham.ma_SP')->where('ma_KH', session('user_id'))->get());
        return view('client.products', compact('products','brands','categories','total','user'))->with(['title'=>'Wish List']);
    }

    public function add_wish_list(Request $request) {
        $data = $request->all();
        $product_id = $data['product_id'];
        $user_id = session('user_id');
        if($user_id == null) {
            return response()->json(['status' => 'failed', 'message' => 'You must login'])->header('Content-Type', 'application/json');
        }
        $wish_list = Wishlist::where('ma_KH', $user_id)->where('ma_SP', $product_id)->first();
        if(!empty($wish_list)>0 ){
            DB::delete('delete from wish_list where ma_KH = ? and ma_SP = ?', [$user_id, $product_id]);
            return response()->json(['status' => 'deleted', 'message' => 'Product removed from wish list'])->header('Content-Type', 'application/json');
        }else{
            $wish_list = new Wishlist();
            $wish_list->ma_KH = $user_id;
            $wish_list->ma_SP = $product_id;
            $wish_list->save();
            return response()->json(['status' => 'added', 'message' => 'Product added to wish list'])->header('Content-Type', 'application/json');
        }
    }


    public function information_user(){
        $invoices = Invoice::where('ma_KH', Session::get('user_id'))->get();
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        return view('client.information_user',compact('user','invoices'));
    }

    public function update_image(ImageRequest $request, $id){
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){
                return redirect('information_admin')->with('err','Chỉ có thể chọn đuôi file png , jpg hoặc jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move('images',$imageName);
            DB::table('khachhang')
        ->where('ma_KH',intval($id))
        ->update(['avarta_KH'=>$imageName]);
        Session::put('update_success','Cập nhật avarta thành công');
        return Redirect::back();
        }
        else{
            $imageName = null;
            DB::table('khachhang')
        ->where('ma_KH',intval($id))
        ->update(['avarta_KH'=>$imageName]);
        Session::put('update_success','Avarta vẫn chưa được chọn');
        return Redirect::back();
        }

    }
    public function update_infor_user(Request $request , $user_id){
        $data = $request->validate([
            'user_name' => 'required',
            'user_phone'=> 'digits:10'
        ],[
            'user_name.required' => 'Username cannot be blank',
            'user_phone.digits' => 'User phone must be 10 DIGITS',
        ]);
        $data = $request->all();
        $user = Users::find($user_id);
        $user['ten_KH'] = $data['user_name'];
        $user['sdt_KH'] = $data['user_phone'];
        $user['diachi_KH'] = $data['user_address'];
        $user['gioitinh_KH'] = $data['user_gender'];
        if($data['user_gender'] == null){
            $data['user_gender'] = 'Male';
        }
        $user->save();
        Session::put('update_success','Update information successfully');
        return Redirect::back();
    }
    public function change_password(Request $request, $user_id){
        $data = $request->all();
        $check_password = DB::table('khachhang')->where('ma_KH', $user_id)->where('password',md5( $data['old_password']))->first();
        if(!$check_password){
            Session::put('change_password','Your password is incorrect');
            return Redirect::back();
        }else{
            $change_password = Users::find($user_id);
            $change_password['password'] = md5($data['new_password']);
            $change_password->save();
            Session::put('change_password_success','Change password successfully');
            return Redirect::back();
        }
    }

    public function view_invoice_user($invoice_id){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->view_invoice_user_convert($invoice_id));
        return $pdf->stream();
    }

    public function view_invoice_user_convert($invoice_id){
        $invoice_details = InvoiceDetails::where('ma_DH', $invoice_id)->get();
        $invoices = Invoice::where('ma_DH', $invoice_id)->get();
        foreach($invoices as $key=>$invoice){
            $user_id = $invoice->ma_KH;
            $shipping_id = $invoice->ma_GH;
            $invoice_code = $invoice->ma_DH;
            $invoice_date = $invoice->ngaytao;
            $coupon_code = $invoice->magiamgia;
        }
        if($coupon_code == ''){
            $coupon = '';
        }else{
            $coupon = Coupon::where('voucher_code',$coupon_code)->first();
        }

        $user = Users::find($user_id);
        $shipping = Shipping::find($shipping_id);
        $output = '';
        $i = 0;
        $total = 0;
        $output =
        '
        <style>
            body{
                font-family:DejaVu Sans;

            }
            .table-styling{
                border:solid 1px #000;
            }
            .table-styling tr td {
                border:solid 1px #000;
            }
            span{
                font-weight:bold;
            }
        </style>
        <img style="width:100px;height:50px" src="favicon/pczone.jpg" alt="">
        <div style="text-align:right">Order code: '.$invoice_code.'</div>
        <div>Receiver: '.$shipping->ten_KH.'<div>
        <div>Email: '.$shipping->email_KH.'<div>
        <div>Address: '.$shipping->diachi_GH.'<div>
        <div>Order date: '. $invoice_date.'<div>
        <div>Note: '.$shipping->ghichu.'<div>

        <h4><center>Invoice details</center></h4>
        <table border="1" class="table table-styling" style="text-align:center">
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
            <tbody>';
            foreach($invoice_details as $key=>$in_de){
                $total += $in_de->soluong_CT *$in_de->tongsotien_CT;
                $output .='
                <tr>
                    <td>'.++$i.'</td>
                    <td style="width:300px">'.$in_de->hinh_SP.'</td>
                    <td style="width:100px"><img style="width:50px;height:50px" src="images/product/'.$in_de->hinh_SP.'" alt="'.$in_de->hinh_SP.'"></td>
                    <td>'.$in_de->soluong_CT.'</td>
                    <td>$'.$in_de->tongsotien_CT.'</td>
                    <td style="width:100px">$'.$in_de->tongsotien_CT * $in_de->soluong_CT .'</td>
                </tr>';
            }
            $output .='
            </tbody>
        </table>';
        $output .='</div>
        <div style="float:right;margin-top:30px">
        <div >Shipping : Free Shipping </div>
        <div >Tax : 8% </div>';
        if($coupon == ''){
            $tax = $total * 8/100;
            $after_total = $total + $tax;
            $output .= '<div >Coupon :  </div>';
        }else{
            if($coupon->voucher_options == 'Percent'){
                $tax = $total * 8/100;
                $tax_total = $total + $tax;
                $coupon_total =  $tax_total * $coupon->voucher_value/100;
                $after_total =  $tax_total -  $coupon_total;
                $output .= '<div >Coupon : '.$coupon->voucher_code.' - '.$coupon->voucher_value.'%  </div>';
            }else{
                $tax = $total * 8/100;
                $tax_total = $total + $tax;
                $after_total = $tax_total - $coupon->voucher_value;
                $output .= '<div >Coupon : '.$coupon->voucher_code.' - '.$coupon->voucher_value.'$  </div>';
            }
        }
        $output .='<div >Total order: $'.$after_total.'</div>
        </div>';
        return $output;
    }

    public function review_product(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');// set thời gian
        $data = array();
        // dd($request->all());
        $check = DB::table('binhluan')->where('ma_SP',$request->product_id)->where('ma_KH',$request->user_id)->first();
        // dd($check);
        $data['ma_KH'] = $request->user_id;
        $data['ma_SP'] = $request->product_id;
        $data['comment'] = $request->user_comment;
        $data['rating'] = $request->rating_start;
        $data['created_at'] = now();
        // dd($check);
        if($check){
            DB::table('binhluan')->where('ma_KH',$request->user_id)->where('ma_SP',$request->product_id)->update($data);
        }else{
            DB::table('binhluan')->insert($data);
        }
        return Redirect::back();

    }
}
