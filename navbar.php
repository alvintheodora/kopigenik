<link rel="stylesheet" type="text/css" href="css/kopigenik.css">
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid container-navbar">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img class="kopBanner img-responsive" src="asset/kopigenikbanner.png"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="subscribe.php">SUBSCRIBE</a></li>
				<li><a href="about-us.php">WHAT IS KOPIGENIK</a></li>
				<li><a href="beans.php">BEANS</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li><a href="blog.php">BLOG</a></li>
			</ul>
		</div>
	</div>
</nav>

<script type="text/javascript">
	$pathnameLocal = (location.pathname).substr(18);//18 karena potong tulisan /kopigenik-master/
	$pathnameHosting = (location.pathname).substr(1);//1 karena potong /
	$(".nav li").each(function(){		
		if($(this).children().attr("href") == $pathnameHosting){
			$(this).addClass("active");
		}
	});
</script>