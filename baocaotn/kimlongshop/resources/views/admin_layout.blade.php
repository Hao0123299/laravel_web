<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>

    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>

</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a target="_blank" href="{{url('/')}}" class="logo">
                Kim long
            </a>

        </div>
        <!--logo end-->

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{('public/backend/images/2.png')}}">
                        <span class="username">
                	<?php
                            $name = Auth::user()->admin_name;
                            if ($name) {
                                echo $name;
                            }
                            ?>

                </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        {{--<li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>--}}
                        <li><a href="{{URL::to('/logout-staff')}}"><i class="fa fa-key"></i>????ng xu???t</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="{{URL::to('/dashboard')}}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>T???ng quan</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <span>Qu???ng c??o</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-slider')}}">Th??m qu???ng c??o</a></li>
                            <li><a href="{{URL::to('/manage-slider')}}">Li???t k?? qu???ng c??o</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span>M?? gi???m gi??</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/insert-coupon')}}">Th??m m?? gi???m gi??</a></li>
                            <li><a href="{{URL::to('/list-coupon')}}">Li???t k?? m?? gi???m gi??</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Danh m???c s???n ph???m</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-category-product-parent')}}">Th??m danh m???c cha s???n ph???m</a>
                            </li>
                            <li><a href="{{URL::to('/add-category-product')}}">Th??m danh m???c con s???n ph???m</a></li>
                            <li><a href="{{URL::to('/all-category-product')}}">Li???t k?? danh m???c s???n ph???m</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Th????ng hi???u s???n ph???m</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-brand-product')}}">Th??m hi???u s???n ph???m</a></li>
                            <li><a href="{{URL::to('/all-brand-product')}}">Li???t k?? th????ng hi???u s???n ph???m</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>S???n ph???m</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-product')}}">Th??m s???n ph???m</a></li>
                            <li><a href="{{URL::to('/all-product')}}">Li???t k?? s???n ph???m</a></li>

                        </ul>
                    </li>

                    @permission('admin')

                    <li>
                        <a class="" href="{{URL::to('/contact-admin')}}">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span>Li??n h???</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            <span>????n h??ng</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/manage-order')}}">Qu???n l?? ????n h??ng</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <span>Qu???n l?? ????nh gi??</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/comment')}}">????nh gi??</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Nh??n vi??n</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/users')}}">Li???t k?? nh??n vi??n</a></li>
                            <li><a href="{{URL::to('/add-staff')}}">Th??m nh??n vi??n</a></li>
                        </ul>
                    </li>
                    @endpermission
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield('admin_content')
        </section>


    </section>
    <!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<!--capcha-->
{{--<script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}
{{-- script bi???u ?????--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
{{--format ti???n--}}
<script src="{{asset('public/backend/js/simple.money.format.js')}}"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!--datatable-->
<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
{{--format ti???n--}}
<script type="text/javascript">
    $('.product_price').simpleMoneyFormat();
    $('.product_price_cost').simpleMoneyFormat();
    $('.coupon_number').simpleMoneyFormat();

</script>
{{-- admin l???c k???t qu???--}}
<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    $(function () {
        $("#datepicker1").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    $(function () {
        $("#coupon_start").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });
    $(function () {
        $("#coupon_end").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        days30order();
        chart = new Morris.Bar({
            element: 'firstchart',
            lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
            parseTime: false,
            hideHover: 'auto',
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            labels: ['????n h??ng', 'Doanh s???', 'L???i nhu???n', 'S??? l?????ng']
        });

        $('.filter-by-time').change(function () {
            var filter_by_time = $(this).val(); /*l???y select*/
            var _token = $('input[name="_token"]').val();
            /*alert(filter_by_time);*/
            $.ajax({
                /*  /!*s??? dung ajax d??? g???i th??ng tin*!/*/
                url: '{{url('filter-by-time')}}',
                method: 'POST',
                dataType: "JSON",
                data: {
                    filter_by_time: filter_by_time,
                    _token: _token
                },
                success: function (data) {
                    chart.setData(data);
                }
            });
        });


        $('#btn-dashboard').click(function () {
            /*alert('th??n c??ng');*/
            var _token = $('input[name="_token"]').val();
            var date_from = $('#datepicker').val();
            var date_to = $('#datepicker1').val();
            /*alert(date_from);
            alert(date_to);*/
            $.ajax({
                /*  /!*s??? dung ajax d??? g???i th??ng tin*!/*/
                url: '{{url('statistics-date')}}',
                method: 'POST',
                dataType: "JSON",
                data: {
                    date_from: date_from,
                    date_to: date_to,
                    _token: _token
                },
                success: function (data) {
                    chart.setData(data);
                }
            });
        });

        /**/
        function days30order() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                /*  /!*s??? dung ajax d??? g???i th??ng tin*!/*/
                url: '{{url('statistics-oder')}}',
                method: 'POST',
                dataType: "JSON",
                data: {
                    _token: _token
                },
                success: function (data) {
                    chart.setData(data);
                }
            });
        }
    });


</script>
{{--duy???t b??nh lu???n--}}
<script type="text/javascript">
    $('.btn-comment-status').click(function () {
        /*khai b??o bi???n gi?? tr??? l???y trong class*/
        var comment_status = $(this).data('comment_status');
        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');


        if (comment_status == 0) {
            var alert = 'thay ????i';
        } else {
            var alert = 'kh??ng';
        }
        $.ajax({
            /*  /!*s??? dung ajax d??? g???i th??ng tin*!/*/
            url: '{{url('/comment-allow')}}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                comment_status: comment_status,
                comment_id: comment_id,
                comment_product_id: comment_product_id
            },
            success: function (data) {
                /*location.reload();*/ /*/!*load l???i trang*!/*/
                $('#notification').html('<span style="color: #27c24c">' + alert + '</span>');
            }
        });
    });

    $('.btn-comment-reply').click(function () {
        /*khai b??o bi???n gi?? tr??? l???y trong class*/
        var comment_id = $(this).data('comment_id');
        var comment = $('.comment_reply_' + comment_id).val();

        var comment_product_id = $(this).data('product_id');
        /*      alert(comment_reply);
              alert(comment_id);
              alert(comment_product_id*/

        $.ajax({
            /**s??? dung ajax d??? g???i th??ng tin**/
            url: '{{url('/comment-reply')}}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                comment: comment,
                comment_id: comment_id,
                comment_product_id: comment_product_id
            },
            success: function (data) {
                $('.comment_reply_' + comment_id).val('');
                $('#notification').html('<span style="color: #27c24c">Ph???n h???i th??nh c??ng</span>');

            }
        });
    });

