<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PictureController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_picture($product_id)
    {
        $pro = $product_id;
        return view('admin.picture.add_picture')->with('pro', $pro);
    }
    public function update_name_picture(Request $request)
    {
        $pic_id = $request->pic_id;
        $pic_text = $request->pic_text;
        $picture = Picture::find($pic_id);
        $picture-> picture_text =  $pic_text;
        $picture-> save();
    }

    public function insert_picture(Request $request)
    {
        $product_id = $request->pro;

        $picture = Picture::where('product_id', $product_id)->get();
        //tổng số lượng ảnh có trong csdl
        $picture_count = $picture->count();
        $output =
            '<form>
             '.csrf_field().'
            <table class="table">
                <thead>
                    <tr>
                        <th>Thứ tự ảnh</th>
                        <th>Tên ảnh</th>
                        <th>Hỉnh ảnh</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                </form>
             ';
        if($picture_count > 0)
        {
            $i = 0;
            //lặp lấy ra ảnh
            foreach($picture as $key => $pic)
            {
               $i++;
                $output.='
                     <tr>
                        <td>'.$i.'</td>
                        <td contenteditable="true" class="edit_name" data-pic_id="'.$pic->picture_id.'">'.$pic->picture_name.'</td>
                        <td>
                            <img src="'.url('public/uploads/picture/'.$pic->picture_image).'" class="img-thumbnail" width="100px">
                            <input type="file" class="file_image" data-pic_id="'.$pic->picture_id.'" id="file-'.$pic->picture_id.'" name="file" accept="image/*" />
                        </td>
                        <td>
                        <!--//xóa dựa trên picture_id-->
                            <button type="button" data-pic_id="'.$pic->picture_id.'" class="btn btn-danger delete-picture">Xóa hình ảnh </button>
                        </td>
                    </tr>
                    ';
            }
        }
        else{
            $output.=
                '<tr>
                        <td colspan="4">Chưa có hình ảnh chi tiết của sản phẩm</td>

                    </tr>';
        }
        $output.=
            '</tbody>
            </table>
            </form>';

        echo $output;
    }
    public function insert_picture_information($pro, Request $request)
    {
        $get_image = $request->file('file');
        if($get_image)
        {
            foreach ($get_image as $image)
            {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/uploads/picture',$new_image);
                //add picture sử dung model picture
                $picture = new Picture();
                $picture-> picture_name =  $new_image;
                $picture-> picture_image =  $new_image;
                $picture-> product_id = $pro;
                $picture-> save();
            }
        }
        Session::put('message','Thêm ảnh của sản phẩm thành công');
        return redirect()->back();
    }
    public function delete_picture(Request $request)
    {
        $pic_id = $request->pic_id;
        $picture = Picture::find($pic_id);
        /*xóa ảnh trong thu muc*/
        unlink('public/uploads/picture/'.$picture->picture_image);
        $picture-> delete();

    }
    public function update_picture(Request $request)
    {
        $get_image = $request->file('file');
        $pic_id = $request->pic_id;
        if($get_image)
        {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/picture',$new_image);

                $picture = Picture::find($pic_id);
                unlink('public/uploads/picture/'.$picture->picture_image);
                $picture->picture_image =  $new_image;
                $picture-> save();

        }

    }
}
