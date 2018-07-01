<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use App\Http\Controllers\Session;
use Redirect;
use Carbon\Carbon;
use App\Point;
use App\Customer;
use App\Reedem;
use App\MerchantShop;
use DB;
use Session;


class PointsController extends Controller
{
	public function index()
	{
		return view('offers/offerlist');
	}

	public function create()
	{
		return view('offers/register');
	}

	public function store()
	{

		$merchant = DB::table('merchant_shop')->where('merchant_id', $merchant_id)->first();
		$name = $request->input('name');
		$description = $request->input('description');
		$min_amount = $request->input('min_amount');
		$point = $request->input('point');
		$offer_start = $request->input('offer_start');
		$offer_end = $request->input('offer_end');
		$merchant_id = $request->input('merchant_id');
		if($merchant->merchant_id == $merchant_id)
		{
			$status = 1; 
			$rst = array('name' => $name, 'description' => $description, 'min_amount' => $min_amount,'point' => $point ,'offer_start' => $offer_start, 'offer_end' => $offer_end, 'merchant_id' => $merchant_id);	
			DB::table('point_rule')->insert($rst);
			return view('offers/success');
		}
		else 
		{
			return redirect()->to('offers/fail');
		}
  	}


	public function calculate(Request $request)
	{
		//point rule and customer
		$amount = $request->input('amount');
		$name = $request->input('name');
		$mobile_number = $request->input('mobile_number');

		//customerinfo
		$customers = DB::table('customerinfo')->where('mobile_number', $mobile_number)->first();		
		
		//point_rule
		$points = DB::table('point_rule')->where('name', $name)
		->whereRaw('SYSDATE() BETWEEN offer_start AND offer_end')->first();		

		//redeemed_shop
		//$redeemcst = DB::table('shop_redeemed')->where('customerinfo_id', $customers->id)->first();
		
		$dec = ceil($amount/$points->min_amount);
		//$pointamt = DB::table('point_rule')->select('point')->first();
		$pointamt = $points->point;
		//$cst_point = 100;
		//merchant
		$merchant = DB::table('merchant_shop')->where('merchant_id', $points->merchant_id)->first();
		if($customers)
		{
			$pointamt = $dec + $points->point;
			//$cst_point = $cst_point + $pointamt; //customers always start with 100 point by default via registration;
			// DB::table('point_rule')
			// 	->where('name', $name)
			// 	->update(['point' => $pointamt, 'min_amount' => $points->min_amount]);
				//dd($amount);
			// if(!$redeemcst)
			// {
				DB::table('shop_redeemed')->insert(['point_rule_id' => $points->id, 'shop_id' => $merchant->shop_id, 'customerinfo_id' => 
					$customers->id, 'total_amount' => $amount, 'point' => $pointamt, 'updated_by' => $points->merchant_id]);

			// }
			// else
			// {
		// 		DB::table('shop_redeemed')->update(['point_rule_id' => $points->id, 'shop_id' => $merchant->shop_id, 'customerinfo_id' => 
		// 			$customers->id, 'total_amount' => $amount, 'point' => $cst_point, 'updated_by' => $points->merchant_id]);
		// /	}
			//$success_msg = "Customer got " + $point;

		}
		else {
			Session::flash('message', "Customer not registered");
			return Redirect::back();

			//return redirect()->to('/offers/offerlist');
		}

		$redeemcst = DB::table('shop_redeemed')->where('customerinfo_id', $customers->id)->first();
		return view('calculate', compact('redeemcst', 'customers'));

	}
// 	public function __construct()
// 	{
//    		$this->middleware('permission:create', ['only' => ['create', 'store']]);     
// 	}
}
