@extends('layout')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {!! session()->get('message') !!}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {!! session()->get('error') !!}
                            </div>
                        @endif
						<h2>Đăng nhập tài khoản</h2>
						<form action="{{URL::to('/login-customer')}}" method="POST">
							{{csrf_field()}}
{{--							<input type="text"  name="email_account" placeholder="Tài khoản" />--}}
{{--							<input type="password" name="password_account" placeholder="Password" />--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tài khoản </label>
                                <input type="text" name="email_account" data-validation="length"
                                       data-validation-length="min1"
                                       data-validation-error-msg="Vui lòng điền tài khoản"
                                       class=" shipping_email form-control"
                                       placeholder="user@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu </label>
                                <input type="password" name="password_account" data-validation="length"
                                       data-validation-length="min1"
                                       data-validation-error-msg="Vui lòng điền mật khẩu"
                                       class=" shipping_email form-control"
                                       placeholder="*******">
                            </div>
                            <span>
                                <a href="{{url('/forgot-password')}}">Quên mật khẩu</a>
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>

                        <style type="text/css">

                            ul.list-login {
                                margin: 10px;
                                padding: 0;
                            }
                            ul.list-login li {
                                display: inline; /*hàng ngang*/
                                margin: 5px;
                            }

                        </style>

                        <ul class="list-login">

                            <li>
                                <a href="{{url('login-google')}}">
                                    <img width="10%" alt="Đăng nhập bằng tài khoản google"  src="{{asset('public/frontend/images/google.png')}}">
                                </a>
                            </li>

{{--                            <li>--}}
{{--                                <a href="{{url('login-facebook')}}">--}}
{{--                                    <img width="10%" alt="Đăng nhập bằng tài khoản facebook"  src="{{asset('public/frontend/images/facebook.png')}}">--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
							{{ csrf_field() }}
{{--							<input type="text" name="customer_name" placeholder="Họ và tên"/>--}}
{{--							<input type="email" name="customer_email" placeholder="Địa chỉ email"/>--}}
{{--							<input type="password" name="customer_password" placeholder="Mật khẩu"/>--}}
{{--							<input type="text" name="customer_phone" placeholder="Phone"/>--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ và tên </label>
                                <input type="text" name="customer_name" data-validation="length"
                                       data-validation-length="min1"
                                       data-validation-error-msg="Vui lòng điền họ và tên"
                                       class=" shipping_email form-control"
                                       placeholder="Nguyễn Văn A">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tài khoản </label>
                                <input type="text" name="customer_email" data-validation="length"
                                       data-validation-length="min1"
                                       data-validation-error-msg="Vui lòng điền tài khoản"
                                       class=" shipping_email form-control"
                                       placeholder="user@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu </label>
                                <input type="text" name="customer_password" data-validation="length"
                                       data-validation-length="min1"
                                       data-validation-error-msg="Vui lòng điền mật khẩu"
                                       class=" shipping_email form-control"
                                       placeholder="*******">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại </label>
                                <input type="text" name="customer_phone" data-validation="length"
                                       data-validation-length="min1"
                                       data-validation-error-msg="Vui lòng điền số điện thoại"
                                       class=" shipping_email form-control"
                                       placeholder="0663.2729.42">
                            </div>

							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection
