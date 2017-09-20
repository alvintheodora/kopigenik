<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopigenik | Subscribe</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<?php include 'head.php'; ?>
  
</head>
<body>

	<!--navigation bar-->
	<?php include 'navbar.php'; ?>

	<!--top-->

	<!--body-->
	<div class="container-fluid">
		<h2 class="text-center">Subscribe 5</h2>
		test
		gh1
		gh2

		<form action="payment-confirmation.php" method="POST">
			<div class="row">
				<div class="col-lg-8">
					<div class="form-group">
						<label for="select1" class="subscribeQuestion">aBerapa banyak kopi yang anda konsumsi dalam 2 minggu?</label>			
						<select id="select1" class="inputText">
							<option value="0"></option>
							<option value="a">6-7 gelas</option>
							<option value="b">8-16 gelas</option>
							<option value="c">>17 gelas</option>
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
								<p>250 gram (per 2 minggu)</p>
							</div>
							<div class="col-xs-6">
								<p>Rp95.000</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<p>Total (1 bulan)</p>
							</div>
							<div class="col-xs-6">
								<p>Rp190.000</p>
							</div>
						</div>
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
								<p>Rp294.000</p>
							</div>
						</div>	

						<button class="btn btn-lg btn-success btn-block" type="submit">Buy</button>				
					</div>
				</div>

			</div>			
		</form>	
	</div>	

	<!--FOOTER-->
	<?php include 'footer.php'; ?>

</body>
</html>
