<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	$address = auth()->user()->address;

    	//if there is address, show data
    	if($address != null){
    		return view('profile',compact('address'));
    	}
    	return view('profile');
    }

    //edit existing user data
    public function edit(Request $request){
    	$request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
    	]);

    	$user = auth()->user();
    	$user->email = request('email');
    	$user->password = bcrypt(request('password'));
    	$user->save();

    	return back();
    }

}
