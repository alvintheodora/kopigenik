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
//Route::get('/ajaxPlan', 'TransactionController@ajaxPlan');
Route::get('/ajaxSubscribeDuration', 'TransactionController@ajaxSubscribeDuration');
Route::get('/ajaxGetCity', 'TransactionController@ajaxGetCity');
Route::get('/ajaxGetShipCost', 'TransactionController@ajaxGetShipCost');



Route::post('/subscribe', 'TransactionController@store');
Route::post('/remove-transaction/{transaction}', 'TransactionController@removeTransaction');

//delivery
Route::post('/delivery', 'TransactionController@delivercost');
//Route::get('/payment-confirmation', 'TransactionController@indexConfirm');
Route::get('/payment-confirmation/{transaction}', 'TransactionController@showConfirm');
Route::post('/payment-confirmation/{transaction}', 'TransactionController@storeConfirm');

Route::get('/check-shipments', 'ShipmentController@index');
Route::get('/check-shipments/{shipment}', 'ShipmentController@show');
Route::post('/edit-shipment/{shipment}', 'ShipmentController@editDeliveryData');

Route::get('/ajaxOnProgressDataTable', 'ShipmentController@ajaxOnProgressDataTable');
Route::get('/ajaxOnHoldDataTable', 'ShipmentController@ajaxOnHoldDataTable');
Route::get('/ajaxOnFinishedDataTable', 'ShipmentController@ajaxOnFinishedDataTable');



/*
 * Admin
 */
Route::group(['middleware' => 'role:admin'], function(){
	Route::get('/transactions', 'TransactionController@indexTransaction');
	Route::get('/transactions/{transaction}', 'TransactionController@showTransaction');
	Route::post('/transactions/{transaction}', 'TransactionController@approveTransaction');
	Route::get('/ajaxTbaDataTable', 'TransactionController@ajaxTbaDataTable');
	Route::get('/ajaxTbcDataTable', 'TransactionController@ajaxTbcDataTable');
	Route::get('/ajaxApprovedDataTable', 'TransactionController@ajaxApprovedDataTable');
	

	Route::get('/shipments', 'ShipmentController@indexByAdmin');
	Route::get('/shipments/{shipment}', 'ShipmentController@showByAdmin');
	Route::post('/shipments/{shipment}', 'ShipmentController@approve');

	Route::get('/blog-admin', 'PostController@indexByAdmin');
	Route::get('/ajaxPostDataTable', 'PostController@ajaxPostDataTable');
	Route::get('/blog-admin/create-post', 'PostController@createPost');
	Route::post('/blog-admin/create-post', 'PostController@storePost');
	Route::post('/blog-admin/remove-post/{post}', 'PostController@removePost');
});

Route::get('/profile', 'UserController@index');
Route::post('/profile', 'UserController@edit');
Route::post('/profile/address', 'AddressController@store');
Route::post('/profile/payment', 'PaymentController@store');

Route::get('/blog', 'PostController@index');
Route::get('/blog/{post}', 'PostController@showPost');


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
Route::get('/contact-us', function () {
    return view('contact-us');
});
Route::post('/contact-us', 'MessageController@store');


Route::get('/ajaxGetUser', 'UserController@ajaxGetUser');
Route::get('/ajaxGetComment', 'CommentController@ajaxGetComment');