<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopigenik | Subscribe 2</title>
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
		<h2>Subscribe 2</h2>

		<div id="orderSummary">
			<h3>Ringkasan Pesanan</h3>
			<div class="row">
				<div class="col-xs-6 col-sm-6">
					<p>250 gram (per 2 minggu)</p>
				</div>
				<div class="col-xs-6 col-sm-6">
					<p>Rp95.000</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6">
					<p>Total (1 bulan)</p>
				</div>
				<div class="col-xs-6 col-sm-6">
					<p>Rp190.000</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6">
					<p>Ongkos kirim</p>
				</div>
				<div class="col-xs-6 col-sm-6">
					<p>Rp9.000</p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-6 col-sm-6">
					<p>Total harga</p>
				</div>
				<div class="col-xs-6 col-sm-6">
					<p>Rp294.000</p>
				</div>
			</div>						
		</div>				
		
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

