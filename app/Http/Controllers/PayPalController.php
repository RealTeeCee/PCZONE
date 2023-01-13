<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Shipping;
use App\Models\Coupon;
session_start();
class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('paypal.paypal');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction()
    {
        $total = Session::get('after_total');

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        // dd($paypalToken);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => round($total)
                    ]
                ]
            ]
        ]);
        // dd($response);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
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

            $dt = now('Asia/Ho_Chi_Minh');
            $order_code = 'PCZ'.substr(md5(microtime()),rand(0,26),5); //tạo mã tự động
            $order = new Invoice();
            $order->ma_KH = Session::get('user_id');
            $order->ma_GH = $shipping_id;
            $order->so_DH = $order_code;
            $order->soluong = $sum_quantity;
            $order->tongtien = Session::get('after_total');
            $order->magiamgia = Session::get('coupon_code');
            $order->trangthai = 'Chờ xửa lý';
            $order->hinhthuc_TT = 'Paypal';
            $order->ngay_GH = $dt->toDateString();
            $order->ngaytao = $dt;
            $order->save();
            $invoice_id = $order->ma_DH;
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
                    $order_details->tongsotien_CT = $cart['product_price'];
                    $order_details->soluong_CT = $cart['product_qty'];
                    $order_details->save();
                }
            }
            Session::forget('cart');
            Session::forget('after_total');
            Session::forget('coupon_code');
            Session::forget('coupon');
            return redirect()
                ->route('thanks')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
