<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopigenik | Shopping Cart</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="css/kopigenik.css">
 	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
 	<script src="js/jquery-3.2.1.min.js"></script>
  	<script src="js/bootstrap.js"></script>
  	<script src="js/kopigenik.js"></script>	
  
</head>
<body>

	<!--navigation bar-->
	<div id="includedNavbar"></div>

	<!--body-->
	<div class="container-fluid">
		<h2 class="text-center">Shopping Cart</h2>

		<form action="payment-confirmation.php" method="POST">
			<div class="summary">
				<h3>Shopping Cart</h3>
				<div class="row">
					<div class="col-sm-5">
						<p class="strong"><u>Item 1</u></p>
						<p class="small" style="color: #3E2723;">Plan A: 250 gr(per 2 minggu)</p>
						<p class="small">1 Item (0.5 kg) x Rp 15.000</p>
					</div>
					<div class="col-sm-2">
						<div class="row">
							<div class="col-xs-6 col-sm-12">
								<p class="strong">Subtotal</p>
							</div>
							<div class="col-xs-6 col-sm-12 text-right-xxs">
								<p class="small">Rp95.000</p>
							</div>
						</div>							
					</div>
					<div class="col-sm-5">
						<div class="row">
							<div class="col-xs-6 col-sm-12">
								<p class="strong">Remark</p>
							</div>
							<div class="col-xs-6 col-sm-12 text-right-xxs">
								<p class="small">-</p>
							</div>
						</div>										
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<p class="strong"><u>Item 2</u></p>
						<p class="small" style="color: #3E2723;">Hario V60</p>
						<p class="small">2 Item (1.1 kg) x Rp 86.000</p>
					</div>
					<div class="col-sm-2">
						<div class="row">
							<div class="col-xs-6 col-sm-12">
								<p class="strong">Subtotal</p>
							</div>
							<div class="col-xs-6 col-sm-12 text-right-xxs">
								<p class="small">Rp172.000</p>
							</div>
						</div>						
					</div>
					<div class="col-sm-5">
						<div class="row">
							<div class="col-xs-6 col-sm-12">
								<p class="strong">Remark</p>
							</div>
							<div class="col-xs-6 col-sm-12 text-right-xxs">
								<p class="small">Warna hitam</p>
							</div>
						</div>											
					</div>
				</div>

				<hr>
				
				<div class="row">
					<div class="col-sm-5">
						<p class="strong">Shipping destination</p>
						<p class="small">JNE Reguler</p>
						<p class="strong">Alvin Theodora</p>
						<p class="small">Poris Garden Blok C 3 nomor 12, Cipondoh, Tangerang</p>
						<p class="small">Cipondoh Kota Tangerang, 15148</p>
						<p class="small">Banten</p>
						<p class="small">Telp: 088493554433</p>
					</div>				
					<div class="col-sm-2">
						<div class="row">
							<div class="col-xs-6 col-sm-12">
								<p class="strong">Total Items</p>
							</div>
							<div class="col-xs-6 col-sm-12 text-right-xxs">
								<p class="small">2 (2.7 kg)</p>
							</div>
						</div>	
					</div>			
					<div class="col-sm-2">
						<div class="row">
							<div class="col-xs-6 col-sm-12">
								<p class="strong">Shipping Cost</p>
							</div>
							<div class="col-xs-6 col-sm-12 text-right-xxs">
								<p class="small">Rp18.000</p>
							</div>
						</div>	
					</div>
					<div class="col-sm-3">
						<div class="row">
							<div class="col-xs-6 col-sm-12">
								<p class="strong">Total</p>
							</div>
							<div class="col-xs-6 col-sm-12 text-right-xxs">
								<p class="small">Rp252.000</p>
							</div>
						</div>	
					</div>
				</div>		
			</div>

			<br>
			<button class="btn btn-success btn-block" type="submit">Checkout</button>
			<br>				
		</form>	
	</div>	

	<!--FOOTER-->
	<div id="includedFooter"></div>


</body>
</html>

<script type="text/javascript">
	$(window).ready(function(){
		$("#includedNavbar").load("navbar.php");
		$("#includedFooter").load("footer.php");
	});	
</script>

