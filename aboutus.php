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