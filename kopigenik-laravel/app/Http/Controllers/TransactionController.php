<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Plan;
use App\Shipment;
use Carbon\Carbon;
use App\Mail\Subscribe;
use App\Mail\Approve;

class TransactionController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'ajaxPlan','ajaxSubscribeDuration','ajaxGetCity','ajaxGetShipCost']);
    }

    //show subsribe page
    public function index(){

      
        /* $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseProv = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $responseProv = json_decode($responseProv);*/
        //dd($responseProv);

        /*$province="";
        $provinceInput = "DI Yogyakarta";
        $cityStatic = 501;
        foreach($responseProv->rajaongkir->results as $hasil){
           if($hasil->province == $provinceInput){
               
              $province = $hasil->province_id;
                
              break;

           }
        }*/
        //dd($province);
        /*$curl = curl_init();
        $province=6;
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$province."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response);
        dd($response);
        $city=$response->rajaongkir->results->city_name;
        
        $city= request('city');
        
        foreach($response->rajaongkir->results as $hasil){
           if($hasil->city_name == request('city')){
               
            $city = $hasil->city_id;
                
              break;

           }
        }*/
        //Akhir dari tarik city_id
        //if($subscribe_duration != '0'&&city!=""){
            //return json_encode(['shipping_cost' => 9000*1*2, 'plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration, 'city_name' => $city]);
        //}


        //Tarik Delivery Cost
        

        /*$curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=151&destination=151&weight=1000&courier=jne",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseCost = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $responseCost = json_decode($responseCost); dd($responseCost);*/
        //dd($responseCost->rajaongkir->results[0]->costs[1]->cost[0]->value);
         /*$curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response);
        dd($response);*/
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

        //return request('province');
        if(Plan::find(request('plan'))){
            $plan_price = (Plan::find(request('plan')))->price;
            $plan_weight = (Plan::find(request('plan')))->weight;
        }
        $subscribe_duration = request('subscribe_duration');

        /*$provinceInput = request('province');
        $cityInput = request('city');*/

        //Tarik province_id dari province_name
       /* $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseProv = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $responseProv = json_decode($responseProv);

        //$province=$responseProv->rajaongkir->results->province_id;
        $province="";
        $cityStatic = 501;
        foreach($responseProv->rajaongkir->results as $hasil){
           if($hasil->province == $provinceInput){
               
              $province = $hasil->province_id;
                
              break;

           }
        }
        //return $province;
        //Akhir tarik province_id


        //Tarik city_id dari city_name
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$province,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseCity = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $responseCity = json_decode($responseCity);


        //return request('subscribe_duration');
        //$city=$response->rajaongkir->results->city_name;
       
        
        //$city= request('city');
        $city="";
        foreach($responseCity->rajaongkir->results as $hasil){
           if($hasil->city_name == $cityInput){
               
              $city = $hasil->city_id;
                
              break;

           }
        }
        //Akhir dari tarik city_id
        //if($subscribe_duration != '0'&&city!=""){
            //return json_encode(['shipping_cost' => 9000*1*2, 'plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration, 'city_name' => $city]);
        //}


        //Tarik Delivery Cost
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$city."&destination=".$city."&weight=1700&courier=jne",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseCost = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $responseCost=json_decode($responseCost);
        $shipping_cost = "";
        if($responseCost->rajaongkir->results[0]->costs[1]->cost[0]->value){
          $shipping_cost = $responseCost->rajaongkir->results[0]->costs[1]->cost[0]->value;
        }*/
        //Akhir Tarik Delivery Cost
       /* if($subscribe_duration != ''){
            return json_encode(['shipping_cost' => $shipping_cost*$subscribe_duration*2, 'plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration, 'city_name' => $city, 'province_name' => $province, 'error_name' => ""]);
        }*/

        if($subscribe_duration != ''){
            return json_encode(['plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration]);

        }
        else if($subscribe_duration != '' && $city!="" && $province!=""){
            return json_encode(['plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration]);
        } 
        else if($subscribe_duration != '' && $province!="" && $city=="" && $shipping_cost==""){
            return json_encode(['plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration]);
        }
        else if($subscribe_duration != ''){
            return json_encode(['plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration]);
        } 
        
       
        return '';
    }
    //calculate cost
    public function ajaxGetCity(){

      
      //Tarik Province ID

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseProv = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $responseProv = json_decode($responseProv);

        //$province=$responseProv->rajaongkir->results->province_id;
        $province="";
        foreach($responseProv->rajaongkir->results as $hasil){
           if($hasil->province == request('province')){
               
              $province = $hasil->province_id;
                
              break;

           }
        }


      //Akhir Tarik Province ID
      $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$province,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseCity = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $responseCity;
        //return json_encode(['namaCity' => $responseCity]);
    }

    public function ajaxGetShipCost(){
       if(Plan::find(request('plan'))){
            $plan_price = (Plan::find(request('plan')))->price;
            $plan_weight = (Plan::find(request('plan')))->weight;
        }
        $subscribe_duration = request('subscribe_duration');
         //Tarik Province ID

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseProv = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $responseProv = json_decode($responseProv);

        //$province=$responseProv->rajaongkir->results->province_id;
        $province="";
        foreach($responseProv->rajaongkir->results as $hasil){
           if($hasil->province == request('province')){
               
              $province = $hasil->province_id;
                
              break;

           }
        }


      //Akhir Tarik Province ID
      $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$province,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseCity = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $responseCity = json_decode($responseCity);
        $city = "";
        foreach($responseCity->rajaongkir->results as $hasil){
           if($hasil->city_name == request('city')){
               
              $city = $hasil->city_id;
                
              break;

           }
        }
        //return json_encode(['namaCity' => $responseCity]);

        //Tarik Shipping Cost
        $curl = curl_init();
        $cityOrigin=151;
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$cityOrigin."&destination=".$city."&weight=1000&courier=jne",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: a64321d648c698eb00c2e4306bf23f98"
          ),
        ));

        $responseCost = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        //return $responseCost;
        $responseCost=json_decode($responseCost);
        $shipping_cost=0;
        foreach($responseCost->rajaongkir->results[0]->costs as $hasil){
           if($hasil->service == "REG"||$hasil->service =="CTC"){
               
              $shipping_cost = $hasil->cost[0]->value;
                
              break;

           }
        }
        return json_encode(['shipping_cost' => $shipping_cost, 'plan_price' => $plan_price,'plan_weight' => $plan_weight, 'subscribe_duration' => $subscribe_duration, 'city_name' => $responseCost->rajaongkir->origin_details->city_name, 'destination_name' => $responseCost->rajaongkir->destination_details->city_name]);

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

            //send subscribed email
            \Mail::to(auth()->user())->queue(new Subscribe(auth()->user(), $current_transaction));

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

            //send subscribed email
            \Mail::to($transaction->user)->queue(new Approve($transaction->user, $transaction));

            return redirect('/transactions');
        }

        return back()->withErrors(['message' => 'Please choose valid transaction']);
    }


    public function ajaxTbaDataTable(){
        $transactions_tba = Transaction::with('user')
        ->where('status','to be approved')->get();

        return json_encode($transactions_tba);
    }

    public function ajaxTbcDataTable(){
        $transactions_tbc = Transaction::with('user')
        ->where('status','to be confirmed')->get();
        
        return json_encode($transactions_tbc);
    }

    public function ajaxApprovedDataTable(){
        $transactions_approved = Transaction::with('user')
        ->where('status','approved')->get();
        
        return json_encode($transactions_approved);
    }


}