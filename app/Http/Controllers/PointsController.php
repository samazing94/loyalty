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
use App\ShopInfo;
use Auth;
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
		$userSession = Auth::user()->id;
		$customers = Customer::all();
		$shops = DB::table('shop_info')->select('shop_info.id', 'shop_info.shop_name')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
        ->leftJoin('users', 'users.id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->get();
        $points = DB::table('point_rule')->select('*')
        ->where('point_rule.merchant_id', $userSession)->get();
		 //$point_x = $points->point;
		 //dd($point_x);
		return view('offers.offerlist', compact('customers', 'points', 'shops'));
	}
	//create offers
	public function create()
	{
		return view('offers.register');
	}
	//create point redeems
	public function createPoints()
	{
		return view('offers.create_points');
	}

	public function storePoints(Request $request)
	{
		$userSession = Auth::user()->id;
		$name = $request->input('name');
		$description = $request->input('description');
		$min_point = $request->input('min_point');
		$amount = $request->input('amount');
		$offer_start = $request->input('offer_start');
		$offer_end = $request->input('offer_end');
		$status = 1; 
		$rst = array('name' => $name, 'description' => $description, 'min_point' => $min_point, 'amount' => $amount ,'offer_start' => 
		$offer_start, 'offer_end' => $offer_end, 'merchant_id' => $userSession);	
		DB::table('point_rule_redeem')->insert($rst);
		Session::flash('message', "Successfully registered new offer");
		return Redirect::back();
  	}

	public function store(Request $request)
	{
		$userSession = Auth::user()->id;
		$name = $request->input('name');
		$description = $request->input('description');
		$min_amount = $request->input('min_amount');
		$point = $request->input('point');
		$offer_start = $request->input('offer_start');
		$offer_end = $request->input('offer_end');
		$status = 1; 
		$rst = array('name' => $name, 'description' => $description, 'min_amount' => $min_amount,'point' => $point ,'offer_start' => 
		$offer_start, 'offer_end' => $offer_end, 'merchant_id' => $userSession);	
		DB::table('point_rule')->insert($rst);
		Session::flash('message', "Successfully registered new offer");
		return Redirect::back();
  	}

  	public function redeem()
  	{
  		$userSession = Auth::user()->id;
		$customers = Customer::all();
		$shops = DB::table('shop_info')->select('shop_info.id', 'shop_info.shop_name')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
        ->leftJoin('users', 'users.id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->get();
        $points = DB::table('point_rule_redeem')->select('*')
        ->where('point_rule_redeem.merchant_id', $userSession)->get();

		return view('offers.redeemprocess', compact('customers', 'points', 'shops'));
  	}

  	public function process_order(Request $request)
  	{
	  	$userSession = Auth::user()->id;
  		$amount = $request->input('amount');
  		$id = $request->input('name');
  		$points = DB::table('point_rule')->where('id', $id)->whereRaw('SYSDATE() BETWEEN offer_start AND offer_end')->orderBy('id', 'desc')->first();
  		$mobile_number = $request->input('mobile_number');
  		$customer = DB::table('customerinfo')->where('mobile_number', $mobile_number)->first();
  		$customerinfo = \App\Customer::leftJoin('shop_redeemed', 'shop_redeemed.id', '=', 'shop_redeemed.customerinfo_id')->select('customerinfo.id', 'customerinfo.mobile_number', 'customerinfo.first_name', 'customerinfo.last_name', 'customerinfo.dob', 'customerinfo.profession', 'customerinfo.location', DB::raw('SUM(shop_redeemed.point) as points'))->first();
  		if ($points)
		{
			$min_amt = $points->min_amount; //gets min amount
			$dec = ceil($amount/$points->min_amount); //amount/min amount to get initial set of points
			$saved_amount = ($customerinfo->points / $dec) * $points->point; //calculte customer's accumulated points divided by dec with offer's base points
			$pointamt = $amount; //store amount in a separate var to avoid overwriting

			$radio = $request->get('radion_button', 0);
				if($radio == 'yes')
				{
					$pointamt = $amount - $saved_amount;
			  	}
				else
				{
					$pointamt = $amount - 0;
				} 

			DB::table('point_rule_redeem')->insert(['id' => $points->id, 'name' => $points->name, 'description' => 
					$points->description, 'min_point' => $points->point, 'amount' => $pointamt, 'offer_start' => $points->offer_start, 'offer_end' => $points->offer_end, 'merchant_id' => $userSession]);

			$pointarr = array(	
   				"name" => $points->name,
   				"mobile_number" => $customer->mobile_number,
    			"points" => $customerinfo->points,
    			"amount" => $amount,
    			"saved_amount" => (float)$saved_amount,
			);
			echo json_encode($pointarr);
		}
  	}
	public function calculate(Request $request)
	{
		//point rule and customer
		$amount = $request->input('amount');
		$id = $request->input('name1');
		$mobile_number = $request->input('mobile_number');
		//customerinfo
		$customers = DB::table('customerinfo')->where('mobile_number', $mobile_number)->first();
		$userSession = Auth::user()->id;
		//point_rule

		$points = DB::table('point_rule')->where('id', $id)->whereRaw('SYSDATE() BETWEEN offer_start AND offer_end')->first();
		
		if ($points->min_amount != NULL)
		{
			$dec = ceil($amount/$points->min_amount);

			$pointamt = $points->point;
			$merchant = DB::table('merchant_shop')->select('merchant_shop.merchant_id', 'merchant_shop.shop_id')
        		->leftJoin('shop_user', 'shop_user.shop_id', '=', 'merchant_shop.shop_id')
        		->leftJoin('users', 'users.id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->first();
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
				$fields = Input::get('action');
					if($fields == 'yes')
					{
						$amount = $amount - $pointamt;			 		
				  	}
					else
					{
						$amount = $amount - 0;
					} 

				DB::table('shop_redeemed')->insert(['point_rule_id' => $points->id, 'shop_id' => $merchant->shop_id, 'customerinfo_id' => 
					$customers->id, 'total_amount' => $amount, 'point' => $pointamt, 'updated_by' => $userSession]);
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
