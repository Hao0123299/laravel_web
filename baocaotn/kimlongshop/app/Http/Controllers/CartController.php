<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Coupon;
session_start();
class CartController extends Controller
{

    public function check_coupon(Request $request){
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        if(Session::get('customer_id'))
        {

            $coupon = Coupon::where('coupon_code',$data['coupon'])
                ->where('coupon_status', 1)
                ->where('coupon_end','>=', $today)
                ->where('coupon_use','LIKE', '%'.Session::get('customer_id').'%')/*check mã coupon đã sử dụng, mootjn gười dùng 1 lần*/
                ->first();
                if($coupon)
                {
                    return redirect()->back()->with('error','Mã giảm giá cửa quý khách đã được dùng, quý khách vui lòng nhập mã khuyến mãi khác do cửa hàng cung cấp');
                }
                else {
                    $coupon_check = Coupon::where('coupon_code', $data['coupon'])
                        ->where('coupon_status', 1)
                        ->where('coupon_end', '>=', $today)
                        ->first();
                    if ($coupon_check) {
                        $count_coupon = $coupon_check->count();
                        if ($count_coupon > 0) {
                            $coupon_session = Session::get('coupon');
                            if ($coupon_session == true) {
                                $is_avaiable = 0;
                                if ($is_avaiable == 0) {
                                    $cou[] = array(
                                        'coupon_code' => $coupon_check->coupon_code,
                                        'coupon_condition' => $coupon_check->coupon_condition,
                                        'coupon_number' => $coupon_check->coupon_number,

                                    );
                                    Session::put('coupon', $cou);
                                }
                            } else {
                                $cou[] = array(
                                    'coupon_code' => $coupon_check->coupon_code,
                                    'coupon_condition' => $coupon_check->coupon_condition,
                                    'coupon_number' => $coupon_check->coupon_number,
                                );
                                Session::put('coupon', $cou);
                            }
                            Session::save();
                            return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
                        }

                    } else {
                        return redirect()->back()->with('error', 'Mã giảm giá không đúng hoặc không còn hiệu lực');
                    }
                }
        }
        else
        {//chưa đăng nhập
            $coupon = Coupon::where('coupon_code',$data['coupon'])
                ->where('coupon_status', 1)
                ->where('coupon_end','>=', $today)
                ->first();
            if($coupon){
                $count_coupon = $coupon->count();
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon');
                    if($coupon_session==true){
                        $is_avaiable = 0;
                        if($is_avaiable==0){
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,

                            );
                            Session::put('coupon',$cou);
                        }
                    }else{
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                }

            }else{
                return redirect()->back()->with('error','Mã giảm giá không đúng hoặc không còn hiệu lực');
            }
        }

    }
    public function gio_hang(Request $request){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(3)->get();
        /*Session::forget('cart');*/
        /*dd(Session::get('cart'));*/
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.cart.cart_ajax',[
            'category'=>$cate_product,
            'brand'=>$brand_product,
            'meta_desc'=>$meta_desc,
            'meta_keywords'=>$meta_keywords,
            'meta_title'=>$meta_title ,
            'url_canonical'=>$url_canonical,
            'slider'=>$slider,
        ]);
    }
    public function add_cart_ajax(Request $request){
        /*Session::forget('cart');*/
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_quantity' => $data['cart_product_quantity'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }

        Session::save();

    }
    public function delete_product($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');

        }else{
            return redirect()->back()->with('message','Xóa sản phẩm thất bại');
        }

    }
    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            $message = '';

            foreach($data['cart_qty'] as $key => $qty){
                $i = 0;
                foreach($cart as $session => $val){
                    $i++;

                    if($val['session_id']==$key && $qty<$cart[$session]['product_quantity']){

                        $cart[$session]['product_qty'] = $qty;
                        $message.='<p style="color:blue">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'].' thành công</p>';

                    }elseif($val['session_id']==$key && $qty>$cart[$session]['product_quantity']){
                        $message.='<p style="color:red">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'].' thất bại</p>';
                    }

                }

            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message',$message);
        }else{
            return redirect()->back()->with('message','Cập nhật số lượng thất bại');
        }
    }
    public function delete_all_product(){
        $cart = Session::get('cart');
        if($cart==true){
            // Session::destroy();
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa hết giỏ thành công');
        }
    }
    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
    }
    public function show_cart(Request $request){
        //seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
    public function show_infor_cart()
    {
        $cart = count(Session::get('cart'));
        echo $cart;
    }
    public function hover_infor_cart()
    {
        $cart = count(Session::get('cart'));
        $output = '';
        if($cart>0)
        {
            $output.='<ul class="hover-cart">';
                foreach(Session::get('cart') as $c) {
                    $output .= '<li>
                     <a href="#">
                        <img src="'.asset('public/uploads/product'.$c['product_image']).'">
                            <p>Tên sản phẩm: '.$c['product_name'].'</p>
                            <p>Số lương: '.$c['product_qty'].'</p>
                            <p>Giá: '.number_format($c['product_price'],0,',','.').' VNĐ </p>
                     </a>
                     <a class="cart_quantity_delete" href="'.url('/del-product/'.$c['session_id']).'">
                        <i class="fa fa-times"></i>
                     </a>
                    </li>';
                }
                     $output.='</ul>';
        }
        else{
            $output.='<ul class="hover-cart">
                <li>
                    <p style="color: black">Không có sản phẩm trong giỏ hàng</p>
                </li>
                      </ul>';
        }
        echo $output;
    }

}
