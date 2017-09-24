<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Carbon\Carbon;
class TransactionController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except('index');
	}

    public function index(){
    	return view('subscribe');
    }

    public function store(){

    	//insert transaction
    	$current_transaction = Transaction::create([
    		'user_id' => auth()->id(),
    		'coffee_id' => '101',
    		'price' => '101000',
    		'status' => 'to be confirmed',
    		'time_bought' => Carbon::now()
    	]);

    	//redirect to its confirmation
    	return redirect('/payment-confirmation/' . $current_transaction->id);
    }

    public function indexConfirm(){
    	$transactions = Transaction::where('user_id',auth()->id())->get();
    	return view('payment-confirmation-index',compact('transactions'));
    }

    public function showConfirm(Transaction $transaction){
    	//check if it's the correct user and unconfirmed transaction
    	if($transaction->user_id != auth()->id() || $transaction->status != 'to be confirmed'){
    		return redirect('/')
    			->withErrors(['message' => 'Sorry, you cannot access that page']);
    	}
    	return view('payment-confirmation',compact('transaction'));
    }

    public function storeConfirm(Transaction $transaction){
    	$transaction->status = 'to be approved';
    	$transaction->time_confirmed = Carbon::now();
    	$transaction->save();
    	return redirect()->home();
    }
}
