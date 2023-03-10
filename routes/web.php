<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\BuildController;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\MomoController;
use App\Http\Controllers\AdminController;


Route::prefix('admin')->group(function(){
    Route::get('/',[App\Http\Controllers\AdminController::class,'index']);
    Route::get('/login',[App\Http\Controllers\AdminController::class,'login']);
    Route::post('checkLogin',[App\Http\Controllers\AdminController::class,'checkLogin']);
    Route::get('/logout',[App\Http\Controllers\AdminController::class,'logout']);
    Route::get('/view_contact',[App\Http\Controllers\AdminController::class,'view_contact']);
    //Category
    Route::get('/create_category',[App\Http\Controllers\CategoryController::class,'create_category'])->name('create_category');
    Route::post('/save_category',[App\Http\Controllers\CategoryController::class,'save_category']);
    Route::get('/view_category',[App\Http\Controllers\CategoryController::class,'view_category']);
    Route::get('/view_category/active_category/{category_id}',[App\Http\Controllers\CategoryController::class,'active_category']);
    Route::get('/view_category/unactive_category/{category_id}',[App\Http\Controllers\CategoryController::class,'unactive_category']);
    Route::get('/update_category/{category_id}',[App\Http\Controllers\CategoryController::class,'update_category']);
    Route::post('saveUpdate_category/{category_id}',[App\Http\Controllers\CategoryController::class,'saveUpdate_category']);
    Route::get('delete_category/{category_id}',[App\Http\Controllers\CategoryController::class,'delete_category']);

    //Brand
    Route::get('/create_brand',[App\Http\Controllers\BrandController::class,'create_brand'])->name('create_brand');
    Route::post('/save_brand',[App\Http\Controllers\BrandController::class,'save_brand']);
    Route::get('/view_brand',[App\Http\Controllers\BrandController::class,'view_brand']);
    Route::get('/update_brand/{brand_id}',[App\Http\Controllers\BrandController::class,'update_brand']);
    Route::post('saveUpdate_brand/{category_id}',[App\Http\Controllers\BrandController::class,'saveUpdate_brand']);
    Route::get('/view_brand/active_brand/{brand_id}',[App\Http\Controllers\BrandController::class,'active_brand']);
    Route::get('/view_brand/unactive_brand/{brand_id}',[App\Http\Controllers\BrandController::class,'unactive_brand']);
    Route::get('delete_brand/{brand_id}',[App\Http\Controllers\BrandController::class,'delete_brand']);


    //Product
    Route::get('/create_product',[App\Http\Controllers\ProductController::class,'create_product'])->name('create_product');

    Route::post('/save_product',[App\Http\Controllers\ProductController::class,'save_product'])->name('save_product');
    Route::get('/view_product',[App\Http\Controllers\ProductController::class,'view_product']);
    Route::get('/product_details/{product_id}',[App\Http\Controllers\ProductController::class,'product_details']);
    Route::get('/view_product_cate/{category_id}',[App\Http\Controllers\ProductController::class,'view_product_cate']);
    Route::get('/view_product_brand/{brand_id}',[App\Http\Controllers\ProductController::class,'view_product_brand']);
    Route::get('/edit_product/{product_id}',[App\Http\Controllers\ProductController::class,'edit_product']);
    Route::post('/save_update_product/{product_id}',[App\Http\Controllers\ProductController::class,'save_update_product']);
    Route::get('/view_product_sup/{supplier_id}',[App\Http\Controllers\ProductController::class,'view_product_supplier']);
    Route::get('/view_product/active_product/{product_id}',[App\Http\Controllers\ProductController::class,'active_product']);
    Route::get('/view_product/unactive_product/{product_id}',[App\Http\Controllers\ProductController::class,'unactive_product']);
    Route::get('delete_product/{product_id}',[App\Http\Controllers\ProductController::class,'delete_product']);

     //FAQ
     Route::get('/create_FAQ', [App\Http\Controllers\FAQController::class, 'create_faq'])->name('create_FAQ');
     Route::post('/save_FAQ', [App\Http\Controllers\FAQController::class, 'save_faq']);
     Route::get('view_FAQ', [App\Http\Controllers\FAQController::class, 'view_faq'])->name('view_FAQ');
     Route::get('/update_FAQ/{faq_id}',[App\Http\Controllers\FAQController::class,'update_faq']);
     Route::post('/saveUpdate_FAQ/{faq_id}',[App\Http\Controllers\FAQController::class,'saveUpdate_faq']);
     Route::get('/delete_FAQ/{faq_id}',[App\Http\Controllers\FAQController::class,'delete_faq']);


    //Slider
    Route::get('/slider',[App\Http\Controllers\SliderController::class,'index'])->name('slider.index');
    Route::get('slider_create',[App\Http\Controllers\SliderController::class,'create'])->name('slider.create');
    Route::post('slider_store/',[App\Http\Controllers\SliderController::class,'store'])->name('slider.store');
    Route::get('slider_edit/{id}',[App\Http\Controllers\SliderController::class,'edit'])->name('slider.edit');
    Route::post('slider_update/',[App\Http\Controllers\SliderController::class,'update'])->name('slider.update');
    Route::get('slider_delete/{id}',[App\Http\Controllers\SliderController::class,'destroy'])->name('slider.destroy');

    //Admin
    Route::get('/create_admin',[App\Http\Controllers\AdminController::class,'create_admin'])->name('create_admin');
    Route::post('/admin_postCreate',[App\Http\Controllers\AdminController::class,'admin_postCreate'])->name('admin_postCreate');
    Route::get('/view_admin',[App\Http\Controllers\AdminController::class,'view_admin']);
    Route::get('view_admin/{admin_id}',[App\Http\Controllers\AdminController::class,'admin_detail'])->name('admin_detail');
    Route::get('/delete_admin/{admin_id}',[App\Http\Controllers\AdminController::class,'delete_admin']);


    //Information Admin
    Route::get('information_admin',[AdminController::class, 'information_admin']);
    Route::post('update_image/{id}',[AdminController::class, 'update_image'])->name('update_image');
    Route::post('update_infor_admin/{user_id}',[App\Http\Controllers\AdminController::class, 'update_infor_admin'])->name('update_infor_admin');

    //User
    Route::get('/view_user',[App\Http\Controllers\AdminController::class,'view_user']);
    Route::get('/delete_user/{user_id}',[App\Http\Controllers\AdminController::class,'delete_user']);



    //order

    Route::get('/view_order',[App\Http\Controllers\AdminController::class,'view_order']);
    Route::get('/invoice_details/{invoice_id}',[App\Http\Controllers\AdminController::class,'invoice_details']);
    Route::get('print_invoice/{invoice_id}',[App\Http\Controllers\AdminController::class,'print_invoice']);
    Route::get('change_status_invoice/{invoice_id}',[App\Http\Controllers\AdminController::class,'change_status_invoice']);
    Route::get('change_status_invoice1/{invoice_id}',[App\Http\Controllers\AdminController::class,'change_status_invoice1']);


    //Coupon
    Route::get('/create_coupon',[App\Http\Controllers\CouponController::class,'create_coupon']);
    Route::post('/save_coupon',[App\Http\Controllers\CouponController::class,'save_coupon']);
    Route::get('/view_coupon',[App\Http\Controllers\CouponController::class,'view_coupon']);
    Route::get('/update_coupon/{coupon_id}',[App\Http\Controllers\CouponController::class,'update_coupon']);
    Route::post('/saveUpdate_coupon/{coupon_id}',[App\Http\Controllers\CouponController::class,'saveUpdate_coupon']);
    Route::get('/delete_coupon/{coupon_id}',[App\Http\Controllers\CouponController::class,'delete_coupon']);
});


