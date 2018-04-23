<?php 
	require("../mysqli_connect.php");
	require("./includes/image_upload.php");
	$status = 'FAIL';
	if(isset($_POST['title'], $_POST['description'], $_FILES['logo']['type'], $_FILES['banner']['type'])) {
		$status = $status."tits";
		$title = $_POST['title'];
		$description = $_POST['description'];
		$logo = uploadImage("logo", "games");
		$banner = uploadImage("banner", "games");
		$query = "INSERT INTO games (game_name, description, logo, banner) 
			VALUES ('$title', '$description', '$logo', '$banner')";
		if(@mysqli_query($dbc, $query)) {
			$status = 'SUCCESS';
		}
		if(isset($_POST['platforms'])) {
			$plats = array();
			foreach ($_POST['platforms'] as $plat) {
				$plats[] = "'".mysql_real_escape_string($plat)."'";
			}
			$plats_joined = join('), (', $plats);
			$query = "INSERT INTO game_platform
				SELECT g.id, p.id
				FROM games g
				JOIN platforms p
				WHERE g.game_name = 'Rockcopter'
					AND p.platform_name IN ('$plats_joined');"
			if(@mysqli_query($dbc, $query)) {
				$status = 'SUCCESS';
			} else {
				$status = 'FAIL';
			}
		}
	}
	echo $status;	
?>