<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Slider;
use App\Http\Requests;
use App\Picture;
use App\Comment;
use App\Rate;
use File;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    /*kiểm tra sản phẩm*/
    public function AuthLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    /*thêm sản phẩm*/
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')
            ->orderby('brand_id', 'desc')
            ->get();
        return view('admin.add_product')
            ->with('cate_product', $cate_product)
            ->with('brand_product', $brand_product);
    }

    /*show tất cả sản phẩm*/
    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderby('tbl_product.product_id', 'desc')->get()/*paginate(10)*/;
        $manager_product = view('admin.all_product')
            ->with('all_product', $all_product);
        return view('admin_layout')
            ->with('admin.all_product', $manager_product);
    }

    /*lưu sản phẩm*/
    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $numberPrice = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);/*lấy ký tự số*/
        $numberPriceCost = filter_var($request->product_price_cost, FILTER_SANITIZE_NUMBER_INT);/*lấy ký tự số*/
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $numberPrice;
        $data['product_price_cost'] = $numberPriceCost;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;
        $get_image = $request->file('product_image');

        /*đường dẫn của sản phẩm*/
        $path = 'public/uploads/product/';
        /*đường dẫn của hình ảnh sản phẩm*/
        $path1 = 'public/uploads/picture/';


        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            File::copy($path . $new_image, $path1 . $new_image);
            $data['product_image'] = $new_image;
        }
        $p = DB::table('tbl_product')->insertGetId($data); /*Thêm ảnh và lấy id*/
        $picture = new Picture();
        $picture->picture_name = $new_image;
        $picture->picture_image = $new_image;
        $picture->product_id = $p;
        $picture->save();
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }

    /*cho phép không hiển thị sản phẩm*/
    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['product_status' => 1]);
        Session::put('message', 'Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    /*cho phép hiển thị sản phẩm*/
    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['product_status' => 0]);
        Session::put('message', 'Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    /*chỉnh sửa sản phẩm*/
    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')
            ->orderby('category_id', 'desc')
            ->get();
        $brand_product = DB::table('tbl_brand')
            ->orderby('brand_id', 'desc')
            ->get();
        $edit_product = DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->get();
        $manager_product = view('admin.edit_product')
            ->with('edit_product', $edit_product)
            ->with('cate_product', $cate_product)
            ->with('brand_product', $brand_product);
        return view('admin_layout')
            ->with('admin.edit_product', $manager_product);
    }

    /*cập nhật sản phẩm*/
    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $numberPrice = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);/*lấy ký tự số*/
        $numberPriceCost = filter_var($request->product_price_cost, FILTER_SANITIZE_NUMBER_INT);/*lấy ký tự số*/
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $numberPrice;
        $data['product_price_cost'] = $numberPriceCost;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); /*lấy thông tin hình ảnh*/
            $name_image = current(explode('.', $get_name_image)); /*tách tên và đuôi của hình ảnh*/
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(
                ); /*random tên hình ảnh để thêm hình ảnh cũ vào không bị trùng tên*/
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }

        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }

    /*xóa sản phẩm*/
    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }

    //End Admin Page
    public function details_product($product_slug, Request $request)
    {
        //slide
        $slider = Slider::orderBy('slider_id', 'DESC')
            ->where('slider_status', '1')
            ->take(4)
            ->get();
        $cate_product = DB::table('tbl_category_product')
            ->where('category_status', '0')
            ->orderby('category_id', 'desc')
            ->get();
        $brand_product = DB::table('tbl_brand')
            ->where('brand_status', '0')
            ->orderby('brand_id', 'desc')
            ->get();
        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_slug', $product_slug)->get();
        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id;
            $product_id = $value->product_id;
            $meta_desc = $value->product_desc;
            $meta_keywords = $value->product_slug;
            $meta_title = $value->product_name;
            $url_canonical = $request->url();
        }
        //thêm hình ảnh
        $picture = Picture::where('product_id', $product_id)->get(
        ); /*lấy hết hình ảnh*//*$picture = Picture::where('product_id', $product_id)->take(3)*/; /*lấy số lượng hình ảnh nhất định*/
        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_category_product.category_id', $category_id)
            ->whereNotIn('tbl_product.product_slug', [$product_slug])
            ->orderby(DB::raw('RAND()'))
            ->paginate(3);

        /*sản phẩm xem nhiều*/
        $product = Product::where('product_id', $product_id)->first();
        $product->product_view = $product->product_view + 1;
        $product->save();

        $rate = Rate::where('product_id', $product_id)->avg('rate'); /*lấy ra số sao được vote dựa trên product */
        /*làm tròn só sao vote*/
        $rate = round($rate);

        return view('pages.sanpham.show_details')
            ->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('product_details', $details_product)
            ->with('relate', $related_product)
            ->with('meta_desc', $meta_desc)
            ->with('meta_keywords', $meta_keywords)
            ->with('meta_title', $meta_title)
            ->with('url_canonical', $url_canonical)
            ->with('slider', $slider)
            ->with('picture', $picture)
            ->with('rate', $rate)
            ->with('product', $product);
    }

    /*comment*/
    public function comment_load(Request $request)
    {
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id', $product_id)->where('comment_status', 0)->get();
        $output = '';
        foreach ($comment as $key => $c) {
            $output .= '
                <div class="row binh_luan " style="background: #6cb2eb">
                                            <div class="col-sm-2" >
                                                <img width="80%" src="' . url('/public/frontend/images/images.png') . '" class="img img-responsive">
                                            </div>

                                            <div class="col-sm-10">
                                                <p style="color: blue"><b>' . $c->comment_name . '</b></p>
                                                <p style="color: black"><b>' . $c->comment_date . '</b></p>
                                                <p>' . $c->comment_comment . '</p>
                                            </div>
                                        </div><p></p>';

            foreach ($comment as $key => $c_rep) {
                if ($c_rep->comment_comment_prarent == $c->comment_id) {
                    $output .=
                        '
                                                <div class="row binh_luan " style="margin-left: 10px; background: white ">
                                                    <div class="col-sm-2" >
                                                        <img width="50%" src="' . url(
                            '/public/frontend/images/admin.jpg'
                        ) . '" class="img img-responsive">
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <p style="color: #00FF00"><b>Admin</b></p>
                                                        <p style="color: black"><b>' . $c_rep->comment_comment . '</b></p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <p></p>';
                }
            }
        }
        echo $output;
    }

    /*thêm đánh giá*/
    public function comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_comment = $request->comment_comment;
        $comment = new Comment();
        $comment->comment_name = $comment_name;
        $comment->comment_comment = $comment_comment;
        $comment->comment_product_id = $product_id;
        /*$comment->comment_status = 0;*/ /*hiển thị bình luận*/
        $comment->comment_status = 0; /*ẩn bình luận*/
        $comment->save();
    }

    /*vote sao*/
    public function insert_rate(Request $request)
    {
        $data = $request->all();
        $rate = new Rate();
        $rate->product_id = $data['product_id'];
        $rate->rate = $data['index'];
        $rate->save();
        echo 'done';
    }

    /*public function file_browser(Request $request)
    {
        $paths = glob(public_path('uploads/product/*'));

        $fileNames = array();

        foreach ($paths as $path) {
            array_push($fileNames, basename($path));
        }
        $data = array(
            'fileNames' => $fileNames
        );

        return view('admin.images.file_browser')->with($data);
    }*/

    public function ckeditor_image(Request $request)
    {
        /*ckeditor*/
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName(); /*lấy hình ảnh + file mở rông*/
            $fileName = pathinfo($originName, PATHINFO_FILENAME); /*lấy tên ảnh*/
            $extension = $request->file('upload')->getClientOriginalExtension();/*lấy duôi mở rộng của ảnh*/
            $fileName = $fileName . '_' . time() . '.' . $extension;/*tên ảnh_time_duoi mở rộng*/
            $request->file('upload')->move('public/uploads/image', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum'); /*trả về url */
            $url = asset('public/uploads/image/' . $fileName);
            $msg = 'Tải ảnh thành công';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
