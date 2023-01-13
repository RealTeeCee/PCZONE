@extends('client.layouts.master')
@section('title')
    <title>Contact Us</title>
@endsection
@section('content')
<style>



.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}
.active:after {
  content: "\2212";
}
.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.accordion {
    background-color: #ffffff3d;
    color: #fff;
    text-shadow: 0 0 7px #fff, 0 0 10px #fff, 0 0 21px #fff, 0 0 42px #bc13fe, 0 0 82px #bc13fe, 0 0 92px #bc13fe, 0 0 102px #bc13fe, 0 0 151px #bc13fe;
  cursor: pointer;
  width: 80%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 20px;
  transition: 0.4s;
  padding-left: 100px;
  padding-right: 100px;
  padding-top: 18px;
  padding-bottom: 18px;
  border-top: 1px solid blue;
  border-bottom: 1px solid blue;
}
.active, .accordion:hover {
  background-color:white ;
  color:black;
}
.accordion:after {
  content: '\002B';
  color: black;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}
.active:after {
  content: "\2212";
}
button.accordion {
    border-radius: 5px;
}
.panel {
    margin-top: 10px;
    margin-bottom: 20px;
    background-color: #fff;
    border: none;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    width: 911px;
}
body{;background-image: url("{{asset('client/img/background-product.jpg')}}");background-repeat: no-repeat;background-size:; }
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
        <h2 class="text-center h2 light" style="">Nhưng Câu Hỏi Hay Thắc Mắc</h1>
        <div class="empty-space col-sm-b15 col-md-b50"></div>

                    @foreach($faqs as $faq)
                    <button class="accordion">{{$faq->question}}</button>
                    <div class="panel">
                    <b><p style="margin:10px">Trả Lời:</p></b>
                        <textarea>{{$faq->answer}}</textarea>
                    </div>
                    <div class="empty-space col-sm-b15 col-md-b50"></div>
                    @endforeach
    </div>

    <div class="empty-space col-sm-b15 col-md-b50"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="icon-description-shortcode style-1">
                    <img class="icon" src={{ asset("client/img/icon-25.png") }} alt="">
                    <div class="title h6">Địa Chỉ</div>
                    <div class="description simple-article size-2">590, CMT8, Ho Chi Minh city</div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="icon-description-shortcode style-1">
                    <img class="icon" src={{ asset("client/img/icon-23.png") }} alt="">
                    <div class="title h6">Số Điện Thoại</div>
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
                    <div class="title h6">Email</div>
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

    <div class="empty-space col-xs-b35 col-md-b70"></div>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>
@endsection
