@extends('admin_layout')
@section('admin_content'))

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-offset-1">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif
                <div class="login-form"><!--login form-->
                    <h2>Lấy lại mật khẩu đăng nhập</h2>
                    <form action="{{URL::to('/address-email')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="account_email" placeholder="Nhập địa chỉ email" />
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section><!--/form-->

@endsection
