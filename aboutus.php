<!DOCTYPE html>
<html>
	<head> 
		<?php include 'head.inc';?>
		<title>About us</title>
		<?php
			require('core.php'); 
			if(array_key_exists('logout', $_GET) && $_GET['logout'] == 'true'){
				session_destroy();
				header("Location: index.php");
			}
		?>

	</head>
	<body>
		<?php include 'menu.inc';?>
		<div class="aboutus"> 
			<div class="tony">
				<!-- <div class="about-pic tony-pic">
				</div> -->
				<div class="about-discription">
					Name: ZUTAO WU
					&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- <br/> -->
					Student ID: n8975698
				</div>
			</div>
			<div class="abdul">
				<!-- <div class="about-pic abdul-pic">
				</div> -->
				<div class="about-discription">
					Name: Abdulrahman Alhashimi
					&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- <br/> -->
					Student ID: n8655251
				</div>

			</div>

		</div>
	</body>

</html>