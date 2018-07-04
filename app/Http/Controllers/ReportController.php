<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Carbon\Carbon;
use App\Customer;
use App\Reedem;
use App\SMS;
use DB;
use Session;

class ReportController extends Controller
{
	public function index()
	{
		//$title = 'Reports';
		return view('report.index');
	}   
	public function list2()
	{
		$customers = \App\Customer::leftJoin('shop_redeemed', 'customerinfo.id', '=', 'shop_redeemed.customerinfo_id')->select('customerinfo.id', 'customerinfo.mobile_number', 'customerinfo.first_name', 'customerinfo.last_name', 'customerinfo.dob', 'customerinfo.profession', 'customerinfo.location', DB::raw('SUM(shop_redeemed.point) as points'))->groupBy('customerinfo.mobile_number')->get();
		$title = "List of Customers";
		return view('report.customer', compact('customers', 'title'));
	}

		public function smslist()
	{
		$smslog = \App\SMS::all();
		$status = NULL;
		$title = "SMS Logs";
		return view('/report/sms', compact('smslog', 'title'));
	}

	public function cst_report($cst_id)
	{
		$customer = \App\Customer::leftJoin('shop_redeemed', 'customerinfo.id', '=', 'shop_redeemed.customerinfo_id')->select('customerinfo.id', 'customerinfo.mobile_number', 'customerinfo.first_name', 'customerinfo.last_name', 'customerinfo.dob', 'customerinfo.profession', 'customerinfo.location', 'shop_redeemed.point', 'shop_redeemed.total_amount')->where('customerinfo_id', $cst_id)->get();
		// print_r($customer);	
		exit;
		if($customer)
			return view('/report/view', compact('customer'));
		else
		{
			Session::flash('message', "No activty found from this customer");
			return Redirect::back();
		}
	}

}