@extends('layouts.app')

@section('title','Payment Confirmation')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<div class="text-center">
			<h2>Payment Confirmation</h2>
			<h3>Order ID: TR001</h3>
			<h4>Amount you must pay:</h4>
			<h4>Rp252.000</h4>
			<p>Mohon segera selesaikan pembayaran sebelum tanggal <span class="strong">31 Desember 2017</span></p>
			<p>Silahkan transfer ke rekening kami yang tersedia</p>
		</div>		
		<div class="row bank text-center-xs">
			<div class="col-sm-6">
				<img class="icon-bank" src="{{asset('asset/icon-bca.jpg')}}" alt="BCA">
			</div>
			<div class="col-sm-6">
				<p class="small">BCA</p>
				<p class="small">Nomor Rekening: 6038 483 222</p>
				<p class="small">Nama Pemilik Rekening: Kopigenik</p>
			</div>			
		</div>

		<br>

		<form action="\payment-confirmation\{{$transaction->id}}" method="POST">
			{{csrf_field()}}
			<button class="btn btn-lg btn-success btn-block">Confirm payment</button>			
		</form>	
	</div>
@endsection