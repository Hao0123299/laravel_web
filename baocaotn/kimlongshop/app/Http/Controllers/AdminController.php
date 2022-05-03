<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Social;
use Socialite;
use App\Admin;
use App\Roles;
use App\Login;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Access;
use App\Product;
use App\CategoryProductModel;
use App\Slider;
use App\Brand;
use App\Rules\Captcha;
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    /*public function findOrCreateUser($users, $provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }
        $hieu = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);

        $orang = Login::where('admin_email',$users->email)->first();

        if(!$orang){
            $orang = Login::create([
                'admin_name' => $users->name,
                'admin_email' => $users->email,
                'admin_password' => '',
                'admin_phone' => '',
                'admin_status' => 1

            ]);
        }

        $hieu->login()->associate($orang);

        $hieu->save();

        $account_name = Login::where('admin_id',$hieu->user)->first();
        Session::put('admin_name',$account_name->admin_name);
        Session::put('admin_id',$account_name->admin_id);

        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');


    }*/
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(Request $request){
        $this->AuthLogin();
        $user_ip_address = $request->ip(); /*lấy ip hiện tại truy cập vào cửa hàng*/
        $access_start_of_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString(); /*đầu tháng*/
        $access_end_of_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString(); /*cuối tháng*/
        $early_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();/*ngày đầu của tháng này*/
        $lastYears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        //tổng lượng truy cập tháng trước
        $access_of_lastOfMonth = Access::whereBetween('access_visit_date',[$access_start_of_month,$access_end_of_month])->get();
        $access_lastOfMonth_count = $access_of_lastOfMonth->count();
        //tổng lượng truy cập của tháng
        $access_of_month = Access::whereBetween('access_visit_date',[$early_month,$now])->get();
        $access_month_count = $access_of_month->count();
        //tổng khách hàng truy cập của năm
        $access_of_year = Access::whereBetween('access_visit_date',[$lastYears,$now])->get();
        $access_year_count = $access_of_year->count();
        //tổng tất cả dữ liệu có trong bảng
        $access = Access::all();
        $access_total = $access->count();
        //địa chỉ ip truy cập
        $access = Access::where('access_ip_address',$user_ip_address)->get();
        $access_count = $access->count();
        if($access_count<1){
            $access = new Access();
            $access->access_ip_address = $user_ip_address;
            $access->access_visit_date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $access->save();
        }
        //total
        $product = Product::all()->count();
        $slider = Slider::all()->count();
        $brand = Brand::all()->count();
        $coupon = Coupon::all()->count();
        $category = CategoryProductModel::all()->count();
        $product_view = Product::orderBy('product_view', 'DESC')->take(10)->get();
    	return view('admin.dashboard')
            ->with('access_lastOfMonth_count', $access_lastOfMonth_count)
            ->with('access_month_count', $access_month_count)
            ->with('access_year_count', $access_year_count)
            ->with('access_total', $access_total)
            ->with('access_count', $access_count)
            ->with('product', $product)
            ->with('slider', $slider)
            ->with('brand', $brand)
            ->with('coupon', $coupon)
            ->with('category', $category)
            ->with('product_view', $product_view);

    }
    public function dashboard(Request $request){
        //$data = $request->all();
        $data = $request->validate([
            //validation laravel
            'admin_email' => 'required',
            'admin_password' => 'required',
            /*'g-recaptcha-response' => new Captcha(), */   //dòng kiểm tra Captcha
        ]);
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/dashboard');
            }
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai. Vui lòng kiểm tra lại thông tin');
                return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
    /*phân quyền cho nhân viên*/

    public function register_account_staff(){
        return view('admin.staff.register_account_staff');
    }
    public function register_staff(Request $request){
        $this->validation($request);
        $data = $request->all();

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        return redirect('/register-account-staff')->with('message','Đăng tài khoản thành công');

    }
    public function validation($request){
        /*kiểm tra thông tin người dùng nhập vào*/
        return $this->validate($request,[
            'admin_name' => 'required|max:50',
            'admin_phone' => 'required|max:10',
            'admin_email' => 'required|email|max:50',
            'admin_password' => 'required|max:50',
        ]);
    }
    public function login_account_staff(){
        return view('admin.staff.login_account_staff');
    }
    public function login_staff(Request $request){
        $this->validate($request,[
            'admin_email' => 'required|email|max:50',
            'admin_password' => 'required|max:50'
        ]);
        /*$data = $request->all();*/

        if(Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password ])){
            return redirect('/dashboard');
        }else{
            return redirect('/login-account-staff')->with('message','Email hoặc password bị sai. Bạn vui lòng kiểm tra lại');
        }

    }

    public function logout_staff(){
        Auth::logout();
        return redirect('/login-account-staff')->with('message','Đăng xuất tài khoản thành công thành công');
    }
}
