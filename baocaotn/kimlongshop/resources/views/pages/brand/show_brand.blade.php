@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->

        @foreach($brand_name as $key => $name)

            <h2 class="title text-center">{{$name->brand_name}}</h2>

        @endforeach
        <div class="row">
            <div class="col-md-4">

                <label for="amount">Sắp xếp theo</label>

                <form>
                    @csrf

                    <select name="sort" id="sort" class="form-control">
                        <option value="{{Request::url()}}?sort_by=none">Lọc theo</option> {{--request::url lấy đường dân hiện tại--}}
                        <option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
                        <option value="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần</option>
                        <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo tên A đến Z</option>
                        <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo tên Z đến A</option>
                    </select>

                </form>

            </div>
        </div>
        @foreach($brand_by_id as $key => $product)
            <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">

                        <div class="single-products">
                            <div class="productinfo text-center">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$product->product_id}}"
                                           class="cart_product_id_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_name}}"
                                           id="like_product_name{{$product->product_id}}"
                                           class="cart_product_name_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_image}}"
                                           class="cart_product_image_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_price}}"
                                           class="cart_product_price_{{$product->product_id}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                    <a id="like_product_url{{$product->product_id}}"
                                        href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                        <img  id="like_product_img{{$product->product_id}}"
                                            src="{{URL::to('public/uploads/product/'.$product->product_image)}}"
                                             alt=""/>
                                        <h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
                                        <p>{{$product->product_name}}</p>


                                    </a>
                                    <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart"
                                           data-id_product="{{$product->product_id}}" name="add-to-cart">
                                </form>

                            </div>

                        </div>

                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <style type="text/css">
                                    ul.nav.nav-pills nav-justified li {
                                        text-align: center;
                                        font-size: 13px;
                                    }

                                    .button_like {
                                        border: none;
                                        background: #ffff;
                                        color: #B3AFA8;
                                    }

                                    ul.nav.nav-pills nav-justified li {
                                        color: #B3AFA8;
                                    }

                                    .button_like span:hover {
                                        text-align: center;
                                        color: #FE980F;
                                    }

                                    .button_like focus {
                                        border: none;
                                        outline: none;
                                    }

                                </style>
                                <li>
                                    <i class="fa fa-plus-square"></i>
                                    <button class="button_like" id="{{$product->product_id}}"
                                            onclick="product_like(this.id);">
                                        <span>Yêu thích</span>
                                    </button>
                                </li>
                                <li><a style="cursor: pointer;" onclick="compare_product({{$product->product_id}})"><i
                                            class="fa fa-plus-square"></i>So sánh</a></li>
                                {{-- model popup so sánh--}}
                                <div class="container">

                                    <div class="modal fade" id="compare" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                    <h4 class="modal-title"><span id="title-compare"></span></h4>
                                                </div>
                                                <div class="modal-body">

                                                    <table class="table table-hover" id="row_compare">
                                                        <thead>
                                                        <tr>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Hình ảnh</th>
                                                            <th>Chi tiết sản phẩm</th>
                                                            <th>Xem sản phẩm</th>
                                                            <th>Xóa sản phẩm</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </ul>
                        </div>
                    </div>

                </div>
            </a>
        @endforeach
    </div><!--features_items-->
    <ul class="pagination pagination-sm m-t-none m-b-none">
        {!!$brand_by_id->links()!!}
    </ul>

    <!--/recommended_items-->
@endsection
