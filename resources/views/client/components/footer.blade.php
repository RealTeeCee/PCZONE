        <!-- FOOTER -->
        <footer>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-xs-b30 col-md-b0">
                            <a href="{{ route('client.home')}}"><img style="width:200px;height:50px;cursor:url(client/img/drag-edit2.png) 32 32, ew-resize;" src="{{ asset('favicon/pczone.jpg')}}" alt="" /></a>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="simple-article size-2 light fulltransparent">Tại PCZone, chúng tôi tận tâm cung cấp cho bạn toàn bộ giải pháp công nghệ thông tin cần thiết.</div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="footer-contact"><i class="fa fa-mobile" aria-hidden="true"></i> liên hệ: <a href="#">+84 (283) 123 456 789</a></div>
                            <div class="footer-contact"><i class="fa fa-envelope-o" aria-hidden="true"></i> email: <a href="#">office@pczone.vn</a></div>
                            <div class="footer-contact"><i class="fa fa-map-marker" aria-hidden="true"></i> địa chỉ: <a href="#">590, CMT8, Ho Chi Minh city</a></div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xs-b30 col-md-b0">
                            <h6 class="h6 light">Đường dẫn nhanh</h6>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="footer-column-links">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="{{ route('client.home')}}">trang chủ</a>
                                        <a href="{{ route('client.about')}}">về chúng tôi</a>
                                        <a href="{{ route('client.products')}}">linh kiện</a>
                                        <a href="{{ route('client.products_2')}}">máy nguyên bộ</a>
                                        {{-- <a href="#">services</a>
                                        <a href="#">blog</a>
                                        <a href="#">gallery</a> --}}
                                        <a href="{{ route('client.faq')}}">Liên hệ & phản hồi</a>
                                        <a href="{{ route('client.build')}}">build máy</a>
                                        <a href="{{ route('client.contact')}}">contact</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#">chính sách</a>
                                        <a href="#">điều khoản</a>
                                        <a href="#">đăng ký</a>
                                        <a href="#">giao hàng</a>
                                        <a href="#">trang</a>
                                        <a href="#">câu chuyện về PCZONE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear visible-sm"></div>
                        <div class="col-sm-6 col-md-3 col-xs-b30 col-sm-b0">
                            <h6 class="h6 light">Tin tức công nghệ</h6>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="footer-post-preview clearfix">
                                <a class="image" href="https://www.thegioididong.com/tin-tuc/laptop-gaming-cpu-intel-giam-den-xx-tang-kem-qua-tang-hap-dan-1441431"><img src="{{ asset('client/img/new-1.jpg')}}" alt="" /></a>
                                <div class="description">
                                    <div class="date">30/6/2022</div>
                                    <a class="title" href="https://www.thegioididong.com/tin-tuc/laptop-gaming-cpu-intel-giam-den-xx-tang-kem-qua-tang-hap-dan-1441431">Laptop 'chiến' game có CPU Intel thế hệ mới</a>
                                </div>
                            </div>
                            <div class="footer-post-preview clearfix">
                                <a class="image" href="https://www.thegioididong.com/tin-tuc/tren-tay-asus-zenbook-14x-oled-space-edition-1410958"><img src="{{ asset('client/img/new-2.jpg')}}" alt="" /></a>
                                <div class="description">
                                    <div class="date">30/6/2022</div>
                                    <a class="title" href="https://www.thegioididong.com/tin-tuc/tren-tay-asus-zenbook-14x-oled-space-edition-1410958">Trên tay ASUS Zenbook 14X OLED Space</a>
                                </div>
                            </div>
                            <div class="footer-post-preview clearfix">
                                <a class="image" href="https://www.thegioididong.com/tin-tuc/laptop-gaming-lam-duoc-gi-1442750"><img src="{{ asset('client/img/new-3.jpg')}}" alt="" /></a>
                                <div class="description">
                                    <div class="date">30/6/2022</div>
                                    <a class="title" href="https://www.thegioididong.com/tin-tuc/laptop-gaming-lam-duoc-gi-1442750">Những tính năng hữu dụng của laptop gaming và 3 mẫu đáng mua trong 2022</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <h6 class="h6 light">Thẻ</h6>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="tags clearfix">
                                @php
                                    $tags = DB::table('phanloai')->where('parent_id','=',0)->inRandomOrder()->limit(15)->get();
                                @endphp
                                @foreach($tags as $tag)
                                    <a class="tag" href="{{ route('client.tag_clicked',['category_id'=>$tag->ma_PL])}}">{{ $tag->ten_PL }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-lg-8 col-xs-text-center col-lg-text-left col-xs-b20 col-lg-b0">
                            <div class="copyright">&copy; 2022 All rights reserved. Development by <a href="#" target="_blank">T1.2109.E0-Group 4</a></div>
                            <div class="follow">
                                <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-text-center col-lg-text-right">
                            <div class="footer-payment-icons">
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-4.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-5.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-6.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-7.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-8.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-9.jpg')}}" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
