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

				<hr>

				<form action="\profile" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="email" class="">Email</label>
						<input class="form-control" type="text" name="email">
					</div>
					<div class="form-group">
						<label for="password" class="">Password</label>
						<input class="form-control" type="password" name="password">
					</div>
					<div class="form-group">
						<label for="password_confirmation" class="">Password confirmation</label>
						<input class="form-control" type="password" name="password_confirmation">
					</div>

					<button class="btn btn-lg btn-success btn-block">Change my profile data</button>
				</form>
			</div>
			<div class="col-sm-6">
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
				@endisset

				<hr>

				<form action="\profile\address" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="address" class="">Address</label>
						<input class="form-control" type="text" name="address">
					</div>
					<div class="form-group">
						<label for="province" class="">Province</label>
						<input class="form-control" type="text" name="province">
					</div>
					<div class="form-group">
						<label for="city" class="">City</label>
						<input class="form-control" type="text" name="city">
					</div>
					<div class="form-group">
						<label for="district" class="">District</label>
						<input class="form-control" type="text" name="district">
					</div>
					<div class="form-group">
						<label for="zipcode" class="">Zipcode</label>
						<input class="form-control" type="text" name="zipcode">
					</div>
					<div class="form-group">
						<label for="phone" class="">Phone number</label>
						<input class="form-control" type="text" name="phone">
					</div>

					<button class="btn btn-lg btn-success btn-block">Change my address</button>
				</form>
				
			</div>
		</div>
	</div>
@endsection