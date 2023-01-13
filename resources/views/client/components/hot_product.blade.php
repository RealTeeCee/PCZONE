<div class="row">
    @if(Session::get('pc')==15)
    @else
    <div class="col-sm-6 col-md-3 col-xs-b25">
        @php
            $hots = DB::select('select san_pham.ma_SP, AVG(donhang_chitiet.soluong_CT) as soluong_CT from san_pham  join donhang_chitiet on san_pham.ma_SP = donhang_chitiet.ma_SP group by san_pham.ma_SP order by soluong_CT desc limit 3');
            $id = array();
            for ($i=0; $i < count($hots); $i++) {
                $id[$i] = $hots[$i]->ma_SP;
            }
            $hotSales = DB::table('san_pham')->whereIn('ma_SP',$id)->get();
        @endphp
        <div class="h4 col-xs-b25">Bán Chạy</div>
        @foreach($hotSales as $product)
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}"><img src="{{ asset('images/product/'.$product->hinh_SP)}}" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}">{{$product->component}}</a></div>
                <h6 class="h6 col-xs-b10"><a href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}">{{$product->ten_SP}}</a></h6>
                <div class="simple-article dark">${{$product->gia_SP}}</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        @endforeach
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        @php
            $ratings = DB::select('select san_pham.ma_SP, AVG(binhluan.rating) as rating from san_pham  join binhluan on san_pham.ma_SP = binhluan.ma_SP group by san_pham.ma_SP order by rating desc limit 3');
            $id = array();
            for ($i=0; $i < count($ratings); $i++) {
                $id[$i] = $ratings[$i]->ma_SP;
            }
            $topRating = DB::table('san_pham')->whereIn('ma_SP',$id)->get();
        @endphp
        <div class="h4 col-xs-b25">Đánh giá tốt</div>
        @foreach ($topRating as $product)
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}"><img src="{{ asset('images/product/'.$product->hinh_SP)}}" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}">{{$product->component}}</a></div>
                <h6 class="h6 col-xs-b10"><a href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}">{{$product->ten_SP}}</a></h6>
                <div class="simple-article dark">${{$product->gia_SP}}.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        @endforeach
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        @php
            // $key = DB::select('select product.product_id, AVG(invoice_details.quantity) as quantity from product  join invoice_details on product.product_id = invoice_details.product_id group by product.product_id order by quantity desc limit 3');
            // $id = array();
            // for ($i=0; $i < count($key); $i++) {
            //     $id[$i] = $key[$i]->product_id;
            // }
            $popular = DB::select(' select * from san_pham where gia_SP between 100 and 300 order by gia_SP asc limit 3');
        @endphp
        <div class="h4 col-xs-b25">Phố biến</div>
        @foreach($popular as $product)
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}"><img src="{{ asset('images/product/'.$product->hinh_SP)}}" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}">{{$product->component}}</a></div>
                <h6 class="h6 col-xs-b10"><a href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}">{{$product->ten_SP}}</a></h6>
                <div class="simple-article dark">${{$product->gia_SP}}.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        @endforeach
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        @php
            $choices = DB::select('select san_pham.ma_SP, AVG(donhang_chitiet.soluong_CT) as soluong_CT from san_pham  join donhang_chitiet on san_pham.ma_SP = donhang_chitiet.ma_SP group by san_pham.ma_SP order by soluong_CT desc limit 3');
            $id = array();
            for ($i=0; $i < count($choices); $i++) {
                $id[$i] = $choices[$i]->ma_SP;
            }
            $bestChoices = DB::table('san_pham')->whereIn('ma_SP',$id)->get();
        @endphp
        <div class="h4 col-xs-b25">Lựa chọn hàng đầu</div>
        @foreach($bestChoices as $product)
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}"><img src="{{ asset('images/product/'.$product->hinh_SP)}}" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}">{{$product->component}}</a></div>
                <h6 class="h6 col-xs-b10"><a href="{{ route('client.product_detail',['product_id' => $product->ma_SP])}}">{{$product->ten_SP}}</a></h6>
                <div class="simple-article dark">${{$product->gia_SP}}.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        @endforeach
    </div>
    @endif
</div>
