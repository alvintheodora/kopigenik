@extends('layouts.app')

@section('title','Check Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">	
		<h2 class="text-center">Subscription Detail</h2>			

		<div class="row">
			<div class="col-sm-4">
				<h2>Shipment Detail</h2>
				<div class="row">
					<div class="col-xs-6">
						<p>Status:</p>
						<p>Time bought:</p>
						<p>Total shipment left:</p>
						<p>Additional note:</p>
					</div>
					<div class="col-xs-6">
						<p>{{$shipment->transaction->status}}</p>
						<p>{{$shipment->transaction->time_bought}}</p>
						<p>{{$shipment->total_shipment_left}}</p>
						<p>{{$shipment->additional_note?$shipment->additional_note:'-'}}</p>
					</div>
				</div>								
			</div>
			<div class="col-sm-4">
				@if($shipment->transaction->status != 'to be confirmed')
					<h2>Payment Detail</h2>
					<div class="row">
						<div class="col-xs-6">
							<p>Bank:</p>
							<p>Account holder:</p>
							<p>Account number:</p>					
						</div>
						<div class="col-xs-6">
							<p>{{$shipment->transaction->bank_account}}</p>
							<p>{{$shipment->transaction->account_holder}}</p>
							<p>{{$shipment->transaction->account_number}}</p>		
						</div>
					</div>					
				@endif
			</div>
		</div>				

		<br>

		<h2>Product Detail</h2>
		<!--table-->
		<div class="summary">
			<h2>Transaction ID: {{$shipment->transaction->id}}</h2>
			<div class="row">
				<div class="col-sm-4">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<p class="strong">Product</p>
						</div>
						<div class="col-xs-6 col-sm-12 text-right-xxs">
							<p class="small" style="color: #3E2723;">{{$shipment->transaction->plan->name}}: {{$shipment->transaction->plan->weight}} gr ({{$shipment->transaction->plan->weight/2}} gr per shipment)</p>	
						</div>
					</div>												
				</div>
				<!--<div class="col-sm-2">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<p class="strong">Additional Note</p>
						</div>
						<div class="col-xs-6 col-sm-12 text-right-xxs">
							<p class="small">{{$shipment->additional_note?$shipment->additional_note:'-'}}</p>
						</div>
					</div>										
				</div>-->
				<div class="col-sm-2">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<p class="strong">Subscribe Duration</p>
						</div>
						<div class="col-xs-6 col-sm-12 text-right-xxs">
							<p class="small" style="color: #3E2723;">{{$shipment->transaction->subscribe_duration}} months ({{$shipment->transaction->subscribe_duration * 2}} shipments)</p>	
						</div>
					</div>														
				</div>							
				<div class="col-sm-2">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<p class="strong">Product Price</p>
						</div>
						<div class="col-xs-6 col-sm-12 text-right-xxs">
							<p class="small" style="color: #3E2723;">Rp{{$shipment->transaction->plan->price}}</p>
						</div>
					</div>														
				</div>
				<div class="col-sm-3">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<p class="strong">Subtotal</p>
						</div>
						<div class="col-xs-6 col-sm-12 text-right-xxs">
							<p class="small">Rp{{$shipment->transaction->plan->price * $shipment->transaction->subscribe_duration}}</p>
						</div>
					</div>							
				</div>				
			</div>

			<hr>
			
			<div class="row">
				<div class="col-sm-4">
					<p class="strong">Shipping destination</p>
					<p class="small">JNE Reguler</p>
					<p class="strong">{{$shipment->transaction->user->name}}</p>
					<p class="small">{{$shipment->address}}</p>
					<p class="small">{{$shipment->district}}, {{$shipment->city}}, {{$shipment->zipcode}}</p>
					<p class="small">{{$shipment->province}}</p>
					<p class="small">Telp: {{$shipment->phone}}</p>
				</div>				
				<!--<div class="col-sm-2">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<p class="strong">Total Items</p>
						</div>
						<div class="col-xs-6 col-sm-12 text-right-xxs">
							<p class="small">1 ({{$shipment->transaction->plan->weight/2/1000}} kg)</p>
						</div>
					</div>	
				</div>-->			
				<div class="col-sm-4">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<p class="strong">Shipping Cost</p>
						</div>
						<div class="col-xs-6 col-sm-12 text-right-xxs">
							<p class="small">Rp{{9000 * $shipment->transaction->subscribe_duration * 2}} for {{$shipment->transaction->subscribe_duration * 2}} shipments</p>
						</div>
					</div>	
				</div>
				<div class="col-sm-3">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<p class="strong">Total</p>
						</div>
						<div class="col-xs-6 col-sm-12 text-right-xxs">
							<p class="small">Rp{{$shipment->transaction->plan->price * $shipment->transaction->subscribe_duration + 9000 * $shipment->transaction->subscribe_duration * 2}}</p>
						</div>
					</div>	
				</div>
			</div>		
		</div>	
	</div>
@endsection