<style>
    .table thead tr th {
        vertical-align: middle;
    }

    .a img {
        width: 200px;
        height: 200px;
    }
</style>

<div class="popup-wrapper">
    <div class="bg-layer"></div>
    <div class="popup-content" id="replace-data-rel-5" data-rel="5">
        <div class="layer-close"></div>
        <div class="popup-container size-1">
            <div class="popup-align">
                <h3 class="h3 text-center">Log in</h3>
                <div class="empty-space col-xs-b30"></div>
                <input class="simple-input" type="text" value="" placeholder="Your email" />
                <div class="empty-space col-xs-b10 col-sm-b20"></div>
                <input class="simple-input" type="password" value="" placeholder="Enter password" />
                <div class="empty-space col-xs-b10 col-sm-b20"></div>
                <div class="row">
                    <div class="col-sm-6 col-xs-b10 col-sm-b0">
                        <div class="empty-space col-sm-b5"></div>
                        <a class="simple-link">Forgot password?</a>
                        <div class="empty-space col-xs-b5"></div>
                        <a class="simple-link">register now</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="button size-2 style-3" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png') }}"
                                        alt="" /></span>
                                <span class="text">submit</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="popup-or">
                    <span>or</span>
                </div>
                <div class="row m5">
                    <div class="col-sm-6 col-xs-b10 col-sm-b0">
                        <a class="button facebook-button size-2 style-4 block" href="{{ URL::to('login-facebook') }}">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png') }}"
                                        alt="" /></span>
                                <span class="text">facebook</span>
                            </span>
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <a class="button google-button size-2 style-4 block" href="{{ URL::to('login-google') }}">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png') }}"
                                        alt="" /></span>
                                <span class="text">google+</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="button-close"></div>
        </div>
    </div>

    {{-- <div class="popup-content" data-rel="2">
        <div class="layer-close"></div>
        <div class="popup-container size-2">
            <div class="popup-align">
                <div class="row">
                    <div class="col-12">
                        <div class="col-sm-4">
                            <select class="btn" name="category" id="category" data-depend="">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->ma_PL }}" data-value="">{{ $category->ten_PL }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="btn">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->ma_PL }}" data-value="">{{ $category->ten_PL }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="btn">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->ma_PL }}" data-value="">{{ $category->ten_PL }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="header-empty-space" style="height: 250px"></div>
                        <table class="table table-tripped" style="text-align-last: center;font:message-box">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Component</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Component</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="empty-space col-xs-b30"></div>
                <input class="simple-input" type="text" value="" placeholder="Your email" />
                <div class="empty-space col-xs-b10 col-sm-b20"></div>
                <input class="simple-input" type="password" value="" placeholder="Enter password" />
                <div class="empty-space col-xs-b10 col-sm-b20"></div>
                <div class="row">

                    <div class="empty-space col-sm-b5"></div>
                    <a class="simple-link">Forgot password?</a>
                    <div class="empty-space col-xs-b5"></div>
                    <a class="simple-link">register now</a>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="button size-2 style-3" href="#">
                        <span class="button-wrapper">
                            <span class="icon"><img src="{{ asset('client/img/icon-4.png') }}"
                                    alt="" /></span>
                            <span class="text">submit</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="popup-or">
                <span>or</span>
            </div>
            <div class="row m5">
                <div class="col-sm-6 col-xs-b10 col-sm-b0">
                    <a class="button facebook-button size-2 style-4 block" href="{{ URL::to('login-facebook') }}">
                        <span class="button-wrapper">
                            <span class="icon"><img src="{{ asset('client/img/icon-4.png') }}"
                                    alt="" /></span>
                            <span class="text">facebook</span>
                        </span>
                    </a>
                </div>

                <div class="col-sm-6">
                    <a class="button google-button size-2 style-4 block" href="{{ URL::to('login-google') }}">
                        <span class="button-wrapper">
                            <span class="icon"><img src="{{ asset('client/img/icon-4.png') }}"
                                    alt="" /></span>
                            <span class="text">google+</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="button-close"></div>
        </div>

    </div> --}}
    <div id="replace-data-rel-3" class="popup-content" data-rel="3"></div>
    <div id="replace-data-rel-4" class="popup-content" data-rel="4"></div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#password, #confirm_password').on('keyup', function() {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });
</script>
<script></script>

