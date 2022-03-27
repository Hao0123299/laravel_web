<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Social;
use Socialite;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Statistical;
use App\Access;
use Carbon\Carbon;

class StatisticalController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    /*thống kê doanh số*/
    public function statistics_date(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all(); /*lấy tất cả dữ liệu gửi qua bang ajax*/
        $date_from = $data['date_from'];
        $date_to = $data['date_to'];
        /*whereBetween: tìm kiếm từ ....dến.., whereBetween là chuỗi*/
        $date = Statistical::whereBetween('order_date', [ $date_from, $date_to])->orderBy('order_date', 'ASC')->get();
        foreach ($date as $key => $value)
        {
            $chart_data[] =array(

                'period' => $value->order_date, /*khoảng thời gian */
                'order' => $value->total_order, /*tông đòn*/
                'sales' => $value->sales,/*doanh số*/
                'profit' => $value->profit, /*lợi nhuận*/
                'quantity' => $value->quantity /*soosl ượng đã bán*/
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function filter_by_time(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all(); /*lấy tất cả dữ liệu gửi qua bang ajax*/
        $this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString(); /*trong tháng*/
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        /*subMonth trừ 1 tháng, startOfMonth ngày đầu tháng*/
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        /*subMonth trừ 1 tháng, endOfMonth ngày cuối tháng*/

        $sub7ngay = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($data['filter_by_time'] == '7ngay')
        {
            $date = Statistical::whereBetween('order_date', [ $sub7ngay, $now])->orderBy('order_date', 'ASC')->get();
        }
        elseif ($data['filter_by_time'] == 'thangnay')
        {
            $date = Statistical::whereBetween('order_date', [ $this_month, $now])->orderBy('order_date', 'ASC')->get();
        }
        else
        {
            $date = Statistical::whereBetween('order_date', [ $early_last_month, $end_of_last_month])->orderBy('order_date', 'ASC')->get();
        }

        foreach ($date as $key => $value)
        {
            $chart_data[] =array(

                'period' => $value->order_date, /*khoảng thời gian */
                'order' => $value->total_order, /*tông đòn*/
                'sales' => $value->sales,/*doanh số*/
                'profit' => $value->profit, /*lợi nhuận*/
                'quantity' => $value->quantity /*soosl ượng đã bán*/
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function statistics_oder(Request $request)
    {
        $this->AuthLogin();
        $sub30ngay = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $date = Statistical::whereBetween('order_date', [ $sub30ngay, $now])->orderBy('order_date', 'ASC')->get();
        foreach ($date as $key => $value)
        {
            $chart_data[] =array(

                'period' => $value->order_date, /*khoảng thời gian */
                'order' => $value->total_order, /*tông đòn*/
                'sales' => $value->sales,/*doanh số*/
                'profit' => $value->profit, /*lợi nhuận*/
                'quantity' => $value->quantity /*soosl ượng đã bán*/
            );
        }
        echo $data = json_encode($chart_data);
    }

    /*thống kê truy cập*/
}
