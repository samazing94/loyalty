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
        $customers = Customer::count();
        // dd($customers);
        $smslog = SMS::count();
        $pointoffer = Point::count();
        $newoffer = Point::whereDate('created_at', [Carbon::now()->setTime(0,0)->format('Y-m-d H:i:s')])->get();
        $c_off = count($newoffer);

        $userSession = Auth::user()->id;
        $user = DB::table('shop_info')->select('shop_info.id', 'shop_info.shop_name')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
        ->leftJoin('users', 'users.id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->first();

        $shop_user = DB::table('customerinfo')->select('*')->leftJoin('shop_user', 'shop_user.shop_id', '=', 'customerinfo.shop_id')->where('shop_user.user_id', $userSession)->get();
        $customers_of_shop = count($shop_user);
       // dd($customers_of_shop)
        //check if user is part of merchant
     
        return view('home', compact('customers_of_shop', 'smslog', 'pointoffer', 'c_off'));
    }
    // public function get_datatable()
    // {
    //     return Datatables::collection(User::all())->make(true);
    // }
}
