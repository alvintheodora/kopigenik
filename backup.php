<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopigenik | Index</title>
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
					<img class="img-responsive center-block slideanim" src="asset/blog_espresso.jpg" alt="espresso extraction">
				</a>
				<h3>Learn how to make your coffee</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div>
			<div class="col-sm-6">
				<a href="#">
					<img class="img-responsive center-block slideanim" src="asset/blog_drink_coffee.jpg" alt="time to drink coffee">
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
					<li><a href="subscribe.php">Subscribe</a></li>
					<li><a href="beans.php">Beans</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<h5 style="color: #f7db9c;">ABOUT US</h5>
				<ul>
					<li><a href="about-us.php">Our Story</a></li>
					<li><a href="faq.php">FAQ</a></li>
					<li><a href="blog.php">Blog</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<h5 style="color: #f7db9c;">SOCIAL MEDIA</h5>
				<ul>
					<li>
						<a href="https://facebook.com/kopigenik" target="__blank">
							<img class="icon-social-media" src="asset/icon-facebook.svg">
							<span>Kopigenik_id</span>
						</a>
					</li>
					<li>
						<a href="https://instagram.com/kopigenik" target="__blank"">
							<img class="icon-social-media" src="asset/icon-instagram.svg">
							<span>Kopigenik</span>
						</a>
					</li>
					<li>						
						<img class="icon-social-media" src="asset/icon-line.jpg">
						<span>@Kopigenik</span>	
						<div class="line-it-button" data-lang="en" data-type="friend" data-lineid="@kopigenik" data-count="true" data-home="true" style="display: none; padding-top: 5px;"></div>
						<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
					</li>
				</ul>
			</div>
		</div>
	</footer>

</body>
</html>

<script type="text/javascript">
	$(window).ready(function(){
		$("#includedNavbar").load("navbar.php");
		$("#includedFooter").load("footer.php");
	});
</script>
