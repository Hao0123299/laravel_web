@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
    </div>

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
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng giảm giá</th>
            <th>Bắt đầu</th>
            <th>Kết thúc</th>
            <th>Điều kiện giảm giá</th>
            <th>Số giảm</th>
            <th>Trạng thái</th>
            <th>Thời hạn</th>
            <th>Gửi mã khuyến mãi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>

            <td>{{ $cou->coupon_name }}</td>
            <td>{{ $cou->coupon_code }}</td>
            <td>{{ $cou->coupon_time }}</td>
            <td>{{ $cou->coupon_start }}</td>
            <td>{{ $cou->coupon_end }}</td>

          <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                Giảm theo %
                <?php
                 }else{
                ?>
                Giảm theo tiền
                <?php
               }
              ?>
            </span>
          </td>

          <td>
              <span class="text-ellipsis">
              <?php
                  if($cou->coupon_condition==1){
                  ?>
                Giảm {{$cou->coupon_number}} %
                <?php
                  }else{
                  ?>
                Giảm {{$cou->coupon_number}} VNĐ
                <?php
                  }
                  ?>
              </span>
          </td>

              <td>
              <span class="text-ellipsis">
              <?php
                  if($cou->coupon_status==1){
                  ?>
                 <p style="color: blue; font-weight: bold">Còn hiệu lực</p>
                <?php
                  }else{
                  ?>
                <p style="color: red; font-weight: bold">Không còn hiệu lực</p>
                <?php
                  }
                  ?>
            </span>
              </td>

              <td>
                  <?php
                  if($cou->coupon_end >= $today){
                  ?>
                  <p style="color: blue; font-weight: bold">Còn thời hạn</p>
                  <?php
                  }else{
                  ?>
                  <p style="color: red; font-weight: bold">Không còn thời hạn</p>
                  <?php
                  }
                  ?>

              </td>
              <td>
                  <div>
                      <p><a href="{{url('/gmail-coupon', [
                        'coupon_time'=> $cou->coupon_time,
                        'coupon_condition'=> $cou->coupon_condition,
                        'coupon_number'=> $cou->coupon_number,
                        'coupon_code'=> $cou->coupon_code
                      ])}}" class="btn-default">Mã khuyến mãi</a></p>
                  </div>
              </td>


            <td>

              <a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{--<footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
             {!!$coupon->links()!!}
          </ul>
        </div>
      </div>
    </footer>--}}
  </div>
</div>
@endsection
