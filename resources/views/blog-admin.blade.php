@extends('layouts.app')

@section('title','Blog Admin')

@section('content')

	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">Posts</h1>
		<p><a class="btn btn-default btn-primary" href="/blog-admin/create-post">Add new</a></p>

		<table id="table_posts" class="table table-bordered nowrap" width="100%">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Title</th>
		            <th>Published Date</th>
		            <th>Action</th>
		        </tr>
		    </thead>				 		    
		</table>
				
	


		<form id="removeForm" action="/blog-admin/remove-post/" method="POST">
			{{csrf_field()}}
			<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Remove Post?</h4>
			      </div>
			      <div class="modal-body">
			      	<p>Are you sure to remove the post?</p>
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


<script type="text/javascript">
	$(document).ready( function () {

		//DataTable on_progress
    	$('#table_posts').DataTable({    
    		responsive: {
	            details: {
	                display: $.fn.dataTable.Responsive.display.modal( {
	                    header: function ( row ) {
	                        var data = row.data();
	                        return 'Details for Post ID '+ data.id;
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
		        url: '/ajaxPostDataTable',
		        dataSrc: ''
		    },
   			columns: [
   				{data: 'id'},
   				{data: 'title'},
   				{data: 'created_at'},   				
   				{
   					data: null,
   					render: function ( data, type, row, meta ) {
   						return '<a class="btn btn-primary" style="margin: 10px;" target="_blank" href="/blog/' + row.id + '">View</a>' + 
						'<button class="btn btn-danger" style="margin: 10px;" type="button" data-toggle="modal" data-target="#removeModal" onClick="appendActionInRemoveForm(' + row.id + ')">Remove</button>';
				    }
   				}	
   			]
    	});

	});

	//change remove form action dynamically
	function appendActionInRemoveForm(id){
		$("#removeForm").attr('action','/blog-admin/remove-post/' + id + '');
	}

</script>

@endsection
