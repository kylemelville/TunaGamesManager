<?php
	require("../mysqli_connect.php");
	require("./includes/header.php");
	include("./includes/quilleditor.php");

	function populatePlatformOptions($dbc) {
		$query = "SELECT *
			FROM platforms;";
		$result = @mysqli_query($dbc, $query);
		$platformList = "";
		if($result && $result->num_rows > 0) {
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$platformList = $platformList.'<option value="'.$row['platform_name'].'">'.$row['platform_name'].'</option>';
			}
		}
		return $platformList;
	}
?>
<p id="status"></p>
<div class="wrapper">
	<form action="./process_game.php" enctype="multipart/form-data" method="post" id="new-game">
		<!-- <div class="employee-picture">
			<label for="employee-picture">Picture</label>
			<img src="./images/ui/missingprofileimage.png" alt="" id="profile-picture" class="profile-picture">
			<input type="file" name="employee-picture" onchange="readURL(this, $(this).siblings('.profile-picture')[0]);">
		</div> -->
		<input type="file" name="logo">
		<input type="file" name="banner">
		<div class="game-details">
			<label for="title">Title</label>
			<input type="text" name="title" required>
			<label for="description">Description</label>
			<div id="quillEditor1" class="quill-editor"></div>
		</div>
		<select multiple name="platforms[]">
			<?php echo populatePlatformOptions($dbc); ?>
		</select>
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

	$('#new-game').submit(function() {
		var title = $('input[name=title]').val();
		var description = addEditor.root.innerHTML;
		if(title && description) {
			var formData = new FormData(this);
			formData.append("description", description);
			var ajaxOptions = new Object();
			ajaxOptions.data = formData;
			ajaxOptions.contentType = false;
			ajaxOptions.cache = false;
			ajaxOptions.processData = false;
			ajaxOptions.type = 'POST';
			ajaxOptions.url = 'process_game.php';
			ajaxOptions.success = function(response) {
				if(response == 'SUCCESS') {
					$('#status').text('Game added');
				} else {
					$('#status').text('Failed to save new record');
				}
				$('#status').text(response);
			};
			$.ajax(ajaxOptions);
		}
		return false;
	});
	
</script>
</body>
</html>