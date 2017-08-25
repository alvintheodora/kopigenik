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
		$(".slide-logo").css("left","9%");
	});
	$(".layer-2").hover(function(){				
		$(".slide-logo").css("left","40%");		
	});
	$(".layer-3").hover(function(){		
		$(".slide-logo").css("left","73%");		
	});	
	$(".layer-tagline").mouseleave(function(){
		$(".slide-logo").css("left","40%");
	});

});
