<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipment;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class ShipmentController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
        $shipments = Shipment::orderBy('id','desc')->get();
        $shipments_user = new Collection();
        $shipments_user_tb = new Collection();
        $shipments_user_finished = new Collection();

        foreach($shipments as $shipment){
            /*
             * Check shipment by current user and status
             */
            if($shipment->transaction->user->id == auth()->id() && $shipment->transaction->status == 'approved' && $shipment->total_shipment_left > 0){
                $shipments_user->push($shipment);
            }elseif($shipment->transaction->user->id == auth()->id() && $shipment->transaction->status != 'approved' && $shipment->total_shipment_left > 0){
                $shipments_user_tb->push($shipment);
            }elseif($shipment->transaction->user->id == auth()->id() && $shipment->transaction->status == 'approved' && $shipment->total_shipment_left == 0){
                $shipments_user_finished->push($shipment);
            }
        }     


        return view('check-shipment',compact(['shipments_user','shipments_user_tb','shipments_user_finished']));
    }

    public function show(Shipment $shipment){
        return view('check-shipment-show',compact('shipment'));
    }

    public function editDeliveryData(Shipment $shipment){
        if($shipment->transaction->user->id == auth()->id()){
            
            return redirect('/check-shipments/' . $shipment->id);
        }
        return back()
            ->withErrors(['message' => 'This shipment cannot be edited by you, please contact admin']);
    }


    public function ajaxOnProgressDataTable(){
        $shipments_on_progress = Shipment::with('transaction','transaction.user','transaction.plan')
        ->whereHas('transaction', function ($query) {
            $query->where('user_id', auth()->id());
            $query->where('status','approved');            
        })
        ->where('total_shipment_left','>',0)
        ->get();

        return json_encode($shipments_on_progress);
    }

    public function ajaxOnHoldDataTable(){
        $shipments_on_hold = Shipment::with('transaction','transaction.user','transaction.plan')
        ->whereHas('transaction', function ($query) {
            $query->where('user_id', auth()->id());
            $query->where('status','!=','approved');            
        })->get();

        return json_encode($shipments_on_hold);
    }

    public function ajaxOnFinishedDataTable(){
        $shipments_on_finished = Shipment::with('transaction','transaction.user','transaction.plan')
        ->whereHas('transaction', function ($query) {
            $query->where('user_id', auth()->id());
            $query->where('status','approved');            
        })
        ->where('total_shipment_left',0)
        ->get();

        return json_encode($shipments_on_finished);
    }

    


    //ADMIN

    public function indexByAdmin(){
    	$shipments = Shipment::all();
    	$shipments_approved = new Collection();
    	$shipments_tba = new Collection();
    	$shipments_finished = new Collection();

    	foreach($shipments as $shipment){
    		if($shipment->transaction->status == 'approved' && $shipment->total_shipment_left > 0){
    			$shipments_approved->push($shipment);    			
    		}elseif($shipment->transaction->status != 'approved'){
    			$shipments_tba->push($shipment);
    		}elseif($shipment->total_shipment_left == 0){
    			$shipments_finished->push($shipment);
    		}
    	}
    	return view('shipment',compact(['shipments_approved','shipments_tba','shipments_finished']));
    }

    public function showByAdmin(Shipment $shipment){
    	return view('shipment-show',compact('shipment'));
    }

    public function approve(Shipment $shipment){
    	if($shipment->transaction->status == 'approved' && $shipment->total_shipment_left > 0){
    		$shipment->total_shipment_left -= 1;
            $shipment->last_delivery_date = Carbon::now();

    		$shipment->save();
    		return redirect('/shipments');
    	}

    	return back()->withErrors(['message' => 'Please choose valid shipment']);
    }
}
