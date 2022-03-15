@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped">
        <thead>
          <tr>

            <th>Tên danh mục</th>
            <th>Tiêu đề</th>
              <th>Phân cấp danh mục</th>
            <th>Hiển thị</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>

        <tbody>
          @foreach($all_category_product as $key => $cate_pro)
          <tr>

            <td>{{ $cate_pro->category_name }}</td>
            <td>{{ $cate_pro->slug_category_product }}</td>
              <td>
                  @if($cate_pro->category_parent==0)
                      <p style="color: #fcb216">Danh mục cha</p>
                  @else
<!--                      //foreach tìm danh mục con-->
                       @foreach($category as $key => $cate_parent)
                         {{--  //category_parent = 0 là cha nên phải khác không--}}
                           @if($cate_parent->category_id==$cate_pro->category_parent )
                          <p style="color: blue">Danh mục con của {{$cate_parent->category_name }}</p>
                          @endif
                      @endforeach

                          @endif
              </td>

            <td><span class="text-ellipsis">
              <?php
               if($cate_pro->category_status==0)
               {
                ?>
                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>
                 <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>

            <td>
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-----import data---->
      <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
          @csrf

        <input type="file" name="file" accept=".xlsx"><br>

       <input type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
      </form>

    <!-----export data---->
       <form action="{{url('export-csv')}}" method="POST">
          @csrf
       <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
      </form>


    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          {{--<small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>--}}
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
             {!!$all_category_product->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
