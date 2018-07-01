<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Carbon\Carbon;
use App\ShopInfo;
use DB;

class ShopsController extends Controller
{
 	
	public function index()
    {
        $title = 'Restaurants';
        $shops = \App\ShopInfo::all();
    	return view('shop/shops', compact('title', 'shops'));
    }

    public function create()
    {
    	$title = "Restaurant Registration";
    	return view('shop/register', compact('title'));
    }

    public function fail()
    {
    	//$title = "Failed Registration";
    	return view('shop/fail');
    }

    public function store(Request $request)
    {
    	// shop_name', 'shop_code', 'shop_manager_name', 'shop_contact', 'address', 'status'
		$shop_name = $request->input('shop_name');
		$shop_code = $request->input('shop_code');
		$shop_manager_name = $request->input('shop_manager_name');
		$shop_contact = $request->input('shop_contact');
		$address = $request->input('address');
		$status = 0;
		$codelen = strlen($shop_code);
		if($codelen < 3)
		{
			$status = 1; 
			$rst = array('shop_name' => $shop_name, 'shop_code' => $shop_code, 'shop_manager_name' => $shop_manager_name,'shop_contact' => $shop_contact ,'address' => $address, 'status' => $status, 'created_by' => 1, 'updated_by' => 2);	
			DB::table('shop_info')->insert($rst);
			return view('shop/success');
		}
		else 
		{
			return redirect()->to('shop/fail');
		}
  	}

    public function update(Request $request)
    {
        $datetime = Carbon::now();
        ShopInfo::where('id', $request->id)->update(['shop_name' => $request->shop_name, 'shop_code' => $request->shop_code, 'shop_manager_name' => $request->shop_manager_name, 'address' => $request->address, 'status' => 1, 'created_by' => 1, 'updated_by' => $request->updated_by]);

        return response()->json(['shop_name' => $request->shop_name, 'shop_code' => $request->shop_code, 'shop_manager_name' => $request->shop_manager_name, 'address' => $request->address, 'status' => 1, 'created_by' => 1, 'updated_by' => $request->updated_by]);
    }
    public function delete(Request $request)
    {
        ShopInfo::where('id', $request->id)->delete();

        return response()->json(['id' => $request->id]);
    }
    // public function __construct()
    // {
    //     $this->middleware('permission:merchant');
    // 	$this->middleware('permission:create', ['only' => ['create', 'store']]);
    // 	$this->middleware('permission:edit', ['only' => ['edit', 'update']]);
    // 	$this->middleware('permission:delete', ['only' => ['show', 'delete']]);
    // }
}
