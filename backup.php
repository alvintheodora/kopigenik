<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopigenik | index</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="css/kopigenik.css">
 	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
 	<script src="js/jquery-3.2.1.min.js"></script>
  	<script src="js/bootstrap.js"></script>
  
</head>
<body>

	<!--navigation bar-->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">KOPIGENIK</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">SUBSCRIBE</a></li>
					<li><a href="#">WHAT IS KOPIGENIK</a></li>
					<li><a href="#">BEANS</a></li>
					<li><a href="#">FAQ</a></li>
					<li><a href="#">BLOG</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!--top-->
	<div class="container-fluid text-center">
		<h1 class="pass">K O P I G E N I K</h1>
		<p>end</p>
	</div>

	<!--blog-->
	<div class="container-fluid text-center">
		<h2>More on Kopigenik</h2>
		<div class="row">
			<div class="col-sm-6">
				<a href="#">
					<img class="img-responsive center-block" src="asset/blog_espresso.jpg" alt="espresso extraction">
				</a>
				<h3>Learn how to make your coffee</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div>
			<div class="col-sm-6">
				<a href="#">
					<img class="img-responsive center-block" src="asset/blog_drink_coffee.jpg" alt="time to drink coffee">
				</a>
				<h3>Best time to drink coffee</h3>
				<p>Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>

	<!--video-->
	<div class="container-fluid bg-grey">		
		<div class="row">
			<div class="col-sm-6">				
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/aBLYSO0DSVI"></iframe>
				</div>				
			</div>
			<div class="col-sm-6">
				<h3>Enhance your skills about coffee</h3>
				<p>quis nostrud exercitation. Excepteur occaecat cupidatat non</p>
				<button class="btn btn-lg">See videos</button>
			</div>
		</div>
	</div>

	<!--FOOTER-->
	<footer class="footer-btm container-fluid bg-black1">
		<div class="row">
			<div class="col-sm-4">
				<h5 style="color: #f7db9c;">QUICK LINKS</h5>
				<ul>
					<li><a href="#">Subscribe</a></li>
					<li><a href="#">Beans</a></li>
					<li><a href="#">Login</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<h5 style="color: #f7db9c;">ABOUT US</h5>
				<ul>
					<li><a href="#">Our Story</a></li>
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<h5 style="color: #f7db9c;">SOCIAL MEDIA</h5>
				<ul>
					<li><a href="#"><img class="icon-social-media" src="asset/icon-facebook.svg"><span>Kopigenik_id</span></a></li>
					<li><a href="#"><img class="icon-social-media" src="asset/icon-instagram.svg"><span>Kopigenik</span></a></li>
					<li><a href="#"><img class="icon-social-media" src="asset/icon-line.jpg"><span>@Kopigenik</span></a></li>
				</ul>
			</div>
		</div>
	</footer>
	

</body>
</html>

<?php 
	require_once 'connect.php';

	if(isset($_POST['email']) && isset($_POST['password'])){
		if(!empty($_POST['email']) && !empty($_POST['password'])){
			$email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);
			$hashed_password = md5($password);

			$query_login = "SELECT userID FROM user WHERE email = '".$conn->real_escape_string($email)."' AND password = '".$conn->real_escape_string($hashed_password)."'";
			if($result_login = $conn->query($query_login)){							
				if($result_login->num_rows == 1){//unique, primary key userID
					$user_id = $result_login->fetch_assoc()['userID'];
					echo $user_id;
				}else header("Location: login.php?error=2");//2: wrong email or password				
			}else echo $conn->error;			
		}else header("Location: login.php?error=1");//1: empty field
		
	}
?>