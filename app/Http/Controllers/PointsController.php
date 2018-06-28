<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Carbon\Carbon;
use App\Point;
use App\Customer;
use App\Reedem;
use App\MerchantShop;
use DB;


class PointsController extends Controller
{
	public function index()
	{
		return view('offerlist');
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
		$points = DB::table('point_rule')->where('name', $name)->first();		

		//redeemed_shop
		$redeemcst = DB::table('shop_redeemed')->where('customerinfo_id', $customers->id)->first();
		$dec = ceil($amount/100);
		//$pointamt = DB::table('point_rule')->select('point')->first();
		$pointamt = $points->point;
		$cst_point = 100;
		//merchant
		$merchant = DB::table('merchant_shop')->where('merchant_id', $points->merchant_id)->first();
		if($amount > $points->min_amount && $customers->mobile_number == $mobile_number && $name == $points->name)
		{
			$pointamt = $dec + $points->point;
			$cst_point = $cst_point + $pointamt; //customers always start with 100 point by default via registration;
			// DB::table('point_rule')
			// 	->where('name', $name)
			// 	->update(['point' => $pointamt, 'min_amount' => $points->min_amount]);
				//dd($amount);
			if(!$redeemcst)
			{
				DB::table('shop_redeemed')->insert(['point_rule_id' => $points->id, 'shop_id' => $merchant->shop_id, 'customerinfo_id' => 
					$customers->id, 'total_amount' => $amount, 'point' => $cst_point, 'updated_by' => $points->merchant_id]);

			}
			else
			{
				DB::table('shop_redeemed')->update(['point_rule_id' => $points->id, 'shop_id' => $merchant->shop_id, 'customerinfo_id' => 
					$customers->id, 'total_amount' => $amount, 'point' => $cst_point, 'updated_by' => $points->merchant_id]);
			}
			//$success_msg = "Customer got " + $point;

		}

		$redeemcst = DB::table('shop_redeemed')->where('customerinfo_id', $customers->id)->first();
		return view('calculate', compact('redeemcst', 'customers'));

	}
}
