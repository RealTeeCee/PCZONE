<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Shipping;
use App\Models\Coupon;
use App\Models\Users;
session_start();

class MomoController extends Controller
{
     public function execPostRequest($url, $data)
    {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
    }

    public function momo_payment(Request $request){
        $data = $request->all();
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = round($data['total']) * 22840;
        $orderId = time() . "";
        $redirectUrl = "http://localhost/PCZONE/public/thanks";
        $ipnUrl = "http://localhost/PCZONE/public/thanks";
        $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";

            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            //dd($signature);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            //dd($result);
            $jsonResult = json_decode($result, true);  // decode json
            $get_user = Users::where('ma_KH', Session::get('user_id'))->first();
            $shipping = new Shipping();
            $shipping->ten_KH = $get_user->ten_KH;
            $shipping->email_KH =$get_user->email_KH;
            $shipping->diachi_GH = $get_user->diachi_KH;
            $shipping->sdt_KH = $get_user->sdt_KH;
            $shipping->ghichu = '';
            $shipping->save();
            $shipping_id = $shipping->ma_GH;
            $sum_quantity = 0;
            $sum_total = 0;
            if(Session::get('cart')){
                foreach(Session::get('cart') as $key=>$cart){
                    $sum_quantity += $cart['product_qty'];
                    $sum_total += $cart['product_price'] * $cart['product_qty'];
                }
            }
            // echo '<pre>';
            // print_r($shipping_id);
            // echo '</pre>';
            // die();
            $dt=now('Asia/Ho_Chi_Minh');
            $order_code = 'PCZ'.substr(md5(microtime()),rand(0,26),5); //tạo mã tự động
            $order = new Invoice();
            $order->ma_KH = Session::get('user_id');
            $order->ma_GH = $shipping_id;
            $order->so_DH = $order_code;
            $order->soluong = $sum_quantity;
            $order->tongtien = Session::get('after_total');
            $order->magiamgia = Session::get('coupon_code');
            $order->trangthai = 'Chờ xử lý';
            $order->hinhthuc_TT = 'Momo';
            $order->ngay_GH = $dt->toDateString();
            $order->save();
            $invoice_id = $order->ma_DH;
            $order->ngaytao = $dt;
            if(Session::get('coupon_code') != ''){
                $quantity_coupon = Coupon::where('voucher_code',Session::get('coupon_code'))->first();
            DB::table('vouchers')->where('voucher_code',Session::get('coupon_code'))->update(['voucher_quantity' => $quantity_coupon->voucher_quantity - 1]);
            }
            if(Session::get('cart')){
                foreach(Session::get('cart') as $key=>$cart){
                    $order_details = new InvoiceDetails();
                    $order_details->ma_DH = $invoice_id;
                    $order_details->ma_SP  = $cart['product_id'];
                    $order_details->hinh_SP  = $cart['product_image'];
                    $order_details->ten_SP = $cart['product_name'];
                    //$order_details->loai_SP = $cart['product_category'];
                    $order_details->tongsotien_CT = $cart['product_price'];
                    $order_details->soluong_CT = $cart['product_qty'];
                    $order_details->save();
                }
            }
            Session::forget('cart');
            Session::forget('after_total');
            Session::forget('coupon_code');
            Session::forget('coupon');
            return redirect()->to($jsonResult['payUrl']);

    }
}
