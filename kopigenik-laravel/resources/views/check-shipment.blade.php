@extends('layouts.app')

@section('title','Check Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">My Subscriptions</h1>
		<h2>On Progress</h2>

		@if($shipments_user->count()>0)
			<div class="row">
				<div class="col-sm-1">
					ID
				</div>
				<div class="col-sm-2">
					Plan
				</div>
				<div class="col-sm-4">
					Delivery Address
				</div>
				<div class="col-sm-2">
					Total shipment left
				</div>					
			</div>
		
			@foreach($shipments_user as $shipment)					
				<div class="row">
					<div class="col-sm-1">
						<a href="\check-shipments\{{$shipment->id}}">{{$shipment->transaction->id}}</a>
					</div>
					<div class="col-sm-2">
						{{$shipment->transaction->plan->name}} ({{$shipment->transaction->subscribe_duration}} months)
					</div>
					<div class="col-sm-4">
						{{$shipment->address . ', ' . $shipment->district . ', ' . $shipment->city . ', ' . $shipment->province . ', ' . $shipment->zipcode}}
					</div>
					<div class="col-sm-2">
						{{$shipment->total_shipment_left}}
					</div>							
				</div>				
			@endforeach
			
		@endif

		<h2>On Hold</h2>
		@if($shipments_user_tb->count()>0)
			<div class="row">
				<div class="col-sm-1">
					ID
				</div>
				<div class="col-sm-2">
					Plan
				</div>
				<div class="col-sm-2">
					Time bought
				</div>
				<div class="col-sm-2">
					Status
				</div>					
			</div>
		
			@foreach($shipments_user_tb as $shipment)					
				<div class="row" style="height: 50px;">
					<div class="col-sm-1">
						<a href="\check-shipments\{{$shipment->id}}">{{$shipment->transaction->id}}</a>
					</div>
					<div class="col-sm-2">
						{{$shipment->transaction->plan->name}} ({{$shipment->transaction->subscribe_duration}} months)
					</div>
					<div class="col-sm-2">
						{{$shipment->transaction->time_bought}}
					</div>
					<div class="col-sm-2" style="width: 11.5%;">
						{{$shipment->transaction->status}}
					</div>	
					<div class="col-sm-4">
						@if($shipment->transaction->status=="to be confirmed")
							<a class="btn btn-primary" style="margin-left: 10px;" href="/payment-confirmation/{{$shipment->transaction->id}}">Show payment confirmation detail</a>

							<button class="btn btn-danger" style="margin-left: 10px;" type="button" data-toggle="modal" data-target="#removeModal{{$shipment->transaction->id}}">Remove</button>

							<!-- Modal -->
							<form action="\remove-transaction\{{$shipment->transaction->id}}" method="POST">
								{{csrf_field()}}
								<div class="modal fade" id="removeModal{{$shipment->transaction->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
					</div>				
				</div>
				
			@endforeach

		@endif

		<h2>Finished Orders</h2>

		@if($shipments_user_finished->count()>0)
			<div class="row">
				<div class="col-sm-1">
					ID
				</div>
				<div class="col-sm-2">
					Plan
				</div>
				<div class="col-sm-5">
					Last Delivery Date
				</div>				
			</div>
		
			@foreach($shipments_user_finished as $shipment)					
				<div class="row">
					<div class="col-sm-1">
						<a href="\check-shipments\{{$shipment->id}}">{{$shipment->transaction->id}}</a>
					</div>
					<div class="col-sm-2">
						{{$shipment->transaction->plan->name}} ({{$shipment->transaction->subscribe_duration}} months)
					</div>
					<div class="col-sm-5">
						{{$shipment->last_delivery_date}}
					</div>							
				</div>				
			@endforeach
			
		@endif


	</div>
@endsection