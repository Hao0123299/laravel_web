@extends('layout')
@section('content')

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
                    <div class="login-form">
                        <?php
                        $token = $_GET['token'];
                        $email = $_GET['email'];
                        ?>
                        <h2>Nhập mật khẩu mới </h2>
                        <form action="{{URL::to('/new-password-customer')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="email" value="{{$email}}"/>
                            <input type="hidden"name="token" value="{{$token}}"/>
                            <input type="password" name="account_password" placeholder="Mật khẩu mới" />
                            <button type="submit" class="btn btn-default">Cập nhật</button>
                        </form>
                    </div><!--/login form-->
                </div>


            </div>
        </div>
    </section><!--/form-->

@endsection
