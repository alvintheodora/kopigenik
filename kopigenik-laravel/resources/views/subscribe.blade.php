@extends('layouts.app')

@section('title','Subscribe')

@section('content')
	<div class="container-fluid">
		<h2 class="text-center">Subscribe</h2>

		<form id="subscribeForm" action="\subscribe" method="POST">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-8">
					<div class="form-group">

						<label for="select1" class="subscribeQuestion">Berapa banyak kopi yang anda konsumsi dalam 2 minggu?</label>			
						<select id="select1" name="coffee_consumption" class="inputText">
							<option value=""></option>
							<option value="{{$plans[0]}}">100 gram (6-7 gelas)</option>
							<option value="{{$plans[1]}}">250 gram (8-16 gelas)</option>
							<option value="{{$plans[2]}}">500 gram (>17 gelas)</option>
						</select>							
					</div>
					
					<div class="form-group">
						<label for="select4" class="subscribeQuestion">Apa tingkat kehalusan kopi yang biasa anda gunakan?</label>
						<select id="select4" name="coffee_grind_size" class="inputText">
							<option value=""></option>
							<option value="1">Beans</option>
							<option value="2">Coarse</option>
							<option value="3">Medium</option>
							<option value="4">Fine</option>
						</select>					
					</div>
					<div class="form-group">
						<label for="select5" class="subscribeQuestion">Berapa lama durasi langganan yang anda inginkan?</label>
						<select id="select5" name="subscribe_duration" class="inputText" >
							<option value=""></option>
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
							<input class="form-control awesomplete" list="mylist" type="text" name="province" id="province" value="{{$address->province}}">
							<!-- <input class="awesomplete" list="mylist" /> -->
							<datalist id="mylist">
								
								<?php 
									 $curl = curl_init();

								        curl_setopt_array($curl, array(
								          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
								          CURLOPT_RETURNTRANSFER => true,
								          CURLOPT_ENCODING => "",
								          CURLOPT_MAXREDIRS => 10,
								          CURLOPT_TIMEOUT => 30,
								          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								          CURLOPT_CUSTOMREQUEST => "GET",
								          CURLOPT_HTTPHEADER => array(
								            "key: a64321d648c698eb00c2e4306bf23f98"
								          ),
								        ));

								        $responseProv = curl_exec($curl);
								        $err = curl_error($curl);

								        curl_close($curl);
								        $responseProv = json_decode($responseProv);								      
								        
							        foreach ($responseProv->rajaongkir->results as $hasil) {
							           echo '<option value="'.$hasil->province.'">';
							        }
							       /* foreach ($responseProv['rajaongkir']['results'] as $hasil) {
							           echo '<option value="'.$hasil->province.'">';
							        }*/
							     ?>
								
							</datalist>
						</div>
						<div class="form-group">
							<label for="city" class="">City</label>

							<input class="form-control awesomplete" type="text" name="city" id="city" value="{{$address->city}}">
										
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

							<input class="form-control awesomplete" list="mylist" id="province" type="text" name="province">
							<datalist id="mylist">
								
								<?php 
									 $curl = curl_init();

								        curl_setopt_array($curl, array(
								          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
								          CURLOPT_RETURNTRANSFER => true,
								          CURLOPT_ENCODING => "",
								          CURLOPT_MAXREDIRS => 10,
								          CURLOPT_TIMEOUT => 30,
								          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								          CURLOPT_CUSTOMREQUEST => "GET",
								          CURLOPT_HTTPHEADER => array(
								            "key: a64321d648c698eb00c2e4306bf23f98"
								          ),
								        ));

								        $responseProv = curl_exec($curl);
								        $err = curl_error($curl);

								        curl_close($curl);
								        $responseProv = json_decode($responseProv);								      
								        
							        foreach ($responseProv->rajaongkir->results as $hasil) {
							           echo '<option value="'.$hasil->province.'">';
							        }
							       /* foreach ($responseProv['rajaongkir']['results'] as $hasil) {
							           echo '<option value="'.$hasil->province.'">';
							        }*/
							     ?>
								
							</datalist>
						</div>
						
						<div class="form-group">
							<label for="city" class="">City</label>
							<input class="form-control awesomplete" type="text" name="city" id="city">
							<!-- <input class="form-control awesomplete" id="city" type="text" name="city"> -->
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
						<textarea class="form-control" name="additional_note" id="addNotes"></textarea>
					</div>

				</div>

				<div class="col-sm-5 col-sm-offset-1">
					<div class="summary" id="orderSummary">
						<h3>Ringkasan Pesanan</h3>
						<div class="row">
							<div class="col-xs-6">
								<p id="plan_selected">Rencana berlangganan: -</p>
							</div>
							<div class="col-xs-6">
								<p id="plan_price">-</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<p>Durasi langganan</p>
							</div>
							<div class="col-xs-6">
								<p id="subscribe_duration">-</p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-6">
								<p>Sub Total</p>
							</div>
							<div class="col-xs-6">
								<p id="sub_total">-</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<p>Ongkos kirim</p>
							</div>
							<div class="col-xs-6">
								<p id="shipping_cost">-</p>
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


						<button type="submit" class="btn btn-lg btn-success btn-block">Buy</button>	
						<p id="city_result">-</p>
						<p id="province_result">-</p>
						<p id="error_result">-</p>

					</div>
				</div>
			</div>		

		</form>

		<!--<form action="/delivery" method="POST">
			{{csrf_field()}}
			<input class="form-control" id="city" type="text" name="city2">
			<button type="submit">enter</button>

		</form>	

		<div class="col-xs-6">
			@isset($response)
			{{$response}}
			@endisset
		</div>
		-->
	</div>


	<!--ajax script-->
	<script type="text/javascript">

		$(document).ready(function(){

			/*$('#select1').change(function(){
				$plan = $(this).val();

				$.get('/ajaxPlan', {plan: $plan}, function(data){
					$("#plan_selected").html('Rp' + data);
					//$("#plan_selected_month").html((parseInt(data) * 2).toString());
					$("#total_price").html('Rp' + data);
				})
				.fail(function(){
					$("#plan_selected").html('-');
					//$("#plan_selected_month").html('-');
					//$("#total_price").html('-');
				});

			});*/

 			/*if($("#select1").val() != "" && $("#select5").val() != "" && $('#province').val() != "" && $('#city') != ""){
 				$subscribe_duration = $("#select5").val();
				$plan = $('#select1').val();
				$city = $('#city').val();
				$province = $('#province').val();
				
				$.ajax({
				  method: "GET",
				  url: "/ajaxGetShipCost",
				  data: {plan: $plan, subscribe_duration: $subscribe_duration, city: $city, province: $province},
				  dataType: "json"
				})
				.done(function(data){
					

					$("#shipping_cost").html('Rp' + data.shipping_cost + '<span class="small"> untuk ' + $subscribe_duration*2 + ' kali pengiriman</span>');
					$("#total_price").html('Rp' + (parseInt(data.plan_price) * $subscribe_duration + parseInt(data.shipping_cost)))
					$('#city_result').html(data.city_name);
					$('#province_result').html(data.province_name);
					$('#error_result').html(data.error_name);
					
					
				})
				.fail(function(data){
					$("#plan_selected").html('Rencana berlangganan: Fail');
					$("#plan_price").html('error');
					$("#subscribe_duration").html('error');
					$("#sub_total").html('error');
					$("#shipping_cost").html('error');
					$("#total_price").html('error');
					$('#city_result').html('error');
					$('#province_result').html('error');
					$('#error_result').html('Error');

					alert('Mohon Periksa Kembali Data Pengiriman Add Notes');
				});
 			}*/

			var awesompleteCity = new Awesomplete(document.getElementById('city'));
			$('#city').focus(function(){
				$province = $('#province').val();
				var ajax = new XMLHttpRequest();
				ajax.open("GET", "/ajaxGetCity?province="+$province, true);
				ajax.onload = function() {
					var list = JSON.parse(ajax.responseText);
					var results = list.rajaongkir.results;
					var cities = results.map(function(i) { return i.city_name; });			
					awesompleteCity.list = cities;
				};
				ajax.send();

			});

			/*$('#addNotes').focus(function(){
				$subscribe_duration = $("#select5").val();
				$plan = $('#select1').val();
				$city = $('#city').val();
				$province = $('#province').val();
				
				$.ajax({
				  method: "GET",
				  url: "/ajaxGetShipCost",
				  data: {plan: $plan, subscribe_duration: $subscribe_duration, city: $city, province: $province},
				  dataType: "json"
				})
				.done(function(data){
					

					$("#shipping_cost").html('Rp' + data.shipping_cost + '<span class="small"> untuk ' + $subscribe_duration*2 + ' kali pengiriman</span>');
					$("#total_price").html('Rp' + (parseInt(data.plan_price) * $subscribe_duration + parseInt(data.shipping_cost)))
					$('#city_result').html(data.city_name);
					$('#province_result').html(data.province_name);
					$('#error_result').html(data.error_name);
					
					
				})
				.fail(function(data){
					$("#plan_selected").html('Rencana berlangganan: Fail');
					$("#plan_price").html('error');
					$("#subscribe_duration").html('error');
					$("#sub_total").html('error');
					$("#shipping_cost").html('error');
					$("#total_price").html('error');
					$('#city_result').html('error');
					$('#province_result').html('error');
					$('#error_result').html('Error');

					alert('Mohon Periksa Kembali Data Pengiriman Add Notes');
				});

			});	*/
			
			//$('#province,#city').change(function(){
			$('#province,#city,#select1,#select5').mouseleave(function(){
				if($("#select1").val() != "" && $("#select5").val() != ""){

					if($('#province').val() != "" && $('#city') != ""){
						//alert('Menarik Ship Cost');
						$subscribe_duration = $("#select5").val();
						$plan = $('#select1').val();
						$city = $('#city').val();
						$province = $('#province').val();
						
						$.ajax({
						  method: "GET",
						  url: "/ajaxGetShipCost",
						  data: {plan: $plan, subscribe_duration: $subscribe_duration, city: $city, province: $province},
						  dataType: "json"
						})
						.done(function(data){
							$("#plan_selected").html('Rencana berlangganan: ' + data.plan_weight + 'gr (' + data.plan_weight + ' gr per 2 minggu)');
							$("#plan_price").html('Rp' + (data.plan_price) + '<span class="small"> untuk 1 bulan');
							$("#subscribe_duration").html(data.subscribe_duration + ' bulan');
							$("#sub_total").html('Rp' + (data.subscribe_duration * data.plan_price));
							$("#delivery_price").html('Rp' + (data.subscribe_duration * data.plan_price));

							$("#shipping_cost").html('Rp' + data.shipping_cost*data.subscribe_duration*2 + '<span class="small"> untuk ' + $subscribe_duration*2 + ' kali pengiriman</span>');
							$("#total_price").html('Rp' + (parseInt(data.plan_price) * $subscribe_duration + parseInt(data.shipping_cost*data.subscribe_duration*2)))
							$('#city_result').html(data.city_name);
							$('#province_result').html(data.destination_name);
							$('#error_result').html(data.error_name);
							
							
						})
						.fail(function(data){
							$("#plan_selected").html('Rencana berlangganan: Fail');
								$("#plan_price").html('-');
								$("#subscribe_duration").html('-');
								$("#sub_total").html('-');
							$("#shipping_cost").html('error');
							$("#total_price").html('error');
							$('#city_result').html('error');
							$('#province_result').html('error');
							$('#error_result').html('Error');

							//alert('Mohon Periksa Kembali Data Pengiriman All Fields');
						});
					}
					else{
						//alert('Data Belum Lengkap');
							//$('#select1,#select5').change(function(){
							$subscribe_duration = $("#select5").val();
							$plan = $('#select1').val();
							$city = $('#city').val();
							$province = $('#province').val();
							//alert($province);
							//alert('javascrip' + $subscribe_duration);
							$.ajax({
							  method: "GET",
							  url: "/ajaxSubscribeDuration",
							  //data: {plan: $plan, subscribe_duration: $subscribe_duration, city: $city, province: $province},
							  data: {plan: $plan, subscribe_duration: $subscribe_duration},
							  dataType: "json"
							})
							.done(function(data){
								$("#plan_selected").html('Rencana berlangganan:-' + data.plan_weight + 'gr (' + data.plan_weight + ' gr per 2 minggu)');
								$("#plan_price").html('Rp' + (data.plan_price) + '<span class="small"> untuk 1 bulan');
								$("#subscribe_duration").html(data.subscribe_duration + ' bulan');
								$("#sub_total").html('Rp' + (data.subscribe_duration * data.plan_price));
								$("#shipping_cost").html('-');
								$("#total_price").html('-');
								$('#city_result').html('-');
								$('#province_result').html('-');
								$('#error_result').html("");
								//alert(data.shipping_cost + data.plan_price + data.plan_weight + data.subscribe_duration + data.city_name + data.province_name);
								
							})
							.fail(function(data){
								$("#plan_selected").html('Rencana berlangganan: Fail');
								$("#plan_price").html('-');
								$("#subscribe_duration").html('-');
								$("#sub_total").html('-');
								
								$('#error_result').html('Error');

								//alert('Mohon Periksa Kembali Data Pengiriman');
							});
					}
					//});
					
				}
				

			});
			

			/*$('#select1,#select5').change(function(){
				$subscribe_duration = $("#select5").val();
				$plan = $('#select1').val();
				$city = $('#city').val();
				$province = $('#province').val();
				//alert($province);
				//alert('javascrip' + $subscribe_duration);
				$.ajax({
				  method: "GET",
				  url: "/ajaxSubscribeDuration",
				  data: {plan: $plan, subscribe_duration: $subscribe_duration, city: $city, province: $province},
				  dataType: "json"
				})
				.done(function(data){
					$("#plan_selected").html('Rencana berlangganan: ' + data.plan_weight + 'gr (' + data.plan_weight + ' gr per 2 minggu)');
					$("#plan_price").html('Rp' + (data.plan_price) + '<span class="small"> untuk 1 bulan');
					$("#subscribe_duration").html(data.subscribe_duration + ' bulan');
					$("#sub_total").html('Rp' + (data.subscribe_duration * data.plan_price));
					$("#delivery_price").html('Rp' + (data.subscribe_duration * data.plan_price));

					
					$('#city_result').html(data.city_name);
					$('#province_result').html(data.province_name);
					$('#error_result').html(data.error_name);
					//alert(data.shipping_cost + data.plan_price + data.plan_weight + data.subscribe_duration + data.city_name + data.province_name);
					
				})
				.fail(function(data){
					$("#plan_selected").html('Rencana berlangganan: Fail');
					$("#plan_price").html('-');
					$("#subscribe_duration").html('-');
					$("#sub_total").html('-');
					$("#shipping_cost").html('-');
					$("#total_price").html('-');
					$('#city_result').html('-');
					$('#province_result').html('-');
					$('#error_result').html('Error');

					alert('Mohon Periksa Kembali Data Pengiriman');
				});

			});*/	




		});
	</script>
@endsection