$(window).scroll(function(){
	var offset = $('#about-us').offset().top;

	offset -= 50;

	scroll_start = $(this).scrollTop();


	if(scroll_start > 500){
		$('nav').attr("style", "background: rgba(30,30,31,1) !important");
		$('#return-to-top').fadeIn(200);    
	}
	else{
		$('nav').attr("style", "background: rgba(30,30,31,0.2) !important");
		$('#return-to-top').fadeOut(200);   
	}
});