</script>
<script type="text/javascript">
    /*$(document).ready(function ()
    {*/
    load_picture();

    function load_picture() {
        //l???y bi???n pro c???a trang add_picture
        var pro = $('.pro').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/insert-picture')}}',
            method: 'POST',
            data: {
                pro: pro,
                _token: _token
            },
            success: function (data) {
                $('#load_picture').html(data);
            }
        });
    }

    /* add image*/
    $('#add_picture').change(function () {
        var error = '';
        var a = $('#add_picture')[0].files;
        if (a.size > 10024) {
            error += '<p>???nh b???n th??m ph???i nh??? h??n 10MB</p>';
        } else if (a.length == '') {
            error += '<p>B???n ph???i th??m ???nh v??o, b???n kh??ng ???????c ????? tr???ng ???nh</p>';
        } else if (a.length >= 10) {
            error += '<p>B???n ch??? th??m t???i ??a ???????c 10  ???nh</p>';
        }
        if (error == '') {

        } else {
            $('#add_picture').val('');
            $('#error').html('<span style="color: red" class="text-danger"><h2>' + error + '</h2></span>');
            return false;
        }
    });
    /*edit name image*/
    $(document).on('blur', '.edit_name', function () {
        /*on blur tho??t kh???i h??nh ?????ng s???a*/
        var pic_id = $(this).data('pic_id');
        /*//pic_text sau khi ch???nh s???a*/
        var pic_text = $(this).text();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/update-name-picture')}}',
            method: 'POST',
            data: {
                pic_id: pic_id,
                pic_text: pic_text,
                _token: _token
            },
            success: function (data) {
                load_picture();
                $('#error').html('<span style="color: red" class="text-danger"><h2>C???p nh???t t??n h??nh ???nh c???a s???n ph???m th??nh c??ng</h2></span>');
            }
        });
    });
    /* delete_image*/
    $(document).on('click', '.delete-picture', function () {
        /*on blur tho??t kh???i h??nh ?????ng s???a*/
        var pic_id = $(this).data('pic_id');
        var _token = $('input[name="_token"]').val();
        if (confirm('B???n c?? ch???c mu???n x??a t???m h??nh n??y kh??ng ?')) {
            $.ajax({
                url: '{{url('/delete-picture')}}',
                method: 'POST',
                data: {
                    pic_id: pic_id,
                    _token: _token
                },
                success: function (data) {
                    load_picture();
                    $('#error').html('<span style="color: red" class="text-danger"><h2>X??a h??nh ???nh c???a s???n ph???m th??nh c??ng</h2></span>');
                }
            });
        }
    });
    /*     update_image*/
    $(document).on('change', '.file_image', function () {
        var pic_id = $(this).data('pic_id');
        var image = document.getElementById('file-' + pic_id).files[0]; /*   l???y h??nh ???nh theo id*/
        var form_data = new FormData();  /*t???o ra from data m???i*/
        form_data.append("file", document.getElementById('file-' + pic_id).files[0]) /*g??n h??nh ???nh chi file */
        form_data.append("pic_id", pic_id);


        $.ajax({
            url: '{{url('/update-picture')}}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                load_picture();
                $('#error').html('<span style="color: red" class="text-danger"><h2>C???p nh???t h??nh ???nh c???a s???n ph???m th??nh c??ng</h2></span>');
            }
        });

    });
    /* });*/
