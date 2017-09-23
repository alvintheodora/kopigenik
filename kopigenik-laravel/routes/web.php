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
Route::get('/payment-confirmation', 'TransactionController@show');
Route::post('/payment-confirmation', 'TransactionController@store');

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