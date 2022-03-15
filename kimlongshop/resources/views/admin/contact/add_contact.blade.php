@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thông tin liên hệ của cửa hàng
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
                        @foreach($contact as $key => $con)
                        <form role="form" action="{{URL::to('/update-save/'.$con->contact_id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputPassword1">Thông tin liên hệ</label>
                                <textarea style="resize: none" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng thêm thông tin liên hệ" rows="8" class="form-control" name="contact_conatct" id="ckeditor1">{{$con->contact_contact}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Đường đi đến cửa hàng</label>
                                <textarea style="resize: none" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng link của đường đi" rows="8" class="form-control" name="contact_map" id="exampleInputPassword1">{{$con->contact_map}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fanpage</label>
                                <textarea style="resize: none" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng thêm fanpage" rows="8" class="form-control" name="contact_fanpage" id="exampleInputPassword1">{{$con->contact_fanpage}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh của cửa hàng</label>
                                <input type="file"  name="contact_img" class="form-control" id="exampleInputEmail1">
                                <img src="{{URL::to('public/uploads/contact/'.$con->contact_img)}}" height="100" width="100">
                            </div>
                            <button type="submit" name="contact_add" class="btn btn-info">Cập nhật thông tin liên hệ</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
@endsection
