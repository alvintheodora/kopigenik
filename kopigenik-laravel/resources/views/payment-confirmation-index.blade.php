@extends('layouts.app')

@section('title','Payment Confirmation')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">Payment Confirmation</h1>
		<ul>
			@if(! is_null($transactions))
				@foreach($transactions as $transaction)
					<li><a href="\payment-confirmation\{{$transaction->id}}">ID: {{$transaction->id}}</a>, {{$transaction->plan->name}} ({{$transaction->subscribe_duration}} months), Time bought: {{$transaction->time_bought}} , status: {{$transaction->status}}</li>
				@endforeach
			@endif
		</ul>
	</div>
@endsection