@extends('client.layouts.master')
@section('title')
    <title>Contact Us</title>
@endsection
<style>
    .products-wrapper .product-shortcode.style-1{
         margin: 10 10 20 10 ;
    }
    body{background-color: rgba(0, 0, 0, 0.5);background-image: url("{{asset('client/img/background-product-2.jpg')}}");background-repeat: no-repeat;background-size:; }
    .simple-article h4, .h4{
        color: #fff;
text-shadow:
0 0 7px #fff,
0 0 10px #fff,
0 0 21px #fff,
0 0 42px #bc13fe,
0 0 82px #bc13fe,
0 0 92px #bc13fe,
0 0 102px #bc13fe,
0 0 151px #bc13fe;
    }
    .container{
        background-color: #00000094
    }
    .simple-input::placeholder {
    color: whitesmoke;
}
</style>
@section('content')
    <div id="content-block">
        <div class="block-entry fixed-background" style="background-image: url(client/img/1809534.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="cell-view simple-banner-height text-center">
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                            <h1 class="h1 light">Chúng tôi là PCZone</h1>
                            <div class="title-underline center"><span></span></div>
                            <div class="simple-article light transparent size-4">
                                Tại PCZone, chúng tôi tận tâm cung cấp cho bạn toàn bộ giải pháp công nghệ thông tin cần thiết.</div>
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="empty-space col-xs-b25 col-sm-b50"></div>
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('client.home')}}">Trang Chủ</a>
                <a href="{{ route('client.contact')}}">Liên hệ & Phản Hồi</a>
                @if(!empty($title))
                <a>{{$title}}</a>
                @endif
            </div>
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">
                    liên hệ chúng tôi</div>
                <div class="h2">chúng tôi đã sẵn sàng cho câu hỏi của bạn</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-sm-b15 col-md-b50"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src={{ asset("client/img/icon-25.png") }} alt="">
                        <div class="title h6">Địa chỉ</div>
                        <div class="description simple-article size-2">590, CMT8, Ho Chi Minh city</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src={{ asset("client/img/icon-23.png") }} alt="">
                        <div class="title h6">Số điện thoại</div>
                        <div class="description simple-article size-2" style="line-height: 26px;">
                            <a href="tel:+32323232323232">+84  (283) 123 456 789</a>
                            <br/>
                            <a href="tel:+32323232322323">+84  (283) 321 654 987</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src={{ asset("client/img/icon-28.png") }} alt="">
                        <div class="title h6">email</div>
                        <div class="description simple-article size-2"><a href="#">office@PCZone.vn</a></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src={{ asset("client/img/icon-26.png") }} alt="">
                        <div class="title h6">Follow us</div>
                        <div class="follow light">
                            <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                            <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="map-wrapper">
                <div id="map-canvas" class="full-width" data-lat="10.7866555" data-lng="106.6660413" data-zoom="19"></div>
            </div>
            <div class="addresses-block hidden">
                <a class="marker" data-lat="10.7866555" data-lng="106.6660413" data-string="PCZone Company"></a>
            </div>
        </div>

        <div class="empty-space col-xs-b25 col-sm-b50"></div>
        <?php

            $correct = Session::get('correct');
            if($correct){
                echo '<script>alert("'.$correct.'");</script>';
                Session::put('correct', null);
            }
            ?>

        <div class="container">
            <h4 class="h4 text-center col-xs-b25">Bạn có câu hỏi?</h4>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form class="contact-form" action="{{URL::to('save_contact')}}" method="post">
                        @csrf
                        <div class="row m5">
                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="{{old('contact_name')}}" placeholder="Tên" name="contact_name" />
                                @error('contact_name')
                            <div style="font-size:15px; color:red">{{ $message }}</div>
                             @enderror
                            </div>

                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="{{old('contact_email')}}" placeholder="Email" name="contact_email" />
                                @error('contact_email')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                            </div>

                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="{{old('contact_phone')}}" placeholder="Số điện thoại" name="contact_phone" />
                                @error('contact_phone')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                            </div>

                            <div class="col-sm-12">
                                <textarea class="simple-input col-xs-b20" placeholder="Your message" name="contact_message">{{old('contact_message')}}</textarea>
                                @error('contact_message')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                            </div>

                            <div class="col-sm-12">
                                <div class="text-center">
                                    <div class="button size-2 style-3">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src={{ asset("client/img/icon-4.png") }}></span>
                                            <span class="text">Gửi phản hồi</span>
                                        </span>
                                        <input type="submit"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
    </div>
@endsection
<div class="hotline-phone-ring-wrap">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle">
        <a href="tel:0986863320" class="pps-btn-img">
            <img src="https://nocodebuilding.com/wp-content/uploads/2020/07/icon-call-nh.png" alt="Call to me" width="50">
        </a>
        </div>
    </div>
    <div class="hotline-bar">
        <a href="tel:0986863320">
            <span class="text-hotline">0986863320</span>
        </a>
    </div>
</div>
<div class="social-button">
    <div class="social-button-content">

        <a href="https://m.me/PCZoneGaming/" target="_blank" class="mes">
          <img src="https://nocodebuilding.com/wp-content/uploads/2020/07/fb.png" alt="Chat Messenger">
          </a>
        <a href="http://zalo.me/0986863320" target="_blank" class="zalo">
           <img src="https://nocodebuilding.com/wp-content/uploads/2020/07/zl.png" alt="Chat Zalo">
          </a>
    </div>
  </div>
