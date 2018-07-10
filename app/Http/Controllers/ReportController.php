<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Carbon\Carbon;
use App\Customer;
use App\Reedem;
use App\SMS;
use Auth;
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
		$userSession = Auth::user()->id;
		$customers = \App\Customer::leftJoin('shop_redeemed', 'shop_redeemed.customerinfo_id' , '=','customerinfo.id')
		->leftJoin('shop_user', 'shop_user.shop_id', 'shop_redeemed.shop_id')
		->select('customerinfo.id', 'customerinfo.mobile_number', 'customerinfo.first_name', 'customerinfo.last_name', 'customerinfo.dob', 'customerinfo.profession', 'customerinfo.location', DB::raw('SUM(shop_redeemed.point) as points'))
		->where('shop_user.user_id', $userSession )
		->groupBy('customerinfo.mobile_number')->get();
		$title = "List of Customers";
		return view('report.customer', compact('customers', 'title'));
	}

		public function smslist()
	{
		$userSession = Auth::user()->id;
		$smslog = DB::table('smslog')->select('smslog.id', 'smslog.hotkey', 'smslog.subhotkey', 'smslog.sms_body', 'smslog.reply_body', 'smslog.status', 'smslog.msisdn', 'smslog.created_at')
        ->leftJoin('shop_info', 'shop_info.shop_code', '=', 'smslog.subhotkey')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
        ->where('shop_user.user_id', $userSession)->get();
		$status = NULL;
		$title = "SMS Logs";
		return view('/report/sms', compact('smslog', 'title'));
	}

	public function cst_report($cst_id)
	{

		//return view('/report/view', compact('customer'));

		$customer = \App\Customer::leftJoin('shop_redeemed', 'customerinfo.id', '=', 'shop_redeemed.customerinfo_id')->select('customerinfo.id', 'customerinfo.mobile_number', 'customerinfo.first_name', 'customerinfo.last_name', 'customerinfo.dob', 'customerinfo.profession', 'customerinfo.location', 'shop_redeemed.point', 'shop_redeemed.total_amount')->where('customerinfo_id', $cst_id)->get();
		if($customer)
			return view('/report/view', compact('customer'));
		else
		{
			Session::flash('message', "No activty found from this customer");
			return Redirect::back();
		}
	}

}