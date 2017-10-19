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
		$(".slide-logo").velocity("stop");
		$width = $(window).width()*0.17 - 45;		
		$(".slide-logo").velocity({ left: $width }, { duration: 250, easing: "ease-out" });
	});
	$(".layer-2").hover(function(){		
		$(".slide-logo").velocity("stop");	
		$width = $(window).width()*0.5 - 45;	
		$(".slide-logo").velocity({ left: $width }, { duration: 250, easing: "ease-out" });
	});
	$(".layer-3").hover(function(){	
		$(".slide-logo").velocity("stop");	
		$width = $(window).width()*0.82 - 45;
		$(".slide-logo").velocity({ left: $width }, { duration: 250, easing: "ease-out" });
	});	
	$(".layer-tagline").mouseleave(function(){
		$(".slide-logo").velocity("stop");
		$width = $(window).width()*0.5 - 45;	
		$(".slide-logo").velocity({ left: $width }, { duration: 250, easing: "ease-out" });
	});

});
