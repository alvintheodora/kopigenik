<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
	
	//store or edit address
    public function store(Request $request){

    	$request->validate([
            'bank_account' => 'required|string',
            'account_holder' => 'required|string',
            'account_number' => 'required|string|max:15'
    	]);

    	if($payment = Payment::where('user_id',auth()->id())->first()){
    	    		//if user already has an address
    	    $payment->bank_account = request('bank_account');
    	    $payment->account_holder = request('account_holder');
    		$payment->account_number = request('account_number');
    		
    		$payment->save();

    	}else{
    		//if user hasn't got an address yet
    		Payment::create([
    		'user_id' => auth()->id(),
    		'bank_account' => request('bank_account'),
    		'account_holder' => request('account_holder'),
    		'account_number' => request('account_number'),
    	]);	

    	}

    	return back();
    }
}
