@extends('layouts.app')

@section('title','Check Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">My Subscriptions</h1>
		<h2>On Progress</h2>
			@foreach($shipments_user as $shipment)				
				<ul>
					<li><a href="\check-shipments\{{$shipment->id}}">ID: {{$shipment->transaction->id}}</a>, Plan: {{$shipment->transaction->plan->name}}, Total shipment left: {{$shipment->total_shipment_left}}
					</li>
				</ul>
			@endforeach

		<h2>Finished Orders</h2>
		@foreach($shipments_user_finished as $shipment)				
				<ul>
					<li><a href="\check-shipments\{{$shipment->id}}">TR ID: {{$shipment->transaction->id}}</a>, Plan: {{$shipment->transaction->plan->name}}, Total shipment left: {{$shipment->total_shipment_left}}
					</li>
				</ul>
			@endforeach


	</div>
@endsection