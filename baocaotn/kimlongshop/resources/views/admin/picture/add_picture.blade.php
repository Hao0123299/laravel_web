@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm ảnh của sản phẩm
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>

                <form action="{{url('/insert-picture-information/'.$pro)}}" method="POST" enctype="multipart/form-data">
                    <!--Add picture-->
                    @csrf
                    <div class="row">
                        <div class="col-md-3">

                        </div>

                        <div class="col-md-6" align="center">
                            <input type="file" class="form-control" id="add_picture" name="file[]" accept="image/*" multiple>
                        <!--name="file[]" thêm nhiều file ảnh, accept: chi nhận file ảnh-->
                            <span id="error"></span>
                        </div>

                        <div class="col-md-3">
                            <input type="submit" name="upload" name="upload_picture" value="Tải ảnh lên" class="btn-success">
                        </div>
                    </div>
                </form>

                <div class="panel-body">
                    <input type="hidden" value="{{$pro}}" name="pro" class="pro">
                    <form>
                        @csrf()
                        <div id="load_picture">

                        </div>
                    </form>
                </div>
            </section>

        </div>
@endsection