</script>

<script type="text/javascript">
    function ChangeToSlug() {
        var slug;
        //L???y text t??? th??? input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //?????i k?? t??? c?? d???u th??nh kh??ng d???u
        slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
        slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
        slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
        slug = slug.replace(/??|???|???|???|???/gi, 'y');
        slug = slug.replace(/??/gi, 'd');
        //X??a c??c k?? t??? ?????t bi???t
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
        slug = slug.replace(/ /gi, "-");
        //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
        //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox c?? id ???slug???
        document.getElementById('convert_slug').value = slug;
    }
</script>

<script type="text/javascript">
    $('.update_quantity_order').click(function () {
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_' + order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        // alert(order_product_id);
        // alert(order_qty);
        // alert(order_code);
        $.ajax({
            url: '{{url('/update-qty')}}',
            method: 'POST',
            data: {_token: _token, order_product_id: order_product_id, order_qty: order_qty, order_code: order_code},
            // dataType:"JSON",
            success: function (data) {
                alert('C???p nh???t s??? l?????ng th??nh c??ng');
                location.reload();
            }
        });
    });
</script>

<script type="text/javascript">
    $('.order_details').change(function () {
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();
        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function () {
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function () {
            order_product_id.push($(this).val());
        });
        j = 0;
        for (i = 0; i < order_product_id.length; i++) {
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

            if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                j = j + 1;
                if (j == 1) {
                    alert('S??? l?????ng b??n trong kho kh??ng ?????');
                }
                $('.color_qty_' + order_product_id[i]).css('background', '#000');
            }
        }
        if (j == 0) {

            $.ajax({
                url: '{{url('/update-order-qty')}}',
                method: 'POST',
                data: {
                    _token: _token,
                    order_status: order_status,
                    order_id: order_id,
                    quantity: quantity,
                    order_product_id: order_product_id
                },
                success: function (data) {
                    alert('Thay ?????i t??nh tr???ng ????n h??ng th??nh c??ng');
                    location.reload();
                }
            });
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        fetch_delivery();

        function fetch_delivery() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/select-feeship')}}',
                method: 'POST',
                data: {_token: _token},
                success: function (data) {
                    $('#load_delivery').html(data);
                }
            });
        }

        $(document).on('blur', '.fee_feeship_edit', function () {
            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url: '{{url('/update-delivery')}}',
                method: 'POST',
                data: {feeship_id: feeship_id, fee_value: fee_value, _token: _token},
                success: function (data) {
                    fetch_delivery();
                }
            });

        });
        $('.add_delivery').click(function () {
            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            // alert(city);
            // alert(province);
            // alert(wards);
            // alert(fee_ship);
            $.ajax({
                url: '{{url('/insert-delivery')}}',
                method: 'POST',
                data: {city: city, province: province, _token: _token, wards: wards, fee_ship: fee_ship},
                success: function (data) {
                    fetch_delivery();
                }
            });
        });
        $('.choose').on('change', function () {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);
            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url: '{{url('/select-delivery')}}',
                method: 'POST',
                data: {action: action, ma_id: ma_id, _token: _token},
                success: function (data) {
                    $('#' + result).html(data);
                }
            });
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

<script type="text/javascript">
    $.validate({});
</script>

<script type="text/javascript">
    CKEDITOR.replace('ckeditor', {
        filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor1', {
        filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor2', {
        filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor3', {
        filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor4', {
        filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
        filebrowserUploadMethod: 'form'
    });
</script>

<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->

<script>
    $(document).ready(function () {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function () {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function () {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function () {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth: true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity: 0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

            ],
            lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
</script>
<!-- calendar -->
<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
<script type="text/javascript">
    $(window).load(function () {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch (window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    });
</script>
<!-- //calendar -->
</body>
</html>
