<!DOCTYPE html>
<html>
	<head> 
		<?php include 'head.inc';?>
		<title>admin</title>
		<?php
			//administrator page to manage database
			require('core.php'); 
			if($_SESSION['username'] != 'admin' || array_key_exists('logout', $_GET) && $_GET['logout'] == 'true'){
				// if login username is not admin, then return index.php
				session_destroy();
				header("Location: index.php");
			}
			if ( isset($_POST["submit-file"]) ) {
				// import data from CVS file
				if ( isset($_FILES["file"])) {
					if ($_FILES["file"]["error"] > 0) {
					    alert("Import fail.");
					}
					else {
						// test code 
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
				//clear all item data
				alert('Clear All Items Data');
				clear_Items();
			}
			if ( isset($_POST["submit-clear-review"]) ) {
				//clear all review comment data
				alert('Clear All review Data');
				clear_Reviews();
			}
			if ( isset($_POST["submit-clear-member"]) ) {
				// clear all members data
				alert('Clear All member Data');
				clear_Members();
			}
			if ( isset($_POST["submit"]) ) {
				//test code 
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
					<label >Clear all Items data:</label>
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