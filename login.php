<!DOCTYPE html>
<html>
	<head>
		<title>Tuna Games Manager - Login</title>	
		<link rel="stylesheet" href="./css/global.css" type="text/css" />
		<link rel="stylesheet" href="./css/login.css" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="./js/login.js" charset="utf-8"></script>
	</head>
	<body>
		<div class="login-header">
			<img src="./images/ui/tunagamesmanagerlogo.png" alt="Tuna Games">
		</div>
		<form action="" method="post" class="login" id="login">
			<div class="login-title">Log in</div>
			<hr>
			<input type="email" name="email" placeholder="Email" required>
			<div class="input-error" id="email-error"></div>
			<input type="password" name="password" placeholder="Password" required>
			<div class="input-error" id="password-error"></div>
			<div id="login-error"></div>
			<input type="submit" value="Log in">
		</form>
	</body>
</html>