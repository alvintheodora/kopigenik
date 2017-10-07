<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipment;
use Illuminate\Database\Eloquent\Collection;

class ShipmentController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
        $shipments = Shipment::all();
        $shipments_user = new Collection();
        $shipments_user_finished = new Collection();

        foreach($shipments as $shipment){
            /*
             * Check shipment by current user and approved TR
             */
            if($shipment->transaction->user->id == auth()->id() && $shipment->transaction->status == 'approved' && $shipment->total_shipment_left > 0){
                $shipments_user->push($shipment);
            }elseif($shipment->transaction->user->id == auth()->id() && $shipment->transaction->status == 'approved' && $shipment->total_shipment_left == 0){
                $shipments_user_finished->push($shipment);
            }
        }

        return view('check-shipment',compact(['shipments_user','shipments_user_finished']));
    }

    public function show(Shipment $shipment){
        return view('check-shipment-show',compact('shipment'));
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

    		$shipment->save();
    		return redirect('/shipments');
    	}

    	return back()->withErrors(['message' => 'Please choose valid shipment']);
    }
}
