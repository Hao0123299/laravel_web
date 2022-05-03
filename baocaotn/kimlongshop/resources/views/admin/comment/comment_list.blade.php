@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê đánh giá
            </div>
            <div id="notification"></div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Duyệt</th>
                        <th>Tên khách hàng</th>
                        <th>Bình luận</th>
                        <th>Tên sản phẩm</th>
                        <th>Ngày đánh giá</th>
                        <th>Quản lý</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comment as $key => $c)
                        <tr>
                            <td>
                                @if($c->comment_status == 1)
                                    <input type="button" data-comment_id="{{$c->comment_id}}" id="{{$c->comment_product_id}}" class="btn btn-primary btn-comment-status"  data-comment_status="0" value="Hiển thị">
                                @else
                                    <input type="button" data-comment_id="{{$c->comment_id}}" id="{{$c->comment_product_id}}" class="btn btn-danger btn-primary btn-comment-status" data-comment_status="1" value="Không hiển thị">
                                @endif
                            </td>

                            <td>{{ $c->comment_name }}</td>
                            <td>
                                {{ $c->comment_comment }}
                                </br>
                                Phản hồi đánh giá
                                <ul style="list-style-type: decimal; color: #FF3300; margin: 2px 40px">
                                    {{--hiển thị đánh giá--}}
                                    @foreach($comment as $key => $c_reply)
                                        {{--so sánh comment_id và comment_comment_prarent--}}
                                    @if($c_reply->comment_comment_prarent == $c->comment_id)
                                        <li>{{$c_reply->comment_comment}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                                @if($c->comment_status == 0)
                                </br>
                                <textarea rows="2" class="form-control comment_reply_{{$c->comment_id}}"></textarea>
                                </br>
                                <button class="btn-comment-reply"  data-comment_id="{{$c->comment_id}}" data-product_id="{{$c->comment_product_id}}">Trả lời đánh giá</button>
                                @else

                                @endif


                            </td>
                            <td><a href="{{url('/chi-tiet/'.$c->product->product_slug)}}" target="_blank">{{ $c->product->product_name }}</a> </td> {{--target blank mở tab mới--}}
                            <td>{{ $c->comment_date }}</td>
                            <td>
                                <a onclick="return confirm('Bạn có chắc là muốn xóa đánh giá này không?')" href="{{URL::to('/delete-comment/'.$c->comment_id)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


