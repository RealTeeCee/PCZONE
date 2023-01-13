@php
    $in_wish_list = App\Models\Wishlist::where('ma_SP',$product->ma_SP)->where('ma_KH',Session::get('user_id'))->first();
    if(!empty($in_wish_list)){
        echo '<i class="fa fa-heart wish-list-'.$product->ma_SP.'" style="color:red" aria-hidden="true"></i>';
    }else{
        echo '<i class="fa fa-heart-o wish-list-'.$product->ma_SP.'" style="color:black" aria-hidden="true"></i>';
    }
@endphp
