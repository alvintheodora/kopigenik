@extends('layouts.app')

@section('title','Check Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">My Subscriptions</h1>

		<h2>On Progress</h2>
		@if($shipments_user->count()>0)
			<!--DataTable on progress-->
			<div style="width: 100%">
				<div class="table-responsive">
					<table id="table_on_progress" class="display table-bordered" width="100%">
					    <thead>
					        <tr>
					            <th>ID</th>
					            <th>Plan</th>
					            <th>Delivery address</th>
					            <th>Total shipment left</th>
					            <th>Action</th>
					        </tr>
					    </thead>				 		    
					</table>
				</div>
			</div>				
		@endif


		<h2>On Hold</h2>
		@if($shipments_user_tb->count()>0)
			<!--DataTable on hold-->
			<div style="width: 100%">
				<div class="table-responsive">
					<table id="table_on_hold" class="display table-bordered" width="100%">
					    <thead>
					        <tr>
					            <th>ID</th>
					            <th>Plan</th>
					            <th>Time bought</th>
					            <th>Status</th>
					            <th>Action</th>
					        </tr>
					    </thead>				 		    
					</table>
				</div>
			</div>
		@endif


		<h2>Finished Orders</h2>
		@if($shipments_user_finished->count()>0)
			<!--DataTable on_finished-->
			<div style="width: 100%">
				<div class="table-responsive">
					<table id="table_on_finished" class="display table-bordered" width="100%">
					    <thead>
					        <tr>
					            <th>ID</th>
					            <th>Plan</th>
					            <th>Last delivery date</th>
					            <th>Action</th>
					        </tr>
					    </thead>				 		    
					</table>
				</div>
			</div>				
		@endif

		<form id="removeForm" action="/remove-transaction/" method="POST">
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


	</div>




<script type="text/javascript">
	$(document).ready( function () {

		//DataTable on_progress
    	$('#table_on_progress').DataTable({    		 
    		processing: true,
    		ajax: {
		        url: '/ajaxOnProgressDataTable',
		        dataSrc: ''
		    },
   			columns: [
   				{data: 'transaction.id'},
   				{data: 'transaction.plan.name'},
   				{
   					data: ['address','province','city','district','zipcode'],
   					render: function ( data, type, row, meta ) {
   						return row.address + ', ' + row.district + ', ' + row.city + ', ' + row.province + ', ' + row.zipcode;
				    }
   				},
   				{data: 'total_shipment_left'},
   				{
   					data: null,
   					render: function ( data, type, row, meta ) {
   						return '<a class="btn btn-primary" style="margin: 10px;" href="/check-shipments/' + row.id + '">Show detail</a>';
				    }
   				}	
   			]
    	});



		//DataTable on_hold
    	$('#table_on_hold').DataTable({    		 
    		processing: true,
    		ajax: {
		        url: '/ajaxOnHoldDataTable',
		        dataSrc: ''
		    },
   			columns: [
   				{data: 'transaction.id'},
   				{data: 'transaction.plan.name'},
   				{data: 'transaction.time_bought'},
   				{data: 'transaction.status'},
   				{
   					data: ['id', 'transaction.id', 'transaction.status'], 
   					render: function ( data, type, row, meta ) {
   						return row.transaction.status=='to be confirmed'?   					
				      	'<a class="btn btn-primary" style="margin: 10px;" href="/check-shipments/' + row.id + '">Show detail</a>' +
				      	'<a class="btn btn-success" style="margin: 10px;" href="/payment-confirmation/' + row.transaction.id + '">Show payment confirmation detail</a>' +
				      	'<button class="btn btn-danger" style="margin: 10px;" type="button" data-toggle="modal" data-target="#removeModal" onClick="appendActionInRemoveForm(' + row.transaction.id + ')">Remove</button>':
				      	'<a class="btn btn-primary" style="margin: 10px;" href="/check-shipments/' + row.id + '">Show detail</a>';
				    }
   				}   				
   			]
    	});


    	//DataTable on_finished
    	$('#table_on_finished').DataTable({    		 
    		processing: true,
    		ajax: {
		        url: '/ajaxOnFinishedDataTable',
		        dataSrc: ''
		    },
   			columns: [
   				{data: 'transaction.id'},
   				{data: 'transaction.plan.name'},   		
   				{data: 'last_delivery_date'},
   				{
   					data: null,
   					render: function ( data, type, row, meta ) {
   						return '<a class="btn btn-primary" style="margin: 10px;" href="/check-shipments/' + row.id + '">Show detail</a>';
				    }
   				}	
   			]
    	});

	});

	//change remove form action dynamically
	function appendActionInRemoveForm(id){
		$("#removeForm").attr('action','/remove-transaction/' + id + '');
	}

</script>

@endsection
