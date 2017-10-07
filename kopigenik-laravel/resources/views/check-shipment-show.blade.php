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
	</div>
@endsection