<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades;
use Response;
use App\User;
use App\Role;
use DB;
use Hash;

// class UserController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return Response
//      */
//     public function index(Request $request)
//     {
//         $users = User::orderBy('id','DESC')->paginate(5);
//         return view('users.index',compact('users'))
//             ->with('i', ($request->input('page', 1) - 1) * 5);
//     }
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return Response
//      */
//     public function create()
//     {
//         $roles = Role::pluck('display_name','id');
//         return view('users.create',compact('roles')); //return the view with the list of roles passed as an array
//     }
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @return Response
//      */
//     public function store(Request $request)
//     {
//         $this->validate($request, [
//             'name' => 'required|max:255',
//             'email' => 'required|email|max:255|unique:users',
//             'password' => 'required|confirmed|min:6',
//             'roles' => 'required'
//         ]);
//         $input = $request->only('name', 'email', 'password');
//         $input['password'] = Hash::make($input['password']); //Hash password
//         $user = User::create($input); //Create User table entry
//         //Attach the selected Roles
//         foreach ($request->input('roles') as $key => $value) {
//             $user->attachRole($value);
//         }
//         return redirect()->route('users.index')
//             ->with('success','User created successfully');
//     }
//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return Response
//      */
//     public function show($id)
//     {
//         $user = User::find($id);
//         return view('users.show',compact('user'));
//     }
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return Response
//      */
//     public function edit($id)
//     {
//         $user = User::find($id);
//         $roles = Role::get(); //get all roles
//         $userRoles = $user->roles->pluck('id')->toArray();
//         return view('users.edit',compact('user','roles','userRoles'));
//     }
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  int  $id
//      * @return Response
//      */
//     public function update(Request $request, $id)
//     {
//         $this->validate($request, [
//             'name' => 'required|max:255',
//             'email' => 'required|email|unique:users,email,'.$id,
//             'password' => 'confirmed',
//             'roles' => 'required'
//         ]);
//         $input = $request->only('name', 'email', 'password');
//         if(!empty($input['password'])){
//             $input['password'] = Hash::make($input['password']); //update the password
//         }else{
//             $input = array_except($input,array('password')); //remove password from the input array
//         }
//         $user = User::find($id);
//         $user->update($input); //update the user info
//         //delete all roles currently linked to this user
//         DB::table('role_user')->where('user_id',$id)->delete();
//         //attach the new roles to the user
//         foreach ($request->input('roles') as $key => $value) {
//             $user->attachRole($value);
//         }
//         return redirect()->route('users.index')
//             ->with('success','User updated successfully');
//     }
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return Response
//      */
//     public function destroy($id)
//     {
//         User::find($id)->delete();
//         return redirect()->route('users.index')
//             ->with('success','User deleted successfully');
//     }

//     public function userprofile(){

// 		$user = User::all();
// 		//dd($user);
// 		return view('users/userprofile', compact('users'));
// 	}

// }

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
