@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục con sản phẩm
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
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text"  name="category_name" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng điền tên danh mục" class="form-control " id="slug" placeholder="Tên danh mục" onkeyup="ChangeToSlug();">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <input type="text" name="slug_category_product" class="form-control" id="convert_slug" placeholder="Tên danh mục">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="0" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng điền mô tả"  class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                    <textarea style="resize: none" rows="0"  data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng điền từ khóa danh mục" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phân cấp danh mục</label>
                                        <select name="category_parent" class="form-control input-sm m-bot15">
                                            <{{--option value="0">---Danh mục cha---</option>--}}
                                            @foreach($category as $key => $val)
                                                <option value="{{$val->category_id}}">{{$val->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="category_product_status" class="form-control input-sm m-bot15">
                                           <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
