@extends('layouts.app')

@section('title','Check Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">
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
	</div>
@endsection