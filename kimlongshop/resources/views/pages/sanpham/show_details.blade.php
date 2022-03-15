@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->

						<div class="col-sm-5">
                            <ul id="imageGallery">
                                @foreach($picture as $key=> $pic)
                                <li data-thumb="{{asset('public/uploads/picture/'.$pic->picture_name)}}" data-src="{{asset('public/uploads/picture/'.$pic->picture_name)}}">
                                    <img width="100%" src="{{asset('public/uploads/picture/'.$pic->picture_name)}}" alt="{{$pic->picture_name}}"  />
                                </li>
                                @endforeach



                            </ul>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />

								<form action="{{URL::to('/save-cart')}}" method="POST">
									@csrf
									<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">

								<span>
									<span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>

									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
								</span>
								<input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
								</form>

								<p><b>Tình trạng:</b> Còn hàng</p>
<!--								<p><b>Điều kiện:</b> Mơi 100%</p>-->
<!--								<p><b>Số lượng kho còn:</b> {{$value->product_quantity}}</p>-->
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh mục:</b> {{$value->category_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
								<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!!$value->product_desc!!}</p>
							</div>
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$value->product_content!!}</p>
							</div>

							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
                                    <p><b>Vote</b></p>
                                    <uL class="list-inline rating" title="Average Rating">
                                        @for($sao = 1; $sao <= 5; $sao++)
                                            @php
                                                if($sao<=$rate)
                                                {
                                                    $color = 'color: #ffcc00;';
                                                }
                                                else
                                                    {
                                                         $color = 'color: #ccc;';
                                                    }
                                            @endphp
                                            <li title="Vote sao"
                                                id="{{$value->product_id}} - {{$sao}}"
                                                data-index="{{$sao}}" {{--số sao--}}
                                                data-product_id="{{$value->product_id}}"
                                                data-rating="{{$rate}}" {{--số sao trung bình--}}
                                                class="rate"
                                                style="cursor: pointer;
                                                {{$color}} font-size: 30px;">&#9733;
                                            </li>
                                        @endfor
                                    </uL>
									<p><b>Đánh giá sản phẩm</b></p>

									<form action="#">
										<span>
											<input class="comment_name" style="margin-left: 0; width: 100%" type="text" placeholder="Họ và tên của bạn"/>
										</span>
										<textarea name="comment_comment" class="comment_comment" placeholder="Bạn cảm thấy sản phẩm như thế nào"></textarea>
                                        <div id="comment_notification"></div>
                                        <b>Vote sao: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right button-comment" >
											Viết đánh giá
										</button>

									</form>
                                    <br>
                                    <style type="text/css">
                                        .binh_luan{
                                            background: white;
                                            border-radius: 5px;
                                            border: 2px solid #6a6a6a;
                                        }
                                    </style>
                                    <form>
                                        @csrf
                                        <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
                                        <div id="show_comment"></div>
                                    </form>

								</div>
							</div>

						</div>
					</div><!--/category-tab-->
	@endforeach
					{{--<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							@foreach($relate as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
		                                        <div class="productinfo text-center product-related">
		                                            <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
		                                            <h2>{{number_format($lienquan->product_price,0,',','.').' '.'VNĐ'}}</h2>
		                                            <p>{{$lienquan->product_name}}</p>

		                                        </div>

                                			</div>
										</div>
									</div>
							@endforeach


								</div>

							</div>

						</div>
					</div>--}}<!--/recommended_items-->


<style type="text/css">
    .lSSlideOuter .lSPager.lSGallery img {
        display: block;
        height: 100px;
        max-width: 100%;
    }
</style>


@endsection



