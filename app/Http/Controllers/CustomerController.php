<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use Carbon\Carbon;
use App\Customer;
use Session;
use Auth;
use DB;

class CustomerController extends Controller
{

	public function index()
	{
		$title = 'Loyalty Customer';
		//$customers = \App\Customer::all();
		$userSession = Auth::user()->id;
		$customers = DB::table('customerinfo')->select('*')->leftJoin('shop_user', 'shop_user.shop_id', '=', 'customerinfo.shop_id')
		->where('shop_user.user_id', $userSession)->get();
		//dd($customers);
		return view('customer.index', compact('title', 'customers'));
	}

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
	public function create()
	{
		$title = 'Loyalty Sign Up';
		$userSession = Auth::user()->id;
		$shops = DB::table('shop_info')->select('shop_info.id', 'shop_info.shop_name')
        ->leftJoin('shop_user', 'shop_user.shop_id', '=', 'shop_info.id')
        ->leftJoin('users', 'users.id', '=', 'shop_user.user_id')->where('shop_user.user_id', $userSession)->get();
		return view('customer.register', compact('title', 'shops'));
	}
	public function store(Request $request)
	{
		$userSession = Auth::user()->id;
		$mobile_number = $request->input('mobile_number');
		$firstname = $request->input('firstname');
		$lastname = $request->input('lastname');
		$dob = $request->input('dob');
		$profession = $request->input('profession');
		$location = $request->input('location');	
		$id = $request->input('name');
		$this->validate(request(), [
   			 'mobile_number' => 
       		 array(
         	   'required',
         	   'regex:/^(?:\+88|01)?(?:\d{11}|\d{13})$/',
       	 	)
		]);
		//work on validation here;

		$customer = DB::table('customerinfo')->where('mobile_number', $request->mobile_number)->first();
		if (!$customer)
		{
			$rst = array('mobile_number' => $mobile_number, 'first_name' => $firstname, 'last_name' => $lastname, 'dob' => $dob, 'profession' => $profession, 'location' => $location, 'shop_id' => $id);
	
			DB::table('customerinfo')->insert($rst);
			
			//success($rst);
			//return redirect()->to('/customer/success');
			//return 'xyz';
			Session::flash('message', "Customer has successfully registered");
			//return view('\customer\create');		
			return Redirect::back();
		}
		else
		{
			Session::flash('message', "Customer is already registered");
			return Redirect::back();
		}
	
	}
	public function update(Request $request)
    {
        $datetime = Carbon::now();
        Customer::where('id', $request->id)->update(['mobile_number' => $request->mobile_number, 'first_name' => $request->first_name, 'last_name' => $request->last_name, 'dob' => $request->dob, 'profession' => $request->profession]);

        return response()->json(['mobile_number' => $request->mobile_number, 'first_name' => $request->first_name, 'last_name' => $request->last_name, 'dob' => $request->dob, 'profession' => $request->profession]);
    }
    public function delete(Request $request)
    {
        Customer::where('id', $request->id)->delete();

        return response()->json(['id' => $request->id]);
    }

	public function getPosts()
	{
		return \DataTables::of(Customer::query())->make(true);
		//return datatables()->of(Restaurant::query())->toJson();
	}

	// public function __construct()
	// {
	//     $this->middleware('permission:create', ['only' => ['create', 'store']]);
	// }
}
