<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BuildController extends Controller
{
    public function build()
    {
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $products = Product::get();
        return view('client.build', compact('products','user'));
    }

    public function build_set(Request $request)
    {
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $data = $request->validate([
            'motherboard' => 'required',
            'cpu'=> 'required',
            'ram'=>'required',
            'psu'=>'required',
            'keyboard'=>'required',
            'mouse'=>'required',
            'headphone'=>'required',
            'storage'=>'required',
            'vga'=>'required',
        ],[
            'motherboard.required' => 'Motherboard must be selected',
            'cpu.required' => 'cpu must be selected',
            'ram.required' => 'ram must be selected',
            'psu.required' => 'psu must be selected',
            'keyboard.required' => 'keyboard must be selected',
            'mouse.required' => 'mouse must be selected',
            'headphone.required' => 'headphone must be selected',
            'storage.required' => 'storage must be selected',
            'vga.required' => 'vga must be selected',
        ]);
        $data = $request->all();
        $products = Product::get();
        $p1 = Product::where('ten_SP',$data['motherboard'])->first();
        $p2 = Product::where('ten_SP',$data['cpu'])->first();
        $p3 = Product::where('ten_SP',$data['ram'])->first();
        $p4 = Product::where('ten_SP',$data['psu'])->first();
        $p5 = Product::where('ten_SP',$data['keyboard'])->first();
        $p6 = Product::where('ten_SP',$data['mouse'])->first();
        $p7 = Product::where('ten_SP',$data['headphone'])->first();
        $p8 = Product::where('ten_SP',$data['storage'])->first();
        $p9 = Product::where('ten_SP',$data['vga'])->first();
        $total = $p1->gia_SP + $p2->gia_SP + $p3->gia_SP + $p4->gia_SP + $p5->gia_SP + $p6->gia_SP + $p7->gia_SP + $p8->gia_SP + $p9->gia_SP;

        return view('client.build_set',compact('p1','p2','p3','p4','p5','p6','p7','p8','p9','total','user'));
    }
}
