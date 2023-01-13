<?php

namespace App\Http\Controllers\client;

use App\Components\compare_popup;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Components\product_popup;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function products()
    {
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $categories = Category::where('parent_id',0)->get();
        $products = DB::table('san_pham')->inRandomOrder()->paginate(12);
        $brands = DB::table('san_pham')->leftJoin('thuonghieu','san_pham.ma_TH','=','thuonghieu.ma_TH')->select('thuonghieu.ma_TH','thuonghieu.ten_TH')->groupBy('thuonghieu.ma_TH','thuonghieu.ten_TH')->get();
        $total = count(DB::table('san_pham')->where('tinhtrang_SP',0)->get());
        Session::put('pc',1);
        return view('client.products', compact('categories','products','total','brands','user'));
    }
    public function product_detail($product_id)
    {
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $brands = DB::table('thuonghieu')->get();
        $categories = Category::where('parent_id',0)->get();
        $product = DB::table('san_pham')->where('ma_SP',$product_id)->first();
        $reviews = Review::where('ma_SP',$product_id)->get();
        $Avg_rating = DB::table('binhluan')->where('ma_SP',$product_id)->avg('rating');
        $count_review = DB::table('binhluan')->where('ma_SP',$product_id)->count();
        return view('client.product_detail', compact('product','categories','brands','reviews','Avg_rating','count_review','user'));
    }
    public function products_2()
    {
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $categories = Category::where('parent_id',0)->get();
        $products = DB::table('san_pham')->where('ma_PL',15)->inRandomOrder()->paginate(12);
        $brands = DB::table('san_pham')->leftJoin('thuonghieu','san_pham.ma_TH','=','thuonghieu.ma_TH')->select('thuonghieu.ma_TH','thuonghieu.ten_TH')->groupBy('thuonghieu.ma_TH','thuonghieu.ten_TH')->get();
        $total = count(DB::table('san_pham')->where('ma_PL',15)->get());
        Session::put('pc',15);
        return view('client.products_2', compact('categories','products','total','brands','user'));
    }

    public function category_sidebar_clicked($category_id){
        if(Session::get('pc') == 15){
            $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $arr = Array();
        $brands = Brand::all();
        $categories = Category::where('parent_id',0)->get();
        $category = Category::find($category_id);
        $arr[0] = $category->ma_PL;
        if($category->parent_id == 0){
            $categories1 = Category::where('parent_id',$category_id)->get();
            for($i=0;$i<count($categories1);$i++){
                $arr[$i+1]=$categories1[$i]->ma_PL;
            }
        }
        $products = DB::table('san_pham')->whereIn('ma_PL',$arr)->paginate(9);
        $total = count(DB::table('san_pham')->whereIn('ma_PL',$arr)->get());
        return view('client.products_2', compact('categories','brands','products','total','user'));
        }
        else{
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $arr = Array();
        $brands = Brand::all();
        $categories = Category::where('parent_id',0)->get();
        $category = Category::find($category_id);
        $arr[0] = $category->ma_PL;
        if($category->parent_id == 0){
            $categories1 = Category::where('parent_id',$category_id)->get();
            for($i=0;$i<count($categories1);$i++){
                $arr[$i+1]=$categories1[$i]->ma_PL;
            }
        }
        $products = DB::table('san_pham')->whereIn('ma_PL',$arr)->paginate(9);
        $total = count(DB::table('san_pham')->whereIn('ma_PL',$arr)->get());
        return view('client.products', compact('categories','brands','products','total','user'));}

    }

    public function tag_clicked($category_id){
        if(Session::get('pc') == 15){
            $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $brands = Brand::all();
        $categories = Category::where('ma_PL',$category_id)->get();
        $products = DB::table('san_pham')->where('ma_PL',$category_id)->paginate(9);
        $total = count(DB::table('san_pham')->where('ma_PL',$category_id)->get());
        return view('client.products_2', compact('categories','brands','products','total','user'));
        }
        else{
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $brands = Brand::all();
        $categories = Category::where('ma_PL',$category_id)->get();
        $products = DB::table('san_pham')->where('ma_PL',$category_id)->paginate(9);
        $total = count(DB::table('san_pham')->where('ma_PL',$category_id)->get());
        return view('client.products', compact('categories','brands','products','total','user'));
        }
    }

    public function brand_clicked($brand_id){
        if(Session::get('pc')==15){
            $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
            $categories = Category::where('parent_id',0)->get();
            $products = Product::where('ma_TH',$brand_id)->paginate(9);
            $brands = DB::table('san_pham')->leftJoin('thuonghieu','san_pham.ma_TH','=','thuonghieu.ma_TH')->select('thuonghieu.ma_TH','thuonghieu.ten_TH')->groupBy('thuonghieu.ma_TH','thuonghieu.ten_TH')->get();
            $total = count($products);
            return view('client.products_2', compact('categories','brands','products','total','user'));
        }
        else{
        $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
        $categories = Category::where('parent_id',0)->get();
        $products = Product::where('ma_TH',$brand_id)->paginate(9);
        $brands = DB::table('san_pham')->leftJoin('thuonghieu','san_pham.ma_TH','=','thuonghieu.ma_TH')->select('thuonghieu.ma_TH','thuonghieu.ten_TH')->groupBy('thuonghieu.ma_TH','thuonghieu.ten_TH')->get();
        $total = count($products);
        return view('client.products', compact('categories','brands','products','total','user'));
        }
    }

    public function product_price( $min, $max, Request $request ){
        if(Session::get('pc') == 15){
            $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
            $price = array();
            $price[0] = $min;
            $price[1] = $max;
            $brands = Brand::all();
            $categories = Category::where('parent_id',0)->get();
            $products = Product::where('ma_PL','=',15)->where('gia_SP','>=',$min)->where('gia_SP','<=',$max)->paginate(9);
            $total = count($products);
            return view('client.products_2', compact('categories','brands','products','total','user'));
        }
        else{
            $user = Users::where('ma_KH', '=', Session::get('user_id'))->first();
            $price = array();
            $price[0] = $min;
            $price[1] = $max;
            $brands = Brand::all();
            $categories = Category::where('parent_id',0)->get();
            $products = Product::where('gia_SP','>=',$min)->where('gia_SP','<=',$max)->paginate(9);
            $total = count(Product::whereIn('gia_SP',$price)->get());
            return view('client.products', compact('categories','brands','products','total','user'));
        }
    }

    public function popup_product( Request $request) {
        $product_id = $request->product_id;
        $product = Product::where('ma_SP',$product_id)->first();
        if($product->inStock == 1){
            $inStock = 'outStock';
        }else{
            $inStock = 'inStock';
        }
        $htmlPopupProduct = new  product_popup();
        return $htmlPopupProduct->htmlPopupProduct($product,$inStock);
    }

    public function popup_compare( Request $request) {
        $p_id = $request->p_id;
        $p_gr = Product::get()->groupBy('ten_SP');
        $product = Product::where('ma_SP',$p_id)->first();
        $compare = Product::where('component',$product->component)->get();

        if($product->inStock == 1){
            $inStock = 'outStock';
        }else{
            $inStock = 'inStock';
        }
        $htmlPopupCompare = new  compare_popup();
        return $htmlPopupCompare->htmlPopupCompare($product,$inStock,$compare,$p_gr);
    }
}
