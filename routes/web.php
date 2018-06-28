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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'UserController@index');
Route::get('/userprofile', 'UserController@userprofile');
/*
//restaurant list
Route::get('/restaurant', 'DataTableController@datatable');
Route::get('/restaurant/getdata','DataTableController@getPosts')->name('datatable/getdata');
Route::get('/restaurant/register', 'DataTableController@register');

//datatable operations
Route::post('/restaurant/create', 'DataTableController@create');
Route::post('/restaurant/update', 'DataTableController@update');
Route::post('/restaurant/delete', 'DataTableController@delete');*/

//shop list
Route::get('/shop', 'ShopsController@index');
Route::get('/shop/register', 'ShopsController@register');

//datatable operations
Route::post('/shop/success', 'ShopsController@create');
Route::get('/shop/fail', 'ShopsController@fail');
Route::post('/shop/update', 'ShopsController@update');
Route::post('/shop/delete', 'ShopsController@delete');

//customer
Route::get('/sms', 'CustomerController@customer');
Route::get('/pushpull', 'CustomerController@pushpull');
//Route::get('/customer/success', 'CustomerController@success');

//customer operations

Route::get('customer/register', 'CustomerController@register');

Route::post('/customer/create', 'CustomerController@create');
//point mgt
Route::get('/offerlist', 'PointsController@index');
Route::post('/offerlist/calculate', 'PointsController@calculate');
//