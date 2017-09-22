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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//temporary view
Route::get('/subscribe', function () {
    return view('subscribe');
});
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
Route::get('/payment-confirmation', function () {
    return view('payment-confirmation');
});