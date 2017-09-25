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
				</div>
				
				<div class="col-lg-4">
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

						<button class="btn btn-lg btn-success btn-block" type="submit">Buy</button>				
					</div>
				</div>

			</div>			
		</form>	
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#select1').change(function(){
				$plan = $(this).val();
				$.get('/ajaxPlan', {plan: $plan}, function(data){
					$("#plan_selected").html(data);
					//$("#plan_selected_month").html((parseInt(data) * 2).toString());
					$("#total_price").html((parseInt(data) + 9000).toString());
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