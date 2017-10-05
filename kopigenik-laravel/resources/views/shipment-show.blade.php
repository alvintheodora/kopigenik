@extends('layouts.app')

@section('title','Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h2>Shipment ID: {{$shipment->id}}</h2>
		<p><span>Customer's name: {{$shipment->transaction->user->name}}</span></p>
		<p><span>Plan: {{$shipment->transaction->plan->name}}</span></p>
		<p><span>Address: {{$shipment->address}}</span></p>
		<p><span>Province: {{$shipment->province}}</span></p>
		<p><span>City: {{$shipment->city}}</span></p>
		<p><span>District: {{$shipment->district}}</span></p>
		<p><span>Zipcode: {{$shipment->zipcode}}</span></p>
		<p><span>Phone: {{$shipment->phone}}</span></p>
		<p><span>Additional note: {{$shipment->additional_note}}</span></p>
		<p><span>Total shipment left: {{$shipment->total_shipment_left}}</span></p>

		
		@if($shipment->transaction->status == 'approved' && $shipment->total_shipment_left > 0)
			<form action="\shipments\{{$shipment->id}}" method="POST">
				{{csrf_field()}}
					<button class="btn btn-lg btn-success btn-block" type="submit">Deliver shipment</button>	
			</form>		
		@endif
	</div>
@endsection