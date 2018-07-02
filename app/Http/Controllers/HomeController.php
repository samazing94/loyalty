<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use App\Customer;
use App\SMS;
use App\Point;
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
        return view('home', compact('customers', 'smslog', 'pointoffer', 'c_off'));       
    }
    // public function get_datatable()
    // {
    //     return Datatables::collection(User::all())->make(true);
    // }
}
