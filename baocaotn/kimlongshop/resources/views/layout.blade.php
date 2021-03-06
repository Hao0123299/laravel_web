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
                            <li>Hotline: 0963282942 | C???a h??ng m??? c???a t??? Th??? 2 - Ch??? nh???t | M??? c???a t??? 7 Gi??? 30 ph??t ?????n
                                21 Gi???
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
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh to??n</a></li>
                            <?php
                                }elseif($customer_id != NULL && $shipping_id != NULL){
                            ?>
                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh to??n</a></li>
                            <?php
                            }else{
                            ?>
                                <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-crosshairs"></i> Thanh to??n</a></li>
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
                                    Gi??? h??ng
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
                                <a href="{{URL::to('/order-history')}}"><i class="fa-solid fa-align-justify"></i> L???ch
                                    s??? ????n h??ng</a>
                            </li>
                            <?php
                            }
                            ?>
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id != NULL){
                            ?>
                            <li>
                                <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> ????ng xu???t</a>
                                <img width="10%"
                                     src="{{Session::get('customer_picture')}}"> {{Session::get('customer_name')}}
                            </li>
                            <?php
                            }else{
                            ?>
                            <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i> ????ng nh???p</a></li>
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
                            <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang ch???</a></li>
                            <li class="dropdown"><a href="#">S???n ph???m<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($category as $key => $danhmuc)
                                        <li>
                                            <a href="{{URL::to('/danh-muc/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{URL::to('/gio-hang')}}">Gi??? h??ng</a></li>
                            <li><a href="{{URL::to('/lien-he')}}">Li??n h???</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="POST">
                        {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input style="width: 100%" type="text" name="keywords_submit" id="key"
                                   placeholder="T??m ki???m s???n ph???m"/>
                            <div id="search"></div> {{--tr??? d??? li???u--}}
                            <input type="submit" style="margin-top:0;color:#666" name="search_items"
                                   class="btn btn-primary btn-sm" value="T??m ki???m">
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
                    <h2>Danh m???c s???n ph???m</h2>
                    {{--ph??n c???p danh m???c khi c?? danh m???c con--}}
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
                    --}}{{--                            kh??ng ph??n c??p danh m???c--}}{{--
                    <ul class="nav nav-pills nav-stacked">
                        @foreach($category as $key => $cate)
                            <li><a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}"> <span
                                        class="pull-right"></span>{{$cate->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>--}}
                <!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Th????ng hi???u s???n ph???m</h2>
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
                        <h2>S???n ph???m y??u th??ch</h2>
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
                        <h2>Dich v??? </h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">H?????ng d??n mua h??ng</a></li>
                            <li><a href="#">H?????ng d???n thanh to??n</a></li>
                            <li><a href="#">?????i tr??? s???n ph???m</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>T???ng ????i h??? tr??? (Mi???n ph?? g???i)</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <span>G???i mua <a href="#">1800.1061</a> (7:30 - 21:00)</span>
                            <br>
                            <span>K??? thu???t <a href="#">1800.1062</a> (7:30 - 21:00)</span>
                            <br>
                            <span>Khi???u n???i <a href="#">1800.1063</a> (8:30 - 21:00)</span>
                            <br>
                            <span>B???o h??nh <a href="#">1800.1064</a> (8:30 - 21:00)</span>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright ?? 2021 Kimlong.com Inc. All rights reserved.</p>
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

{{--s???p x???p theo th??? t???--}}
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
{{--auto T??m ki???m --}}
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
                    $('#search').fadeIn(); /*hi???n th??? t??? kh??a li??n quan*/
                    $('#search').html(data);/*tr??? d??? li???u v???*/
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
{{--So sanh s???n ph???m--}}
<script type="text/javascript">
    function delete_compare(id) {

        if (localStorage.getItem('compare') != null) {

            var data = JSON.parse(localStorage.getItem('compare'));

            var index = data.findIndex(item => item.id === id); /*t??m v??? tr?? trong m???ng*/

            data.splice(index, 1); /*x??a id v?? b??? s???n ph???m ???? */

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
                                                            <td><a href="` + url + `">Xem s???n ph???m</a></td>
                                                            <td><a style="cursor:pointer" onclick="delete_compare(` + id + `)">X??a</a></td>
                                                          </tr>


                `);
            }

        }

    }


    function compare_product(product_id) {
        document.getElementById('title-compare').innerText = 'Ch??? cho ph??p so s??nh t???i ??a 4 s???n ph???m';
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
                                                            <td><a href="` + url + `">Xem s???n ph???m</a></td>
                                                            <td><a style="cursor:pointer" onclick="delete_compare(` + id + `)">X??a</a></td>
                                                          </tr>


                `);
            }


        }

        localStorage.setItem('compare', JSON.stringify(old_data));
        $('#compare').modal();


    }
