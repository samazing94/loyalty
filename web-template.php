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

Route::get('register', function(){
    abort(404);
})->name('register');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/target/buyer-wise', 'DashboardController@getTargetBuyerWise')->name('getTargetBuyerWise');
    Route::get('/output/user-wise', 'DashboardController@getOutputUserWise')->name('getOutputUserWise');
    Route::get('/line-report', 'LineReportController@index')->name('line.report');
    Route::get('/line-performance', 'LinePerformanceController@index')->name('line.performance');
    Route::get('/machine-performance-form', 'MachinesPerformanceController@form')->name('machine.performance.form');
    Route::get('/machine-performance', 'MachinesPerformanceController@index')->name('machine.performance');

    Route::post('/target', 'TargetController@store')->name('target.store');
    Route::get('/target/{id}/edit', 'TargetController@edit')->name('target.edit');
    Route::post('/target/{id}/update', 'TargetController@update')->name('target.update');
    Route::get('/target/{id}/add-hour', 'TargetController@addHour')->name('target.addHour');
    Route::post('/target/{id}/update-hour', 'TargetController@updateHour')->name('target.updateHour');

    Route::get('/target/{id}/remove-hour', 'TargetController@removeHour')->name('target.removeHour');
    Route::post('/target/{id}/remove-hour', 'TargetController@removeSingleHour')->name('target.removeSingleHour');

    Route::post('/style', 'StyleController@store')->name('style.store');
    Route::post('/buyer', 'BuyerController@store')->name('buyer.store');
    
    Route::get('/line-target/{target_id}/machine/target', 'MachineTargetController@create')->name('machine.target.create');
    Route::post('/line-target/{target_id}/machine/target', 'MachineTargetController@store')->name('machine.target.store');

});

Route::group(['prefix' => '_cron'], function(){
    Route::get('/artisan/run/schedule', function(){
        $exitCode = Artisan::call('schedule:run');
    });
});
