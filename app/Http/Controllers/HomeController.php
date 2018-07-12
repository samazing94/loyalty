<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use App\Customer;
use App\SMS;
use App\Point;
use DB;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        $userSession = Auth::user()->id;
        //$displayName = 
        $smslog = DB::table('smslog')->select('reply_body')
        ->leftJoin('shop_info', 'shop_info.shop_code', '=', 'smslog.subhotkey')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
        ->where('shop_user.user_id', $userSession)->get();
        $count_smslog = count($smslog);
        
        $pointoffer = DB::table('point_rule')->select('*')
        ->leftJoin('merchants_user', 'merchants_user.merchantsId', '=', 'point_rule.merchant_id')
        ->where('merchants_user.userId', $userSession)->distinct()->get();
        $count_pointoffer = count($pointoffer);

        $newoffers = DB::table('shop_redeemed')->select('*')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_redeemed.shop_id')
        ->where('shop_user.user_id', $userSession)
        ->whereDate('created_at', Carbon::today()->toDateString())->get();
        
        $c_off = count($newoffers);
        $revenue = DB::table('shop_redeemed')->select('*', DB::raw('SUM(shop_redeemed.total_amount) as total_amounts'))
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_redeemed.shop_id')
        ->leftJoin('shop_info', 'shop_info.id', '=', 'shop_redeemed.shop_id')
        ->where('shop_user.user_id', $userSession)
        ->groupBy('shop_redeemed.shop_id')
        ->get();
        //dd($revenue);

        $shops = DB::table('shop_info')->select('*')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
        ->where('shop_user.user_id', $userSession)->get();

        $shop_users = DB::table('customerinfo')->select('*')->leftJoin('shop_user', 'shop_user.shop_id', '=', 'customerinfo.shop_id')->where('shop_user.user_id', $userSession)->get();
        $customers_of_shop = count($shop_users);

        $total_orders = DB::table('shop_redeemed')->select('*', DB::raw('COUNT(shop_redeemed.customerinfo_id) as total_cst'))
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_redeemed.shop_id')
        ->where('shop_user.user_id', $userSession)
        ->groupBy('shop_redeemed.shop_id')
        ->get();
        $count_orders = count($total_orders);
        return view('home', compact('customers_of_shop', 'count_smslog', 'count_pointoffer', 'c_off', 'revenue', 'count_orders', 'userSession'));
    }

}
