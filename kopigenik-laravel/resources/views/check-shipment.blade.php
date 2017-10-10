@extends('layouts.app')

@section('title','Check Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">My Subscriptions</h1>
		<h2>On Progress</h2>
		<ul>
			@foreach($shipments_user as $shipment)				
				
					<li><a href="\check-shipments\{{$shipment->id}}">ID: {{$shipment->transaction->id}}</a>, 
						Plan: {{$shipment->transaction->plan->name}} ({{$shipment->transaction->subscribe_duration}} months), 
						Delivery Address: {{$shipment->address . ', ' . $shipment->district . ', ' . $shipment->city . ', ' . $shipment->province . ', ' . $shipment->zipcode}}, 
						Total shipment left: {{$shipment->total_shipment_left}}
					</li>
				
			@endforeach
		</ul>

		<h2>On Hold</h2>
		<ul>
			@foreach($shipments_user_tb as $shipment)				
			
					<li><a href="\check-shipments\{{$shipment->id}}">ID: {{$shipment->transaction->id}}</a>, Plan: {{$shipment->transaction->plan->name}} ({{$shipment->transaction->subscribe_duration}} months), Time bought: {{$shipment->transaction->time_bought}}, Status: {{$shipment->transaction->status}}

						@if($shipment->transaction->status=="to be confirmed")
							<a class="btn btn-primary" style="margin-left: 10px;" href="/payment-confirmation/{{$shipment->transaction->id}}">Show payment confirmation detail</a>

							<button class="btn btn-danger" style="margin-left: 10px;" type="button" data-toggle="modal" data-target="#removeModal">Remove</button>

							<!-- Modal -->
							<form action="\remove-transaction\{{$shipment->transaction->id}}" method="POST">
								{{csrf_field()}}
								<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Cancel Transaction?</h4>
								      </div>
								      <div class="modal-body">
								      	<p>Are you sure to cancel the transaction?</p>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>								        
							        	<button type="submit" class="btn btn-danger">Yes</button>
								      </div>
								    </div>
								  </div>
								</div>
							</form>
						@endif

					</li>
				
			@endforeach
		</ul>

		<h2>Finished Orders</h2>
		<ul>
			@foreach($shipments_user_finished as $shipment)				
				
					<li><a href="\check-shipments\{{$shipment->id}}">ID: {{$shipment->transaction->id}}</a>, Plan: {{$shipment->transaction->plan->name}} ({{$shipment->transaction->subscribe_duration}} months), Last Delivery Date: {{$shipment->last_delivery_date}}
					</li>
				
			@endforeach
		</ul>

	</div>
@endsection