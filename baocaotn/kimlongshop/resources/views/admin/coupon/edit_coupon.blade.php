@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật mã giảm giá
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    @foreach($edit_coupon as $key => $edit_cou)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-coupon/'.$edit_cou->coupon_id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" value="{{$edit_cou->coupon_name}}" name="coupon_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã giảm giá</label>
                                <input type="text" value="{{$edit_cou->coupon_code}}" name="coupon_code" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số lượng mã</label>
                                <input type="text" value="{{$edit_cou->coupon_time}}" name="coupon_time" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Băt đầu</label>
                                <input type="text" value="{{$edit_cou->coupon_start}}" name="coupon_start" class="form-control" id="coupon_start">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kết thúc</label>
                                <input type="text" value="{{$edit_cou->coupon_end}}" name="coupon_end" class="form-control" id="coupon_end">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tính năng mã</label>
                                <select name="coupon_condition" value="{{$edit_cou->coupon_condition}}" class="form-control input-sm m-bot15">
                                    <option value="0">----Chọn-----</option>
                                    <option value="1">Giảm theo phần trăm</option>
                                    <option value="2">Giảm theo tiền</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm</label>
                                <input type="text" value="{{$edit_cou->coupon_number}}" name="coupon_number" class="form-control coupon_number " id="exampleInputEmail1">
                            </div>
                            <button type="submit" name="update_coupon" class="btn btn-info">Cập nhật mã giảm giá</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
@endsection
