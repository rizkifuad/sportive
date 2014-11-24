$(document).ready(function(){
	var $register_chor = $("#register-chor");
	var $login_chor = $("#login-chor");

	var $frm_sign_in = $(".frm-sign-in");
	var $frm_sign_in_title = $(".frm-sign-in #form_title");
	var $frm_sign_up = $(".frm-sign-up");
	var $frm_register = $("#frm-register");
	var $frm_login = $("#frm-login");

	var $register_error = $("#register_error");
	var $register_error_ul = $("#register_error ul");

	var url = $("#base_url").val();

	$login_chor.click(function(){

		$frm_sign_in.removeClass("hide");
		$frm_sign_up.addClass("hide");

	})

	$register_chor.click(function(){

		$frm_sign_in.addClass("hide");
		$frm_sign_up.removeClass("hide");

	})

	function print_error(data){
		var error_html = "";
		for (var i = 0; i < data.length; i++) {
			error_html += "<li>"+data[i]+"</li>";
		};
		$register_error_ul.html(error_html);
	}

	$frm_register.submit(function(e){
		var register = $.ajax({
			url: $(this).attr('action'),
			type : 'POST',
			data : $(this).serializeArray()
		});

		register.done(function(data){
			$register_error.addClass("hide");

			var data = JSON.parse(data);
			if(data.error){
				$register_error.removeClass("alert-success");
				$register_error.addClass("alert-danger");

			}else{
				$register_error.removeClass("alert-danger");
				$register_error.addClass("alert-success");
				$frm_sign_in_title.addClass("hide");
				
				$frm_sign_in.removeClass("hide");
				$frm_sign_up.addClass("hide");
			}
			$register_error.slideDown();
			$register_error.removeClass("hide");

			print_error(data.msg);
			
		});

		register.error(function(){
			var error_html = "<li>An unknown error occured</li>";
			$register_error_ul.html(error_html);
		});

		e.preventDefault();
	});

	$frm_login.submit(function(e){
		$register_error.addClass("hide");
		var login = $.ajax({
			url: $(this).attr('action'),
			type : 'POST',
			data : $(this).serializeArray()
		});

		login.done(function(data){
			var data = JSON.parse(data);
			if(data.error){
				$register_error.slideDown();
				$register_error.removeClass("hide");
				print_error(data.msg);
			}else{
				window.location = data.url;
			}
		});

		login.error(function(){
			var error_html = "<li>An unknown error occured</li>";
			$register_error_ul.html(error_html);
		});

		e.preventDefault();
	});

});