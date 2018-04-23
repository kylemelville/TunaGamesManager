$(function() {
	$('.input-error').text('');
	$('#login').submit(function() {
		var email, password;
		if(isValidEmail($('input[name=email]').val())) {
			email = $('input[name=email]').val();
			$('#email-error').text('');
		} else {
			$('#email-error').text('Please enter a valid email address');
		}
		if(isValidPassword($('input[name=password]').val())) {
			password = $('input[name=password]').val();
			$('#password-error').text('');
		} else {
			$('#password-error').text('Please enter a valid password');
		}
		if(email && password) {	
			var formData = new Object();
			formData.email = email;
			formData.password = password;			
			var ajaxOptions = new Object();
			ajaxOptions.data = formData;
			ajaxOptions.dataType = 'text';
			ajaxOptions.type = 'POST';
			ajaxOptions.url = 'process_login.php';
			ajaxOptions.success = function(response) {
				if(response == 'CORRECT') {
					window.location.href = "./index.php";
				} else {
					$('#login-error').text('The email or password is incorrect');
				}			
			};			
			$.ajax(ajaxOptions);		
		}
		return false; //prevent form submission
	});
});

//referenced from: https://stackoverflow.com/questions/2507030/email-validation-using-jquery
function isValidEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email) && (email.length >= 6);
}

function isValidPassword(password) {
	return (password.length >= 8);
}