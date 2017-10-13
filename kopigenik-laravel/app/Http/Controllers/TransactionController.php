<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Plan;
use App\Shipment;
use Carbon\Carbon;

class TransactionController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except(['index', 'ajaxPlan','ajaxSubscribeDuration']);
	}

    //show subsribe page
    public function index(){
        //pass plans id for option tag
        $plans = Plan::pluck('id');

        //pass address if logged in
        if(isset(auth()->user()->address)){
            $address = auth()->user()->address;
    	   return view('subscribe',compact(['plans','address']));
        }

        return view('subscribe',compact('plans'));
    }

    //perform ajax everytime option value changes
    /*public function ajaxPlan(){
        if($plan_price = (Plan::find(request('plan')))->price){
            return $plan_price;
        }

        return '';
    }*/

    //fill both subscribe_duration and plan to retrieve ajax
    public function ajaxSubscribeDuration(){
        if(Plan::find(request('plan'))){
            $plan_price = (Plan::find(request('plan')))->price;
            $plan_weight = (Plan::find(request('plan')))->weight;
        }
        $subscribe_duration = request('subscribe_duration');

        if($subscribe_duration == '1'){
            return json_encode(['shipping_cost' => 9000*1*2, 'plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration]);
        } 
        elseif($subscribe_duration == '2'){
            return json_encode(['shipping_cost' => 9000*2*2, 'plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration]);
        } 
        elseif($subscribe_duration == '3'){
            return json_encode(['shipping_cost' => 9000*3*2, 'plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration]);
        } 
       
        return '';
    }

    //perform transaction
    public function store(Request $request){

        //validate request
        $request->validate([
            'coffee_consumption' => 'required',
            'subscribe_duration' => 'required|integer|between:1,3',
            'coffee_grind_size' => 'required|integer|between:1,4',

            'name' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'zipcode' => 'required',
            'phone' => 'required|numeric',
        ]);
      
        //set coffee_grind_size value
        if(request('coffee_grind_size') == 1) $coffee_grind_size = 'whole';
        elseif(request('coffee_grind_size') == 2) $coffee_grind_size = 'coarse';
        elseif(request('coffee_grind_size') == 3) $coffee_grind_size = 'medium';
        elseif(request('coffee_grind_size') == 4) $coffee_grind_size = 'fine';


        $plans_id = Plan::pluck('id');

        //check plan's option id value exists in Plan id's
        if($plans_id->contains(request('coffee_consumption'))){
             $plan_selected = Plan::find(request('coffee_consumption'));

            //insert transaction
            $current_transaction = Transaction::create([
                'user_id' => auth()->id(),
                'plan_id' => $plan_selected->id,
                'subscribe_duration' => request('subscribe_duration'),
                'coffee_grind_size' => $coffee_grind_size,
                'status' => 'to be confirmed',
                'time_bought' => Carbon::now()                
            ]);

            /*
            //fill pivot table
            $current_transaction->plan()->attach(request('coffee_consumption'));
            */

            //Shipment
            if(request('subscribe_duration') == 1){
                Shipment::create([
                    'transaction_id' => $current_transaction->id,
                    'address' => request('address'),
                    'province' => request('province'),
                    'city' => request('city'),
                    'district' => request('district'),
                    'zipcode' => request('zipcode'),
                    'phone' => request('phone'),
                    'total_shipment_left' => 2,                    
                    'additional_note' => request('additional_note')
                ]);
            }else if(request('subscribe_duration') == 2){
                Shipment::create([
                    'transaction_id' => $current_transaction->id,
                    'address' => request('address'),
                    'province' => request('province'),
                    'city' => request('city'),
                    'district' => request('district'),
                    'zipcode' => request('zipcode'),
                    'phone' => request('phone'),
                    'total_shipment_left' => 4,                    
                    'additional_note' => request('additional_note')
                ]);
            }else if(request('subscribe_duration') == 3){
                Shipment::create([
                    'transaction_id' => $current_transaction->id,
                    'address' => request('address'),
                    'province' => request('province'),
                    'city' => request('city'),
                    'district' => request('district'),
                    'zipcode' => request('zipcode'),
                    'phone' => request('phone'),
                    'total_shipment_left' => 6,                    
                    'additional_note' => request('additional_note')
                ]);
            }

            //redirect to its confirmation
            return redirect('/payment-confirmation/' . $current_transaction->id);
        }


        //option plan value has error
        return back()
            ->withErrors(['message' => 'The plan you are choosing is not available']);
       
    }

    public function removeTransaction(Transaction $transaction){
        if($transaction->user->id == auth()->id() && $transaction->status == 'to be confirmed'){
            $transaction->delete();
            return redirect('/check-shipments');
        }
        return back()
            ->withErrors(['message' => 'This transaction cannot be removed, please contact admin']);
    }



    /*
    //show user's payment confirmation list
    public function indexConfirm(){

        //list user's transaction and the status
    	$transactions = Transaction::where('user_id',auth()->id())->orderBy('id','desc')->get();
    	return view('payment-confirmation-index',compact('transactions'));
    }
    */

    //show payment confirmation page
    public function showConfirm(Transaction $transaction){

    	//check if it's incorrect user , if yes, then fail
    	if($transaction->user_id != auth()->id()){
    		return redirect('/')
    			->withErrors(['message' => 'Sorry, you cannot access that page']);
    	}
        $payment=auth()->user()->payment;
        //set 2 day confirmation time
        $time_confirmed_max = Carbon::parse($transaction->time_bought)->addDay(2)->format('j M Y, H:i:s');

    	return view('payment-confirmation',compact('transaction','time_confirmed_max', 'payment'));
    }

    //perform payment confirmation process
    public function storeConfirm(Transaction $transaction, Request $request){

        //check if it's incorrect user or confirmed transaction, if yes, then fail
        if($transaction->user_id != auth()->id() || $transaction->status != 'to be confirmed'){
            return back()
                ->withErrors(['message' => 'Sorry, you cannot confirm this transaction, please contact admin']);
        }

        $request->validate([
            'bank_account' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required|numeric'
        ]);

        //fill payment data
        $transaction->bank_account = request('bank_account');
        $transaction->account_holder = request('account_holder');
        $transaction->account_number = request('account_number');            

        //confirm the transaction by user
        $transaction->status = 'to be approved';
        $transaction->time_confirmed = Carbon::now();

        $transaction->save();
        return back();
    }

    //Admin Section

    public function indexTransaction(){

        //pass transactions according to their status
        $transactions_tbc = Transaction::where('status','to be confirmed')->orderBy('id','desc')->get();
        $transactions_tba = Transaction::where('status','to be approved')->orderBy('id','desc')->get();
        $transactions_approved = Transaction::where('status','approved')->orderBy('id','desc')->get();

        return view('transaction-index',compact(['transactions_tbc','transactions_tba','transactions_approved']));
    }

    public function showTransaction(Transaction $transaction){
        return view('transaction-show',compact('transaction'));
    }

    public function approveTransaction(Transaction $transaction){
        if($transaction->status == 'to be approved'){
            $transaction->status = 'approved';
            $transaction->time_approved = Carbon::now();           

            $transaction->save();
            return redirect('/transactions');
        }

        return back()->withErrors(['message' => 'Please choose valid transaction']);
    }
}
