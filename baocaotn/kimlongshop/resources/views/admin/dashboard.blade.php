@extends('admin_layout')
@section('admin_content')
<div class="row">
    <h2><center>QUẢN LÝ DOANH THU </center></h2>
    <br>
    <form autocomplete="off"> {{--không tự động điền thông tin--}}
        @csrf
        <div class="col-md-2">
            <p class="font-weight: bold">Từ ngày:  <input type="text" id="datepicker" class="form-control"></p>
            </br>
            <input type="button" id="btn-dashboard" class="btn-sm" value="Lọc">
        </div>
        <div class="col-md-2">
            <p class="font-weight: bold">Đến ngày:  <input type="text" id="datepicker1" class="form-control"></p>
        </div>

        <div class="col-md-2">
            Lọc
            <select class="filter-by-time form-control">
                <option>--Chọn--</option>
                <option value="7ngay"> 7 ngày qua </option>
                <option value="thangnay"> Tháng này </option>
                <option value="thangtruoc"> Tháng trước </option>
            </select>
        </div>
    </form>

    <div class="col-md-12">
        <div id="firstchart" style="height: 250px;"></div>
    </div>
</div>
<br>
<div class="row">
    <h2><center>QUẢN LÝ SỐ LƯỢT TRUY CẬP</center></h2>
    <br>
    <style type="text/css">
        table.table.table-bordered.table-dark {
            background: white;
        }
    </style>
    <table class="table table-bordered table-dark">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Đang truy cập</th>
            <th scope="col">Tổng lượng truy cập tháng trước</th>
            <th scope="col">Tổng lượng truy cập tháng này</th>
            <th scope="col">Tổng lượng truy cập tháng trước</th>
            <th scope="col">Tổng lượng truy cập tháng trước</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$access_count}}</td>
            <td>{{$access_lastOfMonth_count}}</td>
            <td>{{$access_month_count}}</td>
            <td>{{$access_year_count}}</td>
            <td>{{$access_total}}</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-12">
        <h2><center>SẢN PHẨM XEM NHIỀU</center></h2>
        <ol>

            @foreach($product_view as $key => $pro)
                <li>
                    <a target="_blank" href="{{url('/chi-tiet/'.$pro->product_slug)}}">{{$pro->product_name}} | <span style="color:black">{{$pro->product_view}}</span></a>
                </li>
            @endforeach

        </ol>
    </div>



</div>

@endsection
