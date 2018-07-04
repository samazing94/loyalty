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
	public function view()
	{
		$orders = Point::all();
		return view('offers.list', compact('orders'));
	}

	public function index()
	{
		$customers = Customer::all();
		$points = Point::all();
		return view('offers.offerlist', compact('customers', 'points'));
	}

	public function create()
	{
		return view('offers.register');
	}

	public function store(Request $request)
	{
		$merchant = DB::table('merchant_shop')->where('merchant_id', $request->merchant_id)->first();
		$name = $request->input('name');
		$description = $request->input('description');
		$min_amount = $request->input('min_amount');
		$point = $request->input('point');
		$offer_start = $request->input('offer_start');
		$offer_end = $request->input('offer_end');
		$merchant_id = $request->input('merchant_id');
		if(!$merchant)
		{
			Session::flash('message', "Merchant doesn't exist");
			return Redirect::back();
		}
		else
		{
			$status = 1; 
			$rst = array('name' => $name, 'description' => $description, 'min_amount' => $min_amount,'point' => $point ,'offer_start' => 
			$offer_start, 'offer_end' => $offer_end, 'merchant_id' => $merchant_id);	
			DB::table('point_rule')->insert($rst);
			Session::flash('message', "Successfully registered new offer");
			return Redirect::back();
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
		$points = DB::table('point_rule')->where('name', $name)->whereRaw('SYSDATE() BETWEEN offer_start AND offer_end')->first();		

		if ($points->min_amount != NULL)
		{
			$dec = ceil($amount/$points->min_amount);

			$pointamt = $points->point;
			//$cst_point = 100;
			//merchant
			$merchant = DB::table('merchant_shop')->where('merchant_id', $points->merchant_id)->first();
			if(!$merchant)
			{
				Session::flash('message', "Merchant doesn't exist");
				return Redirect::back();
			}
			if(!$customers)
			{
				Session::flash('message', "Customer not registered");
				return Redirect::back();
			}
			else {	
				
				$cs_id = $customers->id;
				$pointamt = $dec + $points->point;

				DB::table('shop_redeemed')->insert(['point_rule_id' => $points->id, 'shop_id' => $merchant->shop_id, 'customerinfo_id' => 
					$customers->id, 'total_amount' => $amount, 'point' => $pointamt, 'updated_by' => $points->merchant_id]);
				//$redeemcst = DB::table('shop_redeemed')->select('total_amount', 'point')->where('customerinfo_id', $customers->id)->first();
			}
			
			$redeemcst = DB::table('shop_redeemed')->where('customerinfo_id', $customers->id)->orderBy('id', 'desc')->first();

			return view('calculate', compact('customers', 'redeemcst'));
		}
		else
		{
			Session::flash('message', "Something went wrong");
			return Redirect::back();
		}
	}
	public function update(Request $request)
	{
        Point::where('id', $request->id)->update(['name' => $request->name, 'min_amount' => $request->min_amount, 'point' => $request->point, 'merchant_id' => $request->merchant_id, 'offer_start' => $request->offer_start, 'offer_end' => $request->offer_end]);

        return response()->json(['name' => $request->name, 'min_amount' => $request->min_amount, 'point' => $request->point, 'merchant_id' => $request->merchant_id,  'offer_start' => $request->offer_start, 'offer_end' => $request->offer_end]);
	}

	public function delete(Request $request)
	{
		Point::where('id', $request->id)->delete();

        return response()->json(['id' => $request->id]);
	}
}
