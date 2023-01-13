<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recursive;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    private $component='';
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');
        }else{
            return Redirect::to('admin/login')->send();
        }
    }

    public function getCategory($parent_id){
        $recursive = new Recursive();
       $htmlOption = $recursive->categoryRecursive($parent_id);
        return $htmlOption;
    }
    public function create_product()
    {
        $category= Category::all();
        $brand=Brand::all();
        return view('admin.product.create_product',compact('category','brand'));
    }

    public function getComponent($ma_PL){
        $category = Category::where('ma_PL',$ma_PL)->first();
            $this->component=$category->ten_PL;
            return $this->component;

    }

    public function save_product(Request $request){
        $data = array();
        $data['ten_SP'] = $request->ten_SP;
        $data['slug_SP'] = Str::slug($data['ten_SP'],'-');
        $data['ma_PL'] = $request->category;
        $data['component'] = $this->getComponent($data['ma_PL']);
        $data['ma_TH'] = $request->brand;
        $data['gia_SP'] = $request->gia_SP;
        $data['product_sku'] = $request->product_sku;
        $data['soluong_SP'] = $request->soluong_SP;
        $data['mota_SP'] = $request->mota_SP;
        $data['sort_mota_SP'] = $request->sort_mota_SP;
        $data['product_isHot'] = $request->isHot;
        $data['product_isNew'] =$request->isNew;
        $data['product_inStock'] = $request->product_Instock;
        $data['tinhtrang_SP'] = $request->tinhtrang_SP;
        $get_image_main = $request->file('hinh_SP');

        $get_image_gallery= $request->file('product_image_gallery');


        if($get_image_main == true && $get_image_gallery == true){
            //main
            $get_name_image = $get_image_main->getClientOriginalName();// lấy tên file
            $name_image = current(explode('.',$get_name_image));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension = explode('.',$get_name_image);
            $get_extension = end($extension);
            $extensionChange = strtolower($get_extension);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png'];
            //gallery
            $get_name_image_gallery = $get_image_gallery->getClientOriginalName();// lấy tên file
            $name_image_gallery = current(explode('.',$get_name_image_gallery));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension_gallery = explode('.',$get_name_image_gallery);
            $get_extension_gallery = end($extension_gallery);
            $extensionChange_gallery = strtolower($get_extension_gallery);
            if(in_array($extensionChange,$extensionArray) && in_array($extensionChange_gallery,$extensionArray)){
                $new_image = $name_image.rand(0,9999) . '.' . $get_image_main->getClientOriginalExtension(); //hàm lấy đuôi file
                $new_image_gallery = $name_image_gallery.rand(0,99) . '.' . $get_image_gallery->getClientOriginalExtension();
                $stored = $get_image_main->move(public_path().'/images/product', $new_image);
                $store_gallery = $get_image_gallery->move(public_path().'/images/product', $new_image_gallery);
                $data['hinh_SP'] = $new_image;
                $data['product_image_gallery'] = $new_image_gallery;

                DB::table('san_pham')->insert($data);

                Session::put('message', 'Create product successfully');
                return Redirect::to('admin/view_product');
            }else{
            Session::put('message','File is incorrect . Try again');
            return Redirect::to('admin/view_product');
            }
        }else{
            Session::put('message', 'Create product failed. Try again');
            return Redirect::to('admin/view_product');
        }

    }


    public function view_product(){
        $this->AuthLogin();
        $product = Product::paginate(10);
        $category = Category::where('parent_id', '=', 0)->get();
        $brand = Brand::all();
        return view('admin.product.view_product',compact('product','category','brand'));
    }

    public function view_product_cate($ten_PL){
        $this->AuthLogin();
        $category = Category::where('parent_id', '=', 0)->get();
        $product = Product::where('component',$ten_PL)->paginate(10);
        $brand = Brand::all();

        return view('admin.product.category_product',compact('product','category','brand'));
    }

    public function view_product_brand($brand_id){
        $this->AuthLogin();
        $product = Product::where('ma_TH',$brand_id)->paginate(10);
        $category = Category::all();
        $brand = Brand::all();

        return view('admin.product.category_product',compact('product','category','brand'));
    }

    public function active_product($ma_SP){
        $this->AuthLogin();
        DB::table('san_pham')->where('ma_SP',$ma_SP)->update(['tinhtrang_SP'=>1]);

        return Redirect::to('admin/view_product');
    }

    public function unactive_product($ma_SP){
        $this->AuthLogin();
        DB::table('san_pham')->where('ma_SP',$ma_SP)->update(['tinhtrang_SP'=>0]);

        return Redirect::to('admin/view_product');
    }

    public function delete_product($ma_SP){
        $this->AuthLogin();
        Product::find($ma_SP)->delete();
        Session::put('message','Delete product successfully');
        return Redirect::to('admin/view_product');
    }


    public function product_details($ma_SP){
        $this->AuthLogin();
        $product = Product::where('ma_SP',$ma_SP)->get();
        return view('admin.product.product_details',compact('product'));
    }

    public function edit_product($ma_SP){
        $this->AuthLogin();
        $product = Product::where('ma_SP',$ma_SP)->first();

         $brands = Brand::all();

            $category = Category::find($product->ma_PL);
            $categories = Category::whereIn('ma_PL', [$product->ma_PL, $category->parent_id])->get();
            return view('admin.product.update_product',compact('product','categories','brands'));

        return view('admin.product.update_product',compact('product','suppliers','category','brands','htmlOption'));
    }

    public function save_update_product($ma_SP, Request $request){
        $data = array();
        $data['ten_SP'] = $request->ten_SP;
        $data['slug_SP'] = Str::slug($data['ten_SP'],'-');
        $data['ma_PL'] = $request->category;
        $data['component'] = $this->getComponent($data['ma_PL']);
        $data['ma_TH'] = $request->brand;
        $data['gia_SP'] = $request->gia_SP;
        $data['product_sku'] = $request->product_sku;
        $data['soluong_SP']= $request->soluong_SP;
        $data['mota_SP'] = $request->mota_SP;
        $data['sort_mota_SP'] = $request->sort_mota_SP;
        $data['product_isHot'] = $request->isHot;
        $data['product_isNew'] = $request->isNew;
        $data['product_inStock'] = $request->product_Instock;
        $data['tinhtrang_SP'] = 1;
        $get_image_gallery = $request->file('product_image_gallery');
        $get_image_main = $request->file('hinh_SP');

        if($get_image_main == true && $get_image_gallery == false){
            //main
            $get_name_image = $get_image_main->getClientOriginalName();// lấy tên file
            $name_image = current(explode('.',$get_name_image));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension = explode('.',$get_name_image);
            $get_extension = end($extension);
            $extensionChange = strtolower($get_extension);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png'];
            //gallery
            if(in_array($extensionChange,$extensionArray)){
                $new_image = $name_image.rand(0,9999) . '.' . $get_image_main->getClientOriginalExtension(); //hàm lấy đuôi file
                $stored = $get_image_main->move(public_path().'/images/product', $new_image);
                $data['product_main_image'] = $new_image;
                DB::table('san_pham')->where('ma_SP',$ma_SP)->update($data);

                Session::put('message', 'Update product successfully');
                return Redirect::to('admin/view_product');
            }else{
            Session::put('message','File is incorrect . Try again');
            return Redirect::to('admin/view_product');
            }
        // }else{
        //     Session::put('message', 'Create product failed. Try again');
        //     return Redirect::to('admin/view_product');
        }elseif($get_image_gallery == true && $get_image_main == false){
            //gallery
            $get_name_image_gallery = $get_image_gallery->getClientOriginalName();// lấy tên file
            $name_image_gallery = current(explode('.',$get_name_image_gallery));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension_gallery = explode('.',$get_name_image_gallery);
            $get_extension_gallery = end($extension_gallery);
            $extensionChange_gallery = strtolower($get_extension_gallery);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png'];
            if(in_array($extensionChange_gallery,$extensionArray)){
                $new_image_gallery = $name_image_gallery.rand(0,999) . '.' . $get_image_gallery->getClientOriginalExtension();
                $store_gallery = $get_image_gallery->move(public_path().'/images/product', $new_image_gallery);
                $data['product_image_gallery'] = $new_image_gallery;
                DB::table('san_pham')->where('ma_SP',$ma_SP)->update($data);
                Session::put('message', 'Update product successfully');
                return Redirect::to('admin/view_product');
            }else{
            Session::put('message','File is incorrect . Try again');
            return Redirect::to('admin/view_product');
            }
        }elseif($get_image_main == true && $get_image_gallery == true){
            //main
            $get_image_gallery = $request->file('product_image_gallery');
            $get_image_main = $request->file('hinh_SP');
            $get_name_image = $get_image_main->getClientOriginalName();// lấy tên file
            $name_image = current(explode('.',$get_name_image));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension = explode('.',$get_name_image);
            $get_extension = end($extension);
            $extensionChange = strtolower($get_extension);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png'];
            //gallery
            $get_name_image_gallery = $get_image_gallery->getClientOriginalName();// lấy tên file
            $name_image_gallery = current(explode('.',$get_name_image_gallery));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension_gallery = explode('.',$get_name_image_gallery);
            $get_extension_gallery = end($extension_gallery);
            $extensionChange_gallery = strtolower($get_extension_gallery);
            if(in_array($extensionChange,$extensionArray) && in_array($extensionChange_gallery,$extensionArray)){
                $new_image = $name_image.rand(0,9999) . '.' . $get_image_main->getClientOriginalExtension(); //hàm lấy đuôi file
                $new_image_gallery = $name_image_gallery.rand(0,99) . '.' . $get_image_gallery->getClientOriginalExtension();
                $stored = $get_image_main->move(public_path().'/images/product', $new_image);
                $store_gallery = $get_image_gallery->move(public_path().'/images/product', $new_image_gallery);
                $data['hinh_SP'] = $new_image;
                $data['product_image_gallery'] = $new_image_gallery;
                $product = Product::find($ma_SP);

                DB::table('san_pham')->where('ma_SP',$ma_SP)->update($data);

                Session::put('message', 'Update product successfully');
                return Redirect::to('admin/view_product');
            }else{
            Session::put('message','File is incorrect . Try again');
            return Redirect::to('admin/view_product');
            }
        }else{
            DB::table('san_pham')->where('ma_SP',$ma_SP)->update($data);
            Session::put('message', 'Update product successfully');
            return Redirect::to('admin/view_product');
        }
    }


}
