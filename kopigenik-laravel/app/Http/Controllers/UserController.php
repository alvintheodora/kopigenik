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
        $payment = auth()->user()->payment;
    	//if there is address, show data
    	if($address != null && $payment != null){
    		return view('profile',compact(['address','payment']));
    	}
        else if($payment == null){
            return view('profile',compact('address'));
        }
        else if($address == null){

            return view('profile',compact('payment'));
        }

        return view('profile');
    }

    //edit existing user data
    public function edit(Request $request){
    	$request->validate([
            'email' => 'required|string|email|max:255|unique:users'
    	]);

    	$user = auth()->user();
    	$user->email = request('email');
    	$user->save();

    	return back();
    }

}
