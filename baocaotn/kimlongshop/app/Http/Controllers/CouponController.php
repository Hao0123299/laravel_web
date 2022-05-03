<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Coupon;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CouponController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function unset_coupon()
    {
        $this->AuthLogin();
        $coupon = Session::get('coupon');
        if ($coupon == true) {
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa mã khuyến mãi thành công');
        }
    }

    public function insert_coupon()
    {
        $this->AuthLogin();
        return view('admin.coupon.insert_coupon');
    }

    public function delete_coupon($coupon_id)
    {
        $this->AuthLogin();
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }

    public function list_coupon()
    {
        $this->AuthLogin();
        $coupon = Coupon::orderby('coupon_id', 'DESC')->paginate(5);
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y ');
        return view('admin.coupon.list_coupon')->with(compact('coupon', 'today'));
    }

    public function insert_coupon_code(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $numberCoupon = filter_var($request->coupon_number, FILTER_SANITIZE_NUMBER_INT);/*lấy ký tự số*/
        $coupon = new Coupon;
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $numberCoupon; /*$data['coupon_number'];*/
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_start = $data['coupon_start'];
        $coupon->coupon_end = $data['coupon_end'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();
        Session::put('message', 'Thêm mã giảm giá thành công');
        return Redirect::to('insert-coupon');
    }

    public function edit_coupon($coupon_id)
    {
        $this->AuthLogin();
        $edit_coupon = Coupon::where('coupon_id', $coupon_id)->get();
        $manager_coupon = view('admin.coupon.edit_coupon')->with('edit_coupon', $edit_coupon);

        return view('admin_layout')->with('admin.coupon.edit_coupon', $manager_coupon);
    }

    public function update_coupon(Request $request, $coupon_id)
    {
        $this->AuthLogin();
        $data = $request->all();
        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_start = $data['coupon_start'];
        $coupon->coupon_end = $data['coupon_end'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->save();

        Session::put('message', 'Cập nhật mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }
}
