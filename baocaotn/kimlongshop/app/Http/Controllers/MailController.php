<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\Coupon;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();

class MailController extends Controller
{
    public function gmail()
    {
        $to_name = "Dien Thoai Kim Long";
        $to_email = "demoshop79@gmail.com";//send to this email


        $data = array("name"=>"Thông báo cửa hàng điện thoại Kim Long","body"=>'Thông báo mã khuyến mãi'); //body of mail.blade.php

        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

            $message->to($to_email)->subject('Nhận thông báo khuyến mãi của khách vip bên cửa hàng');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
        return redirect('/')->with('message','');
        //--send mail
    }
    public function gmail_coupon($coupon_time, $coupon_condition, $coupon_number, $coupon_code )
    {
        //get customer
        $customer_coupon = Customer::where('customer_coupon', '=',NULL)->get();
        $coupon = Coupon::where('coupon_code',$coupon_code)->first();
        $coupon_start = $coupon->coupon_start;
        $coupon_end = $coupon->coupon_end;

        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Mã khuyến mãi ngày".' '.$today;
        $data = [];
        foreach($customer_coupon as $customer){
            /*lấy ra mail của khách hàng được gửi mail*/
            $data['email'][] = $customer->customer_email;
        }
        $coupon = array(
            'coupon_start' => $coupon_start,
            'coupon_end' => $coupon_end,
            'coupon_time' => $coupon_time,
            'coupon_condition' => $coupon_condition,
            'coupon_number' => $coupon_number,
            'coupon_code' => $coupon_code
        );
        Mail::send('pages.send_mail', ['coupon' => $coupon], function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
        return redirect()->back()->with('message','Gửi mã khuyến mãi cho khách hàng thành công');

    }
    public function coupon_gmail()
    {
        return view('pages.send_mail');
    }
    public function forgot_password(Request $request)
    {
        /*login_checkout.blade.php*/
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Lấy lại mật khẩu";
        $meta_keywords = "lay lai mat khau";
        $meta_title = "Lấy lại mật khẩu";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6);
        return view('pages.checkout.forgot_password')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('all_product',$all_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider);

    }
    public function address_email(Request $request)
    {
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu đăng nhập cửa hàng Điện thoại Kim Long".' '.$today;
        $customer = Customer::where('customer_email','=',$data['account_email'])->get();
        foreach($customer as $key => $cus){
            $customer_id = $cus->customer_id;
        }
        if($customer){
            $count_customer = $customer->count();
            if($count_customer==0){
                return redirect()->back()->with('error', 'Email chưa đăng ký');
            }else{
                $token_random = Str::random();
                $customer = Customer::find($customer_id);
                $customer->customer_reset_pass = $token_random;
                $customer->save();


                $to_email = $data['account_email'];//send to this email
                $link_update_pass = url('/update-password?email='.$to_email.'&token='.$token_random);

                $data = array("name"=>$title_mail,"body"=>$link_update_pass,'email'=>$data['account_email']);

                Mail::send('pages.checkout.new_password', ['data'=>$data] , function($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);//send this mail with subject
                    $message->from($data['email'],$title_mail);//send from this mail
                });

                return redirect()->back()->with('message', 'Gửi mail thành công,quý khách vui lòng vào email để reset password');
            }
        }
    }
    public function update_password(Request $request)
    {
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Lấy lại mật khẩu";
        $meta_keywords = "lay lai mat khau";
        $meta_title = "Lấy lại mật khẩu";
        $url_canonical = $request->url();


        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();


        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6);

        return view('pages.checkout.customer_new_password')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('all_product',$all_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider);

    }
    public function new_password_customer(Request $request)
    {
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email','=',$data['email'])->where('customer_reset_pass','=',$data['token'])->get();
        $count = $customer->count();
        if($count>0){
            foreach($customer as $key => $cus){
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = md5($data['account_password']);
            $reset->customer_reset_pass = $token_random;
            $reset->save();
            return redirect('dang-nhap')->with('message', 'Mật khẩu đã cập nhật mới,vui lòng đăng nhập');
        }else{
            return redirect('forgot-password')->with('error', 'Vui lòng nhập lại email vì link đã quá hạn');
        }
    }
}
