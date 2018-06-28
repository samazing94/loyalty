<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use Carbon\Carbon;
use App\Restaurant;
use DB;

class DataTableController extends Controller
{    
	public function datatable()
	{
		$title = 'Restaurant';
		$restaurants = \App\Restaurant::all();
		return view('restaurant', compact('title', 'restaurants'));
	}

	public function register()
	{
		$title = 'Restaurant Registration';
		return view('register', compact('title'));
	}
	public function create(Request $request)
	{
		$name = $request->input('name');
		$hotkey = $request->input('hotkey');
		$subhotkey = $request->input('subhotkey');
		$address = $request->input('address');
		$phone = $request->input('phone');
		
		$rst = array('name' => $name, 'hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'address' => $address, 'phone' => $phone);
		DB::table('restaurants')->insert($rst);
		return redirect()->to('/restaurant/register');
	}

	public function update(Request $request)
	{
		$datetime = Carbon::now();
		Restaurant::where('id', $request->id)->update(['name' => $request->name, 'hotkey' => $request->hotkey, 'subhotkey' => $request->subhotkey, 'address' => $request->address, 'phone' => $request->phone ]);

		return response()->json(['name' => $request->name, 'hotkey' => $request->hotkey, 'subhotkey' => $request->subhotkey, 'address' => $request->address, 'phone' => $request->phone]);
	}
	 public function delete(Request $request)
    {
    	Restaurant::where('id', $request->id)->delete();

		return response()->json(['id' => $request->id]);
    }

	public function getPosts()
	{
		return \DataTables::of(Restaurant::query())->make(true);
		//return datatables()->of(Restaurant::query())->toJson();
	}
}