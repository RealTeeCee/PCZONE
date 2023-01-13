@extends('client.layouts.master')
@section('title')
    <title>We Are PCZone</title>
@endsection
@section('content')
@section('css')
<style>
    .product-shortcode.style-9:hover .preview img{
  padding: 0.4em;
  box-shadow: 0 0 .2rem #fff,
            0 0 .2rem #fff,
            0 0 2rem #eceaec,
            0 0 0.8rem #eceaec,
            0 0 2.8rem #eceaec,
            inset 0 0 1.3rem #eceaec;}
    .product-shortcode.style-9 .content{padding-top: 0}
    body{background-color: #000}
</style>
@endsection
        <div class="header-empty-space"></div>

        <div class="block-entry fixed-background">
            <video src="{{ asset("client/video/719e955e.mp4") }}" autoplay muted >
            </video>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('client.home')}}">Trang Chủ</a>
                <a href="{{ route('client.about')}}">Về chúng tôi</a>
                @if(!empty($title))
                <a>{{$title}}</a>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="simple-article size-3 grey uppercase col-xs-b5"></div>
                    <div class="h2">PCZone</div>
                    <div class="title-underline left"><span></span></div>
                    <div class="simple-article size-4 grey">Hơn 22 triệu chuyên gia CNTT, doanh nghiệp nhỏ, chính quyền địa phương, sinh viên, kỹ sư, lập trình viên, nhà sản xuất, người đam mê công nghệ, game thủ, khách hàng sử dụng sản phẩm máy tính và thiết bị điện tử đã dựa vào PCZone để đáp ứng nhu cầu liên lạc và hỗ trợ công nghệ thông tin của họ kể từ năm 1979.</div>
                </div>
                <div class="col-sm-7">
                    <div class="simple-article size-3">
                        <p>30 NĂM
                            TRẢI QUA
                            "Đây là công ty đã tạo ra PC chơi game." - Game thủ PC
                            Không có công ty nào khác tạo ra những chiếc máy tính đam mê lâu như Falcon Northwest. Chúng tôi đã xây dựng những chiếc PC ưu tú cho người dùng thành thạo và game thủ kể từ năm 1992. Nhiệm kỳ lâu dài này đã cho chúng tôi một viễn cảnh dài hạn độc đáo trong một ngành chỉ được biết đến với công nghệ tốc độ nhanh. Chúng tôi vẫn đang hỗ trợ các hệ thống mà chúng tôi đã xây dựng một thập kỷ trước và xây dựng các hệ thống cho thập kỷ tiếp theo. Chúng tôi đã có một thời gian dài để làm rất tốt những gì chúng tôi làm.</p>
                        <p>Đặc biệt tập trung vào các sản phẩm công nghệ thông tin, PCZone cung cấp nhiều máy tính, thiết bị điện tử, mạng và thiết bị truyền thông (hơn 30.000 mặt hàng trong kho) hơn bất kỳ công ty nào khác. PCZone có đam mê sâu sắc trong việc cung cấp các sản phẩm công nghệ thông tin và dịch vụ hỗ trợ công nghệ. Chúng tôi đã cung cấp dịch vụ nhận đơn đặt hàng trực tuyến tại cửa hàng kể từ năm 2010. Người tiêu dùng có thể ghé thăm 25 cửa hàng của PCZone từ bờ biển này sang bờ biển khác hoặc microcenter.com để mua hàng nghìn mặt hàng liên quan đến máy tính, điện tử và các sản phẩm công nghệ thông tin khác.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <div class="slider-wrapper">
                <div class="swiper-button-prev hidden"></div>
                <div class="swiper-button-next hidden"></div>
                <div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lt-slides="3"  data-slides-per-view="3" data-space="30">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/about-1.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Giải pháp công nghệ thông tin cho cơ sở hạ tầng quan trọng</h6>
                                    <div class="description simple-article size-2">Tại PCZone, chúng tôi tận tâm cung cấp cho bạn toàn bộ giải pháp công nghệ thông tin cần thiết. Khi doanh nghiệp và trường học chuyển sang làm việc từ xa tại nhà và học tập ảo, chúng tôi ở đây để đáp ứng nhu cầu thiết yếu của bạn về máy tính, mạng, webcam và tất cả các sản phẩm làm việc tại nhà. PCZone ở đây để đáp ứng nhu cầu y tế từ xa của bạn để bạn có thể tham khảo ý kiến ​​bác sĩ tại nhà của mình. Khi đất nước đang chứng kiến ​​sự thay đổi lịch sử sang tiếp cận kỹ thuật số từ xa, chúng tôi sẵn sàng hỗ trợ bạn khi bạn làm việc, học tập và nhận dịch vụ y tế từ xa tại nhà một cách hiệu quả.</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/about-2.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Sự hài lòng của khách hàng</h6>
                                    <div class="description simple-article size-2">Tại PCZone, chúng tôi luôn hướng tới việc mang đến cho bạn trải nghiệm mua sắm tuyệt vời. PCZone cung cấp sự lựa chọn, dịch vụ và chuyên môn bán hàng cạnh tranh với các công ty định hướng dịch vụ hàng đầu khác. Các thiết kế cửa hàng của PCZone dựa trên các nghiên cứu toàn diện về hành vi mua sắm của khách hàng, hàng nghìn cuộc khảo sát khách hàng và thử nghiệm rộng rãi.</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/about-3.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Cộng tác viên bán hàng có hiểu biết</h6>
                                    <div class="description simple-article size-2">PCZone từ lâu đã được biết đến với các cửa hàng máy tính và thiết bị điện tử với đội ngũ nhân viên bán hàng giàu kinh nghiệm, hiểu biết và hữu ích nhất, cùng với dịch vụ hỗ trợ kỹ thuật tận nơi PCZone thuê những người đam mê máy tính và điện tử với kỹ năng tốt và cung cấp đào tạo liên tục để đảm bảo rằng khách hàng nhận được kinh nghiệm bán hàng lãnh sự xuất sắc. Các cộng tác viên bán hàng của chúng tôi thành thạo trong việc trợ giúp khách hàng ở mọi cấp độ kiến ​​thức về máy tính và điện tử tiêu dùng</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/thumbnail-38.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">
                                        Định giá</h6>
                                    <div class="description simple-article size-2">PCZone đã đưa ra mức giá thấp nhất cho CPU trong nhiều năm như một dịch vụ cho phần lớn khách hàng của chúng tôi, những người thích xây dựng PC của riêng họ. PCZone so sánh giá CPU hàng ngày để đảm bảo chúng tôi cung cấp cho bạn mức giá cao hơn các nguồn trực tuyến, ngoài ra chúng tôi mang đến cho bạn sự thuận tiện khi có thể mua những thứ bạn muốn tại PCZone địa phương của bạn. PCZone cung cấp giá cả cạnh tranh trên nhiều lựa chọn hàng hóa của chúng tôi. Nhận tại cửa hàng của PCZone cho phép bạn đặt món mình muốn và nhận ngay khi nhận được email xác nhận.</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/thumbnail-39.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Lựa chọn
                                    </h6>
                                    <div class="description simple-article size-2">Một loại sản phẩm vừa sâu vừa rộng đã trở thành trụ cột chính của PCZone kể từ khi công ty chiếm lĩnh cửa hàng khổ lớn đầu tiên vào năm 1982. Với hơn 30.000 mặt hàng trong kho, PCZone cung cấp nhiều giải pháp công nghệ thông tin hơn và nhiều diện tích vuông dành cho chúng hơn bất kỳ công ty nào khác. PCZone liên tục nghiên cứu khách hàng của chúng tôi để đảm bảo chúng tôi đang đưa ra thị trường những sản phẩm mới nhất mà họ mong muốn. Trên thực tế, PCZone là nhà cung cấp hàng đầu của Hoa Kỳ cho Arduino và Raspberry Pi. Từ người mới đến những người đam mê, kho hàng rộng lớn của PCZone đã bao phủ bạn!</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src="client/img/thumbnail-37.jpg" alt="" />
                                <div class="content">
                                    <h6 class="title h6">molestie nec tortor quis</h6>
                                    <div class="description simple-article size-2">Etiam mollis tristique mi ac ultrices. Morbi vel neque eget lacus sollicitudin facilisis. Lorem ipsum dolor sit amet semper ante vehicula</div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="swiper-pagination relative-pagination"></div>
                </div>
            </div>
        </div>

        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}
        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">our team</div>
                <div class="h2">Gặp gỡ những chuyên gia hàng đầu</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="slider-wrapper our-team-slider">
                <div class="swiper-button-prev hidden-xs hidden-sm"></div>
                <div class="swiper-button-next hidden-xs hidden-sm"></div>
                <div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lt-slides="4"  data-slides-per-view="5">
                    <div style="height: 65%"class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/hacker-1.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">Team Leader</div>
                                        <div class="h6">Nguyễn Ngọc Nguyên</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada</div>
                                    </div> --}}
                                    <div class="follow light">
                                        <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/hacker-2.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">Member</div>
                                        <div class="h6">Nguyễn Tiến Dũng</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
                                    <div class="follow light">
                                        <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/hacker-3.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">Member</div>
                                        <div class="h6">Nguyễn Trần Công Đạt</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
                                    <div class="follow light">
                                        <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/hacker-4.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">Member</div>
                                        <div class="h6">Tất Hồng Đức</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
                                    <div class="follow light">
                                        <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/hacker-5.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">Instructor</div>
                                        <div class="h6">Cô Đào Ngọc Anh</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
                                    <div class="follow light">
                                        <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="swiper-pagination relative-pagination visible-xs visible-sm"></div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">Thương hiệu của chúng tôi</div>
                <div class="h2">best of the best</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <a class="client-logo-entry">
                <img src={{ asset("client/img/MSI-Logo-700x394.png") }} alt="" />
                <img src={{ asset("client/img/MSI-Logo-700x394.png") }} alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Nvidia-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Nvidia-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Sony-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Sony-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/HP-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/HP-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Intel-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Intel-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Gigabyte-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Gigabyte-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Asus-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Asus-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/AMD-Logo-700x394.png") }} alt="" />
                <img src={{ asset("client/img/AMD-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Canon-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Canon-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/LG-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/LG-Logo-700x394.png") }}  alt="" />
            </a>
        </div>

        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}
        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <div class="cell-view simple-banner-height big">
                        <div class="empty-space col-sm-b35"></div>
                        <div class="simple-article size-3 grey uppercase col-xs-b5">Hỗ trợ kỹ thuật</div>
                        <div class="h2">Dịch vụ nâng cấp PC và sửa chữa PC</div>
                        <div class="title-underline left"><span></span></div>
                        <div class="simple-article size-4 grey">CẤP ĐỘ TRẮC NGHIỆM KHÔNG HỢP LỆ
                            Kỹ thuật viên được chứng nhận OEM và A + của chúng tôi có thể trợ giúp với bất kỳ nhu cầu sửa chữa hoặc dịch vụ máy tính nào. Việc sửa chữa được hoàn thành tại mỗi cửa hàng, giúp bạn yên tâm và quay vòng vốn nhanh chóng. Chúng tôi hoan nghênh các cuộc đi bộ đến bất kỳ địa điểm nào trong số 25 địa điểm của chúng tôi, hoặc đặt lịch hẹn khám dịch vụ.</div>
                        <div class="empty-space col-xs-b30 col-sm-b70"></div>
                        <div class="icon-description-shortcode style-3">
                            <div class="image-icon">
                                <img class="image-thumbnail rounded-image" src="client/img/about-5.jpg" alt="" />
                            </div>
                            <div class="content">
                                <div class="cell-view">
                                    <h6 class="title h6">DỊCH VỤ XÂY DỰNG PC TÙY CHỈNH</h6>
                                    <div class="description simple-article size-2">Bạn đang tìm cách xây dựng một PC tùy chỉnh nhưng bị choáng ngợp bởi tất cả các tùy chọn và sự phức tạp của việc tự xây dựng? Cho dù đó là một PC chơi game hàng đầu, máy chỉnh sửa video hoặc ảnh hay một máy trạm, hãy chọn các bộ phận của bạn và các kỹ thuật viên chuyên nghiệp của chúng tôi có thể tạo ra chiếc PC trong mơ cho bạn. Đặt hàng trong vòng 4 giờ kể từ khi đóng cửa và nó có thể sẵn sàng để nhận ngay trong ngày!</div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space col-xs-b30"></div>
                        <div class="icon-description-shortcode style-3">
                            <div class="image-icon">
                                <img class="image-thumbnail rounded-image" src="client/img/about-6.jpg" alt="" />
                            </div>
                            <div class="content">
                                <div class="cell-view">
                                    <h6 class="title h6">CHẨN ĐOÁN MÁY TÍNH, KIỂM TRA & KHẮC PHỤC SỰ CỐ</h6>
                                    <div class="description simple-article size-2">Máy tính của bạn không bật nguồn hoặc hoạt động bình thường? Có thể khó xác định điều gì đang xảy ra. Các kỹ thuật viên chuyên gia của chúng tôi có kinh nghiệm đối phó với bất kỳ sự cố nào bạn có thể gặp phải và có thể hỗ trợ bạn khắc phục sự cố để xác định cách tốt nhất để khắc phục thiết bị của bạn.</div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space col-xs-b35"></div>
                    </div>
                </div>
            </div>
            <div style="bottom:0px" class="row-background left hidden-xs hidden-sm">
                <img style="bottom: 350"src="client/img/about-4.jpg" alt="" />
            </div>
        </div>
@endsection
@section('js')
@endsection
