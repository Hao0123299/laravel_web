@extends('layout')
@section('content')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			  @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif
			<div class="table-responsive cart_info">
				<form action="{{url('/update-cart')}}" method="POST">
					@csrf
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							{{--<td class="description">Số lượng tồn</td>--}}
							<td class="price">Giá sản phẩm</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        @php
                            $cart = Session::get('cart');
                        @endphp
						@if($cart== true)
						@php
								$total = 0;

						@endphp
						@foreach($cart as $key =>$cart)

							@php
                                    $subtotal = $cart['product_price']*$cart['product_qty'];
                                    $total+=$subtotal;
							@endphp
						<tr>
							<td class="cart_product">
								<img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
							</td>

							<td class="cart_description">
								<h4><a href=""></a></h4>
								<p>{{$cart['product_name']}}</p>
							</td>

							<td class="cart_price">
                                <p>{{number_format($subtotal,0,',','.')}} VNĐ</p>
							</td>

							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >
								</div>
							</td>

							<td class="cart_total">
								<p class="cart_total_price">
									{{number_format($subtotal,0,',','.')}} VNĐ
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						@endforeach
						<tr>
							<td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm"></td>
							<td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>
							<td>
								@if(Session::get('coupon'))
	                          	<a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
								@endif
							</td>
							<td>
								@if(Session::get('customer_id'))
	                          	<a class="btn btn-default check_out" href="{{url('/checkout')}}">Đặt hàng</a>
	                          	@else
	                          	<a class="btn btn-default check_out" href="{{url('/dang-nhap')}}">Đặt hàng</a>
								@endif
							</td>
							<td colspan="2">
							{{--<li>Tổng tiền :<span>{{number_format($total,0,',','.')}} VNĐ</span></li>--}}
							{{--@if(Session::get('coupon'))
							--}}{{--<li>--}}{{--

									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_condition']==1)
											--}}{{--Mã giảm : {{$cou['coupon_number']}} %--}}{{--
											<p>
												@php
												$total_coupon = ($total*$cou['coupon_number'])/100;
												echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').' VNĐ</li></p>';
												@endphp
											</p>
											<p><li>Tổng đã giảm :{{number_format($total-$total_coupon,0,',','.')}} VNĐ</li></p>
										@elseif($cou['coupon_condition']==2)
											--}}{{--Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} VNĐ--}}{{--
											<p>
												@php
												$total_coupon = $total - $cou['coupon_number'];

												@endphp
											</p>
											<p><li>Tổng đã giảm :{{number_format($total_coupon,0,',','.')}} VNĐ</li></p>
										@endif
									@endforeach



							--}}{{--</li>--}}{{--
							@endif--}}

						</td>
						</tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Tổng tiền</td>
                                        <td>{{number_format($total,0,',','.')}} VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>Mã giảm giá</td>
                                        @if(Session::get('coupon'))
                                            @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['coupon_condition']==1)
                                                    <td> {{$cou['coupon_number']}} </td>
                                                    <p>
                                                        @php
                                                            $total_coupon = ($total*$cou['coupon_number'])/100;
                                                            echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').' VNĐ</li></p>';
                                                        @endphp
                                                    </p>
                                                    {{--<p><li>Tổng đã giảm :{{number_format($total-$total_coupon,0,',','.')}} VNĐ</li></p>--}}
                                                @elseif($cou['coupon_condition']==2)
                                                    <td> {{number_format($cou['coupon_number'],0,',','.')}} VNĐ </td>
                                                    <p>
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                        @endphp
                                                    </p>
                                                    {{--<p><li>Tổng đã giảm :{{number_format($total_coupon,0,',','.')}} VNĐ</li></p>--}}
                                                @endif
                                            @endforeach
                                        @endif
                                        @if(!Session::get('coupon'))
                                            <td> Không có mã giảm giá </td>
                                            <p>
                                                @php
                                                    $total_coupon = $total;

                                                @endphp
                                            </p>
                                        @endif
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Phí vận chuyển</td>
                                        <td>Miễn phí</td>
                                    </tr>
                                    <tr>
                                        <td>Tổng tiền phải thah toán</td>
                                        <td><span>{{number_format($total_coupon,0,',','.')}} VNĐ</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
						@else
						<tr>
							<td colspan="5"><center>
							@php
							echo 'Vui lòng thêm sản phẩm vào giỏ hàng';
							@endphp
							</center></td>
						</tr>
						@endif
					</tbody>



				</form>
					@if(Session::get('cart'))
					<tr><td>

							<form method="POST" action="{{url('/check-coupon')}}">
								@csrf
									<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
	                          		<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">

                          		</form>
                          	</td>
					</tr>
					@endif

				</table>

			</div>
		</div>
	</section> <!--/#cart_items-->



@endsection
