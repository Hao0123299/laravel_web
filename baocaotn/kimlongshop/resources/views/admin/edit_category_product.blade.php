@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật danh mục sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_category_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_value->category_name}}" onkeyup="ChangeToSlug();" name="category_product_name" class="form-control" id="slug" >
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <input type="text" value="{{$edit_value->slug_category_product}}" name="slug_category_product" class="form-control" id="convert_slug" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="0" class="form-control" name="category_product_desc" id="exampleInputPassword1" >{{$edit_value->category_desc}}</textarea>
                                </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                        <textarea style="resize: none" rows="0" class="form-control" name="category_product_keywords" id="exampleInputPassword1">{{$edit_value->meta_keywords}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phân cấp danh mục</label>
                                        <select name="category_product_parent" class="form-control input-sm m-bot15">
                                            <option value="0">Danh mục cha</option>
                                            @foreach($cate_product as $key => $cate)
                                                //lấy danh mục cha
                                                @if($cate->category_parent==0)
                                                    <option {{$cate->category_id == $edit_value->category_id ? 'selected' : ''}} value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @endif
                                                //lấy danh mục con
                                                @foreach($cate_product as $key => $cate1)
                                                    @if($cate1->category_parent == $cate->category_id)
                                                        <option {{$cate1->category_id == $edit_value->category_id ? 'selected' : ''}} value="{{$cate->category_id}}">---- {{$cate1->category_name}}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection
