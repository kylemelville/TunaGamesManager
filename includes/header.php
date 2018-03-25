<!DOCTYPE html>
<html>
	<head>
		<title>
			Tuna Games
			<?php
				session_start();
				if(!isset($_SESSION['email'])) {
					header("Location: ./login.php");
				}
				if(!empty($pageSubTitle)) {
					echo ' - '.$pageSubTitle; 
				}
			?>				
		</title>	
		<link rel="stylesheet" href="./css/global.css" type="text/css" />
		<link rel="stylesheet" href="./css/header.css" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>	
	<body>
		<header>
			<div class="wrapper">
				<a class="logo" href="./index.php">
					<img src="./images/ui/tunagamesmanagerlogo_dark.png" alt="Tuna Games" />
				</a>
				<div class="navigation">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="games.php">Games</a></li>
						<li><a href="team.php">Team</a></li>
					</ul>
				</div>
			</div>
		</header>