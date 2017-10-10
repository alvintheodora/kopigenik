@extends('layouts.app')

@section('title','Subscribe')

@section('content')
	<div class="container-fluid">
		<h2 class="text-center">Subscribe</h2>

		<form action="\subscribe" method="POST">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-8">
					<div class="form-group">
						<label for="select1" class="subscribeQuestion">Berapa banyak kopi yang anda konsumsi dalam 2 minggu?</label>			
						<select id="select1" name="select1" class="inputText">
							<option value="0"></option>
							<option value="{{$plans[0]}}">6-7 gelas</option>
							<option value="{{$plans[1]}}">8-16 gelas</option>
							<option value="{{$plans[2]}}">>17 gelas</option>
						</select>							
					</div>
					<div class="form-group">
						<label for="select2" class="subscribeQuestion">Apakah anda memiliki grinder?</label>			
						<select id="select2" class="inputText">
							<option value="0"></option>
							<option value="a">Ya</option>
							<option value="b">Tidak</option>
						</select>							
					</div>
					<div class="form-group">
						<label for="select3" class="subscribeQuestion">Metode apa yang biasa anda gunakan untuk menyeduh kopi?</label>			
						<select id="select3" class="inputText">
							<option value="0"></option>
							<option value="a">Tubruk / Turkish</option>
							<option value="b">V60</option>
							<option value="c">French Press / Aero Press</option>
						</select>							
					</div>
					<div class="form-group">
						<label for="select4" class="subscribeQuestion">Apa tingkat kehalusan kopi yang biasa anda gunakan?</label>
						<select id="select4" class="inputText">
							<option value="0"></option>
							<option value="a">Beans</option>
							<option value="b">Coarse</option>
							<option value="c">Medium</option>
							<option value="d">Fine</option>
						</select>					
					</div>
					<div class="form-group">
						<label for="select5" class="subscribeQuestion">Berapa lama durasi langganan yang anda inginkan?</label>
						<select id="select5" name="subscribe_duration" class="inputText" >
							<option value="0"></option>
							<option value="1">1 Bulan</option>
							<option value="2">2 Bulan</option>
							<option value="3">3 Bulan</option>
						</select>					
					</div>					
				</div>							
			</div>			
		

			<h2>Data Pengiriman</h2>
			
			<div class="row">
				<div class="col-sm-6">
					

					<div class="form-group">
						<label for="name" class="">Name</label>
						@empty(auth()->user()->name)
							<input class="form-control" type="text" name="name">
						@else
							<input class="form-control" type="text" name="name" value="{{auth()->user()->name}}">
						@endempty
					</div>

					@isset($address)
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
							<label for="phone" class="">Phone Number</label>
							<input class="form-control" type="text" name="phone" value="{{$address->phone}}">
						</div>						

					@else

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
							<label for="phone" class="">Phone Number</label>
							<input class="form-control" type="text" name="phone">
						</div>				
					@endisset

					<div class="form-group">
						<label for="additional_note" class="">Additional Note</label>
						<textarea class="form-control" name="additional_note"></textarea>
					</div>

				</div>

				<div class="col-sm-4 col-sm-offset-2">
						<div class="summary" id="orderSummary">
							<h3>Ringkasan Pesanan</h3>
							<div class="row">
								<div class="col-xs-6">
									<p>250 gram (125 gram per 2 minggu)</p>
								</div>
								<div class="col-xs-6">
									<p id="plan_selected">-</p>
								</div>
							</div>
							<!--<div class="row">
								<div class="col-xs-6">
									<p>Total (1 bulan)</p>
								</div>
								<div class="col-xs-6">
									<p id="plan_selected_month">-</p>
								</div>
							</div>-->
							<div class="row">
								<div class="col-xs-6">
									<p>Ongkos kirim</p>
								</div>
								<div class="col-xs-6">
									<p>Rp9.000</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-6">
									<p>Total harga</p>
								</div>
								<div class="col-xs-6">
									<p id="total_price">-</p>
								</div>
							</div>	

							<button type="button" class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#myModal">Buy</button>			
						</div>
					</div>
			</div>	

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Payment Information</h4>
			      </div>
			      <div class="modal-body">
			      	<div class="form-group">
						<label for="bank_account">Bank</label>
						<input class="form-control" type="text" name="bank_account">
					</div>
			        <div class="form-group">
						<label for="account_holder">Account Holder</label>
						<input class="form-control" type="text" name="account_holder">
					</div>
					<div class="form-group">
						<label for="account_number">Account Number</label>
						<input class="form-control" type="text" name="account_number">
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Checkout <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></button>
			      </div>
			    </div>
			  </div>
			</div>

		</form>
	</div>

	<!--ajax script-->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#select1').change(function(){
				$plan = $(this).val();
				$.get('/ajaxPlan', {plan: $plan}, function(data){
					$("#plan_selected").html('Rp' + data);
					//$("#plan_selected_month").html((parseInt(data) * 2).toString());
					$("#total_price").html('Rp' + (parseInt(data) + 9000).toString());
				})
				.fail(function(){
					$("#plan_selected").html('-');
					//$("#plan_selected_month").html('-');
					$("#total_price").html('-');
				});
			});
		});
	</script>
@endsection