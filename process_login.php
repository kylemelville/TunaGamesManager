<?php 
	require("../mysqli_connect.php");
	$status = 'INCORRECT';
	if(isset($_POST['email'], $_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = "SELECT first_name, email, pwd
			FROM users
			WHERE email = '$email'
			LIMIT 1;";
		$result = @mysqli_query($dbc, $query);
		if($result && $result->num_rows > 0) {
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if(password_verify($password, $row['pwd'])) {
				session_start();
				$_SESSION["firstname"] = $row['first_name'];
				$_SESSION["email"] = $row['email'];
				$status = 'CORRECT';
			}
		}
	}
	echo $status;
?>