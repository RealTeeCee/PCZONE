<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui"/>
        @yield('title')

        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet">

        <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/bootstrap.extension.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/swiper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/sumoselect.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/video.css') }}" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="{{ asset('favicon/favicon1.png') }}" />
        <style>
            .rounded-circle {
    border-radius: 50%!important;
}
        </style>
        @yield('css')

    </head>
    <body>

        @include('client.components.loader')
        <div id="content-block">
            @include('client.components.header')
            @yield('content')
            @include('client.components.footer')
        </div>
        @include('client.components.popup')

        <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('client/js/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('client/js/swiper.js') }}"></script>
        <script src="{{ asset('client/js/global.js') }}"></script>

        <!-- styled select -->
        <script src="{{ asset('client/js/jquery.sumoselect.min.js') }}"></script>

        <!-- MAP -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="{{ asset('client/js/map.js') }}"></script>


        <!-- counter -->
        <script src="{{ asset('client/js/jquery.classycountdown.js') }}"></script>
        <script src="{{ asset('client/js/jquery.knob.js') }}"></script>
        <script src="{{ asset('client/js/jquery.throttle.js') }}"></script>
        <script src="{{ asset('client/js/sweetalert.js') }}"></script>
        @yield('js')
        <script>
            $(document).ready(function(){
                $('.add_to_cart').click(function(){
				//l???y id t??? data-id_product c???a t???ng sp

				var id = $(this).data('id');
                console.log(id);
				//L???y value
				var cart_product_id = $('.cart_product_id_'+id).val();
				var cart_product_name = $('.cart_product_name_'+id).val();
				var cart_product_image = $('.cart_product_image_'+id).val();
				var cart_product_price = $('.cart_product_price_'+id).val();
				var cart_product_qty= $('.cart_product_qty_'+id).val();
				var _token = $('input[name="_token"]').val(); //L???y token t??? form
				$.ajax({
					url: "{{url('/add_cart_ajax')}}",
					method:'POST',
					data: {cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
					success: function (data) {
						swal({
							title: "S???n ph???m ???? th??m v??o gi??? h??ng",
                                text: "B???n c?? th??? ti???p t???c shopping ho???c v??o trang thanh to??n ????? x??c nh???n thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Ti???p t???c Shopping",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "V??o Gi??? H??ng",
                                closeOnConfirm: false

						},
						function(){
							window.location.href = "{{url('/show_cart')}}";
							});
					},
				});
			});
            });
        </script>
        {{-- Send order --}}
        <script>
            $(document).ready(function(){
                $('.send_order').click(function(){
                    swal({
                         title: "X??c nh???n ????n H??ng",
                          text: "S???n ph???m mi???n ho??n tr???, B???n c?? ch???c ch???n mu???n x??c nh???n ?????t h??ng?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "X??c Nh???n",
                          cancelButtonText: "????? Khi Kh??c",
                          closeOnConfirm: false,
                          closeOnCancel: false,
                        showLoaderOnConfirm: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                var shipping_email = $('.shipping_email').val();
                                var shipping_name = $('.shipping_name').val();
                                var shipping_address = $('.shipping_address').val();
                                var shipping_phone = $('.shipping_phone').val();
                                var shipping_note = $('.shipping_note').val();
                                var _token = $('input[name="_token"]').val(); //L???y token t??? form
                                $.ajax({
                                    url:"{{URL::to('confirm_order')}}",
                                    method:"POST",
                                    data:{
                                        shipping_email:shipping_email,
                                        shipping_name:shipping_name,
                                        shipping_address:shipping_address,
                                        shipping_phone:shipping_phone,
                                        shipping_note:shipping_note,
                                        _token:_token
                                    },
                                    success:function(data){
                                        setTimeout(function () {
                                            swal("Order", "?????t h??ng th??nh c??ng", "success");
                                                  }, 2000);
                                    }
                                });
                                window.setTimeout(function () {
                                    window.location="{{URL::to('thanks')}}";
                                },3000);
                              } else {
                                    swal("Cancel", "????n h??ng ch??a ???????c g???i", "error");
                              }
                    });
                });
            });

            //fillter by Brand
        $(document).ready(function(){
            $('.checkbox-entry .btn').click(function(){
                var brand = $(this).val();
                $('.nopadding .col-sm-4').hide();
                $('.checkbox-entry .btn').removeClass('btn-info');
                $(this).addClass('btn-info');
                $('.nopadding .brand-'+brand).show();
            })
        })
        </script>
        {{-- Add/romeve wish_list --}}
        <script>
            $(document).ready(function (){
                $('.add_wish_list').click(function(e) {
                        e.preventDefault();
                        var id = $(this).data('id');
                        var product_id = $('.cart_product_id_'+id).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('add_wish_list') }}",
                            method:"POST",
                            data:{
                                product_id: product_id,
                                _token:_token,
                            },
                            success: function (response) {
                                    if(response.status == 'failed') {
                                        alert(response.message);
                                    }
                                    if(response.status == 'deleted') {
                                        $('.wish-list-'+id).removeClass('fa-heart').addClass('fa-heart-o').css("color","black");
                                        swal({
                                            title: "Delete",
                                            text: response.message ,
                                            imageUrl: 'images/icons/icon-heart.png'
                                            });
                                        // alert(response.message);
                                    }
                                    if(response.status == 'added') {
                                        $('.wish-list-'+id).removeClass('fa-heart-o').addClass('fa-heart').css("color","red");
                                        swal({
                                            title: "Success",
                                            text: response.message ,
                                            imageUrl: 'images/icons/icon-heart.png'
                                            });
                                        // alert(response.message);
                                    }
                                },
                        });
                });
            });
        </script>
         {{-- Add/remove compare --}}
         <script>
            $(document).ready(function (){
                $('.select_compare').click(function(e) {
                        e.preventDefault();
                        var id = $(this).data('id');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('add_wish_list') }}",
                            method:"POST",
                            data:{
                                product_id: product_id,
                                _token:_token,
                            },
                            success: function (response) {
                                    if(response.status == 'failed') {
                                        alert(response.message);
                                    }
                                    if(response.status == 'deleted') {
                                        $('.wish-list-'+id).removeClass('fa-heart').addClass('fa-heart-o').css("color","black");
                                        swal({
                                            title: "Delete",
                                            text: response.message ,
                                            imageUrl: 'images/icons/icon-heart.png'
                                            });
                                        // alert(response.message);
                                    }
                                    if(response.status == 'added') {
                                        $('.wish-list-'+id).removeClass('fa-heart-o').addClass('fa-heart').css("color","red");
                                        swal({
                                            title: "Success",
                                            text: response.message ,
                                            imageUrl: 'images/icons/icon-heart.png'
                                            });
                                        // alert(response.message);
                                    }
                                },
                        });
                });
            });
        </script>
        {{-- Show pop-up product --}}
        <script>
            $(document).ready(function(){
                $('a[data-rel="3"]').click(function(e){

                    var id = $(this).data('id');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('client.popup_product')}}",
                        type: "POST",
                        data: {
                            product_id: id,
                            _token:_token
                        },
                        success: function(data){
                            $('#replace-data-rel-3').replaceWith(data);
                            $('.popup-content').removeClass('active');
                            $('.popup-content[data-rel="3"]').removeClass('active');
                            $('.popup-content[data-rel="3"]').addClass('active');
                            $('html').addClass('overflow-hidden');
                        }
                    });
                });
            });
        </script>
        {{-- Show pop-up compare --}}
        <script>
            $(document).ready(function(){
                $('a[data-rel="4"]').click(function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('client.popup_compare')}}",
                        type: "POST",
                        data: {
                            p_id: id,
                            _token:_token
                        },
                        success: function(data){
                            $('#replace-data-rel-4').replaceWith(data);
                            $('.popup-content').removeClass('active');
                            $('.popup-content[data-rel="4"]').removeClass('active');
                            $('.popup-content[data-rel="4"]').addClass('active');
                            $('html').addClass('overflow-hidden');
                        }
                    });
                });
            });
        </script>




    </body>
</html>
