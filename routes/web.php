<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userprofile', 'UserController@userprofile');


//shop list
Route::group(['prefix' => 'shop', 'middleware' => 'auth'], function()
{
	Route::get('/', 'ShopsController@index');
	Route::get('/register', 'ShopsController@create');
	//Route::get('/shoplist', 'ShopsController@offer_list');
	//shop operations	
	Route::post('shop/success', 'ShopsController@store');
	Route::get('shop/fail', 'ShopsController@fail');
	Route::post('shop/update', 'ShopsController@update');
	Route::post('shop/delete', 'ShopsController@delete');

});

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function()
{
	Route::get('/index', 'CustomerController@index');
	Route::get('/register', 'CustomerController@create');
	//customer operations
	Route::post('/create', 'CustomerController@store');
	Route::post('/update', 'CustomerController@update');
	Route::post('/delete', 'CustomerController@delete');

});


//customer
Route::get('/sms', 'CustomerController@customer');
Route::get('/pushpull', 'CustomerController@pushpull');
//Route::get('/customer/success', 'CustomerController@success');

//point mgt
Route::group(['prefix' => 'offerlist', 'middleware' => 'auth'], function(){
	Route::get('/list', 'PointsController@view');
	Route::get('/', 'PointsController@index');
	Route::get('/register', 'PointsController@create');
	Route::get('/create_points', 'PointsController@createPoints');

	Route::post('/update', 'PointsController@update');
	Route::post('/delete', 'PointsController@delete');
	Route::post('/successpt', 'PointsController@storePoints');
	Route::post('/success', 'PointsController@store');
	Route::get('/fail', 'PointsController@fail');
	Route::post('/calculate', 'PointsController@calculate');

});

Route::middleware(['auth'])->group(function () {
	Route::get('/process', 'PointsController@process_order');
});
//Route::post('/offerlist/create', 'PointsController@store');
//

//report
Route::group(['prefix' => 'report', 'middleware' => 'auth'], function(){
	Route::get('/','ReportController@index');
	Route::get('/customer','ReportController@list2');
	Route::get('/sms','ReportController@smslist');
	Route::get('/customer/{id}', 'ReportController@cst_report');
});
