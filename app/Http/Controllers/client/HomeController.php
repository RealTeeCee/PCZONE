<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;
session_start();
class HomeController extends Controller
{
    public function index(){
        $sliders = DB::table('slider')->get();
        $hotProducts = DB::table('san_pham')->where('ma_PL',15)->get();
        $newProducts = DB::table('san_pham')->inRandomOrder()->get();
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        return view('client.home', compact('sliders','hotProducts','newProducts','user'));
    }
    public function cart(){
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        return view('client.cart',compact('user'));
    }
    public function checkout(){
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        return view('client.checkout',compact('user'));
    }
    public function contact(){
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        return view('client.contact',compact('user'));
    }
    public function save_contact(Request $request){
        $data = $request->validate([
            'contact_name' =>'required',
            'contact_email' =>'required|email:rfc,dns',
            'contact_phone' => array('required','numeric','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'),
            'contact_message' => 'required'
        ],[
            'contact_name.required' => 'Contact cannot blank',
            'contact_email.required' => 'Email cannot blank',
            'contact_email.email' => 'Email incorrect format',
            'contact_phone.required' =>'Phone cannot blank',
            'contact_phone.numeric' => 'Phone must be digits',
            'contact_phone.regex' => 'Phone invalid.Try again',
            'contact_message.required' => 'Message cannot blank'
        ]);
        $contact = array();
        $contact['contact_name'] = $data['contact_name'];
        $contact['contact_mail'] = $data['contact_email'];
        $contact['contact_phone']  = $data['contact_phone'];
        $contact['contact_message'] = $data['contact_message'];

        DB::table('contact')->insert($contact);
        Session::put('correct','Thank you contacted!');
        return Redirect::back();
    }
    public function FAQ(){
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $faqs = DB::table('faq')->get();
        return view('client.faq', compact('faqs','user'));
    }

    public function about(){
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        return view('client.about',compact('user'));
    }

    public function search(Request $request){
        $output = '';
        if($request->get('query')!='')
        {
            $query = $request->get('query');
            $data = DB::table('san_pham')
            ->where('ten_SP', 'LIKE', "%{$query}%")
            ->get();

            foreach($data as $row)
            {
               $output .= '
               <div style="font-size:30px;margin-left:440px"><img style="width:50px;height:50px" src="images/product/'.$row->hinh_SP.'" alt=""><a style="margin-left:30px" href="product/'.$row->ma_SP.'">'.$row->ten_SP.'</a></div>
               ';
            }
            echo $output;
       }else{
            $output = '';
            echo $output;
       }
    }

}
