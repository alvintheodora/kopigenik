<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Coffee;
use Carbon\Carbon;

class TransactionController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except(['index', 'ajaxPlan']);
	}

    //show subsribe page
    public function index(){
        //pass plans id for option tag
        $plans = Coffee::pluck('id');

    	return view('subscribe',compact('plans'));
    }

    //perform ajax everytime option value changes
    public function ajaxPlan(){
        if($plan_price = (Coffee::find(request('plan')))->price){
            return $plan_price;
        }

        return '';
    }

    //perform transaction
    public function store(){
        $plans_id = Coffee::pluck('id');

        //check option value exists in Plan id's
        if($plans_id->contains(request('select1'))){
             $plan_selected = Coffee::find(request('select1'));

            //insert transaction
            $current_transaction = Transaction::create([
                'user_id' => auth()->id(),
                'coffee_id' => $plan_selected->id,
                'price' => $plan_selected->price + 9000,
                'status' => 'to be confirmed',
                'time_bought' => Carbon::now()
            ]);

            //fill pivot table
            $current_transaction->coffees()->attach(request('select1'));

            //redirect to its confirmation
            return redirect('/payment-confirmation/' . $current_transaction->id);
        }

        //option value has error
        return back()
            ->withErrors(['message' => 'The plan you are choosing is not available']);

       
    }

    //show user's payment confirmation list
    public function indexConfirm(){

        //list user's transaction and the status
    	$transactions = Transaction::where('user_id',auth()->id())->get();
    	return view('payment-confirmation-index',compact('transactions'));
    }

    //show payment confirmation page
    public function showConfirm(Transaction $transaction){

    	//check if it's incorrect user or confirmed transaction, if yes, then fail
    	if($transaction->user_id != auth()->id() || $transaction->status != 'to be confirmed'){
    		return redirect('/')
    			->withErrors(['message' => 'Sorry, you cannot access that page']);
    	}

        //set 1 day confirmation time
        $time_confirmed_max = Carbon::parse($transaction->time_bought)->addDay(2)->format('j M Y, H:i:s');

    	return view('payment-confirmation',compact('transaction','time_confirmed_max'));
    }

    //perform payment confirmation process
    public function storeConfirm(Transaction $transaction){

        //check if it's incorrect user or confirmed transaction, if yes, then fail
        if($transaction->user_id != auth()->id() || $transaction->status != 'to be confirmed'){
            return redirect('/')
                ->withErrors(['message' => 'Sorry, you cannot access that page']);
        }

        //confirm the transaction by user
        $transaction->status = 'to be approved';
        $transaction->time_confirmed = Carbon::now();
        $transaction->save();
        return redirect()->home();
    }

    //Admin Section

    public function indexTransaction(){

        //pass transactions according to their status
        $transactions_tbc = Transaction::where('status','to be confirmed')->get();
        $transactions_tba = Transaction::where('status','to be approved')->get();
        $transactions_approved = Transaction::where('status','approved')->get();

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

           return redirect('\transactions');
        }

        return back()->withErrors(['message' => 'Please choose valid transaction']);
    }
}
