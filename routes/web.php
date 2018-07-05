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
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userprofile', 'UserController@userprofile');


//shop list
Route::get('shop', 'ShopsController@index');
Route::get('shop/register', 'ShopsController@create');
Route::get('shop/shoplist', 'ShopsController@offer_list');

//shop operations
Route::post('shop/success', 'ShopsController@store');
Route::get('shop/fail', 'ShopsController@fail');
Route::post('shop/update', 'ShopsController@update');
Route::post('shop/delete', 'ShopsController@delete');

//customer
Route::get('/sms', 'CustomerController@customer');
Route::get('/pushpull', 'CustomerController@pushpull');
//Route::get('/customer/success', 'CustomerController@success');
Route::get('customer/index', 'CustomerController@index');
Route::get('customer/register', 'CustomerController@create');
//customer operations
Route::post('customer/create', 'CustomerController@store');
Route::post('customer/update', 'CustomerController@update');
Route::post('customer/delete', 'CustomerController@delete');

//point mgt
Route::get('offerlist/list', 'PointsController@view');
Route::get('offerlist', 'PointsController@index');
Route::get('offerlist/redeem', 'PointsController@redeem');
Route::get('offerlist/create_points', 'PointsController@createRedeem');
Route::get('offerlist/register', 'PointsController@create');
Route::get('offerlist/create_points', 'PointsController@createPoints');


//Route::post('/offerlist/create', 'PointsController@store');
Route::post('offerlist/update', 'PointsController@update');
Route::post('offerlist/delete', 'PointsController@delete');
Route::post('offerlist/successpt', 'PointsController@storePoints');
Route::post('offerlist/success', 'PointsController@store');
Route::get('offerlist/fail', 'PointsController@fail');
Route::post('offerlist/calculate', 'PointsController@calculate');
//

//report
Route::get('report/','ReportController@index');
Route::get('report/customer','ReportController@list2');
Route::get('report/sms','ReportController@smslist');
Route::get('report/customer/{id}', 'ReportController@cst_report');
