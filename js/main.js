$(document).ready(function(){
	'use strict';

	// object formErrors
	var formErrors = {
		'user_error' : true,
		'password_error' : true,
		'message_error' : true };

	$('[name="user_name"]').keyup(function(){
		if ( $(this).val().length < 5 ) {
			$(this).parent().next('.custom_alert').fadeIn();
			formErrors.user_error = true;
		} else {
			$(this).parent().next('.custom_alert').fadeOut();
			formErrors.user_error = false;
		}	
	});
	$('[name="password"]').keyup(function(){
		if ( $(this).val().length < 7 ) {
			$(this).parent().next('.custom_alert').fadeIn();
			formErrors.password_error = true;
		} else {
			$(this).parent().next('.custom_alert').fadeOut();
			formErrors['password_error'] = false;
		}	
	});
	$('[name="message"]').keyup(function(){
		if ( $(this).val().length < 20 ) {
			$(this).next().fadeIn('.custom_alert');
			formErrors.message_error = true;
		} else {
			$(this).next().fadeOut('.custom_alert');
			formErrors.message_error = false;
		}	
	});

	$('body,html').keyup(function() {
	 	if (
	 		formErrors.user_error === false && 
	 		formErrors.password_error === false && 
	 		formErrors.message_error === false) {
			$('button.btn-primary').removeAttr('disabled');
		} else {
			$('button.btn-primary').attr('disabled', 'disabled');
		}
	});


});


