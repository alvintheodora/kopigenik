@extends('layouts.app')

@section('title','Index')

@section('content')
	<!--top-->
	<div class="container-outer">
		<div class="container-fluid banner-main">						
			<div class="row layer-tagline">
				<div class="slide-logo">				
					<img src="asset/kopigenik-icon.png" style="transform: translateX(80%); padding-top: 30px;" width="90" height="110">
					<p style="transform: translate(45%,380%); font-size: 24px; color: #fff;">KOPIGENIK</p>
					<p style="transform: translate(67%,600%); font-size: 14px; color: #fff;">SINCE 2017</p>
				</div>	
				<div class="tagline">
					<h2 style="margin-left: -27%; color: #fff; font-weight: 500; font-size: 36px;">- Indonesia's Best Coffee Subscription -</h2>
					<h3 style="margin-left: -10%; color: #fff; left: 50%; font-size: 28px;">Delivering coffee to your door</h3>
				</div>
				
				<div class="col-xs-4 pl-3 layer layer-1">				
					<div class="banner-info">
						<h3 class="black" style="color: #fff;">Watch videos about your coffee</h3>
						<p class="black" style="color: #fff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
						<a href="\videos" class="btn btn-banner" style="margin-bottom: 20px; color: #fff;">See videos <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>
					</div>										
					<img class="img-responsive" src="http://mobilemarketingmagazine.com/wp-content/uploads/2016/10/Branded-Moments-Transparent-background_b.png" alt="coffee videos" style="margin-left: -9%;">
				</div>		

				<div class="col-xs-4 pl-3 layer layer-2">				
					<div class="banner-info">
						<h3 class="black" style="color: #fff;">Enjoy your coffee with subscription</h3>
						<p class="black" style="color: #fff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
						<a href="\subscribe" class="btn btn-banner" style="margin-bottom: 20px; color: #fff;">Check Subscription Plan <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>
					</div>	
					<img class="img-responsive" src="asset/coffee_bag3.png" alt="subscribe board">				
				</div>

				<div class="col-xs-4 pl-3 layer layer-3">				
					<div class="banner-info">
						<h3 class="black" style="color: #fff;">We deliver first-grade beans</h3>
						<p class="black" style="color: #fff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
						<a href="\beans" class="btn btn-banner" style="margin-bottom: 20px; color: #fff;">See Our Beans <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>
					</div>
					<img class="img-responsive" src="asset/coffee_beans2.png" align="coffee beans">		
				</div>
			</div>				
		</div>
	</div>
	

	<!--top2-->
	<div class="container-fluid banner-main-md" style="color: white;">		
		<!--<h1>K O P I G E N I K</h1>-->
		<div class="row">
			<div class="col-xs-6">
				<h3 class="black font-header-mobile">Watch videos about your coffee</h3>
				<p class="black font-p-mobile">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				
			</div>
			<div class="col-xs-6">
				<img class="img-responsive" src="asset/video-banner.png" alt="coffee videos" style="margin-top: 20px;">
			</div>

		</div>
		<a href="\videos" class="btn btn-block btn-banner font-header-mobile" style="margin-top: 10px; margin-bottom: 20px;">See videos <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>
		<hr>														
		<div class="row">
			<div class="col-xs-6">
				<img class="img-responsive" src="asset/coffee_bag3.png" alt="subscribe board" style="margin-top: 20px;">
			</div>
			<div class="col-xs-6">
				<h3 class="black font-header-mobile">Enjoy your coffee with subscription</h3>
				<p class="black font-p-mobile">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				
			</div>
		</div>
		<a href="\subscribe" class="btn btn-block btn-banner font-header-mobile" style="margin-bottom: 20px;">Check subscription plans <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>	
		<hr>											
		<div class="row">
			<div class="col-xs-6">
				<h3 class="black font-header-mobile">We deliver first-grade beans</h3>
				<p class="black font-p-mobile">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
				
			</div>
			<div class="col-xs-6">
				<img class="img-responsive" src="asset/coffee_beans2.png" alt="coffee beans" style="margin-top: 20px;">
			</div>
		</div>	
		<a href="\beans" class="btn btn-block btn-banner font-header-mobile" style="margin-bottom: 20px;">See our beans <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>	
		<hr>					
	</div>


	<!--how to kopigenik-->
	<div class="container-fluid container-inner">
		<div class="section-block">
			<h2 class="text-center font-header">How To Kopigenik</h2>
			<div class="underline underline-200"></div>	
		</div>
		
		<div class="row">
			<div class="col-sm-12">				
				<div class="how-to-kopigenik-banner"></div>				
			</div>
			
		</div>
	</div>
	
	<!--<hr class="line">-->

	<!--video-->
	<div class="container-fluid container-full bg-grey">
		<div class="row container-fixed">
			<div class="col-sm-5 col-sm-offset-7 video-info">
				<h2 class="font-header">Watch Kopigenik's Top-Choice Video</h2>
				<p class="font-info">Enhance your skills about coffee from high-end baristas around the world.</p>
				<a href="/videos" class="btn btn-lg btn-banner" role="button">See videos</a>			
			</div>									
		</div>
		<div class="video-overflow">
			<div class="video-banner"></div>
			<video autoplay loop preload="auto" class="video">
				<source src="https://media.pactcoffee.com/video/coffee_hero.mp4" type="video/mp4">
				Your browser does not support the video tag.
			</video>	
		</div>
	</div>

	<!--<hr class="line">-->

	<!--blog-->
	<div class="container-fluid container-inner text-center">
		<div class="section-block">
			<h2 class="text-center font-header">Blog for Coffee Enthusiast</h2>		
			<div class="underline underline-200"></div>	
		</div>
		<div class="row">
			<a href="\blog" class="link-text">
				<div class="col-sm-6">
					<div class="shadow">
						<img class="img-responsive center-block slideanim" src="asset/original/rsz_blog_espresso.jpg" alt="espresso extraction">				
						<div style="padding: 20px;">					
							<p style="color: grey;">WEEKLY BLOG</p>
							<p style="font-size: 24px; color: #000;">Learn how to make your coffee</p>
						</div>
					</div>		
				</div>
			</a>
			<a href="\blog" class="link-text">
				<div class="col-sm-6">	
					<div class="shadow">
						<img class="img-responsive center-block slideanim" src="asset/original/rsz_blog_drink_coffee.jpg" alt="time to drink coffee">				
						<div style="padding: 20px;">					
							<p style="color: grey;">WEEKLY BLOG</p>
							<p style="font-size: 24px; color: #000;">Best time to drink your coffee</p>
						</div>
					</div>		
				</div>
			</a>
		</div>
	</div>
@endsection