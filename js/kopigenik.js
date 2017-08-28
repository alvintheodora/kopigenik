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
		$(".slide-logo").velocity({ left: "9%" }, { duration: 250, easing: "ease-out" });
	});
	$(".layer-2").hover(function(){		
		$(".slide-logo").velocity("stop");		
		$(".slide-logo").velocity({ left: "40%" }, { duration: 250, easing: "ease-out" });
	});
	$(".layer-3").hover(function(){	
		$(".slide-logo").velocity("stop");	
		$(".slide-logo").velocity({ left: "73%" }, { duration: 250, easing: "ease-out" });
	});	
	$(".layer-tagline").mouseleave(function(){
		$(".slide-logo").velocity("stop");
		$(".slide-logo").velocity({ left: "40%" }, { duration: 250, easing: "ease-out" });
	});

});
