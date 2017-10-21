@extends('layouts.app')

@section('title','Check Shipment')

@section('content')

<!-- responsive table css-->
<!--<style type="text/css">
	@media screen and (max-width: 600px) {
		table {width:100%;}
		thead {display: none;}
		tr:nth-of-type(2n) {background-color: inherit;}
		tr td:first-child {background: #f0f0f0; font-weight:bold;font-size:1.3em;}
		tbody td {display: block;  text-align:center;}
		tbody td:before { 
		    content: attr(data-th); 
		    display: block;
		    text-align:center;  
		}
	}
</style>-->



	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">My Subscriptions</h1>

		<h2>On Progress</h2>
		@if($shipments_user->count()>0)
			<!--DataTable on progress-->	
					<table id="table_on_progress" class="table table-bordered nowrap" width="100%">
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
>				
		@endif


		<h2>On Hold</h2>
		@if($shipments_user_tb->count()>0)
			<!--DataTable on hold-->
	
					<table id="table_on_hold" class="table table-bordered nowrap" width="100%">
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
	
		@endif


		<h2>Finished Orders</h2>
		@if($shipments_user_finished->count()>0)
			<!--DataTable on_finished-->
			
					<table id="table_on_finished" class="table table-bordered nowrap" width="100%">
					    <thead>
					        <tr>
					            <th>ID</th>
					            <th>Plan</th>
					            <th>Last delivery date</th>
					            <th>Action</th>
					        </tr>
					    </thead>				 		    
					</table>
					
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
		        	<button id="removeButton" type="submit" class="btn btn-danger">Yes</button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>


	</div>

<!--responsive table script-->
<script type="text/javascript">
	function responsiveTable() {
		var headertext = [];
		var headers = document.querySelectorAll("thead");
		var tablebody = document.querySelectorAll("tbody");
		
		for(var i = 0; i < headers.length; i++) { 
			headertext[i]=[]; 
			for (var j = 0, headrow; headrow = headers[i].rows[0].cells[j]; j++) {
			 var current = headrow; headertext[i].push(current.textContent.replace(/\r?\n|\r/,"")); 
			} 
		} 
		if (headers.length > 0) {
			for (var h = 0, tbody; tbody = tablebody[h]; h++) {
				for (var i = 0, row; row = tbody.rows[i]; i++) {
				  for (var j = 0, col; col = row.cells[j]; j++) {	
				    col.setAttribute("data-th", headertext[h][j]);
				  } 
				}
			}
		}
	} 

</script>


<script type="text/javascript">
	$(document).ready( function () {

		//DataTable on_progress
    	$('#table_on_progress').DataTable({    
    		responsive: {
	            details: {
	                display: $.fn.dataTable.Responsive.display.modal( {
	                    header: function ( row ) {
	                        var data = row.data();
	                        return 'Details for Transaction ID '+ data.transaction.id;
	                    }
	                } ),
	                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
	                    tableClass: 'table'
	                } )
	            }
	        },		 
	        fixedHeader: {
		        headerOffset: 60
		    },
    		processing: true,
    		order:[[ 0, "desc" ]],
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
    		responsive: {
	            details: {
	                display: $.fn.dataTable.Responsive.display.modal( {
	                    header: function ( row ) {
	                        var data = row.data();
	                        return 'Details for Transaction ID '+ data.transaction.id;
	                    }
	                } ),
	                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
	                    tableClass: 'table'
	                } )
	            }
	        },    
	        fixedHeader: {
		        headerOffset: 60
		    },		 
    		processing: true,
    		order:[[ 0, "desc" ]],
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
    		responsive: {
	            details: {
	                display: $.fn.dataTable.Responsive.display.modal( {
	                    header: function ( row ) {
	                        var data = row.data();
	                        return 'Details for Transaction ID '+ data.transaction.id;
	                    }
	                } ),
	                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
	                    tableClass: 'table'
	                } )
	            }
	        },  		
	        fixedHeader: {
		        headerOffset: 60
		    },
    		processing: true,
    		order:[[ 0, "desc" ]],
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

    	//fires responsive plugin for table after DataTable completed fetching ajax 
    	$( document ).ajaxComplete(function() {
		  //responsiveTable();
		});

	});

	//change remove form action dynamically
	function appendActionInRemoveForm(id){
		$("#removeForm").attr('action','/remove-transaction/' + id + '');
	}

</script>

@endsection
