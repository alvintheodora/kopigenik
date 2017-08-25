$(document).ready(function(){
	$(window).scroll(function(){		
		$(".slideanim").each(function(){
			var pos = $(this).offset().top;
			var windowTop = $(window).scrollTop();			
			if(windowTop + 600 > pos){
				$(this).addClass("slide");
			}
		});
	});

	//sliding banner	
	$(".layer-1").hover(function(){		
		$(".geser").css("left","9%");
	});
	$(".layer-2").hover(function(){				
		$(".geser").css("left","40%");		
	});
	$(".layer-3").hover(function(){		
		$(".geser").css("left","73%");		
	});	
	$(".layer-tagline").mouseleave(function(){
		$(".geser").css("left","40%");
	});



	//animate
	/*
	$(".layer-tagline").mouseenter(function(){
		$(".tagline").animate({
				opacity: 0,
			},1000,function(){
				$(".layer-1").mouseenter(function(){
					$(".geser").css("left","9%");
					$(".layer-1").css("background-color", "rgba(26, 26, 26, 0.5)");
				}).mouseleave(function(){
					$(".layer-1").css("background-color", "unset");
				});
			});
	}).mouseleave(function(){
		$(".tagline").animate({
				opacity: 1,
			},1000,function(){});
		$(".geser").css("left","40%");	
	});

	$(".layer-1").mouseenter(function(){
		if($(".tagline").css("opacity")!="0"){
			$(".tagline").animate({
				opacity: 0,
			},1000,function(){
				$(".geser").css("left","9%");
				$(".layer-1").css("background-color", "rgba(26, 26, 26, 0.5)");
			});
		}else{
			$(".geser").css("left","9%");
			$(".layer-1").css("background-color", "rgba(26, 26, 26, 0.5)");
		}
	}).mouseleave(function(){
		$(".layer-1").css("background-color", "unset");
	});
	$(".layer-2").mouseenter(function(){
		if($(".tagline").css("opacity")!="0"){
			$(".tagline").animate({
				opacity: 0,
			},1000,function(){
				$(".geser").css("left","40%");
				$(".layer-2").css("background-color", "rgba(26, 26, 26, 0.5)");
			});
		}else{
			$(".geser").css("left","40%");
			$(".layer-2").css("background-color", "rgba(26, 26, 26, 0.5)");
		}
	}).mouseleave(function(){
		$(".layer-2").css("background-color", "unset");
	});
	$(".layer-3").mouseenter(function(){
		if($(".tagline").css("opacity")!="0"){
			$(".tagline").animate({
				opacity: 0,
			},1000,function(){
				$(".geser").css("left","73%");
				$(".layer-3").css("background-color", "rgba(26, 26, 26, 0.5)");
			});
		}else{
			$(".geser").css("left","73%");
			$(".layer-3").css("background-color", "rgba(26, 26, 26, 0.5)");
		}
	}).mouseleave(function(){
		$(".layer-3").css("background-color", "unset");
	});*/

});
