@extends('layouts.app')

@section('title','Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">	
		<h1 class="text-center">Shipment</h1>	
		<h2>On progress</h2>
		<ul>
			@foreach($shipments_approved as $shipment)										
				<li><a href="\shipments\{{$shipment->id}}">TR ID: {{$shipment->transaction->id}}</a>, Total Shipment Left: {{$shipment->total_shipment_left}}, Last Delivery Date: {{$shipment->last_delivery_date}}
				</li>
			@endforeach
		</ul>
			
		<h2>On Hold</h2>
		<ul>
			@foreach($shipments_tba as $shipment)										
				<li><a href="\shipments\{{$shipment->id}}">TR ID: {{$shipment->transaction->id}}</a>, Status: {{$shipment->transaction->status}}
				</li>
			@endforeach
		</ul>

		<h2>Finished</h2>
		<ul>
			@foreach($shipments_finished as $shipment)										
				<li><a href="\shipments\{{$shipment->id}}">TR ID: {{$shipment->transaction->id}}</a>, Total Shipment Left: {{$shipment->total_shipment_left}}
				</li>
			@endforeach
		</ul>
			
		
		
	</div>
@endsection