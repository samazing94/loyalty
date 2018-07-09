<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Carbon\Carbon;
use Auth;
use App\ShopInfo;
use Session;
use DB;


class ShopsController extends Controller
{
 	
	public function index()
    {
        $title = 'Restaurants';
        //$shops = \App\ShopInfo::all();
        $userSession = Auth::user()->id;
        $shops = DB::table('shops_info')->select('shop_info.id', 'shop_info.shop_name')
        ->leftJoin('merchant_shop', 'merchant_shop.shop_id', '=', 'shop_info.id')
        ->where('merchant_shop.user_id',  $userSession);
    	return view('shop.shops', compact('title', 'shops'));
    }

    public function create()
    {
    	$title = "Restaurant Registration";
    	return view('shop.register', compact('title'));
    }

    public function fail()
    {
    	return view('shop.fail');
    }

    // public function offer_list(Request $request)
    // {
    //     $userSession = Auth::user()->id;
    //     $shops = DB::table('shops_info')->select('shop_info.id', 'shop_info.shop_name')
    //     ->leftJoin('merchant_shop', 'merchant_shop.shop_id', '=', 'shop_info.id')
    //     ->where('merchant_shop.user_id',  $userSession);
    //     // ->leftJoin('merchant_shop', 'merchant_shop.merchant_id', '=', 'point_rule.merchant_id')
    //     // ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->first();

    //     // $offers = DB::table('point_rule')->select('point_rule.name','point_rule.offer_start', 'point_rule.offer_end', 'point_rule.merchant_id')
    //     // ->leftJoin('merchant_shop', 'merchant_shop.merchant_id', '=', 'point_rule.merchant_id')
    //     // ->where('merchant_shop.shop_id', $shop->id)->first();
        
    //     // $shops = DB::table('shops_')->select('point_rule.name','point_rule.offer_start', 'point_rule.offer_end', 'point_rule.merchant_id')
    //     // ->leftJoin('merchant_shop', 'merchant_shop.merchant_id', '=', 'point_rule.merchant_id')
    //     // ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->first();

    //     dd($shops);
    //     return view('shop.shoplist', compact('shops'));
    // }

    public function store(Request $request)
    {
        $userSession = Auth::user()->id;
		$shop_name = $request->input('shop_name');
		$shop_code = $request->input('shop_code');
		$shop_manager_name = $request->input('shop_manager_name');
		$shop_contact = $request->input('shop_contact');
		$address = $request->input('address');
		$status = 0;
        $this->validate(request(), [
             'shop_contact' => 
             array(
               'required',
               'regex:/^(?:\+88|01)?(?:\d{11}|\d{13})$/',
            )
        ]);
		$codelen = strlen($shop_code);
		if($codelen < 3)
		{
            $shopcheck = DB::table('shop_info')->where('shop_name', $shop_name)->first();
            if($shopcheck)
            {
                $status = 0;
                Session::flash('message', "Can't register, restaurant exists in the Loyalty System");
                return Redirect::back();
            }
			$status = 1;
            $rst = array('shop_name' => $shop_name, 'shop_code' => $shop_code, 'shop_manager_name' => $shop_manager_name,'shop_contact' => $shop_contact ,'address' => $address, 'status' => $status, 'created_by' => $userSession, 'updated_by' => $userSession);
            DB::table('shop_info')->insert($rst);
            $shop_id = DB::getPdo()->lastInsertId();
            $rst_user = array('shop_id'=> $shop_id, 'user_id' => $userSession);
            DB::table('shop_user')->insert($rst_user);
            //shop_user insert
			Session::flash('message', "Restaurant has been successfully registered");
            return Redirect::back();
		}
		else 
		{
			Session::flash('message', "Can't register restaurant. Format is wrong");
            return Redirect::back();
		}
  	}
    public function update(Request $request)
    {
        $datetime = Carbon::now();
        DB::table('shop_info')->where('id', $request->id)->update(['shop_name' => $request->shop_name, 'shop_code' => $request->shop_code, 'shop_manager_name' => $request->shop_manager_name, 'shop_contact' => $request->shop_contact,'address' => $request->address, 'status' => 1, 'created_by' => 1, 'updated_by' => $request->updated_by]);
        return response()->json(['shop_name' => $request->shop_name, 'shop_code' => $request->shop_code, 'shop_manager_name' => $request->shop_manager_name, 'address' => $request->address, 'status' => 1, 'created_by' => 1, 'updated_by' => $request->updated_by]);
    }
    
    public function delete(Request $request)
    {
        ShopInfo::where('id', $request->id)->delete();

        return response()->json(['id' => $request->id]);
    }
}