Route::prefix('')->group(function(){
    //Login facebook
    Route::get('/login-facebook',[App\Http\Controllers\LoginController::class,'login_facebook']);
    Route::get('/login-facebook/callback',[App\Http\Controllers\LoginController::class,'login_facebook_callback']);

    //Google
    Route::get('/login-google',[App\Http\Controllers\LoginController::class,'login_google']);
    Route::get('/login-google/callback',[App\Http\Controllers\LoginController::class,'login_google_callback']);
    //Login
    Route::get('/login',[App\Http\Controllers\LoginController::class,'login']);
    Route::post('/checkLogin',[App\Http\Controllers\LoginController::class,'checkLogin']);
    //Register
    Route::post('/register',[App\Http\Controllers\LoginController::class,'register']);
    //logout
    Route::get('log-out',[App\Http\Controllers\LoginController::class,'logout']);
    //Fotget password
    Route::get('forget_password',[App\Http\Controllers\LoginController::class,'forget_password']);
    Route::post('send_mail_forget',[App\Http\Controllers\LoginController::class,'send_mail_forget']);

    //product
    Route::get('',[HomeController::class,'index'])->name('client.home');
    Route::get('/products',[App\Http\Controllers\client\ProductController::class,'products'])->name('client.products');
    Route::get('/products_2',[App\Http\Controllers\client\ProductController::class,'products_2'])->name('client.products_2');
    Route::get('/category/{$category_id}',[CategoryController::class,'products'])->name('client.categories_show');
    Route::get('/product/{product_id}',[App\Http\Controllers\client\ProductController::class,'product_detail'])->name('client.product_detail');
    Route::get('/tag/{category_id}',[App\Http\Controllers\client\ProductController::class,'tag_clicked'])->name('client.tag_clicked');
    Route::get('/brands/{brand_id}',[App\Http\Controllers\client\ProductController::class,'brand_clicked'])->name('client.brand_clicked');
    Route::post('/product/popup_product',[App\Http\Controllers\client\ProductController::class,'popup_product'])->name('client.popup_product');
    Route::post('/product/popup_compare',[App\Http\Controllers\client\ProductController::class,'popup_compare'])->name('client.popup_compare');
    Route::get('/products/price-{min}-{max}',[App\Http\Controllers\client\ProductController::class,'product_price'])->name('client.product_price');


    // Route::get('/cart',[HomeController::class,'cart'])->name('client.cart');
    // Route::get('/checkout',[HomeController::class,'checkout'])->name('client.checkout');
    Route::get('/contact',[HomeController::class,'contact'])->name('client.contact');
    Route::get('/about',[HomeController::class,'about'])->name('client.about');
    Route::post('save_contact',[HomeController::class,'save_contact']);

    //FAQ
    Route::get('/FAQ',[HomeController::class,'FAQ'])->name('client.faq');


     //Build
     Route::get('/build',[BuildController::class,'build'])->name('client.build');
     Route::post('/build_set',[BuildController::class,'build_set'])->name('client.build_set');


    //Cart
    Route::post('add_cart_ajax',[App\Http\Controllers\CartController::class,'add_cart_ajax']);
    Route::get('show_cart',[App\Http\Controllers\CartController::class,'show_cart']);
    Route::post('update_cart',[App\Http\Controllers\CartController::class,'update_cart']);
    Route::get('del_product/{session_id}',[App\Http\Controllers\CartController::class,'del_product']);
    Route::get('del_all_cart',[App\Http\Controllers\CartController::class,'del_all_cart']);
    Route::get('checkout',[App\Http\Controllers\CartController::class,'checkout'])->name('checkout');
    Route::post('confirm_order',[App\Http\Controllers\CartController::class,'confirm_order']);


    //Category sidebar clicked
    Route::get('/products/category/{category_id}',[App\Http\Controllers\client\ProductController::class,'category_sidebar_clicked'])->name('category_sidebar_clicked');

    //Wishlist
    Route::get('wish_list',[UserController::class,'wish_list'])->name('client.wish_list')->middleware('checkUserLogin');
    Route::post('products/add_wish_list',[UserController::class,'add_wish_list'])->name('add_wish_list');

    //Paypal
    Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
    Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
    Route::get('thanks',[App\Http\Controllers\CartController::class,'thanks'])->name('thanks');

    //Momo
    Route::post('momo_payment',[MomoController::class, 'momo_payment'])->name('momoPayment');

    //Search
    Route::post('search',[HomeController::class, 'search'])->name('search');
    //Information user
    Route::get('information_user',[UserController::class, 'information_user']);
    Route::post('update_image/{id}',[UserController::class, 'update_image']);
    Route::post('update_infor_user/{user_id}',[UserController::class, 'update_infor_user']);
    Route::post('change_password/{user_id}',[UserController::class, 'change_password']);
    Route::get('view_invoice_user/{invoice_id}',[UserController::class, 'view_invoice_user']);

    //Review
    Route::post('review_product',[UserController::class, 'review_product'])->middleware('checkUserLogin');

    //Coupon
    Route::post('add_coupon',[App\Http\Controllers\CouponController::class,'add_coupon']);
    Route::get('delete_coupon_cart',[App\Http\Controllers\CouponController::class,'delete_coupon_cart']);
    Route::post('get_coupon',[App\Http\Controllers\CouponController::class,'get_coupon'])->middleware('checkUserLogin');
    Route::post('get_coupon_promo',[App\Http\Controllers\CouponController::class,'get_coupon_promo'])->middleware('checkUserLogin');



});
