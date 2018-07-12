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
	
	///order section
	public function view_new()
	{
		//$orders = Point::all();
		$userSession = Auth::user()->id;
	
		$newoffers = DB::table('shop_redeemed')->select('*')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_redeemed.shop_id')
        ->leftJoin('shop_info', 'shop_info.id', '=', 'shop_user.shop_id')
        ->leftJoin('customerinfo', 'customerinfo.id', '=', 'shop_redeemed.customerinfo_id')
        ->where('shop_user.user_id', $userSession)
        ->whereDate('shop_redeemed.created_at', Carbon::now()->toDateString())->get();
        
		return view('orders.new_list', compact('newoffers'));
	}

	public function total_orders()
	{
		$userSession = Auth::user()->id;
		$total_orders = DB::table('shop_redeemed')->select('*', DB::raw('COUNT(shop_redeemed.customerinfo_id) as total_cst'))
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_redeemed.shop_id')
        ->leftJoin('shop_info', 'shop_info.id', '=', 'shop_user.shop_id')
        ->where('shop_user.user_id', $userSession)
        ->groupBy('shop_redeemed.shop_id')
        ->get();
		return view('orders.total_order', compact('total_orders'));
	}

	//offers
	public function view()
	{
		$userSession = Auth::user()->id;
		$merchantuser = DB::table('merchants_user')->select('*')->where('userId', $userSession)->first();
		$orders = Point::where('merchant_id', $merchantuser->merchantsId)->get();
		return view('offers.list', compact('orders'));
	}

	public function index()
	{
		$userSession = Auth::user()->id;
		$customers = Customer::all();
		$shops = DB::table('shop_info')->select('shop_info.id', 'shop_info.shop_name')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
        ->leftJoin('users', 'users.id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->get();
		$merchantuser = DB::table('merchants_user')->select('*')->where('userId', $userSession)->first();
		$points = DB::table('point_rule')->select('*')
		->where('point_rule.merchant_id', $merchantuser->merchantsId)->get();
		//dd($points);
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

  // 	public function redeem()
  // 	{
  // 		$userSession = Auth::user()->id;
		// $customers = Customer::all();
		// $shops = DB::table('shop_info')->select('shop_info.id', 'shop_info.shop_name')
  //       ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
  //       ->leftJoin('users', 'users.id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->get();
  //       $points = DB::table('point_rule_redeem')->select('*')
  //       ->where('point_rule_redeem.merchant_id', $userSession)->get();

		// return view('offers.redeemprocess', compact('customers', 'points', 'shops'));
  // 	}

  	public function process_order(Request $request)
  	{
	  	$userSession = Auth::user()->id;
  		$amount = $request->input('amount');
  		$id = $request->input('name');
  		$points = DB::table('point_rule')->where('id', $id)->whereRaw('SYSDATE() BETWEEN offer_start AND offer_end')->orderBy('id', 'desc')->first();

  		$mobile_number = $request->input('mobile_number');
  		$customer = DB::table('customerinfo')->where('mobile_number', $mobile_number)->first();
		if(!($customer)) {
			$pointarr = array(	
				"name" => NULL,
				"mobile_number" => 0,
				"points" => 0,
				"amount" => 0,
				"saved_amount" => 0,
				"status" => 0
			);
			echo json_encode($pointarr);
		}
		else if (!$points)
		{
			$pointarr = array(	
   				"name" => 0,
   				"mobile_number" => $customer->mobile_number,
    			"points" => 0,
    			"amount" => 0,
    			"saved_amount" => 0,
				"status" => "Offer Expired"
			);
			echo json_encode($pointarr);
		}
		else
		{	
			$point_redeem = DB::table('point_rule_redeem')->whereRaw('SYSDATE() BETWEEN offer_start AND offer_end')->orderBy('id', 'desc')->first();
			$min_point = $point_redeem->min_point;
			$min_amount = $point_redeem->amount;

			$customerinfo = DB::table('shop_redeemed')->select('shop_redeemed.point', 'shop_redeemed.total_amount', DB::raw('SUM(shop_redeemed.point) as points'))->where('shop_redeemed.customerinfo_id', $customer->id)->first();
			$saved_amount = ceil($min_amount/$min_point)*$customerinfo->points;  

			$pointarr = array(	
   				"name" => $points->name,
   				"mobile_number" => $customer->mobile_number,
    			"points" => $customerinfo->points,
    			"amount" => $amount,
    			"saved_amount" => (float)$saved_amount,
    			"status" => 0
			);
			echo json_encode($pointarr);
		}
  	}
	public function calculate(Request $request)
	{

		//point rule and customer
		$amount = $request->input('amount');
		$id = $request->input('name1');

		$shop_id = $request->input('name');
		//dd($shop_id);
		$mobile_number = $request->input('mobile_number');
		//customerinfo
		$customers = DB::table('customerinfo')->where('mobile_number', $mobile_number)->first();
		$customerinfo = DB::table('shop_redeemed')->select('shop_redeemed.point', 'shop_redeemed.total_amount', DB::raw('SUM(shop_redeemed.point) as points'))->where('shop_redeemed.customerinfo_id', $customers->id)->first();
	
		$userSession = Auth::user()->id;
		//point_rule
		//dd($customerinfo->points);
		$points = DB::table('point_rule')->where('id', $id)->whereRaw('SYSDATE() BETWEEN offer_start AND offer_end')->first();
		$min_point = $points->point;
		
		$min_amount = $points->min_amount;
		$saved_amount = ceil($min_amount/$min_point)*$customerinfo->points;  

		if ($points->min_amount != NULL)
		{
			$dec = ceil($amount/$points->min_amount);

			$pointamt = $points->point;
			
			if(!$customers)
			{
				Session::flash('message', "Customer not registered");
				return Redirect::back();
			}
			else {	
				$cs_id = $customers->id;
				$fields = $request->input('action');
					if($fields == 'yes')
					{
						$newamount = $amount - $saved_amount; 		
						if($amount < $saved_amount) 
							$newamount = 0;
				  	}
					else
					{
						$newamount = $amount - 0;
					} 
					$pointamt = $dec * $points->point;
				DB::table('shop_redeemed')->insert(['point_rule_id' => $points->id, 'shop_id' => $shop_id, 'customerinfo_id' => 
					$customers->id, 'total_amount' => $newamount, 'point' => $pointamt, 'updated_by' => $userSession]);
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
