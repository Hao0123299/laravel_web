@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->

        <h2 class="title text-center">Liên hệ với chúng tôi qua thông tin bên dưới</h2>
        @foreach($contact as $key => $con)
        <div class="row">

            <div class="col-xs-12">
                <span><h5>Thông tin liên hệ</h5> </span>
                {!!$con->contact_contact!!} {{--{!!  !!} chuyển từ html sang định dạng hiển thị trên web--}}
                {!!$con->contact_fanpage!!}
            </div>

            <div class="col-sm-12">
                <span><h5>Bản đồ :</h5> </span>
                {!!$con->contact_map!!}

            </div>
            @endforeach
        </div>



@endsection
