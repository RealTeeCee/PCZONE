<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Shipping;
use App\Models\Social;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Invoice;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\InvoiceDetails;
use Barryvdh\DomPDF\PDF;
use App\Http\Requests\ImageRequest;

session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');
        }else{
            return Redirect::to('admin/login')->send();
        }
    }

    public function index(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function create_product(){
        $this->AuthLogin();
        return view('admin.product.create_product');
    }
    public function login(){
        return view('admin.login.login');
    }


    public function checkLogin(Request $request){
        $data = $request->validate([
            'admin_email' => 'required',
            'admin_password'=> 'required'
        ],[
            'admin_email.required' => 'Email Admin không được trống',
            'admin_password.required' => 'Mật khẩu Admin không được trống',
        ]);
        $data = $request->all();
        $check = DB::table('admin')->where('email_AM',$data['admin_email'])->where('matkhau_AM',md5($data['admin_password']))->first();
        if($check){
            Session::put('admin_name',$check->ten_AM);
            Session::put('admin_id',$check->ma_AM);
            Session::put('boss_id',$check->boss);
            Session::put('admin_avarta',$check->avarta_AM);
            return Redirect::to('admin');
        }else{
            Session::put('message','Email Hoặc mật khẩu sai. Vui lòng thử lại!');
            return Redirect::back();
        }
    }

    public function view_admin(){
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $users = Admin::whereNotIn('ma_AM', [$admin_id])->get();
        return view('admin.users.view_admin',compact('users'));
    }

    public function create_admin()
    {
        return view('admin.users.create_admin');
    }

    public function admin_postCreate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|not_regex:/^[0-9\+]+$/',
            'phone'=> array('required','numeric','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'),
            'email'=>'required|email:rfc,dns',
            'address'=>'required',
            'password'=>'required|min:5',
            'repeat_password'=>'required|same:password',
        ],[
            'name.required' => 'Tên nhân viên không được trống',
            'name.not_regex'=>'Tên nhân viên không được chứa số',
            'phone.required'=> 'Số điện thoại không được trống',
            'phone.numeric'=> 'Số điện thoại không được chứa ký tự',
            'phone.min:10' => 'Số điện thoại ít nhất phải 10 số',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'email.required' => 'Email không được trống',
            'email.email:rfc,dns' => 'Email không hợp lệ',
            'address.required' =>'Địa chỉ không được trống',
            'password.required' => 'Mật khẩu không được trống',
            'password.min:5'=>'Mật khẩu ít nhất 5 ký tự',
            'repeat_password.required' => 'Xác nhận mật khẩu không được trống',
            'repeat_password.same:password' => 'Xác nhận mật khẩu không trùng khớp'
        ]);
        $data = $request->all();
        $admin = array();
        $check_user_email = Admin::where('email_AM', $data['email'])->first();
        if($check_user_email){
            Session::put('create','Email đã tồn tại. Thử lại với email khác!');
        return Redirect::back();
        }else{
            $admin['ten_AM'] = $data['name'];
            $admin['sdt_AM'] = $data['phone'];
            $admin['email_AM'] = $data['email'];
            $admin['diachi_AM'] = $data['address'];
            $admin['matkhau_AM'] = md5($data['password']);
            $admin['chucvu'] = $data['chucvu'];
            $admin['boss'] = $data['boss'];
            DB::table('admin')->insert($admin);
            Session::put('create','Tạo thành công!!');
            return Redirect::to('admin/view_admin');
        }
    }

    public function delete_admin($admin_id){
        Admin::find($admin_id)->delete();
        Session::put('message','Xoá thành công');
        return Redirect::to('admin/view_admin');
    }

    public function information_admin(){
        $user = Admin::where('ma_AM', '=', Session::get('admin_id'))->first();
        return view('admin.information_admin',compact('user'));
    }

    public function update_infor_admin(Request $request , $user_id){
        $data = $request->validate([
            'user_name' => 'required',
            'user_phone'=> 'digits:10'
        ],[
            'user_name.required' => 'Tên admin không được trống',
            'user_phone.digits' => 'Số điện thoại phải ít nhất 10 số',
        ]);
        $data = $request->all();
        $user = Admin::find($user_id);
        $user['ten_AM'] = $data['user_name'];
        $user['sdt_AM'] = $data['user_phone'];
        $user['diachi_AM'] = $data['user_address'];

        $user->save();
        Session::put('update_success','Cập nhật thông tin thành công');
        return Redirect::back();
    }

    public function update_image(ImageRequest $request, $id){
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){
                return redirect('information_user')->with('err','Chỉ có thể chọn đuôi file png , jpg hoặc jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move('images',$imageName);
            DB::table('admin')
            ->where('ma_AM',intval($id))
            ->update(['avarta_AM'=>$imageName]);
            Session::put('update_success','Cập nhật avarta thành công');
            Session::put('admin_avarta',$imageName);
            return Redirect::back();
        }
        else{
            $imageName = 'user.png';
            DB::table('admin')
        ->where('ma_AM',intval($id))
        ->update(['avarta_AM'=>$imageName]);
        Session::put('update_success','Avarta vẫn chưa được chọn');
        return Redirect::back();
        }

    }



    public function view_user(){
        $users = Users::all();
        return view('admin.users.view_user',compact('users'));
    }

    public function admin_detail($admin_id)
    {
        $admin = DB::table('admin')->where('ma_AM',intval($admin_id))->get();
        return view('admin.users.admin_detail', ['admin'=>$admin]);
    }

    public function delete_user($user_id){
        Admin::find($user_id)->delete();
        Session::put('message','Xoá thành công');
        return Redirect::to('admin/view_user');
    }

    public function logout(){
        Session::flush();
        return Redirect::to('admin/login');
    }

    public function view_contact(){
        $this->AuthLogin();
        $contacts = DB::table('contact')->get();
        return view('admin.view_contact',compact('contacts'));
    }

    public function view_order(){
        $this->AuthLogin();
        $invoices = Invoice::paginate(10);
        return view('admin.order.view_order',compact('invoices'));
    }

    public function invoice_details($invoice_id){
        $invoice_details = InvoiceDetails::where('ma_DH',$invoice_id)->get();
        $invoices = Invoice::where('ma_DH',$invoice_id)->get();
        foreach($invoices as $key=>$invoice){
            $invoice_id = $invoice->ma_DH;
            $coupon_code =  $invoice->coupon_code;
        }
        if($coupon_code == ''){
            $coupon = '';
        }else{
            $coupon = Coupon::where('voucher_code',$coupon_code)->first();
        }

        return view('admin.order.invoice_details',compact('invoice_details','invoices','invoice_id','coupon'));
    }

    public function print_invoice($invoice_id){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_invoice_convert($invoice_id));
        return $pdf->stream();
    }

    public function print_invoice_convert($invoice_id){
        //return $invoice_id;
        $invoice_details = InvoiceDetails::where('ma_DH', $invoice_id)->get();
        $invoices = Invoice::where('ma_DH', $invoice_id)->get();
        foreach($invoices as $key=>$invoice){
            $user_id = $invoice->ma_KH;
            $shipping_id = $invoice->ma_GH;
            $invoice_code = $invoice->so_DH;
            $invoice_date = $invoice->ngaytao;
            $coupon_code = $invoice->coupon_code;
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

        <h1><center>Tập đoàn PCZone</center></h1>
        <h3><center>Độc lập - Tự do - Hạnh phúc</center></h3>
        <div style="text-align:right">Order code: '.$invoice_code.'</div>
        <div>Receiver: '.$shipping->shipping_name.'<div>
        <div>Email: '.$shipping->shipping_email.'<div>
        <div>Address: '.$shipping->shipping_address.'<div>
        <div>Order date: '. $invoice_date.'<div>
        <div>Note: '.$shipping->shipping_note.'<div>
        <br><br>
        <h4><center>Invoice details</center></h4>
        <table border="1" class="table table-styling">
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
                $total += $in_de->quantity *$in_de->subtotal;
                $output .='
                <tr>
                    <td>'.++$i.'</td>
                    <td>'.$in_de->product_name.'</td>
                    <td><img style="width:50px;height:50px" src="images/product/'.$in_de->product_image.'" alt="'.$in_de->product_name.'"></td>
                    <td>'.$in_de->quantity.'</td>
                    <td>$'.$in_de->subtotal.'</td>
                    <td>$'.$in_de->subtotal * $in_de->quantity .'</td>
                </tr>';
            }
            $output .='
            </tbody>
        </table>';
        $output .='</div>
        <div style="float:right">
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
        $output .= '</div><br></br>
        <div style="margin-top:100px">
        <span style="margin-left:50px" >Vote maker</span>
        <span style="margin-left:350px">Receiver </span></div>';

        return $output;
    }


    public function change_status_invoice($invoice_id){
        DB::table('donhang')->where('ma_DH',$invoice_id)->update(['trangthai' => 'Đang giao hàng']);
        return Redirect::back();
    }
    public function change_status_invoice1($invoice_id){
        DB::table('donhang')->where('ma_DH',$invoice_id)->update(['trangthai' => 'Hoàn thành']);
        return Redirect::back();
    }


}
