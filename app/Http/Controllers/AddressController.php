<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class AddressController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	//store or edit address
    public function store(Request $request){

    	$request->validate([
            'address' => 'required|string|max:255',
            'province' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'zipcode' => 'required|string',
            'phone' => 'required|string'
    	]);

    	if($address = Address::where('user_id',auth()->id())->first()){
    		//if user already has an address
    		$address->address = request('address');
    		$address->province = request('province');
    		$address->city = request('city');
    		$address->district = request('district');
    		$address->zipcode = request('zipcode');
            $address->phone = request('phone');
    		$address->save();

    	}else{
    		//if user hasn't got an address yet
    		Address::create([
    		'user_id' => auth()->id(),
    		'address' => request('address'),
    		'province' => request('province'),
    		'city' => request('city'),
    		'district' => request('district'),
    		'zipcode' => request('zipcode'),
            'phone' => request('phone'),
    	]);	

    	}

    	return back();
    }

}
