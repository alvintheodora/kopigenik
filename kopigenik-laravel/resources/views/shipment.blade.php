@extends('layouts.app')

@section('title','Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">		
		<h2>On progress</h2>
		<ul>
			@foreach($shipments_approved as $shipment)										
				<li><a href="\shipments\{{$shipment->id}}">ID: {{$shipment->id}}</a>, Total Shipment Left: {{$shipment->total_shipment_left}}
				</li>
			@endforeach
		</ul>
			
		<h2>To be confirmed / to be approved</h2>
		<ul>
			@foreach($shipments_tba as $shipment)										
				<li><a href="\shipments\{{$shipment->id}}">ID: {{$shipment->id}}</a>, Total Shipment Left: {{$shipment->total_shipment_left}}
				</li>
			@endforeach
		</ul>

		<h2>Finished</h2>
		<ul>
			@foreach($shipments_finished as $shipment)										
				<li><a href="\shipments\{{$shipment->id}}">ID: {{$shipment->id}}</a>, Total Shipment Left: {{$shipment->total_shipment_left}}
				</li>
			@endforeach
		</ul>
			
		
		
	</div>
@endsection