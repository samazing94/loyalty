<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades;
use Response;
use App\Restaurant;
use Carbon\Carbon;

class RestaurantsController extends Controller
{

	public function index(){
		$title = 'Restaurant';
		$restaurants = \App\Restaurant::all();
		return view('manage.index', compact('title', 'restaurants'));
	}

	public function manage() {
		$title = 'Restaurant';
		$restaurants = Restaurant::all();

		return view('manage.list', compact('title', 'restaurants'));
	}
	public function manageCreate() {
		$datetime = Carbon::now();
		Restaurant::where('id', $request->id)->insert(['name' => $request->name, 'hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'address' => $address, 'phone' => $phone ]);

		return response()->json(['name' => $request->name, 'hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'address' => $address, 'phone' => $phone]);
//		return response()->json(['id' => $request->id, 'name' => $request->name, 'updated_at' => $datetime->format('Y-m-d H:i:s')]);
	}
	public function manageUpdate(Request $request) {
		$datetime = Carbon::now();
			Restaurant::where('id', $request->id)->update(['name' => $request->name, 'hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'address' => $address, 'phone' => $phone ]);

		return response()->json(['name' => $request->name, 'hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'address' => $address, 'phone' => $phone]);
	}

	public function manageDelete(Request $request) {
		Restaurant::where('id', $request->id)->delete();

		return response()->json(['id' => $request->id]);
	}
}
