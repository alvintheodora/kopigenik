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
});
