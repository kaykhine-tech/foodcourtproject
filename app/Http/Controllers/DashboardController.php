<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Order;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function dashboard_data(Request $request)
    {
        // Today Orders
        $today_orders = DB::table('orders')
                        ->where('order_date', Carbon::now()->toDateString('Y-m-d'))
                        ->where('status','!=',2)
                        ->get();
        $today_order_count = count($today_orders);

        // $today_income = DB::table('orders')
        //                 ->where('order_date', Carbon::now()->toDateString('Y-m-d'))
        //                 ->sum('total');

        // Customer Count
        $customer_count = User::role('customer')->count();

        $category_count = Category::all()->count();

        // Item Count
        $item_count = Item::all()->count();

        // Monthly Sales
        $jan_first = strtotime('first day of january');
        $jan_last = strtotime('last day of january');
        $jan_start = date('Y-m-d', $jan_first);
        $jan_end = date('Y-m-d', $jan_last);
        $jan_sales = DB::table('orders')
                    ->whereBetween('order_date', [$jan_start,$jan_end])
                    ->get();
        $jan_sum = 0;
        foreach($jan_sales as $key){
            $jan_sum += $key->total;
        }

        $feb_first = strtotime('first day of february');
        $feb_last = strtotime('last day of february');
        $feb_start = date('Y-m-d', $feb_first);
        $feb_end = date('Y-m-d', $feb_last);
        $feb_sales = DB::table('orders')
                    ->whereBetween('order_date', [$feb_start,$feb_end])
                    ->get();
        $feb_sum = 0;
        foreach($feb_sales as $key){
            $feb_sum += $key->total;
        }

        $mar_first = strtotime('first day of march');
        $mar_last = strtotime('last day of march');
        $mar_start = date('Y-m-d', $mar_first);
        $mar_end = date('Y-m-d', $mar_last);
        $mar_sales = DB::table('orders')
                    ->whereBetween('order_date', [$mar_start,$mar_end])
                    ->get();
        $mar_sum = 0;
        foreach($mar_sales as $key){
            $mar_sum += $key->total;
        }

        $apr_first = strtotime('first day of april');
        $apr_last = strtotime('last day of april');
        $apr_start = date('Y-m-d', $apr_first);
        $apr_end = date('Y-m-d', $apr_last);
        $apr_sales = DB::table('orders')
                    ->whereBetween('order_date', [$apr_start,$apr_end])
                    ->get();
        $apr_sum = 0;
        foreach($apr_sales as $key){
            $apr_sum += $key->total;
        }

        $may_first = strtotime('first day of may');
        $may_last = strtotime('last day of may');
        $may_start = date('Y-m-d', $may_first);
        $may_end = date('Y-m-d', $may_last);
        $may_sales = DB::table('orders')
                    ->whereBetween('order_date', [$may_start,$may_end])
                    ->get();
        $may_sum = 0;
        foreach($may_sales as $key){
            $may_sum += $key->total;
        }

        $jun_first = strtotime('first day of june');
        $jun_last = strtotime('last day of june');
        $jun_start = date('Y-m-d', $jun_first);
        $jun_end = date('Y-m-d', $jun_last);
        $jun_sales = DB::table('orders')
                    ->whereBetween('order_date', [$jun_start,$jun_end])
                    ->get();
        $jun_sum = 0;
        foreach($jun_sales as $key){
            $jun_sum += $key->total;
        }

        $jul_first = strtotime('first day of july');
        $jul_last = strtotime('last day of july');
        $jul_start = date('Y-m-d', $jul_first);
        $jul_end = date('Y-m-d', $jul_last);
        $jul_sales = DB::table('orders')
                    ->whereBetween('order_date', [$jul_start,$jul_end])
                    ->get();
        $jul_sum = 0;
        foreach($jul_sales as $key){
            $jul_sum += $key->total;
        }

        $aug_first = strtotime('first day of August');
        $aug_last = strtotime('last day of August');
        $aug_start = date('Y-m-d', $aug_first);
        $aug_end = date('Y-m-d', $aug_last);
        $aug_sales = DB::table('orders')
                    ->whereBetween('order_date', [$aug_start,$aug_end])
                    ->get();
        $aug_sum = 0;
        foreach($aug_sales as $key){
            $aug_sum += $key->total;
        }

        $sep_first = strtotime('first day of september');
        $sep_last = strtotime('last day of september');
        $sep_start = date('Y-m-d', $sep_first);
        $sep_end = date('Y-m-d', $sep_last);
        $sep_sales = DB::table('orders')
                    ->whereBetween('order_date', [$sep_start,$sep_end])
                    ->get();
        $sep_sum = 0;
        foreach($sep_sales as $key){
            $sep_sum += $key->total;
        }

        $oct_first = strtotime('first day of october');
        $oct_last = strtotime('last day of october');
        $oct_start = date('Y-m-d', $oct_first);
        $oct_end = date('Y-m-d', $oct_last);
        $oct_sales = DB::table('orders')
                    ->whereBetween('order_date', [$oct_start,$oct_end])
                    ->get();
        $oct_sum = 0;
        foreach($oct_sales as $key){
            $oct_sum += $key->total;
        }

        $nov_first = strtotime('first day of november');
        $nov_last = strtotime('last day of november');
        $nov_start = date('Y-m-d', $nov_first);
        $nov_end = date('Y-m-d', $nov_last);
        $nov_sales = DB::table('orders')
                    ->whereBetween('order_date', [$nov_start,$nov_end])
                    ->get();
        $nov_sum = 0;
        foreach($nov_sales as $key){
            $nov_sum += $key->total;
        }

        $dec_first = strtotime('first day of december');
        $dec_last = strtotime('last day of december');
        $dec_start = date('Y-m-d', $dec_first);
        $dec_end = date('Y-m-d', $dec_last);
        $dec_sales = DB::table('orders')
                    ->whereBetween('order_date', [$dec_start,$dec_end])
                    ->get();
        $dec_sum = 0;
        foreach($dec_sales as $key){
            $dec_sum += $key->total;
        }

        $monthly_sale = array($jan_sum,$feb_sum,$mar_sum,$apr_sum,$may_sum,$jul_sum,$jul_sum,$aug_sum,$sep_sum,$oct_sum,$nov_sum,$dec_sum);

        // Log::info($monthly_sale);

        return view('admin.dashboard.index',compact('today_order_count','customer_count','category_count','item_count','monthly_sale'));
    }
}
