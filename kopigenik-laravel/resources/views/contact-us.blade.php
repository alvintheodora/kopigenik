@extends('layouts.app')

@section('title','Contact Us')

@section('content')
	<!--top-->
	<div class="jumbotron text-center">
		<h1>Contact Us</h1>
		<p>Kindly leave us a message</p>
	</div>

	<!--body-->
	<div class="container-fluid container-after-jumbotron">
		<div class="row">
			<div class="col-sm-5 col-sm-offset-1">
				<h2>Leave your message here</h2>
				<div class="well">				
					<form action="\contact-us" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label for="name" class="">Name</label>
							@auth
								<input class="form-control" type="text" name="name" value="{{auth()->user()->name}}">
							@else
								<input class="form-control" type="text" name="name">
							@endauth
						</div>
						<div class="form-group">
							<label for="email" class="">Email</label>
							@auth
								<input class="form-control" type="text" name="email" value="{{auth()->user()->email}}">
							@else
								<input class="form-control" type="text" name="email">
							@endauth
						</div>
						<div class="form-group">
							<label for="subject" class="">Subject</label>
							<input class="form-control" type="text" name="subject" placeholder="Product / Delivery System / Partnership / etc">
						</div>
						<div class="form-group">
							<label for="message" class="">Message</label>
							<textarea class="form-control" name="message" rows="3"></textarea>
						</div>				
						<button class="btn btn-lg btn-success btn-block" type="submit">Send</button>
					</form>
				 </div>
			</div>

			<div class="col-sm-5 col-sm-offset-1">
				<h2>Our Office</h2>
				<h3 class="strong">Address</h3>
				<p>Binus University</p>
				<p>Jl. Kebon Jeruk Raya No. 27, Kebon Jeruk</p>
				<p>Jakarta Barat 11530</p>

				<h3 class="strong">Phone</h3>
				<p>0812345678</p>
			</div>
		</div>		
	</div>
@endsection