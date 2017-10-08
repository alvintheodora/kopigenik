@extends('layouts.app')

@section('title','Payment Approval')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h2>Transaction ID: {{$transaction->id}}</h2>
		<p><span>Name: {{$transaction->user->name}}</span></p>
		<p><span>Plan: {{$transaction->plan->name}}</span></p>
		<p><span>Price: {{$transaction->price}}</span></p>
		<p><span>Bank: {{$transaction->bank_account}}</span></p>
		<p><span>Account Holder: {{$transaction->account_holder}}</span></p>
		<p><span>Account Number: {{$transaction->account_number}}</span></p>

		<p><span>Time bought: {{$transaction->time_bought}}</span></p>
		<p><span>Time confirmed: {{$transaction->time_confirmed}}</span></p>
		<p><span>Time approved: {{$transaction->time_approved}}</span></p>
		<p><span>Status: {{$transaction->status}}</span></p>

		@if($transaction->status == 'to be approved')
			<form action="\transactions\{{$transaction->id}}" method="POST">
				{{csrf_field()}}
					<button class="btn btn-lg btn-success btn-block" type="submit">Approve</button>	
			</form>		
		@endif
	</div>
@endsection