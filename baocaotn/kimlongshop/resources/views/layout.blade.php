<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="canonical" href="{{$url_canonical}}"/>
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href=""/>


<!--//-------Seo--------->
    <title>{{$meta_title}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('public/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contactinfo">
                        <style type="text/css">
                            .contactinfo ul li:first-child {
                                margin-left: center;
                                font-size: 20px;
                            }
                        </style>
                        <ul class="nav nav-pills">
                            <li>Hotline: 0963282942 | Cửa hàng mở cửa từ Thứ 2 - Chủ nhật | Mở cửa từ 7 Giờ 30 phút đến
                                21 Giờ
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo pull-left">
                        <img style="width: 100%; height: 60px" src="{{asset('/public/frontend/images/logo.jpg')}}"
                             alt=""/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php
                                $customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('shipping_id');
                                if($customer_id != NULL && $shipping_id == NULL){
                            ?>
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <?php
                                }elseif($customer_id != NULL && $shipping_id != NULL){
                            ?>
                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <?php
                            }else{
                            ?>
                                <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <?php
                            }
                            ?>
                            <style type="text/css">
                                span.show-cart li {
                                    margin-top: 9px;
                                }
                            </style>
                            <li class="hover-giohang">
                                <a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                    <span class="badges">
                                        <span class="show-cart"></span>
                                        <span class="giohang-hover"></span>
                                    </span>
                                </a>
                            </li>
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id != NULL){
                            ?>
                            <li>
                                <a href="{{URL::to('/order-history')}}"><i class="fa-solid fa-align-justify"></i> Lịch
                                    sử đơn hàng</a>
                            </li>
                            <?php
                            }
                            ?>
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id != NULL){
                            ?>
                            <li>
                                <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a>
                                <img width="10%"
                                     src="{{Session::get('customer_picture')}}"> {{Session::get('customer_name')}}
                            </li>
                            <?php
                            }else{
                            ?>
                            <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
{{--                    <div class="navbar-header">--}}
{{--                        <button type="button" class="navbar-toggle" data-toggle="collapse"--}}
{{--                                data-target=".navbar-collapse">--}}
{{--                            <span class="sr-only">Toggle navigation</span>--}}
{{--                            <span class="icon-bar"></span>--}}
{{--                            <span class="icon-bar"></span>--}}
{{--                            <span class="icon-bar"></span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($category as $key => $danhmuc)
                                        <li>
                                            <a href="{{URL::to('/danh-muc/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{URL::to('/gio-hang')}}">Giỏ hàng</a></li>
                            <li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="POST">
                        {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input style="width: 100%" type="text" name="keywords_submit" id="key"
                                   placeholder="Tìm kiếm sản phẩm"/>
                            <div id="search"></div> {{--trả dữ liệu--}}
                            <input type="submit" style="margin-top:0;color:#666" name="search_items"
                                   class="btn btn-primary btn-sm" value="Tìm kiếm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
{{--                    <ol class="carousel-indicators">--}}
{{--                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>--}}
{{--                        <li data-target="#slider-carousel" data-slide-to="1"></li>--}}
{{--                        <li data-target="#slider-carousel" data-slide-to="2"></li>--}}
{{--                    </ol>--}}
                    <style type="text/css">
                        img.img.img-responsive.img-slider {
                            /* height: 300px;
                             width: 100%*/
                        }
                    </style>
                    <div class="carousel-inner">
                        @php
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">

                                <div class="col-sm-12">
                                    <img alt="{{$slide->slider_desc}}"
                                         src="{{asset('public/uploads/slider/'.$slide->slider_image)}}"
                                         class="img img-responsive img-slider">

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    {{--phân cấp danh mục khi có danh mục con--}}
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            @foreach($category as $key => $cate)

                                @if($cate->category_parent == 0)
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian"
                                               href="#{{$cate->slug_category_product}}">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                {{$cate->category_name}}
                                            </a>
                                            {{--<a data-toggle="collapse" data-parent="#accordian"
                                               href="#{{$cate->slug_category_product}}">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                {{$cate->category_name}}
                                            </a>--}}
                                        </h4>
                                    </div>
                                    <div id="{{$cate->slug_category_product}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                @foreach($category as $key => $cate_parent1)
                                                    @if($cate_parent1->category_parent == $cate->category_id)
                                                        <li>
                                                            <a href="{{URL::to('/danh-muc/'.$cate_parent1->slug_category_product)}}">{{$cate_parent1->category_name}} </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    </div>
                {{--<div class="brands-name">
                    --}}{{--                            không phân câp danh mục--}}{{--
                    <ul class="nav nav-pills nav-stacked">
                        @foreach($category as $key => $cate)
                            <li><a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}"> <span
                                        class="pull-right"></span>{{$cate->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>--}}
                <!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Thương hiệu sản phẩm</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($brand as $key => $brand)
                                    <li><a href="{{URL::to('/thuong-hieu/'.$brand->brand_slug)}}"> <span
                                                class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Sản phẩm yêu thích</h2>
                        <div class="brands-name">
                            <div id="like_product" class="row"></div>
                        </div>
                    </div><!--/like_products-->


                </div>
            </div>
            <div class="col-sm-9 padding-right">

                @yield('content')

            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-7">
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        {{-- <img src="images/home/map.png" alt=""/>
                         <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>Dich vụ </h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Hướng dân mua hàng</a></li>
                            <li><a href="#">Hướng dẫn thanh toán</a></li>
                            <li><a href="#">Đổi trả sản phẩm</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>Tổng đài hỗ trợ (Miễn phí gọi)</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <span>Gọi mua <a href="#">1800.1061</a> (7:30 - 21:00)</span>
                            <br>
                            <span>Kỹ thuật <a href="#">1800.1062</a> (7:30 - 21:00)</span>
                            <br>
                            <span>Khiếu nại <a href="#">1800.1063</a> (8:30 - 21:00)</span>
                            <br>
                            <span>Bảo hành <a href="#">1800.1064</a> (8:30 - 21:00)</span>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2021 Kimlong.com Inc. All rights reserved.</p>
                <p class="pull-right">Designed by Themeum <span><a target="_blank"
                                                                   href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>
<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
<script src="{{asset('public/frontend/js/prettify.js')}}"></script>


<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
{{--chat facebook--}}
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "102817114439300");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v13.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

{{--sắp xếp theo thứ tự--}}
<script type="text/javascript">
    $(document).ready(function(){

        $('#sort').on('change',function(){

            var url = $(this).val();
            // alert(url);
            if (url) {
                window.location = url;
            }
            return false;
        });

    });
</script>
{{--auto Tìm kiếm --}}
<script type="text/javascript">
    $('#key').keyup(function () {
        var query = $(this).val();
        if (query != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/timkiem')}}",
                method: "POST",
                data: {query: query, _token: _token},
                success: function (data) {
                    $('#search').fadeIn(); /*hiển thị từ khóa liên quan*/
                    $('#search').html(data);/*trả dữ liệu về*/
                }
            });
        } else {
            $('#search').fadeOut();
        }
    });
    $(document).on('click', '.search', function () {
        $('#key').val($(this).text());
        $('#search').fadeOut();
    });
</script>
{{--So sanh sản phẩm--}}
<script type="text/javascript">
    function delete_compare(id) {

        if (localStorage.getItem('compare') != null) {

            var data = JSON.parse(localStorage.getItem('compare'));

            var index = data.findIndex(item => item.id === id); /*tìm vị trí trong mảng*/

            data.splice(index, 1); /*xóa id và bỏ sản phẩm đó */

            localStorage.setItem('compare', JSON.stringify(data));

            document.getElementById("row_compare" + id).remove();

        }
    }

    view_compare();

    function view_compare() {
        if (localStorage.getItem('compare') != null) {
            var data = JSON.parse(localStorage.getItem('compare'));
            for (i = 0; i < data.length; i++) {
                var name = data[i].name;
                var img = data[i].img;
                var url = data[i].url;
                var id = data[i].id;

                $('#row_compare').find('tbody').append(`
                                                         <tr id="row_compare` + id + `">
                                                            <td>` + name + `</td>
                                                            <td><img width="100px" src="` + img + `"></td>
                                                            <td></td>
                                                            <td><a href="` + url + `">Xem sản phẩm</a></td>
                                                            <td><a style="cursor:pointer" onclick="delete_compare(` + id + `)">Xóa</a></td>
                                                          </tr>


                `);
            }

        }

    }


    function compare_product(product_id) {
        document.getElementById('title-compare').innerText = 'Chỉ cho phép so sánh tối đa 4 sản phẩm';
        var id = product_id;
        var name = document.getElementById('like_product_name' + id).value;
        /*var price = document.getElementById('like_product_price'+id).value;*/
        var img = document.getElementById('like_product_img' + id).src;
        var url = document.getElementById('like_product_url' + id).href;
        /* alert(product_id);
         alert(name);
        /!* alert(price);*!/
         alert(img);
         alert(url);*/

        var newItem = {
            'url': url,
            'id': id,
            'name': name,
            'img': img
            // 'content':content
        }

        if (localStorage.getItem('compare') == null) {
            localStorage.setItem('compare', '[]');
        }

        var old_data = JSON.parse(localStorage.getItem('compare'));

        var matches = $.grep(old_data, function (obj) {
            return obj.id == id;
        })

        if (matches.length) {

        } else {
            if (old_data.length <= 4) {

                old_data.push(newItem);

                $('#row_compare').find('tbody').append(`
                                                         <tr id="row_compare` + id + `">
                                                            <td>` + newItem.name + `</td>

                                                            <td><img width="100px" src="` + newItem.img + `"></td>
                                                            <td></td>
                                                            <td><a href="` + url + `">Xem sản phẩm</a></td>
                                                            <td><a style="cursor:pointer" onclick="delete_compare(` + id + `)">Xóa</a></td>
                                                          </tr>


                `);
            }


        }

        localStorage.setItem('compare', JSON.stringify(old_data));
        $('#compare').modal();


    }
</script>
{{--Hình ảnh chi tiết sản phẩm--}}
<script type="text/javascript">
    $(document).ready(function () {
        $('#imageGallery').lightSlider({
            gallery: true, /*chạy nhiều hình*/
            item: 1,
            loop: true, /*vòng lặp*/
            thumbItem: 3,
            slideMargin: 0,
            enableDrag: false,
            currentPagerPosition: 'left',
            onSliderLoad: function (el) {
                el.lightGallery({
                    selector: '#imageGallery.lslide'
                });
            }
        });
    });
</script>
{{--ĐÁnh giá sao--}}
<script type="text/javascript">
    function remove_background(product_id) {
        for (var sao = 1; sao <= 5; sao++) {
            $('#' + product_id + '-' + sao).css('color', '#ccc');
        }
    }

    //hover chuột đánh giá sao
    $(document).on('mouseenter', '.rate', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        /*alert(index);
       alert(product_id);*/
        remove_background(product_id);
        for (var sao = 1; sao <= index; sao++) {
            $('#' + product_id + '-' + sao).css('color', '#ffcc00');
        }
    });
    //nhả chuột ko đánh giá
    $(document).on('mouseleave', '.rate', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var rate = $(this).data("rate");
        remove_background(product_id);
        //alert(rating);
        for (var sao = 1; sao <= rate; sao++) {
            $('#' + product_id + '-' + sao).css('color', '#ffcc00');
        }
    });

    //click đánh giá sao
    $(document).on('click', '.rate', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{url('insert-rate')}}",
            method: "POST",
            data: {
                index: index,
                product_id: product_id,
                _token: _token
            },
            success: function (data) {
                if (data == 'done') {
                    alert("Bạn đã đánh giá " + index + " trên 5");
                } else {
                    alert("Lỗi đánh giá");
                }
            }
        });
    });
