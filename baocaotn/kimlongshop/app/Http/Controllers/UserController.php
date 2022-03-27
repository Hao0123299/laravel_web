<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Roles;
use App\Admin;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::with('roles')->orderBy('admin_id','ASC')->paginate(5);
        return view('admin.staff.all_staff')->with(compact('admin'));
    }
    public function add_users(){
        return view('admin.users.add_users');
    }
    public function staff_roles(Request $request){
        /*$data = $request->all();*/
        if(Auth::id()==$request->admin_id)
        {
            return redirect()->back()->with('message','Bạn đang là quyền cao nhất');
        }

        $staff = Admin::where('admin_email',$request['admin_email'])->first();/* só sánh email trong csdl*/
        $staff->roles()->detach(); /*xóa quyền  */
        if($request['admin_role']){
           $staff->roles()->attach(Roles::where('name','admin')->first());
        }
        if($request['staff_role']){
           $staff->roles()->attach(Roles::where('name','nhân viên')->first());
        }

        return redirect()->back()->with('message','Phân quyền cho nhân viên thành công');
    }
    public function add_staff(Request $request){
        /*$data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);

        $admin->save();
        $admin->roles()->attach(Roles::where('name','user')->first());
        Session::put('message','Thêm nhân viên thành công');
        return Redirect::to('users');*/
    }
    public function delete_staff($admin_id)
    {
        if(Auth::id()==$admin_id)
        {
            return redirect()->back()->with('message','Bạn chỉ được phép xóa nhân viên, bạn không được phép xóa bạn. Vì bạn đang là quyền cao nhất');
        }
        $admin = Admin::find($admin_id);
        if($admin)
        {
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message','Xóa nhân viên thành công');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
