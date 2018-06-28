<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use Carbon\Carbon;
use App\Customer;
use App\
use DB;

class CustomerController extends Controller
{

   public function customer()
	{
		//$title = 'Loyalty Customer';
		$customers = \App\Customer::all();
		return view('sms');
	}
	public function pushpull()
	{
		//$title = 'Loyalty Customer';
		$customers = \App\Customer::all();
		return view('pushpull');
	}
	public function register()
	{
		$title = 'Loyalty Sign Up';
		return view('\customer\register', compact('title'));
	}

	 // public function success($rst) 
	 // {
	 // 	//return "Thank you for registering to " + $rst->hotkey + " for "+ $rst->subhotkey + " \n You got 100 Points!";
	 // }
	public function create(Request $request)
	{
		$mobile_number = $request->input('mobile_number');
		$firstname = $request->input('firstname');
		$lastname = $request->input('lastname');
		$dob = $request->input('dob');
		$profession = $request->input('profession');
		$location = $request->input('location');
		
/*
'mobile_number',
		'firstname',
		'lastname',
		'dob',
		'profession',
		'location', 
		*/

		$rst = array('mobile_number' => $mobile_number, 'first_name' => $firstname, 'last_name' => $lastname, 'dob' => $dob, 'profession' => $profession, 'location' => $location);
		DB::table('customerinfo')->insert($rst);
		//success($rst);
		//return redirect()->to('/customer/success');
		//return 'xyz';
		return view('\customer\create');
	}

	public function getPosts()
	{
		return \DataTables::of(Customer::query())->make(true);
		//return datatables()->of(Restaurant::query())->toJson();
	}
}
