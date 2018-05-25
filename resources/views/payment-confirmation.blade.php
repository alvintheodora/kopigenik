
@extends('layouts.app')

@section('title','Payment Confirmation')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<div class="text-center">
			<h2>Konfirmasi Pembayaran</h2>
			<h3>ID Pesanan: {{$transaction->id}}</h3>
			<h4>Jumlah uang yang harus anda bayar:</h4>
			<h4>Rp{{$transaction->total_price}}</h4>
			<p>Mohon segera selesaikan pembayaran sebelum tanggal <span class="strong">{{$time_confirmed_max}}</span></p>
			<p>Silahkan transfer ke rekening kami yang tersedia</p>
		</div>		
		<div class="row bank text-center-xs">
			<div class="col-sm-6">
				<img class="icon-bank" src="{{asset('asset/icon-bca.jpg')}}" alt="BCA">
			</div>
			<div class="col-sm-6">
				<p class="small">BCA</p>
				<p class="small">Nomor Rekening : 6038 483 222</p>
				<p class="small">Nama Pemilik Rekening : Kopigenik</p>
			</div>			
		</div>

		<br>

		<div class="text-center" style="font-weight: bold;">
			@if($transaction->status == 'to be confirmed')
				<form id="confirmPaymentForm" action="\payment-confirmation\{{$transaction->id}}" method="POST">
					{{csrf_field()}}
					<button class="btn btn-lg btn-success btn-block" type="button" data-toggle="modal" data-target="#confirmModal">Konfirmasi Pembayaran</button>

					<!-- Modal -->
					<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="confirmModalLabel">Informasi Pembayaran</h4>
					      </div>
					      <div class="modal-body">
					      	@isset($payment)
					      	<div class="form-group">
								<label for="bank_account">Bank</label>
								<input class="form-control text-center" type="text" name="bank_account" value="{{$payment->bank_account}}">
							</div>
					        <div class="form-group">
								<label for="account_holder">Pemilik Rekening</label>
								<input class="form-control text-center" type="text" name="account_holder" value="{{$payment->account_holder}}">
							</div>
							<div class="form-group">
								<label for="account_number">Nomor Rekening</label>
								<input class="form-control text-center" type="text" name="account_number" value="{{$payment->account_number}}">
							</div>
					      	@else
					      	<div class="form-group">
								<label for="bank_account">Bank</label>
								<input class="form-control text-center" type="text" name="bank_account">
							</div>
					        <div class="form-group">
								<label for="account_holder">Pemilik Rekening</label>
								<input class="form-control text-center" type="text" name="account_holder">
							</div>
							<div class="form-group">
								<label for="account_number">Nomor Rekening</label>
								<input class="form-control text-center" type="text" name="account_number">
							</div>
							@endisset
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					        <button id="confirmPaymentButton" type="submit" class="btn btn-primary">Konfirmasi Pembayaran <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></button>
					      </div>
					    </div>
					  </div>
					</div>
				</form>
			@elseif($transaction->status == 'to be approved')
				<p>Menunggu konfirmasi dari Kopigenik</p>
				<p>Maximum approval is 2 days from confirmation</p>		
				<a href="/check-shipments/">Go to my subscription<span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>	
			@elseif($transaction->status == 'approved')
				<p>Pembayaran telah dikonfirmasi oleh Kopigenik</p>
				<a href="/check-shipments/">Go to my subscription<span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>
			@endif	
		</div>

	</div>

@endsection