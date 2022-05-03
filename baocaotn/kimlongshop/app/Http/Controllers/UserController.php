<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Roles;
use App\Admin;
use Carbon\Carbon;
use Mail;
use Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::with('roles')->orderBy('admin_id', 'ASC')->paginate(5);
        return view('admin.staff.all_staff')->with(compact('admin'));
    }

    public function add_staff()
    {
        return view('admin.staff.add_staff');
    }

    public function staff_roles(Request $request)
    {
        /*$data = $request->all();*/
        if (Auth::id() == $request->admin_id) {
            return redirect()->back()->with('message', 'Bạn đang là quyền cao nhất');
        }

        $staff = Admin::where('admin_email', $request['admin_email'])->first();/* só sánh email trong csdl*/
        $staff->roles()->detach(); /*xóa quyền  */
        if ($request['admin_role']) {
            $staff->roles()->attach(Roles::where('name', 'admin')->first());
        }
        if ($request['staff_role']) {
            $staff->roles()->attach(Roles::where('name', 'nhân viên')->first());
        }

        return redirect()->back()->with('message', 'Phân quyền cho nhân viên thành công');
    }

    public function add_user(Request $request)
    {
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        $admin->roles()->attach(Roles::where('name', 'nhân viên')->first());
        Session::put('message', 'Thêm nhân viên thành công');
        return Redirect::to('users');
    }

    public function delete_staff($admin_id)
    {
        if (Auth::id() == $admin_id) {
            return redirect()->back()->with(
                'message',
                'Bạn chỉ được phép xóa nhân viên, bạn không được phép xóa bạn. Vì bạn đang là quyền cao nhất'
            );
        }
        $admin = Admin::find($admin_id);
        if ($admin) {
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message', 'Xóa nhân viên thành công');
    }

    public function forgot_password_staff()
    {
        return view('admin.staff.forgot_password_staff');
    }

    public function address_email_staff(Request $request)
    {
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Đổi mật khẩu đăng nhập cho quản trị viên cửa hàng Điện thoại Kim Long" . ' ' . $today;
        $admin = Admin::where('admin_email', '=', $data['admin_email'])->get();
        foreach ($admin as $key => $ad) {
            $admin_id = $ad->admin_id;
        }
        if ($admin) {
            $count_admin = $admin->count();
            if ($count_admin == 0) {
                return redirect()->back()->with('error', 'Nhân viên chưa đăng ký');
            } else {
                $token_random = Str::random(10);
                $admin = Admin::find($admin_id);
                $admin->admin_reset_password = $token_random;
                $admin->save();

                $to_email = $data['admin_email'];//send to this email
                $link_update_pass = url('/update-password-staff?email=' . $to_email . '&token=' . $token_random);

                $data = array("name" => $title_mail, "body" => $link_update_pass, 'email' => $data['admin_email']);

                Mail::send(
                    'admin.staff.new_password_staff',
                    ['data' => $data],
                    function ($message) use ($title_mail, $data) {
                        $message->to($data['email'])->subject($title_mail);//send this mail with subject
                        $message->from($data['email'], $title_mail);//send from this mail
                    }
                );

                return redirect()->back()->with(
                    'message',
                    'Gửi mail thành công,bạn vui lòng vào email để thay đổi mật khẩu'
                );
            }
        }
    }

    public function update_password_staff()
    {
        return view('admin.staff.password_new_staff');
    }

    public function password_new_staff(Request $request)
    {
        $data = $request->all();
        $token_random = Str::random();
        $admin = Admin::where('admin_email', '=', $data['email'])->where(
            'admin_reset_password',
            '=',
            $data['token']
        )->get();
        $count = $admin->count();
        if ($count > 0) {
            foreach ($admin as $key => $ad) {
                $admin_id = $ad->admin_id;
            }
            $reset = Admin::find($admin_id);
            $reset->admin_password = md5($data['admin_password']);
            $reset->admin_reset_password = $token_random;
            $reset->save();
            return redirect('login-account-staff')->with('message', 'Mật khẩu đã cập nhật mới,vui lòng đăng nhập');
        } else {
            return redirect('forgot-password')->with('error', 'Vui lòng nhập lại email vì link đã quá hạn');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
