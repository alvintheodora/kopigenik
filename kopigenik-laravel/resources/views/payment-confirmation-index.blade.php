@extends('layouts.app')

@section('title','Payment Confirmation')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<ul>
			@foreach($transactions as $transaction)
				<li><a href="\payment-confirmation\{{$transaction->id}}">ID: {{$transaction->id}}</a>, status: {{$transaction->status}}</li>
			@endforeach
		</ul>
	</div>
@endsection