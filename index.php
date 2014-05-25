<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<!-- Meta data for mobile device display -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
		<link href="./style/style.css" rel="stylesheet" type="text/css"/>
		<!-- smallDevice.css for small screen device -->
		<link href="./style/smallDevice.css" rel="stylesheet" type="text/css" media="only screen and (max-width: 900px), only screen and (max-device-width: 480px)" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
		<script  type="text/javascript" src="./js/main.js" ></script>
		<title>Brisbane Life</title>
		<!-- Meta data for Open Graph protocol -->
		<meta property="og:title" content="Brisbane Life" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://54.206.43.109/~n8975698/a1/index.html" />
		<meta property="og:image" content="http://54.206.43.109/~n8975698/a1/image/1.png" />
		<!-- Meta data for twitter cards -->
		<meta name="twitter:card" content="summary"/>
		<meta name="twitter:site" content="@ZUTAOWU"/>
		<meta name="twitter:creator" content="@ZUTAOWU"/>
		<meta name="twitter:image" content="http://54.206.43.109/~n8975698/a1/image/1.png"/>
		<meta name="twitter:description" content="This web site can help you find a wifi hotspot easily"/>
		<meta name="twitter:title" content="Brisbane Life -- WIFI"/>
		<meta name="twitter:url" content="http://54.206.43.109/~n8975698/a1/"/>
		<!-- <meta name="twitter:domain" content="54.206.43.109"/> -->
		<!-- Just for IE change the header back ground to green
			because IE do not support linear-gradient(30deg,#2276ad,#6ec654); 
		-->
		<!--[if IE]>
		<style type="text/css">
		  .header {
			background-color:#00AC00;
		  }
		</style>
		<![endif]-->

		<?php

			require('core.php'); 

			if(array_key_exists('logout', $_GET) && $_GET['logout'] == 'true'){
				session_destroy();
				header("Location: index.php");
			}

			$page_display_num = 3;
			$current_page_num = parse_pagenum();
			$rows = sql_query_page("SELECT * FROM Items",$current_page_num, $page_display_num); 
			$counts = sql_query_table_count("Items");
			$total_page_num = get_total_pagenum($page_display_num, $counts);
			//alert($counts);
		?>

	</head>
	<body>
		<div class="whole-page">
			<?php include 'menu.inc';?>

			<div class="header"> 
				<div class="head">
				<span class="Header-B">B</span>risbane <span class="Header-L">L</span>ife
				</div>
				<div class="header-description"> We can help you find WIFI Hotspot </div>
			</div>	

			<div class="whole-content">
				<!--left box use to show the place information-->
				<!--include 3 hard-coded information -->
				<div class="left-box">
					<?php 
						foreach($rows as $row) {
					?>
					<div class="content">
						<div class="content-head">
							<a href="./content.php?<?php echo $row['ID']?>" ><?php echo $row['NAME'] ?></a>
						</div>
						<div class="content-main" itemscope itemtype="http://schema.org/Place">
							<span itemprop="name"><?php echo $row['NAME'] ?></span>
							<br/><br/>
							<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							    <span itemprop="streetAddress"><?php echo $row['ADDRESS'] ?></span>
							    <span itemprop="addressLocality"><?php echo $row['SUBURB'] ?></span>,
							    <span itemprop="addressRegion">QueensLand</span>
							 </div>
							 <br/>
							 <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
							    Latitude: <?php echo $row['Latitude'] ?><br/>
							    Longitude: <?php echo $row['Longitude'] ?>
							    <meta itemprop="latitude" content="<?php echo $row['Latitude'] ?>" />
							    <meta itemprop="longitude" content="<?php echo $row['Longitude'] ?>" />
							  </div>
						</div>
						<div class="content-foot">
							<span class="foot-like">10 - <a class="like-button" href="#" >Like </a></span>  
							<span class="foot-dislike">10 - <a class="dislike-button" href="#">Dislike </a></span>
						</div>
					</div>

					<?php 
							
						} 
					?>	
					
					<div class="page"> 
						<?php
							echo get_page_html($current_page_num, $total_page_num);
						?>
						
					</div>

				</div>
				<!--right box use to show the maps-->
				<div class="right-box">
					<div class="map" id="map-canvas">
						<!-- map -->
					</div>

					<div class="map" id="map-canvas2">
						<!-- map --> 
					</div>
				</div>
			</div>
			<div class="footer" id="footer">Copyright 2014</div>
		</div>
		<script>
		//create the maps on web page
		var map = googlemap_createMap("map-canvas");
		<?php 
			foreach($rows as $row) {
				echo "googlemap_setMaker({$row['Latitude']}, {$row['Longitude']}, map);";
			}
		?>
		googlemap_createMap("map-canvas2");
		</script>
	</body>
</html> 