</script>
{{--Bình luận--}}
<script type="text/javascript">
    $(document).ready(function () {
        comment_load();

        function comment_load() {
            var product_id = $('.comment_product_id').val(); /*lấy id sản phẩm*/
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/comment-load')}}',
                method: 'POST',
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function (data) {
                    $('#show_comment').html(data);
                }
            });
        }
    })
    $('.button-comment').click(function () {
        var product_id = $('.comment_product_id').val(); /*lấy id sản phẩm*/
        var comment_name = $('.comment_name').val();
        var comment_comment = $('.comment_comment').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/comment')}}',
            method: 'POST',
            data: {
                product_id: product_id,
                comment_name: comment_name,
                comment_comment: comment_comment,
                _token: _token
            },
            success: function (data) {
                $('#comment_notification').html('<p class="text text-success">Đánh giá sản phẩm thành công</p>');
                comment_load();
                $('#comment_notification').fadeOut(3000); /*ẩn thông báo sau 3 giây*/
                /*sau khi thêm thành công->rỗng*/
                $('.comment_name').val('');
                $('.comment_comment').val('');

            }
        });
    })
</script>
{{--Xác nhận đơn hàng--}}
<script type="text/javascript">

    $(document).ready(function () {
        $('.send_order').click(function () {
            swal({
                    title: "Xác nhận đơn hàng",
                    text: "Đơn hàng sẽ không được hoàn trả khi đặt, quý khách có muốn đặt không ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Cảm ơn, quý khách đã mua hàng",

                    cancelButtonText: "Đóng,chưa mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data: {
                                shipping_email: shipping_email,
                                shipping_name: shipping_name,
                                shipping_address: shipping_address,
                                shipping_phone: shipping_phone,
                                shipping_notes: shipping_notes,
                                _token: _token,
                                order_fee: order_fee,
                                order_coupon: order_coupon,
                                shipping_method: shipping_method
                            },
                            success: function () {
                                swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                            }
                        });

                        window.setTimeout(function () {
                            window.location.href = "{{url('/order-history')}}";
                        }, 3000);

                    } else {
                        swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                    }

                });


        });
    });


