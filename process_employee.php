<?php 
	require("../mysqli_connect.php");
	$status = 'FAIL';
	if(isset($_POST['firstName'], $_POST['lastName'], $_POST['description'])) {
		if(isset($_POST['picture'])) {
			$picture = $_POST['picture'];	
		}
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$description = $_POST['description'];
		$query = "INSERT INTO employees (first_name, last_name, description, profile_picture, start_date)
			VALUES ('$firstName', '$lastName', '$description', NULL, CURRENT_TIMESTAMP)";
		if(@mysqli_query($dbc, $query)) {
			$status = 'SUCCESS';
		}
	}
	echo $status;
?>