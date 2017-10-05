@extends('layouts.app')

@section('title','Check Shipment')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">Check Shipment</h1>
		
		<h2>To be Approved</h2>
			@foreach($transactions_tba as $transaction)				
				<ul>
					<li><a href="\transactions\{{$transaction->id}}">ID: {{$transaction->id}}</a>, status: {{$transaction->status}}
					</li>
				</ul>
			@endforeach

		<h2>To be Confirmed</h2>
			@foreach($transactions_tbc as $transaction)				
				<ul>
					<li><a href="\transactions\{{$transaction->id}}">ID: {{$transaction->id}}</a>, status: {{$transaction->status}}
					</li>
				</ul>
			@endforeach

		<h2>Approved</h2>
			@foreach($transactions_approved as $transaction)				
				<ul>
					<li><a href="\transactions\{{$transaction->id}}">ID: {{$transaction->id}}</a>, status: {{$transaction->status}}
					</li>
				</ul>
			@endforeach			
	</div>
@endsection