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

		$user = \App\User::all();
		return view('userprofile', compact('users'));
	}

	public function manage() {
		$title = 'User Management';
		$users = User::all();

		return view('manage.list', compact('title', 'users'));
	}

	public function manageUpdate(Request $request) {
		$datetime = Carbon::now();
		User::where('id', $request->id)->update(['name' => $request->name, 'updated_at' => $datetime]);

		return response()->json(['id' => $request->id, 'name' => $request->name, 'updated_at' => $datetime->format('Y-m-d H:i:s')]);
	}

	public function manageDelete(Request $request) {
		User::where('id', $request->id)->delete();

		return response()->json(['id' => $request->id]);
	}
	// public function __construct()
	// {
 //    	$this->middleware('permission:users');
	// }
}
