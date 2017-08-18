<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopigenik | Index</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<?php include 'head.php'; ?>
  
</head>
<body>
	
	<!--navigation bar-->
	<!--<div id="includedNavbar"></div> -->
	<?php include 'navbar.php'; ?>   
	<!--top-->
	<div class="container-fluid text-center banner-main">		
		<h1>K O P I G E N I K</h1>
		<!--<img class="img-rounded img-responsive" src="asset/portfolio-4.jpg" width="100%;">-->
		<p>end</p>		
	</div>

	<!--video-->
	<div class="container-fluid">		
		<div class="row">
			<div class="col-md-6">				
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/aBLYSO0DSVI"></iframe>
				</div>				
			</div>
			<div class="col-md-6">
				<h3>Enhance your skills about coffee</h3>
				<p>quis nostrud exercitation. Excepteur occaecat cupidatat non</p>
				<button class="btn btn-lg">See videos</button>
			</div>
		</div>
	</div>
	
	<hr class="line">

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
					<li><a href="about-us.php">What is Kopigenik</a></li>
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
						<a href="https://instagram.com/kopigenik" target="__blank">
							<img class="icon-social-media" src="asset/icon-instagram.svg">
							<span>Kopigenik</span>
						</a>
					</li>
					<li>						
						<img class="icon-social-media" src="asset/icon-line.jpg">
						<span style="color: #fff;">@Kopigenik</span>							
					</li>
					<li style="margin-left: 50px;">
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
