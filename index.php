	<?php require("./includes/header.php"); ?>
	<div class="wrapper">
		<h2>Main Page Content</h2>
	</div>
	<?php 
		include("./includes/quilleditor.php"); 
		//load existing data into quill
	?>
	<div class="wrapper">
		<input type="button" class="save-button" value="Save Changes">
	</div>
	</body>
</html>