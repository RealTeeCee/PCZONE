<div class="col-md-3 col-md-pull-9">
    @if(Session::get('pc')== 15)
    <div class="h4 col-xs-b10">Máy Nguyên Bộ</div>
    @php
    $cate = App\Models\Category::where('parent_id','=',1)->inRandomOrder()->limit(15)->get();
    @endphp
    <ul class="categories-menu transparent">
        @foreach($cate as $cat)
            <li>
                <li>
                    <a href="{{route('category_sidebar_clicked',$cat->ma_PL)}}">{{ $cat->ten_PL }}</a>
                </li>
            </li>
        @endforeach
    </ul>
    @else
    <div class="h4 col-xs-b10">Loại linh kiện</div>
    <ul class="categories-menu transparent">
        @foreach($categories as $category)
            <li>
                <li>
                    <a href="{{route('category_sidebar_clicked',$category->ma_PL)}}">{{ $category->ten_PL }}</a>
                </li>
            </li>
        @endforeach
    </ul>
    @endif
    @if(Session::get('pc')== 15)
    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Giá</div>
    <div class="price-filter">
            <a class="price-btn" href="{{ route('client.product_price',['min'=>0,'max'=>300]) }}">
                <button class="btn" data-min = "0" data-max= "300" style ="width: 200px" name="btn-brand">0-300$</button>
            </a>
            <div class="empty-space col-xs-b10"></div>
            <a class="price-btn" href="{{ route('client.product_price',['min'=>300,'max'=>600]) }}">
                <button class="btn" data-min = "300" data-max= "600" style ="width: 200px" name="btn-brand">300-600$</button>
            </a>
            <div class="empty-space col-xs-b10"></div>
            <a class="price-btn" href="{{ route('client.product_price',['min'=>600,'max'=>900]) }}">
                <button class="btn" data-min = "600" data-max= "900" style ="width: 200px" name="btn-brand">600-900$</button>
            </a>
            <div class="empty-space col-xs-b10"></div>
    </div>
    @else
    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Giá</div>
    <div class="price-filter">
            <a class="price-btn" href="{{ route('client.product_price',['min'=>0,'max'=>100]) }}">
                <button class="btn" data-min = "0" data-max= "100" style ="width: 200px" name="btn-brand">0-100$</button>
            </a>
            <div class="empty-space col-xs-b10"></div>
            <a class="price-btn" href="{{ route('client.product_price',['min'=>100,'max'=>200]) }}">
                <button class="btn" data-min = "100" data-max= "200" style ="width: 200px" name="btn-brand">100-200$</button>
            </a>
            <div class="empty-space col-xs-b10"></div>
            <a class="price-btn" href="{{ route('client.product_price',['min'=>200,'max'=>300]) }}">
                <button class="btn" data-min = "200" data-max= "300" style ="width: 200px" name="btn-brand">200-300$</button>
            </a>
            <div class="empty-space col-xs-b10"></div>
            <a class="price-btn" href="{{ route('client.product_price',['min'=>300,'max'=>400]) }}">
                <button class="btn" data-min = "300" data-max= "400" style ="width: 200px" name="btn-brand">300-400$</button>
            </a>
            <div class="empty-space col-xs-b10"></div>
    </div>
    @endif
    {{-- <div id="prices-range"></div>
    <div class="simple-article size-1">PRICE: <b class="grey">$<span class="min-price">1</span> - $<span class="max-price">1000</span></b></div> --}}

    <div class="empty-space col-xs-b25 col-sm-b50"></div>
    @if(Session::get('pc')== 15)
    <div class="h4 col-xs-b25" id="check-brand">Thương Hiệu</div>
        <label class="checkbox-entry">
            @foreach($brands as $brand)
                @if($brand->ma_TH == 23)
                <a href="{{ route('client.brand_clicked',['brand_id'=>$brand->ma_TH])}}">
                    <button class="btn" style="width:98px; margin-bottom:5px;" value = "{{ $brand->ma_TH}}"  name="btn-brand">{{ $brand->ten_TH}}</button>
                </a>
                @endif
            @endforeach
        </label>
        <div class="empty-space col-xs-b10"></div>
    @else
    <div class="h4 col-xs-b25" id="check-brand">Thương Hiệu</div>
        <label class="checkbox-entry">
            @foreach($brands as $brand)
                @if($brand->ma_TH !== 23)
                <a href="{{ route('client.brand_clicked',['brand_id'=>$brand->ma_TH])}}">
                    <button class="btn" style="width:98px; margin-bottom:5px;" value = "{{ $brand->ma_TH}}"  name="btn-brand">{{ $brand->ten_TH}}</button>
                </a>
                @endif
            @endforeach
        </label>
        <div class="empty-space col-xs-b10"></div>
    @endif

    <div class="empty-space col-xs-b25 col-sm-b50"></div>
    @if(Session::get('pc')== 15)
    <div class="h4 col-xs-b25">Thẻ tag</div>
    <div class="tags light clearfix">
        @php
            $tags = App\Models\Category::where('parent_id','=',1)->inRandomOrder()->limit(15)->get();
        @endphp
        @foreach($tags as $tag)
            <a class="tag" href="{{ route('client.tag_clicked',['category_id'=>$tag->ma_PL])}}">{{ $tag->ten_PL }}</a>
        @endforeach
    </div>
    @else
    <div class="h4 col-xs-b25">Thẻ tag</div>
    <div class="tags light clearfix">
        @php
            $tags = App\Models\Category::where('parent_id','=',0)->inRandomOrder()->limit(15)->get();
        @endphp
        @foreach($tags as $tag)
            <a class="tag" href="{{ route('client.tag_clicked',['category_id'=>$tag->ma_PL])}}">{{ $tag->ten_PL }}</a>
        @endforeach
    </div>
    @endif
    <div class="empty-space col-xs-b25 col-sm-b50"></div>


</div>
