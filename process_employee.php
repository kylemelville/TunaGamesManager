<?php 
	require("../mysqli_connect.php");
	require("./includes/image_upload.php");
	$status = 'FAIL';
	if(isset($_POST['first-name'], $_POST['last-name'], $_POST['description'])) {
		$firstName = $_POST['first-name'];
		$lastName = $_POST['last-name'];
		$description = $_POST['description'];
		if(isset($_FILES['employee-picture']['type'])) {
			$picture = uploadImage("employee-picture", "employee");
			$query = "INSERT INTO employees (first_name, last_name, description, profile_picture, start_date)
			VALUES ('$firstName', '$lastName', '$description', '$picture', CURRENT_TIMESTAMP)";
		} else {
			$query = "INSERT INTO employees (first_name, last_name, description, profile_picture, start_date)
			VALUES ('$firstName', '$lastName', '$description', NULL, CURRENT_TIMESTAMP)";
		}			
		if(@mysqli_query($dbc, $query)) {
			$status = 'SUCCESS';
		}
	}
	echo $status;	
?>