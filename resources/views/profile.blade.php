@extends('layouts.app')

@section('title','Profile')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">Edit Profile</h1>

		<div class="row">
			<div class="col-sm-3 col-sm-offset-2">
				<h3>Account</h3>
				<label for="name">Name</label>
				<p>{{auth()->user()->name}}</p>
				<label for="name">Email</label>
				<p>{{auth()->user()->email}}</p>

				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAccount" aria-expanded="false" aria-controls="collapseAccount">
  					Change my email
				</button>

				<div class="collapse" id="collapseAccount">
				  <div class="well">		
					<form action="\profile" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label for="email" class="">Email</label>
							<input class="form-control" type="text" name="email">
						</div>
						<p class="small">To change password, please logout first, then on the login page, click 'forget your password'</p>

						<button class="btn btn-lg btn-success btn-block" type="submit">Change my email</button>
					</form>
				  </div>
				</div>	
										
			</div>


			<div class="col-sm-3">
				<h3>Address</h3>
				@isset($address)
					<label for="address" class="">Address</label>
					<p>{{$address->address}}</p>
					<label for="province" class="">Province</label>
					<p>{{$address->province}}</p>
					<label for="city" class="">City</label>
					<p>{{$address->city}}</p>
					<label for="district" class="">District</label>
					<p>{{$address->district}}</p>
					<label for="zipcode" class="">Zipcode</label>
					<p>{{$address->zipcode}}</p>
					<label for="phone" class="">Phone</label>
					<p>{{$address->phone}}</p>
					
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAddress" aria-expanded="false" aria-controls="collapseAddress">
  						Change my address
					</button>

					<div class="collapse" id="collapseAddress">
					  <div class="well">				
						<form action="\profile\address" method="POST">
							{{csrf_field()}}
							<div class="form-group">
								<label for="address" class="">Address</label>
								<input class="form-control" type="text" name="address" value="{{$address->address}}">
							</div>
							<div class="form-group">
								<label for="province" class="">Province</label>
								<input class="form-control" type="text" name="province" value="{{$address->province}}">
							</div>
							<div class="form-group">
								<label for="city" class="">City</label>
								<input class="form-control" type="text" name="city" value="{{$address->city}}">
							</div>
							<div class="form-group">
								<label for="district" class="">District</label>
								<input class="form-control" type="text" name="district" value="{{$address->district}}">
							</div>
							<div class="form-group">
								<label for="zipcode" class="">Zipcode</label>
								<input class="form-control" type="text" name="zipcode" value="{{$address->zipcode}}">
							</div>
							<div class="form-group">
								<label for="phone" class="">Phone number</label>
								<input class="form-control" type="text" name="phone" value="{{$address->phone}}">
							</div>

							<button class="btn btn-lg btn-success btn-block" type="submit">Confirm changes</button>
						</form>
					  </div>
					</div>
				@endisset				
				
			</div>


			<div class="col-sm-3">
				<h3>Akun Bank</h3>
				@isset($payment)
					<label for="payment" class="">Bank</label>
					<p>{{$payment->bank_account}}</p>
					<label for="province" class="">Nama Pemilik Rekening</label>
					<p>{{$payment->account_holder}}</p>
					<label for="city" class="">Nomor Rekening</label>
					<p>{{$payment->account_number}}</p>

					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
  						Change my bank account
					</button>

					<div class="collapse" id="collapsePayment">
					  <div class="well">		
						<form action="\profile\payment" method="POST">
							{{csrf_field()}}
							<div class="form-group">
								<label for="address" class="">Bank</label>
								<input class="form-control" type="text" name="bank_account" value="{{$payment->bank_account}}">
							</div>
							<div class="form-group">
								<label for="province" class="">Nama Pemilik Rekening</label>
								<input class="form-control" type="text" name="account_holder" value="{{$payment->account_holder}}">
							</div>
							<div class="form-group">
								<label for="city" class="">Nomor Rekening</label>
								<input class="form-control" type="text" name="account_number" value="{{$payment->account_number}}">
							</div>

							<button class="btn btn-lg btn-success btn-block" type="submit">Confirm changes</button>
						</form>
					  </div>
					</div>
					
				@endisset							
				
			</div>

		</div>
	</div>
@endsection