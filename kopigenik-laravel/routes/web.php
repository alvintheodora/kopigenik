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
    return view('index');
})->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home_ori');

//temporary view
Route::get('/subscribe', 'TransactionController@index');
Route::get('/ajaxPlan', 'TransactionController@ajaxPlan');
Route::post('/subscribe', 'TransactionController@store');

Route::get('/payment-confirmation', 'TransactionController@indexConfirm');
Route::get('/payment-confirmation/{transaction}', 'TransactionController@showConfirm');
Route::post('/payment-confirmation/{transaction}', 'TransactionController@storeConfirm');

Route::get('/check-shipments', 'ShipmentController@index');
Route::get('/check-shipments/{shipment}', 'ShipmentController@show');

/*
 * Admin
 */
Route::group(['middleware' => 'role:admin'], function(){
	Route::get('/transactions', 'TransactionController@indexTransaction');
	Route::get('/transactions/{transaction}', 'TransactionController@showTransaction');
	Route::post('/transactions/{transaction}', 'TransactionController@approveTransaction');

	Route::get('/shipments', 'ShipmentController@indexByAdmin');
	Route::get('/shipments/{shipment}', 'ShipmentController@showByAdmin');
	Route::post('/shipments/{shipment}', 'ShipmentController@approve');
});

Route::get('/profile', 'UserController@index');
Route::post('/profile', 'UserController@edit');
Route::post('/profile/address', 'AddressController@store');

Route::get('/beans', function () {
    return view('beans');
});
Route::get('/videos', function () {
    return view('videos');
});
Route::get('/about-us', function () {
    return view('about-us');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/blog', function () {
    return view('blog');
});
//test baru