</script>
{{--H??nh ???nh chi ti???t s???n ph???m--}}
<script type="text/javascript">
    $(document).ready(function () {
        $('#imageGallery').lightSlider({
            gallery: true, /*ch???y nhi???u h??nh*/
            item: 1,
            loop: true, /*v??ng l???p*/
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
{{--????nh gi?? sao--}}
<script type="text/javascript">
    function remove_background(product_id) {
        for (var sao = 1; sao <= 5; sao++) {
            $('#' + product_id + '-' + sao).css('color', '#ccc');
        }
    }

    //hover chu???t ????nh gi?? sao
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
    //nh??? chu???t ko ????nh gi??
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

    //click ????nh gi?? sao
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
                    alert("B???n ???? ????nh gi?? " + index + " tr??n 5");
                } else {
                    alert("L???i ????nh gi??");
                }
            }
        });
    });
</script>
{{--B??nh lu???n--}}
<script type="text/javascript">
    $(document).ready(function () {
        comment_load();

        function comment_load() {
            var product_id = $('.comment_product_id').val(); /*l???y id s???n ph???m*/
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
        var product_id = $('.comment_product_id').val(); /*l???y id s???n ph???m*/
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
                $('#comment_notification').html('<p class="text text-success">????nh gi?? s???n ph???m th??nh c??ng</p>');
                comment_load();
                $('#comment_notification').fadeOut(3000); /*???n th??ng b??o sau 3 gi??y*/
                /*sau khi th??m th??nh c??ng->r???ng*/
                $('.comment_name').val('');
                $('.comment_comment').val('');

            }
        });
    })
</script>
{{--X??c nh???n ????n h??ng--}}
<script type="text/javascript">

    $(document).ready(function () {
        $('.send_order').click(function () {
            swal({
                    title: "X??c nh???n ????n h??ng",
                    text: "????n h??ng s??? kh??ng ???????c ho??n tr??? khi ?????t, qu?? kh??ch c?? mu???n ?????t kh??ng ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "C???m ??n, qu?? kh??ch ???? mua h??ng",

                    cancelButtonText: "????ng,ch??a mua",
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
                                swal("????n h??ng", "????n h??ng c???a b???n ???? ???????c g???i th??nh c??ng", "success");
                            }
                        });

                        window.setTimeout(function () {
                            window.location.href = "{{url('/order-history')}}";
                        }, 3000);

                    } else {
                        swal("????ng", "????n h??ng ch??a ???????c g???i, l??m ??n ho??n t???t ????n h??ng", "error");

                    }

                });


        });
    });


</script>
{{--Th??m s???n ph???m v??o gi??? h??ng--}}
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
        //th??ng tin gi??? h??ng
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
                alert('L??m ??n ?????t nh??? h??n ' + cart_product_quantity);
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
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Xem ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
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
{{--T??nh ph?? v???n chuy???n--}}
<script type="text/javascript">
    $(document).ready(function () {
        $('.calculate_delivery').click(function () {
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if (matp == '' && maqh == '' && xaid == '') {
                alert('L??m ??n ch???n ????? t??nh ph?? v???n chuy???n');
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
{{--H???y ????n h??ng--}}
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
                alert('H???y ????n h??ng th??nh c??ng');
                location.reload();
            }

        });

    }
</script>
{{--s???n ph???m y??u th??ch--}}
<script type="text/javascript">
    function view_like() {
        if (localStorage.getItem('data') != null) {
            var data = JSON.parse(localStorage.getItem('data'));
            data.reverse(); /*s???n ph???m m???i n???m ??? ?????u*/
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
                    '<a href="' + url + '">?????t h??ng</a></div>');
            }
        }
    }

    view_like();

    function product_like(clicked_id) {
        var id = clicked_id; /*l???y id button*/
        var name = document.getElementById('like_product_name' + id).value; /*l???y b???i id, kh??ng +id s??? l???y m???c ?????nh s???n ph???m ?????u */
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
            /*/*t???o m???i*/
            localStorage.setItem('data', '[]');
        }
        var old_data = JSON.parse(localStorage.getItem('data')); /*/* localStorage tr??? v??? JSON*/
        var match = $.grep(old_data, function (obj) {
            /*ki???m tra trung s???n ph???m*/
            return obj.id == id;
        })
        if (match.length) {
            alert('S???n ph???m b???n th??m v??o y??u th??ch');
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
                '<a href="' + newItem.url + '">?????t h??ng</a></div>');
        }

        localStorage.setItem('data', JSON.stringify(old_data));
    }
</script>
</body>
</html>
