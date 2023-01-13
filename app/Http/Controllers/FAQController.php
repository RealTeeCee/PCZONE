<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function create_faq(){
        return view('admin.faq.create_FAQ');
    }

    public function save_faq(Request $request){
        $data = $request->all();
            $faq = new FAQ();
            $faq['question'] = $data['question'];
            $faq['answer'] = $data['answer'];
            $faq['created_at'] = now();
            $faq->save();
            return Redirect::to('admin/view_FAQ');
    }

    public function view_faq(){
        $faqs = FAQ::all();
        return view('admin.faq.view_FAQ',compact('faqs'));
    }

    public function update_faq($_id){
        $faq = FAQ::find($_id);
        return view('admin.faq.update_FAQ',compact('faq'));
    }

    public function delete_faq($_id){
        FAQ::find($_id)->delete();
        return Redirect::to('admin/view_FAQ');
    }

    public function saveUpdate_faq(Request $request,$_id){
        $data = $request->all();
        $faq = FAQ::find($_id);
        $faq['question'] = $data['question'];
        $faq['answer'] = $data['answer'];
        $faq['created_at'] = now();
        $faq->save();
        return Redirect::to('admin/view_FAQ');
    }

    public function delete_coupon_cart(){
        Session::forget('coupon');
        Session::put('message','Clear code successfully');
        return redirect()->back();
    }

}

