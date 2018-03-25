<?php
	require("../mysqli_connect.php");
	require("./includes/header.php");
	include("./includes/quilleditor.php");
?>
<p id="status"></p>
<div class="wrapper">
	<form action="" method="post" id="new-employee">
		<div class="employee-picture">
			<label for="employee-picture">Picture</label>
			<img src="./images/ui/missingprofileimage.png" alt="" id="profile-picture" class="profile-picture">
			<input type="file" name="employee-picture" onchange="readURL(this, $(this).siblings('.profile-picture')[0]);">
		</div>
		<div class="employee-details">
			<label for="first-name">First Name</label>
			<input type="text" name="first-name" required>
			<label for="last-name">Last Name</label>
			<input type="text" name="last-name" required>
			<label for="employee-description">Description</label>
			<div id="quillEditor1" class="quill-editor"></div>
		</div>
		<input type="submit" value="Save">
	</form>
</div>
<link rel="stylesheet" href="./css/team.css" type="text/css" />
<script type="text/javascript">
	var addEditor;

	$(function() {
		addEditor = createNewQuillEditor('quillEditor1');
	});

	//referenced from: https://codepen.io/mobifreaks/pen/LIbca
	function readURL(input, image) {
	    if(input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $(image).attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}	

	$('#new-employee').submit(function() {
		var picture, firstName, lastName, description;
		picture = $('#employee-picture').file;
		firstName = $('input[name=first-name]').val();
		lastName = $('input[name=last-name]').val();
		description = addEditor.root.innerHTML;
		if(firstName && lastName && description) {
			var formData = new Object();
			if(picture) {
				formData.picture = picture;
			}			
			formData.firstName = firstName;
			formData.lastName = lastName;
			formData.description = description;
			var ajaxOptions = new Object();
			ajaxOptions.data = formData;
			ajaxOptions.dataType = 'text';
			ajaxOptions.type = 'POST';
			ajaxOptions.url = 'process_employee.php';
			ajaxOptions.success = function(response) {				
				if(response == 'SUCCESS') {
					$('#status').text('Employee added');
				} else {
					$('#status').text('Failed to save new record');
				}
			};
			$.ajax(ajaxOptions);
		}
		return false;
	});
	
</script>
</body>
</html>