@extends('layouts.app')

@section('title','')

@section('content')
	<!--top-->
	<div class="container-outer">
		<div class="container-fluid banner-main">						
			<div class="row layer-tagline">
				<div class="slide-logo">				
					<img src="asset/kopigenik-icon.png" style="padding-top: 30px;" width="90" height="110">
					<p style="transform: translate(-6%, 410%); font-size: 24px; color: #fff;">KOPIGENIK</p>
					<p style="transform: translate(15%, 640%); font-size: 14px; color: #fff;">SINCE 2017</p>
				</div>	
				<div class="tagline">
					<h2 style="margin-left: -27%; color: #fff; font-weight: 500; font-size: 36px;">Layanan Berlangganan Kopi Terbaik di Indonesia</h2>
					<h3 style="margin-left: -10%; color: #fff; left: 50%; font-size: 28px;">Mengantarkan kopi ke depan pintu Anda</h3>
				</div>
				
				<div class="col-xs-4 layer layer-1">				
					<div class="banner-info">
						<h3 class="black" style="color: #fff;">Tonton video seputar kopi</h3>
						<p class="black" style="color: #fff;">Lihat barista lain dengan teknik brewing andalan mereka untuk mendapatkan hasil brewing yang maksimal</p>
						<a href="\videos" class="btn btn-banner" style="margin-bottom: 20px; color: #fff;">Lihat video <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>
					</div>										
					<img class="img-responsive" src="http://mobilemarketingmagazine.com/wp-content/uploads/2016/10/Branded-Moments-Transparent-background_b.png" alt="coffee videos" style="margin-left: -9%;">
				</div>		

				<div class="col-xs-4 layer layer-2">				
					<div class="banner-info">
						<h3 class="black" style="color: #fff;">Tingkatkan eksplorasi kopi Anda dengan berlangganan kopi</h3>
						<p class="black" style="color: #fff;">Kami mengkurasi biji kopi dengan kualitas terbaik dari seluruh nusantara</p>
						<a href="\subscribe" class="btn btn-banner" style="margin-bottom: 20px; color: #fff;">Lihat Layanan Berlangganan <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>
					</div>	
					<img class="img-responsive" src="asset/coffee_bag3.png" alt="subscribe board">				
				</div>

				<div class="col-xs-4 layer layer-3">				
					<div class="banner-info">
						<h3 class="black" style="color: #fff;">Blog untuk para pecinta kopi</h3>
						<p class="black" style="color: #fff;">Mulai dari teknik brewing, pengetahuan umum seputar kopi, hingga informasi terkini dari industri kopi</p>
						<a href="\beans" class="btn btn-banner" style="margin-bottom: 20px; color: #fff;">Lihat Blog <span class="glyphicon glyphicon-menu-right" style="margin-left: 5px;"></span></a>
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
			<h2 class="text-center font-header">Cara Berlangganan</h2>
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
				<h2 class="font-header">Tonton Video-video Menarik Seputar Kopi</h2>
				<p class="font-info">Lihat barista lain dengan teknik brewing andalan mereka untuk mendapatkan hasil brewing yang maksimal.</p>
				<a href="/videos" class="btn btn-lg btn-banner" role="button">Lihat video</a>			
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
			<h2 class="text-center font-header">Blog Untuk Para Pecinta Kopi</h2>		
			<div class="underline underline-200"></div>	
		</div>
		<div class="row">
			<a href="\blog" class="link-text">
				<div class="col-sm-6">
					<div class="shadow">
						<img class="img-responsive center-block slideanim" src="asset/original/rsz_blog_espresso.jpg" alt="espresso extraction">				
						<div style="padding: 20px;">					
							<p style="color: grey;">WEEKLY BLOG</p>
							<p style="font-size: 24px; color: #000;">Belajar cara membuat minuman kopi</p>
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
							<p style="font-size: 24px; color: #000;">Waktu terbaik untuk menikmati kopi</p>
						</div>
					</div>		
				</div>
			</a>
		</div>
	</div>
@endsection