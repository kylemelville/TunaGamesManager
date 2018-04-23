<?php
	function uploadImage($imageName, $targetFolder) {
		if(isset($_FILES[$imageName])) {
			$allowedFileTypes = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
			if(in_array($_FILES[$imageName]['type'], $allowedFileTypes)) {
				$fileName = uniqid('', true).".".pathinfo($_FILES[$imageName]['name'], PATHINFO_EXTENSION);
				move_uploaded_file($_FILES[$imageName]['tmp_name'], "../TunaGames/images/{$targetFolder}/{$fileName}");
			}
		}
		if($_FILES[$imageName]['error'] > 0) {
			$fileName = "Error: {$_FILES[$imageName]['error']}";
		}
		if (file_exists($_FILES[$imageName]['tmp_name']) && is_file($_FILES[$imageName]['tmp_name'])) {
			unlink($_FILES[$imageName]['tmp_name']);
		}
		return $fileName;
	}
?>