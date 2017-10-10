@extends('layouts.app')

@section('title','Check Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">	
		<h2 class="text-center">Subscription Detail</h2>	
		<!--
		<h2>Transaction ID: {{$shipment->transaction->id}}</h2>
		<p><span>Plan: {{$shipment->transaction->plan->name}}</span></p>
		<p><span>Price: {{$shipment->transaction->price}}</span></p>
		<p><span>Subscribe duration: {{$shipment->transaction->subscribe_duration}} months</span></p>
		<p><span>Time bought: {{$shipment->transaction->time_bought}}</span></p>
		<p><span>Total shipment left: {{$shipment->total_shipment_left}}</span></p>
		<p><span>Address: {{$shipment->address . ', ' . $shipment->district . ', ' . $shipment->city . ', ' . $shipment->province . ', ' . $shipment->zipcode}}</span></p>
		<p><span>Phone number: {{$shipment->phone}}</span></p>
		<p><span>Additional Note: {{$shipment->additional_note}}</span></p>
		<br>
		<p><span>If you want to change delivery data, please contact admin</span></p>
		-->

		<!--<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#edit-delivery-data-collapse" aria-expanded="false" aria-controls="edit-delivery-data-collapse">
		  Edit Delivery Data
		</button>
		<div class="collapse" id="edit-delivery-data-collapse">
		  	<form action="\edit-shipment\{{$shipment->id}}" method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<label for="address" class="">Address</label>
					<input class="form-control" type="text" name="address">
				</div>
				<div class="form-group">
					<label for="province" class="">Province</label>
					<input class="form-control" type="text" name="province">
				</div>
				<div class="form-group">
					<label for="city" class="">City</label>
					<input class="form-control" type="text" name="city">
				</div>
				<div class="form-group">
					<label for="district" class="">District</label>
					<input class="form-control" type="text" name="district">
				</div>
				<div class="form-group">
					<label for="zipcode" class="">Zipcode</label>
					<input class="form-control" type="text" name="zipcode">
				</div>
				<div class="form-group">
					<label for="phone" class="">Phone Number</label>
					<input class="form-control" type="text" name="phone">
				</div>
				<div class="form-group">
					<label for="additional_note" class="">Additional Note</label>
					<textarea class="form-control" name="additional_note"></textarea>
				</div>

				<button class="btn btn-lg btn-success btn-block" type="submit">Confirm changes</button>
			</form>
		</div>-->


		<p><span>Status: {{$shipment->transaction->status}}</span></p>
		<p><span>Time bought: {{$shipment->transaction->time_bought}}</span></p>		
		<p><span>Total shipment left: {{$shipment->total_shipment_left}}</span></p>
		<p><span>Additional note: {{$shipment->additional_note}}</span></p>

		<br>

		<h2>Payment Detail</h2>
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