</script>
{{--Thêm sản phẩm vào giỏ hàng--}}
<script type="text/javascript">
    $(document).ready(function () {
        show_infor_cart();
        hover_infor_cart();
        function hover_infor_cart() {
            $.ajax({
                url: '{{url('/hover-infor-cart')}}',
                method: 'GET',
                success: function (data) {
                    $('.giohang-hover').html(data);
                }
            });
        }
        //thông tin giỏ hàng
        function show_infor_cart() {
            $.ajax({
                url: '{{url('/show-infor-cart')}}',
                method: 'GET',
                success: function (data) {
                    $('.show-cart').html(data);
                }
            });
        }
        $('.add-to-cart').click(function () {

            var id = $(this).data('id_product');
            // alert(id);
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
            } else {
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token,
                        cart_product_quantity: cart_product_quantity
                    },
                    success: function () {

                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function () {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                        show_infor_cart();
                        hover_infor_cart();


                    }

                });
            }


        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.choose').on('change', function () {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url: '{{url('/select-delivery-home')}}',
                method: 'POST',
                data: {action: action, ma_id: ma_id, _token: _token},
                success: function (data) {
                    $('#' + result).html(data);
                }
            });
        });
    });

</script>
{{--Tính phí vận chuyển--}}
<script type="text/javascript">
    $(document).ready(function () {
        $('.calculate_delivery').click(function () {
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if (matp == '' && maqh == '' && xaid == '') {
                alert('Làm ơn chọn để tính phí vận chuyển');
            } else {
                $.ajax({
                    url: '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data: {matp: matp, maqh: maqh, xaid: xaid, _token: _token},
                    success: function () {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
{{--Hủy đơn hàng--}}
<script type="text/javascript">
    function send_cancel_order(order_code) {
        var order_code = order_code;
        var cacel_order = $('.cacel_order').val();

        var _token = $('input[name="_token"]').val();
        /* alert(order_code);
         alert(cacel_order);
     ;*/
        $.ajax({
            url: '{{url('/cancel-order')}}',
            method: 'POST',

            data:
                {
                    order_code: order_code,
                    cacel_order: cacel_order,

                    _token: _token
                },
            success: function (data) {
                alert('Hủy đơn hàng thành công');
                location.reload();
            }

        });

    }
</script>
{{--sản phẩm yêu thích--}}
<script type="text/javascript">
    function view_like() {
        if (localStorage.getItem('data') != null) {
            var data = JSON.parse(localStorage.getItem('data'));
            data.reverse(); /*sản phẩm mới nắm ở đầu*/
            document.getElementById('like_product').style.overflow = 'scroll';
            document.getElementById('like_product').style.height = '300px';
            for (i = 0; i < data.length; i++) {
                var name = data[i].name;
                var img = data[i].img;
                var url = data[i].url;
                $('#like_product').append(
                    '<div class="row" style="margin:10px 0">' +
                    '   <div class="col-md-4">' +
                    '   <img width="100%" src="' + img + '">' +
                    '</div>' +
                    '<div class="col-md-8 info_wishlist">' +
                    '<p>' + name + '</p>' +
                    '<a href="' + url + '">Đặt hàng</a></div>');
            }
        }
    }

    view_like();

    function product_like(clicked_id) {
        var id = clicked_id; /*lấy id button*/
        var name = document.getElementById('like_product_name' + id).value; /*lấy bởi id, không +id sẽ lấy mặc định sản phẩm đầu */
        var img = document.getElementById('like_product_img' + id).src;
        var url = document.getElementById('like_product_url' + id).href;
        /*alert(id);
        alert(name);
        alert(img);
        alert(url);*/

        var newItem = {
            'id': id,
            'name': name,
            'img': img,
            'url': url
        }
        if (localStorage.getItem('data') == null) {
            /*/*tạo mới*/
            localStorage.setItem('data', '[]');
        }
        var old_data = JSON.parse(localStorage.getItem('data')); /*/* localStorage trả về JSON*/
        var match = $.grep(old_data, function (obj) {
            /*kiểm tra trung sản phẩm*/
            return obj.id == id;
        })
        if (match.length) {
            alert('Sản phẩm bạn thêm vào yêu thích');
        } else {
            old_data.push(newItem);
            $('#like_product').append('' +
                '<div class="row" style="margin:10px 0">' +
                '<div class="col-md-4">' +
                '<img width="100%" src="' + newItem.image + '">' +
                '</div>' +
                '<div class="col-md-8 info_wishlist">' +
                '<p>' + newItem.name + '</p>' +
                '</p>' +
                '<a href="' + newItem.url + '">Đặt hàng</a></div>');
        }

        localStorage.setItem('data', JSON.stringify(old_data));
    }
</script>
</body>
</html>
