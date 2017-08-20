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
	<?php include 'navbar.php'; ?>

	<!--top-->
	<div class="container-fluid banner-main">		
		<!--<h1>K O P I G E N I K</h1>-->
		<div class="row">
			<div class="col-xs-4 pl-3">				
				<h3 class="black">Watch videos about your coffee</h3>
				<p class="black">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				<a href="videos.php" class="btn btn-banner" style="margin-bottom: 20px;">See videos</a>		
				<img class="img-responsive" src="asset/video-banner.png" alt="coffee videos">
			</div>														
			<div class="col-xs-4 pl-3">
				<img class="img-responsive" src="asset/open_board.jpg" alt="subscribe board">					
				<h3 class="black">Enjoy your coffee with subscription</h3>
				<p class="black">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				<a href="subscribe.php" class="btn btn-banner" style="margin-bottom: 20px;">See subscription plans</a>													
			</div>
			<div class="col-xs-4 pl-3">				
				<h3 class="black">We deliver first-grade beans</h3>
				<p class="black">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				<a href="beans.php" class="btn btn-banner" style="margin-bottom: 20px;">See our beans</a>	
				<img class="img-responsive" src="asset/coffee_beans.jpg" align="coffee beans">		
			</div>
		</div>				
	</div>

	<!--top2-->
	<div class="container-fluid banner-main-md">		
		<!--<h1>K O P I G E N I K</h1>-->
		<div class="row">
			<div class="col-xs-6">
				<h3 class="black font-header-mobile">Watch videos about your coffee</h3>
				<p class="black font-p-mobile">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				<a href="#" class="btn btn-banner font-header-mobile" style="margin-bottom: 20px;">See videos</a>
			</div>
			<div class="col-xs-6">
				<img class="img-responsive" src="asset/video-banner.png" alt="coffee videos" style="margin-top: 20px;">
			</div>
		</div>
		<hr>														
		<div class="row">
			<div class="col-xs-6">
				<img class="img-responsive" src="asset/open_board.jpg" alt="subscribe board" style="margin-top: 20px;">
			</div>
			<div class="col-xs-6">
				<h3 class="black font-header-mobile">Enjoy your coffee with subscription</h3>
				<p class="black font-p-mobile">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				<a href="subscribe.php" class="btn btn-banner font-header-mobile" style="margin-bottom: 20px;">See subscription plans</a>
			</div>
		</div>	
		<hr>											
		<div class="row">
			<div class="col-xs-6">
				<h3 class="black font-header-mobile">We deliver first-grade beans</h3>
				<p class="black font-p-mobile">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				<a href="beans.php" class="btn btn-banner font-header-mobile" style="margin-bottom: 20px;">See our beans</a>	
			</div>
			<div class="col-xs-6">
				<img class="img-responsive" src="asset/coffee_beans.jpg" alt="coffee beans" style="margin-top: 20px;">
			</div>
		</div>						
	</div>


	<!--video-->
	<div class="container-fluid">		
		<div class="row">
			<div class="col-sm-6">				
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/aBLYSO0DSVI" frameborder="0" allowfullscreen></iframe>
				</div>				
			</div>
			<div class="col-sm-6">
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
						<a href="https://instagram.com/kopigenik" target="__blank"">
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