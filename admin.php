<!DOCTYPE html>
<html>
	<head> 
		<!-- Meta data for mobile device display -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<link href="./style/style.css" rel="stylesheet" type="text/css"/>
		<!-- smallDevice.css for small screen device -->
		<link href="./style/smallDevice.css" rel="stylesheet" type="text/css" media="only screen and (max-width: 900px), only screen and (max-device-width: 480px)" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
		<script  type="text/javascript" src="./js/main.js" ></script>
		<title>admin</title>
		<?php
			require('core.php'); 
			if($_SESSION['username'] != 'admin' || array_key_exists('logout', $_GET) && $_GET['logout'] == 'true'){
				session_destroy();
				header("Location: index.php");
			}
			if ( isset($_POST["submit-file"]) ) {
				if ( isset($_FILES["file"])) {
					if ($_FILES["file"]["error"] > 0) {
					    alert("Import fail.");
					}
					else {
						// echo "Upload: " . $_FILES["file"]["name"] . "<br />";
						// echo "Type: " . $_FILES["file"]["type"] . "<br />";
						// echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
						// echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
						import_from_file($_FILES["file"]["tmp_name"]);
					}
				} else {
				     echo "No file selected <br />";
				}
			}
			if ( isset($_POST["submit-clear-item"]) ) {
				alert('Clear All Items Data');
				clear_Items();
			}
			if ( isset($_POST["submit-clear-review"]) ) {
				alert('Clear All review Data');
				clear_Reviews();
			}
			if ( isset($_POST["submit-clear-member"]) ) {
				alert('Clear All member Data');
				clear_Members();
			}
			if ( isset($_POST["submit"]) ) {
				alert('submit');
			}
		
		?>
	</head>
	<body>
		<?php include 'menu.inc';?>


		<div class="admin"> 
			<div class="admin-main">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
					<label for="file">Upload item data file:</label>
					<input type="file" name="file" id="file">
					<input type="submit" name="submit-file" value="Submit-file">
					<br/>
					<br/>
					<label >Clear all Itemss data:</label>
					<input type="submit" name="submit-clear-item" value="submit"/>
					<br/>
					<br/>
					<label >Clear all Reviews data:</label>
					<input type="submit" name="submit-clear-review" value="submit"/>
					<br/>
					<br/>
					<label >Clear all Members data:</label>
					<input type="submit" name="submit-clear-member" value="submit"/>
				</form>

			</div>
		</div>

		<?php

		?>
	</body>

</html>