@extends('layouts.app')

@section('title','Payment Approval')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h2>To be Approved</h2>

		<!--DataTable tba-->
		<div style="width: 100%">
			<div class="table-responsive">
				<table id="table_tba" class="table-bordered" width="100%">
				    <thead>
				        <tr>
				            <th>ID</th>
				            <th>Customer Name</th>
				            <th>Time bought</th>
				            <th>Action</th>
				        </tr>
				    </thead>				 		    
				</table>
			</div>
		</div>	


		<h2>To be Confirmed</h2>

		<!--DataTable tbc-->
		<div style="width: 100%">
			<div class="table-responsive">
				<table id="table_tbc" class="table-bordered" width="100%">
				    <thead>
				        <tr>
				            <th>ID</th>
				            <th>Customer Name</th>
				            <th>Time bought</th>
				            <th>Action</th>
				        </tr>
				    </thead>				 		    
				</table>
			</div>
		</div>
	

		<h2>Approved</h2>

		<!--DataTable approved-->
		<div style="width: 100%">
			<div class="table-responsive">
				<table id="table_approved" class="table-bordered" width="100%">
				    <thead>
				        <tr>
				            <th>ID</th>
				            <th>Customer Name</th>
				            <th>Time bought</th>
				            <th>Action</th>
				        </tr>
				    </thead>				 		    
				</table>
			</div>
		</div>
		
	</div>



	<script type="text/javascript">
		$(document).ready( function () {

			//DataTable on_progress
	    	$('#table_tba').DataTable({    		 
	    		processing: true,
	    		order:[[ 0, "desc" ]],
	    		ajax: {
			        url: '/ajaxTbaDataTable',
			        dataSrc: ''
			    },
	   			columns: [
	   				{data: 'id'},
	   				{data: 'user.name'},
	   				{data: 'time_bought'},	   				
	   				{
	   					data: null,
	   					render: function ( data, type, row, meta ) {
	   						return '<a class="btn btn-primary" style="margin: 10px;" href="/transactions/' + row.id + '">Show detail</a>';
					    }
	   				}	
	   			]
	    	});


			//DataTable on_hold
	    	$('#table_tbc').DataTable({    		 
	    		processing: true,
	    		order:[[ 0, "desc" ]],
	    		ajax: {
			        url: '/ajaxTbcDataTable',
			        dataSrc: ''
			    },
	   			columns: [
	   				{data: 'id'},
	   				{data: 'user.name'},
	   				{data: 'time_bought'},	   				
	   				{
	   					data: null,
	   					render: function ( data, type, row, meta ) {
	   						return '<a class="btn btn-primary" style="margin: 10px;" href="/transactions/' + row.id + '">Show detail</a>';
					    }
	   				}	
	   			]
	    	});


	    	//DataTable on_finished
	    	$('#table_approved').DataTable({    		 
	    		processing: true,
	    		order:[[ 0, "desc" ]],
	    		ajax: {
			        url: '/ajaxApprovedDataTable',
			        dataSrc: ''
			    },
	   			columns: [
	   				{data: 'id'},
	   				{data: 'user.name'},
	   				{data: 'time_bought'},	   				
	   				{
	   					data: null,
	   					render: function ( data, type, row, meta ) {
	   						return '<a class="btn btn-primary" style="margin: 10px;" href="/transactions/' + row.id + '">Show detail</a>';
					    }
	   				}	
	   			]
	    	});

		});

	</script>

@endsection