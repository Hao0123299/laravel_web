<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container" style="background: peru;border-radius: 12px;padding:15px;">
    <div class="col-md-12" >
        <div class="row" style="background: cadetblue;padding: 15px">
            <div class="col-md-6" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px">
                <h4 style="margin:0">CỬA HÀNG ĐIỆN THOẠI KIM LONG</h4>
            </div>

            <div class="col-md-6 logo"  style="color: #fff">
                <p>Chào quý khách
                    <strong style="color: #000;text-decoration: underline;">{{$shipping_array['customer_name']}}</strong>
                    bạn có đặt mua tại cửa hàng chúng tôi một số sản phẩm sau
                </p>
            </div>

            <div class="col-md-12">
                <h4 style="color: #000;text-transform: uppercase;">Thông tin đơn hàng</h4>
                <p>Mã đơn hàng : <strong style="text-transform: uppercase;color:#fff">{{$code['order_code']}}</strong></p>
                <p>Mã khuyến mãi áp dụng : <strong style="text-transform: uppercase;color:#fff">{{$code['coupon_code']}}</strong></p>
                <p>Phí ship hàng : <strong style="text-transform: uppercase;color:#fff">{{$shipping_array['fee']}}</strong></p>
                <p>Dịch vụ : <strong style="text-transform: uppercase;color:#fff">Đặt hàng trực tuyến</strong></p>

                <h4 style="color: #000;text-transform: uppercase;">Thông tin người nhận</h4>

                <p>Email :
                    @if($shipping_array['shipping_email']=='')
                        <span style="color:#fff">Không có địa chỉ email</span>
                    @else
                        <span style="color:#fff">{{$shipping_array['shipping_email']}}</span>
                    @endif
                </p>

                <p>Họ và tên người nhận
                    @if($shipping_array['shipping_name']=='')
                        <span style="color:#fff">Không có tên người nhận</span>
                    @else
                        <span style="color:#fff">{{$shipping_array['shipping_name']}}</span>
                    @endif
                </p>
                <p>Địa chỉ nhận hàng :
                    @if($shipping_array['shipping_address']=='')
                        <span style="color:#fff">Không có địa chỉ nhận hàng</span>
                    @else
                        <span style="color:#fff">{{$shipping_array['shipping_address']}}</span>
                    @endif
                </p>
                <p>Số điện thoại :
                    @if($shipping_array['shipping_phone']=='')
                        <span style="color:#fff">không có số điện thoại</span>
                    @else
                        <span style="color:#fff">{{$shipping_array['shipping_phone']}}</span>
                    @endif
                </p>
                <p>Ghi chú đơn hàng :
                    @if($shipping_array['shipping_notes']=='')
                        <span style="color:#fff">Không có ghi chú</span>
                    @else
                        <span style="color:#fff">{{$shipping_array['shipping_notes']}}</span>
                    @endif
                </p>
                <p>Hình thức thanh toán : <strong style="text-transform: uppercase;color:#fff">
                        @if($shipping_array['shipping_method']==0)
                            Chuyển khoản ATM
                        @else
                            Tiền mặt
                        @endif
                    </strong></p>
                <h4 style="color: #000;text-transform: uppercase;">Sản phẩm quý khách đã đặt</h4>

                <table class="table table-striped" style="border:1px">
                    <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>


                    </tr>
                    </thead>

                    <tbody>
                    @php
                        $sub_total = 0;
                        $total = 0;
                    @endphp

                    @foreach($cart_array as $cart)

                        @php
                            $sub_total = $cart['product_qty']*$cart['product_price'];
                            $total+=$sub_total;
                        @endphp

                        <tr>
                            <td>{{$cart['product_name']}}</td>
                            <td>{{number_format($cart['product_price'],0,',','.')}}vnđ</td>
                            <td>{{$cart['product_qty']}}</td>
                            <td>{{number_format($sub_total,0,',','.')}}vnđ</td>
                        </tr>
                    @endforeach

                    <tr>

                        <td colspan="4" align="right">Tổng tiền thanh toán khi chưa áp dụng mã giảm giá: {{number_format($total,0,',','.')}}vnđ</td>
                    </tr>

                    </tbody>
                </table>

            </div>

            <p style="color:#fff">Mọi chi tiết xin liên hệ website tại : <a target="_blank" href="http://hieutantutorial.com/">Shop</a>, hoặc liên hệ qua số hotline : 19005689.Xin cảm ơn quý khách đã đặt hàng shop chúng tôi.</p>

        </div>
    </div>
</div>
</body>

</html>
