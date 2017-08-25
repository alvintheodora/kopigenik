$(document).ready(function(){
	//sliding animation
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

});
