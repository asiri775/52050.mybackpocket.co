 
 $(document).ready(function(e) {
	$('.signupclick').click(function(e) {
	$('.loginbox').hide( "drop", { direction: "up" },"fast"  );
	$('.registerbox').delay(300).show( "drop", { direction: "up" },"fast" );
	});
	$('.signupvendorclick').click(function(e) {
		$('.registervendorbox').delay(300).show( "drop", { direction: "up" },"fast" );
    });
	$('.signinclick').click(function(e) {
        $('.registerbox').hide( "drop", { direction: "up" },"fast"  );
		$('.loginbox').delay(300).show( "drop", { direction: "up" },"fast" );
		 
    });
	
	$('.registerclose').click(function(){
		$('.loginwrperoverlay, .loginbox, .registerbox ').fadeOut(300);
		$('body').removeClass("overhidenbody");
		
		});

	$('.registervendorclose').click(function(){
		$('.loginwrperoverlay, .loginbox, .registervendorbox').fadeOut(300);
		$('body').removeClass("overhidenbody");
	});	
		
		// main click starts 
		
		
		$('.signinclickmain').click(function(e) {
             $('.registerbox').css({"display" : "none"});
			$('.loginbox, .loginwrperoverlay').fadeIn(200);
			$('body').addClass("overhidenbody");
        });
	
	$('.signupclickmain').click(function(e) {
       $('.loginbox ').css({"display" : "none"});
	   $('.registerbox, .loginwrperoverlay').fadeIn(200);
	   $('body').addClass("overhidenbody");
	   
    });
	
	
	// for responsive menu
	
	  

	
	 
	 
	
});
 