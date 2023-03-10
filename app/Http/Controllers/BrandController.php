<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandController extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');
        }else{
            return Redirect::to('admin/login')->send();
        }
    }

    public function create_brand(){
        $this->AuthLogin();
        return view('admin.brand.create_brand');
    }

    public function save_brand(Request $request){
        $data = $request->all();
        $brand = new Brand();
        $brand->ten_TH = $data['ten_TH'];
        $brand->slug_TH =Str::slug($data['ten_TH'], '-');
        $brand->tinhtrang_TH = $data['tinhtrang_TH'];
        $brand->save();
        Session::put('message','Create brand successfully');
        return Redirect::to('admin/view_brand');
    }

    public function view_brand(){
        $this->AuthLogin();
        $brand = Brand::all();
        return view('admin.brand.view_brand',compact('brand'));
    }

    public function update_brand($brand_id){
        $this->AuthLogin();
       $brand = DB::table('thuonghieu')->where('ma_TH',$brand_id)->first();
        return view('admin.brand.update_brand',compact('brand'));

    }

    public function saveUpdate_brand(Request $request , $brand_id){
        $data = $request->all();
        DB::table('thuonghieu')->where('ma_TH',$brand_id)->update(['ten_TH'=>$data['ten_TH']]);
        Session::put('message','Update brand successfully');
        return Redirect::to('admin/view_brand');

    }

    public function active_brand($brand_id){
        $this->AuthLogin();
        DB::table('thuonghieu')->where('ma_TH',$brand_id)->update(['tinhtrang_TH'=>1]);
      //  Session::put('message','Show brand successfully');
        return Redirect::to('admin/view_brand');
    }

    public function unactive_brand($ma_TH){
        $this->AuthLogin();
        DB::table('thuonghieu')->where('ma_TH',$ma_TH)->update(['tinhtrang_TH'=>0]);
      //  Session::put('message','Hide brand successfully');
        return Redirect::to('admin/view_brand');
    }

    public function delete_brand($brand_id){
        $this->AuthLogin();
        DB::table('thuonghieu')->where('ma_TH',$brand_id)->delete();
        Session::put('message','Delete brand successfully');
        return Redirect::to('admin/view_brand');
    }
}
