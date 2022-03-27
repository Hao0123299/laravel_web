@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm user
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        <form role="form" action="{{URL::to('add-staff')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên nhân viên</label>
                                <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email đăng nhập</label>
                                <input type="text" name="admin_email" class="form-control" id="exampleInputEmail1" placeholder="Email đăng nhập">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" name="admin_phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" name="admin_password" class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu">
                            </div>

                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm users</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
@endsection