
$(document).ready(function (e) {

	function closeAuthModels() {
		$('.loginwrperoverlay, .modalBox').hide();
		$('body').removeClass("overhidenbody");
	}

	function openAuthModels(modelSelector) {
		closeAuthModels();
		$(modelSelector).show();
		$('.loginwrperoverlay').show();
		$('body').addClass("overhidenbody");
	}

	$(document).on("click", '.signupclick', function (e) {
		openAuthModels('.registerbox');
		e.preventDefault();
	});
    
	$(document).on("click", '.signupclickmain', function (e) {
		openAuthModels('.registerbox');
		e.preventDefault();
	});

	$(document).on("click", '.signinclick', function (e) {
		openAuthModels('.loginbox');
		e.preventDefault();
	});

	$(document).on("click", '.signinclickmain', function (e) {
		openAuthModels('.loginbox');
		e.preventDefault();
	});

	$(document).on("click", ".homePage .sharespacething .yellowbtn", function (e) {
		openAuthModels('.registervendorbox');
		e.preventDefault();
	});

	$(document).on("click", '.registerclose', function (e) {
		closeAuthModels();
		e.preventDefault();
	});

	$(document).on("click", ".registervendorclose", function (e) {
		closeAuthModels();
		e.preventDefault();
	});

});
