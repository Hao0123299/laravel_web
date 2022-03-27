<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial;
        }

        .coupon {
            border: 5px dotted #bbb;
            width: 80%;
            border-radius: 15px;
            margin: 0 auto;
            max-width: 600px;
        }

        .container {
            padding: 2px 16px;
            background-color: #f1f1f1;
        }

        .promo {
            background: #ccc;
            padding: 3px;
        }

        .expire {
            color: red;
        }
        p.code {
            text-align: center;
            font-size: 20px;
        }
        p.expire {
            text-align: center;
        }
        h2.note {
            text-align: center;
            font-size: large;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="coupon">

    <div class="container">
        <h3>Mã khuyến mãi dành cho khách hàng mua hàng tại
        cửa hàng điện thoại Kim Long <a target="_blank" href="kimlong.com/kimlongshop/">https://kimlong.com</a>
        </h3>
    </div>
    <div class="container" style="background-color:white">

        <h2 class="note"><b><i>
                    @if($coupon['coupon_condition']==1)
                        Giảm {{$coupon['coupon_number']}} %
                    @else
                        Giảm {{number_format($coupon['coupon_number'],0,',','.')}} VNĐ
                    @endif
                    cho tổng đơn hàng đặt mua online thông qua website</i></b></h2>

        <p>Quý khách đã từng mua hàng tại shop
            <a target="_blank" style="color:red" href="http://kimlong.com/kimlongshop/">kimlong.com</a>
            nếu đã có tài khoản xin vui lòng
            <a target="_blank" style="color:red"  href="http://kimlong.com/kimlongshop/dang-nhap">đăng nhập</a>
            vào tài khoản để mua hàng và nhập mã code phía dưới để được giảm giá mua hàng. Xin cảm ơn quý khách đã ủng hộ chúng tôi.</p>
    </div>
    <div class="container">
        <p class="code">
            Sử dụng mã khuyến mãi: <span class="promo">{{$coupon['coupon_code']}}</span>
            số lượng có hạn, với  {{$coupon['coupon_time']}} mã giảm giá
        </p>
        <p class="expire">
            Ngày bắt đầu :  {{$coupon['coupon_start']}} -
            Ngày hết hạn : {{$coupon['coupon_end']}}</p>
    </div>

</div>

</body>
</html>
