<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopigenik | Payment Confirmation</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<?php include 'head.php'; ?>	
  
</head>
<body>

	<!--navigation bar-->
	<div id="includedNavbar"></div>

	<!--body-->
	<div class="container-fluid">
		<div class="text-center">
			<h2>Payment Confirmation</h2>
			<h3>Order ID: TR001</h3>
			<h4>Amount you must pay:</h4>
			<h4>Rp252.000</h4>
			<p>Mohon segera selesaikan pembayaran sebelum tanggal <span class="strong">31 Desember 2017</span></p>
			<p>Silahkan transfer ke rekening kami yang tersedia</p>
		</div>		
		<div class="row bank text-center-xs">
			<div class="col-sm-6">
				<img class="icon-bank" src="asset/icon-bca.jpg" alt="BCA">
			</div>
			<div class="col-sm-6">
				<p class="small">BCA</p>
				<p class="small">Nomor Rekening: 6038 483 222</p>
				<p class="small">Nama Pemilik Rekening: Kopigenik</p>
			</div>			
		</div>

		<br>
		<form action="index.php" method="POST">
			<button class="btn btn-lg btn-success btn-block">Confirm payment</button>
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

