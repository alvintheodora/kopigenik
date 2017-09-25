@extends('layouts.app')

@section('title','Payment Confirmation')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<ul>
			@if(! is_null($transactions))
				@foreach($transactions as $transaction)
					@if($transaction->status == 'to be confirmed')
						<li><a href="\payment-confirmation\{{$transaction->id}}">ID: {{$transaction->id}}</a>, status: {{$transaction->status}}</li>
					@else
						<li>ID: {{$transaction->id}}, status: {{$transaction->status}}</li>
					@endif
				@endforeach
			@endif
		</ul>
	</div>
@endsection