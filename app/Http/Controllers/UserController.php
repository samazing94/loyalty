<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades;
use Response;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{

	public function index(){

		return view('home');	
	}
	public function userprofile(){

		$user = User::all();
		//dd($user);
		return view('users/userprofile', compact('users'));
	}

	public function update(Request $request) {
		$datetime = Carbon::now();
		$status = NULL;
		if($request->status == 'Active')
		{
			$status = 1;
		}
		else 
			$status = 0;

		User::where('id', $request->id)->update(['name' => $request->name, 'email' => $request->email, 'status' => $status, 'created_by' => 1, 'updated_by' => 1, 'updated_at' => $datetime]);

		return response()->json(['id' => $request->id, 'name' => $request->name, 'email' => $request->email, 'status' => $status, 'created_by' => 1, 'updated_by' => 1, 'updated_at' => $datetime->format('Y-m-d H:i:s')]);
	}
	// public function assignUser()
	// {
	// 	/*
	// 		shop and merchant related
	// 		user assigned thru merchant
	// 	*/
	// 	$user = \App\User::join('merchants_user', 'user.id', '=', 'merchants_user.userId')
	// 	->join('shop_user', 'merchants_user.userId', '=', 'shop_user.user_id')
	// 	->leftJoin('merchant_shop', 'shop_id', '=', 'merchant_shop.shop_id')->get();
	// 	//check if user is actually part of any shop


	// }
	public function delete(Request $request) {
		User::where('id', $request->id)->delete();

		return response()->json(['id' => $request->id]);
	}
	// public function __construct()
	// {
 //    	$this->middleware('permission:users');
	// }
}
