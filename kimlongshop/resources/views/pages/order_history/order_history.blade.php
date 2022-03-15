@extends('layout')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê đơn hàng
            </div>
            <div class="row w3-res-tb">


            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Thứ tự</th>
                        <th>Mã đơn hàng</th>

                        <th>Ngày tháng đặt hàng</th>
                        <th>Tình trạng đơn hàng</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($order as $key => $ord)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td><i>{{$i}}</i></td>
                            <td>{{ $ord->order_code }}</td>
                            <td>{{ $ord->created_at }}</td>
                            <td>@if($ord->order_status==1)
                                    Đơn hàng mới
                                @elseif($ord->order_status==2)
                                    Đã giao hàng
                                @else
                                    Đơn hàng đã bị hủy
                                @endif
                            </td>


                            <td>
                                <p><a href="{{URL::to('/view-order-history/'.$ord->order_code)}}"
                                      class="active styling-edit" ui-toggle-class="">
                                        Chi tiết đơn hàng </a>
                                </p>
                                @if($ord->order_status!=3)
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#myModal">Hủy đơn hàng
                                </button>
                                @endif

                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <form>
                                            @csrf
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                    <h4 class="modal-title">Lý do</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><textarea class="cacel_order" placeholder="Lý do hủy đơn hàng của bạn "></textarea></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <button type="button" id="{{ $ord->order_code }}" class="btn btn-default" onclick="send_cancel_order(this.id)">
                                                        Gửi
                                                    </button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>


                                {{-- <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                                     <i class="fa fa-times text-danger text"></i>
                                 </a>--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {!!$order->links()!!}
                        </ul>
                    </div>
                </div>
            </footer>


        </div>
    </div>
@endsection
