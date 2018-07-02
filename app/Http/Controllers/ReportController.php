<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use App\Http\Controllers\Session;
use Redirect;
use Carbon\Carbon;
use App\Customer;
use App\Reedem;
use App\SMS;
use DB;
use Session;

class ReportController extends Controller
{
 	/*customer obj ->	
 		'mobile_number',
		'firstname',
		'lastname',
		'dob',
		'profession',
		'location',

	join table shop redeemed ->
	 	'point_rule_id',
		'shop_id',
		'customerinfo_id',
		'total_amount',
		'point'
	$redeemcst = DB::table('shop_redeemed')->where('customerinfo_id', $customers->id)->first();
		*/
	public function index ()
	{
		//$title = 'Reports';
		return view('/report/index');
	}   
	public function list()
	{
		$customers = \App\Customer::leftJoin('shop_redeemed', 'customerinfo.id', '=', 'shop_redeemed.customerinfo_id')->select('customerinfo.id', 'customerinfo.mobile_number', 'customerinfo.first_name', 'customerinfo.last_name', 'customerinfo.dob', 'customerinfo.profession', 'customerinfo.location', DB::raw('SUM(shop_redeemed.point) as points'))->groupBy('customerinfo.mobile_number')->get();
		// dd($customers);
		
		$title = "List of Customers";
		return view('/report/customer', compact('customers', 'title'));
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

		// $customer = DB::table('customerinfo')->where('id', $cst_id)->first();
		// $customer_redeem = DB::table('shop_redeemed')->where('customerinfo_id', $customer->id)->first();

		$customer = \App\Customer::leftJoin('shop_redeemed', 'customerinfo.id', '=', 'shop_redeemed.customerinfo_id')->select('customerinfo.id', 'customerinfo.mobile_number', 'customerinfo.first_name', 'customerinfo.last_name', 'customerinfo.dob', 'customerinfo.profession', 'customerinfo.location', 'shop_redeemed.point', 'shop_redeemed.total_amount')->where('customerinfo_id', $cst_id)->get();		
		//dd($customer);
		//$title = $customer->first_name . "'s Report";
		//return view('/report/customer/', ['id' => $cst_id], compact('customer', 'customer_redeem'));
		if($customer)
			return view('/report/view', compact('customer'));
		else
		{
			Session::flash('message', "No activty found from this customer");
			return Redirect::back();
		}
	}

		public function __construct(\Maatwebsite\Excel\Excel $excel)
	{
	    $this->excel = $excel;
	}

	public function export()
	{
    	return $this->excel->export(new Export);
	}

}


/*						<div class="form-group">
						
							<label for="mobile_number">Phone No.: </label> {{$cst->mobile_number}}
							</div>
							<div class="form-group">
								<label for="first_name">First Name: {{$cst->first_name}} </label>
							</div>
							<div class="form-group">
								<label for="last_name">Last Name: </label> {{$cst->last_name}}
							</div>
							<div class="form-group">
								<label for="profession">Profession: </label> {{$cst->profession}}
							</div>
							<div class="form-group">
								<label for="location">Location: </label> {{$cst->location}}
							</div>
							<div class="form-group">
								<label for="total_point">Total Points Accumulated: </label> {{$cst->point}}
							</div>
							<div class="form-group">
								<label for="total_amount">Total Amount: </label> {{$cst->total_amount}}
							</div>
						@endforeach
					</div>
					*/