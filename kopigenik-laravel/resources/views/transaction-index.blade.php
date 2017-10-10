@extends('layouts.app')

@section('title','Payment Approval')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h2>To be Approved</h2>
		<ul>
			@foreach($transactions_tba as $transaction)				
				
					<li><a href="\transactions\{{$transaction->id}}">ID: {{$transaction->id}}</a>, Time bought: {{$transaction->time_bought}}
					</li>				
			@endforeach
		</ul>

		<h2>To be Confirmed</h2>
		<ul>
			@foreach($transactions_tbc as $transaction)				
				
					<li><a href="\transactions\{{$transaction->id}}">ID: {{$transaction->id}}</a>, Time bought: {{$transaction->time_bought}}
					</li>				
			@endforeach
		</ul>

		<h2>Approved</h2>
		<ul>
			@foreach($transactions_approved as $transaction)				
				
					<li><a href="\transactions\{{$transaction->id}}">ID: {{$transaction->id}}</a>, Time bought: {{$transaction->time_bought}}
					</li>				
			@endforeach	
		</ul>		
	</div>
@endsection